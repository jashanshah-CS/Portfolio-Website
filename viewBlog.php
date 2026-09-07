<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewBlogs</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/viewBlogs.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="mobile/footermobile.css">
    <link rel="stylesheet" href="mobile/headermobile.css">
    <link rel="stylesheet" href="mobile/viewBlogsmobile.css">
</head>

<body>
    <!-- ===== CONTAINER ===== -->
    <div class="container">
        <!-- ===== HEADER ===== -->
        <header id="header">
            <h3>
                <font size="7rem"><a href="portfolio.html">Jashan Shah</a></font>
            </h3>
            <nav>
                <ul>
                    <li><a href="portfolio.html">Home</a></li>
                    <li><a href="aboutme.html">About</a></li>
                    <li><a href="education.html">Highlights</a></li>
                    <li><a href="skills.html">Skills</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="viewBlog.php">Blogs</a></li>
                </ul>
            </nav>
        </header>
        <!-- ===== END HEADER ===== -->
        <?php
        require_once 'config.php';

        $connection = new mysqli($servername, $username, $password, $dbname);
        if ($connection->connect_error) {
            die("Database Connection Failed");
        }
        $sql = "SELECT title , body , created_at from blog_posts";
        $result = $connection->query($sql);

        // MONTH SELECTION LOGIC
        $selectedMonth = isset($_GET['month']) ? $_GET['month'] : 'All';

        $connection->close();
        ?>

        <!-- ===== MONTH SELECTION DORP DOWN MENU ===== -->
        <div class="monthselection">
            <form method="GET" action="viewBlog.php">
                <label for="month">Filter by Month: </label>
                <select name="month" id="month" onchange="this.form.submit()">
                    <option value="All" <?php if ($selectedMonth == 'All')
                        echo 'selected'; ?>>Show All</option>
                    <option value="01" <?php if ($selectedMonth == '01')
                        echo 'selected'; ?>>January</option>
                    <option value="02" <?php if ($selectedMonth == '02')
                        echo 'selected'; ?>>February</option>
                    <option value="03" <?php if ($selectedMonth == '03')
                        echo 'selected'; ?>>March</option>
                    <option value="04" <?php if ($selectedMonth == '04')
                        echo 'selected'; ?>>April</option>
                    <option value="05" <?php if ($selectedMonth == '05')
                        echo 'selected'; ?>>May</option>
                    <option value="06" <?php if ($selectedMonth == '06')
                        echo 'selected'; ?>>June</option>
                    <option value="07" <?php if ($selectedMonth == '07')
                        echo 'selected'; ?>>July</option>
                    <option value="08" <?php if ($selectedMonth == '08')
                        echo 'selected'; ?>>August</option>
                    <option value="09" <?php if ($selectedMonth == '09')
                        echo 'selected'; ?>>September</option>
                    <option value="10" <?php if ($selectedMonth == '10')
                        echo 'selected'; ?>>October</option>
                    <option value="11" <?php if ($selectedMonth == '11')
                        echo 'selected'; ?>>November</option>
                    <option value="12" <?php if ($selectedMonth == '12')
                        echo 'selected'; ?>>December</option>
                </select>
            </form>
        </div>
        <!-- ===== END MONTH SELECTION DORP DOWN MENU ===== -->

        <!-- ===== BLOG ===== -->
        <section>
            <p class="blogpostsheading">Blog Posts</p>
            <article class="blog">
                <?php

                if ($result->num_rows > 0) {
                    $posts = [];
                    //<!-- ===== MONTH LOGIC ===== -->
                    while ($row = $result->fetch_assoc()) {
                        if ($selectedMonth == 'All') {
                            $posts[] = $row;
                        } else {
                            $postMonth = date('m', strtotime($row['created_at']));
                            if ($postMonth == $selectedMonth) {
                                $posts[] = $row;
                            }
                        }
                    }
                    //<!-- ===== END MONTH LOGIC ===== -->
                
                    //<!-- ===== SELECTION SORTING  ===== -->
                    $n = count($posts);
                    for ($i = 0; $i < $n - 1; $i++) {
                        $max_idx = $i;
                        for ($j = $i + 1; $j < $n; $j++) {
                            if (strtotime($posts[$j]['created_at']) > strtotime($posts[$max_idx]['created_at'])) {
                                $max_idx = $j;
                            }
                        }
                        $temp = $posts[$max_idx];
                        $posts[$max_idx] = $posts[$i];
                        $posts[$i] = $temp;
                    }
                    //<!-- ===== END SELECTION SORTING  ===== -->
                
                    //<!-- ===== BLOG DISPLAY ===== -->
                    if (empty($posts)) {
                        echo "<div class='box'><p class='title'>No posts found for this month.</p></div>";
                    } else {
                        foreach ($posts as $post) {
                            echo "<div class='box'>
                                    <p class='date'><i class='bx bxs-time'></i> {$post['created_at']}</p>
                                    <p class='title'>{$post['title']}</p>
                                    <p class='text'>{$post['body']}</p>
                                </div>";
                        }
                    }
                } else {
                    echo "<div class='box'><p class='title'>No Blog Entered</p></div>";
                }
                //<!-- ===== END BLOG  DISPLAY ===== --
                ?>
            </article>
        </section>

        <!-- ===== END BLOG ===== -->


        <!-- ===== LOGIN/LOGOUT/ADDENTRY BUTTON ===== -->
        <?php
        if (isset($_SESSION["UserId"])) {
            echo "<a href='logout.php' class='loginlogoutbutton'>Logout</a>";
            echo "<a href='addEntry.php' class='addEntrybutton'>Add Entry</a>";
        } else {
            echo "<a href='login.php' class='loginlogoutbutton'>Login</a>";
        }
        ?>
        <!-- ===== END LOGIN/LOGOUT/ADDENTRY BUTTON ===== -->

        <!-- ===== FOOTER ===== -->
        <footer class="footer">
            <p>© 2026 Jashan Shah</p>
            <a href="https://www.linkedin.com/in/jashan-shah-cs" target="_blank"><i
                    class='bx bxl-linkedin-square'></i></a>
            <a href="https://github.com/jashanshah-CS" target="_blank"><i class='bx bxl-github'></i></a>
            <a href="https://www.instagram.com/jashan_shah_25/" target="_blank"><i class='bx bxl-instagram'></i></a>
            <a href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWrRtswPCLpPmGlZdcbMdHFTXvKSmSZbctDpclZRNhLcBLxnnCXfhCKgrPfBNqlRxlHfkhLnb"
                target="_blank"><i class='bx bxl-gmail'></i></a>
        </footer>
        <!-- ===== END FOOTER ===== -->
    </div>
    <!-- ===== END CONTAINER ===== -->
</body>

</html>
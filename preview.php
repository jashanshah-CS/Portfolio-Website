<?php
session_start();
require_once 'config.php';
if (!isset($_SESSION["UserId"])) {
    header("Location: login.php");
    exit();
}

$previewTitle = $_POST['title'];
$previewBody = $_POST['content'];
$previewDate = date("Y-m-d H:i:s");

$connection = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($connection->connect_error) {
    die("Database Connection Failed");
}

$sql = "SELECT title, body, created_at FROM blog_posts";
$result = $connection->query($sql);

$posts = [];
while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}

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

$connection->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Page</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/preview.css">
    <link rel="stylesheet" href="css/reset.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="mobile/previewmobile.css">
    <link rel="stylesheet" href="mobile/footermobile.css">
    <link rel="stylesheet" href="mobile/headermobile.css">
</head>

<body>
    <!-- ===== CONTAINER ===== -->
    <div class="container">
        <!-- ===== HEADER ===== -->
        <header id="header">
            <h3>
                <font size="7rem"><a href="Portfolio.html">Jashan Shah</a></font>
            </h3>
            <nav>
                <ul>
                    <li><a href="Portfolio.html">Home</a></li>
                    <li><a href="aboutme.html">About Me</a></li>
                    <li><a href="education.html">Highlights</a></li>
                    <li><a href="skills.html">Skills</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="viewBlog.php">Blogs</a></li>
                </ul>
            </nav>
        </header>
        <!-- ===== END HEADER ===== -->


        <!-- ===== PREVIEW ===== -->
        <section class="preview">
            <h1>
                <font color="aqua">Preview</font> Your <font color="aqua">Post</font>
            </h1>
            <p>
                <font color="red">This is a preview. It has not been saved yet.</font>
            </p>

            <article class="blog">
                <div class="box">
                    <!-- ===== CURRENT ENTRY ===== -->
                    <h2>
                        <font color="aqua">Your Entry : </font>
                    </h2>
                    <p class="date">Date : <?php echo $previewDate; ?></p>
                    <p class="title">Title : <?php echo htmlspecialchars($previewTitle); ?></p>
                    <p class="text">Content : <?php echo nl2br(htmlspecialchars($previewBody)); ?></p>
                    <!-- ===== END CURRENT ENTRY===== -->

                    <!-- ===== PREVIOUS ENTRIES ===== -->
                    <h2>
                        <font color="aqua">Previous Entries : </font>
                    </h2>
                    <?php
                    if ($result->num_rows > 0) {
                        if (empty($posts)) {
                            echo "<div class='box'><p class='title'>No posts found for this month.</p></div>";
                        } else {
                            foreach ($posts as $post) {
                                echo "<div class='box'>
                                        <p class='date'>Date : {$post['created_at']}</p>
                                        <p class='title'>Title : {$post['title']}</p>
                                        <p class='text'>Content : {$post['body']}</p>
                                    </div>";
                            }
                        }
                    } else {
                        echo "<div class='box'><p class='title'>No Blog Entered</p></div>";
                    }
                    ?>
                    <!-- ===== END PREVIOUS ENTRIES ===== -->
                </div>
            </article>

            <!-- ===== CONFIRM & EDIT BUTTONS ===== -->
            <div class="navlinks">
                <form action="addPost.php" method="POST">
                    <input type="hidden" name="title" value="<?php echo htmlspecialchars($previewTitle); ?>">
                    <input type="hidden" name="content" value="<?php echo htmlspecialchars($previewBody); ?>">
                    <button type="submit" class="submit">Confirm & Upload</button>
                </form>
                <button onclick="history.back()" class="goback">Go Back & Edit</button>
            </div>
            <!-- ===== END CONFIRM & EDIT BUTTONS ===== -->
        </section>
        <!-- ===== PREVIEW ===== -->

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/addEntry.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="mobile/footermobile.css">
    <link rel="stylesheet" href="mobile/headermobile.css">
    <link rel="stylesheet" href="mobile/addEntrymobile.css">
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
                    <li><a href="Portfolio.html">Home</a></li>
                    <li><a href="aboutme.html">About</a></li>
                    <li><a href="education.html">Highlights</a></li>
                    <li><a href="skills.html">Skills</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="viewBlog.php">Blogs</a></li>
                </ul>
            </nav>
        </header>
        <!-- ===== END HEADER ===== -->

        <!-- ===== BLOG FORM ===== -->
        <section class="blogform">
            <div class="form">
                <h2>Add Blog</h2>
                <form action="preview.php" method="POST" id="addpostform">
                    <input type="text" name="title" id="title" placeholder="Title"><span id="titleerror"></span>
                    <textarea name="content" id="content" placeholder="Add Your Text Here"></textarea><span
                        id="contenterror"></span>
                    <div class="press">
                        <button type="submit" name="submit" id="submit">Preview</button>
                        <button type="reset" name="clear" id="clear">Clear</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- ===== END BLOG FORM ===== -->

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
<script src="JavaScript/addEntry.js"></script>

</html>
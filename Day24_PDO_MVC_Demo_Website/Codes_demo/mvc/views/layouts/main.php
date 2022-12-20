<!--views/layouts/main.php-->
<!DOCTYPE>
<html>
    <head>
        <title><?php echo $this->page_title; ?></title>
        <link rel="stylesheet" href="assets/css/style.css" />
        <script src="assets/js/script.js"></script>
    </head>
    <body>
        <header>Đây là header</header>
        <main>
            <?php
            if (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            }
            if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            ?>
<!-- Hiển thị tập trung lỗi, session lỗi, thành công tại layout-->
            <h3 style="color: red">
                <?php echo $this->error; ?>
            </h3>
            <?php echo $this->content; ?>
        </main>
        <footer>Đây là footer</footer>
    </body>
</html>
<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited     	: 15-02-2023
    //Filename          : logout.php
    //Version           : 1.0
    include 'controller/connectDB.php';

    if(!isset($_COOKIE['admin']) && !isset($_COOKIE['password'])) {
        header("Location: index.php");
        exit();
    }
    setcookie('admin', '', time()-3600);
    setcookie('password', '', time()-3600);

    include 'controller/header.php';
    include 'controller/left-menu.php';
?>
                <div class="center">
                    <div id="center-content">
                            You have successfully logged out. Go to <a href="index.php">main page.</a>
                            <?php
                            header("Location: index.php");
                            exit();
                            ?>
                    </div>
                </div>
<?php
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
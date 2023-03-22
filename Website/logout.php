<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited     	: 21-02-2023
    //Filename          : logout.php
    //Version           : 1.1
    include 'controller/connectDB.php';

    if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        header("Location: index.php");
        exit();
    } else {
        // remove all session variables
        $_SESSION = array();
        // destroy the session
        session_destroy();
    }

    include 'controller/header.php';
    include 'controller/left-menu.php';
?>
                <div class="center">
                    <div id="center-content">
                            You have successfully logged out. Go to <a href="index.php">main page.</a>
                    </div>
                </div>
<?php
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
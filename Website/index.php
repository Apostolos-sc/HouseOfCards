<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited     	: 15-02-2023
    //Filename          : index.php
    //Version           : 1.0
    include 'controller/connectDB.php';
    include 'controller/header.php';
    include 'controller/left-menu.php';
?>
                <div class="center">
                    <div id="center-content">
                        Welcome to House of Cards. Learn about your favorite card games.
                    </div>
                </div>
<?php
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
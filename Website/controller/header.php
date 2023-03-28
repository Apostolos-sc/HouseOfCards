<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On    : 21-02-2023
    //Filename          : header.php
    //Version           : 1.1
    if(!isset($GLOBALS['title'])) {
        $GLOBALS['title'] = "Welcome to House Cards Wiki";        
    }
?>
       
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="controller/theme.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
        <script src="controller/jquery-3.2.1.min.js"></script>
        <link rel="icon" type="image/png" href="https://goldenagesolutions.ca/HouseOfCards/images/cardgame.png">
        <title>
            <?
            echo $GLOBALS['title'];
            ?>
        </title>
    </head>
    <body>
        <div class="grid-container">
            <div class="top">
                <div id="web-header">
                    <img src="https://goldenagesolutions.ca/HouseOfCards/images/cards.png" alt ='img' style="vertical-align:middle;height:100px;width:100px;">House of Cards Wiki
                    <img src="https://goldenagesolutions.ca/HouseOfCards/images/cards2.png" alt ='img' style="vertical-align:middle;height:100px;width:100px;">
                </div>
            </div>
                
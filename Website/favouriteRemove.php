<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 26-03-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited     	: 26-03-2023
    //Filename          : favouriteRemove.php
    //Version           : 1.0
    session_start();
    include('controller/connectDB.php');
    include('model/favourite.php');
    include('model/rating.php');
    include('model/userType.php');
    include('model/date.php');
    include('model/user.php');
    include('model/comment.php');
    include('model/CommentReply.php');
    include('model/wikientry.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["username"])) {
        if(ctype_digit(strval($_POST['entryID']))) {
            $eID = intval($_POST['entryID']);
            $uID = intval($_SESSION['userID']);
            $wikientry = WikiEntry::fetchWikiEntry($db,  $eID);
            if($wikientry != null) {
                $fav = new Favourite($uID, $eID);
                $ok = Favourite::deleteFavourite($db, $fav);
                if($ok === null) {
                    echo false;
                } else {
                    if($ok) {
                        echo true;
                    } else {
                        echo false;
                    }
                }
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    } else {
        header('Location: index.php');
    } 
?>
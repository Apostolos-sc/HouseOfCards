<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 19-03-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited     	: 28-03-2023
    //Filename          : commentAdd.php
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
        echo "test";
        if(ctype_digit(strval($_POST['comment-entryID-post']))) {
            $entryID = intval($_POST['comment-entryID-post']);
            $wikientry = WikiEntry::fetchWikiEntry($db,  $entryID);
            if($wikientry != null) {
                $now = new DateTime();
                $now->setTimezone(new DateTimeZone('America/Edmonton'));
                $comments = Comment::fetchCommentsByEntryID($db, $_POST['comment-entryID-post']);
                $ID = $_SESSION['userID'];
                $content = $_POST['comment-content-post'];
                $positionID = sizeof($comments)+1;
                $date = $now->format('Y-m-d');
                $time = $now->format('H:i:s');
                $stmt = $db->connection->prepare('INSERT INTO Comment (content, entryID, userID, positionID, postedOnDate, postedOnTime) VALUES (?, ?, ?, ?, ?, ?)');
                $stmt->bind_param('siiiss', $content, $entryID, $ID, $positionID, $date, $time);
                $stmt->execute();
                if($stmt->affected_rows > 0 ) {
                    echo true;
                } else {
                    echo false;
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
<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 19-03-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited     	: 26-03-2023
    //Filename          : commentReply.php
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
        if(ctype_digit(strval($_POST['comment-ID']))) {
            $commentID = intval($_POST['comment-ID']);
            $comment = Comment::fetchCommentByID($db,  $commentID);
            if($comment != null) {
                $now = new DateTime();
                $now->setTimezone(new DateTimeZone('America/Edmonton'));
                $commentReplies = $comment->getCommentReplies();
                if(empty($commentReplies)) {
                    $positionID = 1;
                } else {
                    $positionID = sizeof($commentReplies)+1;
                }
                $ID = intval($_SESSION['userID']);
                $content = $_POST['comment-content-reply-post'];
                $date = $now->format('Y-m-d');
                $time = $now->format('H:i:s');
                $stmt = $db->connection->prepare('INSERT INTO CommentReply (commentID, positionID, userID, content, postedOnDate, postedOnTime) VALUES (?, ?, ?, ?, ?, ?)');
                $stmt->bind_param('iiisss', $commentID, $positionID, $ID, $content, $date, $time);
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
<?php
//Author            : Apostolos Scondrianis
//Date Created      : 26-03-2023
//Last Edited By    : Apostolos Scondrianis
//Last Edited     	: 26-03-2023
//Filename          : rating_ajax.php
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
    $uID = $_SESSION['userID'];
    $eID = intval($_POST['postid']);
    $rating = $_POST['rating'];
    $user = User::fetchUserByID($db, $uID);
    if(!empty($user->getRatings())) {
        $ratings = $user->getRatings();
        if(array_key_exists($_POST['postid'], $ratings)) {
            //Update Rating
            $ratingObj = $user->getRatings()[$_POST['postid']];
            $ratingObj->setRating(intval($rating));
            $update = Rating::updateRating($db, $ratingObj);
            if($update) {
                echo true;
            } else {
                echo false;
            }
        } else {
            //INSERT Rating
            $ratingObj = new Rating(-1, $eID, $uID, $rating);
            $update = Rating::insertRating($db, $ratingObj);
            if($update) {
                echo true;
            } else {
                echo false;
            }
        }
    } else {
        //INSERT Rating
        $ratingObj = new Rating(-1, $eID, $uID, $rating);
        $update = Rating::insertRating($db, $ratingObj);
        if($update) {
            echo true;
        } else {
            echo false;
        }
    }
/*
    // get average
    $wikiPage = WikiEntry::fetchWikiEntry($db, $eID);
    $sizeRatings = sizeof($wikiPage->getRatings());
    $sumOfRatings = 0;
    $ratings = $wikiPage->getRatings();
    foreach($ratings as $element) {
        $sumOfRatings = $sumOfRatings+($element->getRating());
    }
    $averageRating = $sumOfRatings/$sizeRatings;
    $return_arr = array("averageRating"=>$averageRating);

    echo json_encode($return_arr);*/
} else {
    header('Location: index.php');
}
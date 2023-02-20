<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 16-02-2023
    //Last Edit By      : Apostolos Scondrianis
    //Last Edited     	: 20-02-2023
    //Filename          : controller.php
    //Version           : 0.2 - Stub File
    //include php files of model
    
    //include('../model/Rating.php);
    //include('../model/Favorite.php);
    //include('../model/Comment.php);
    //include('../model/CommentReply.php);
    //include('../view/view_functions.php);
    //This line forces return types on functions

    declare(strict_types=1);
    include('../model/User.php');
    include('../controller/functions.php');
    include('../model/wikientry.php');
    //Stub Functions
    //The idea here is to have static functions inside each class of the Model that
    //access the db and then return the information needed.

    //returns null 
    function getUsers(Database $dbConnection) : ?array {
        $users = User::getUsers($dbConnection);
        return $users;
    }


    function getComments(Database $dbConnection, int $wikiEntryID): ?array {
        $comments = Comments::getComments($dbConnection, $wikiEntryID);
        return $comments;
    }

    function getCommentReplies(Database $dbConnection, int $commentID): ?array {
        $commentReplies = CommentReply::getCommentReplies($dbConnection, $commentReply);
        return $commentReplies;
    }

    function getWikiEntries(Database $dbConnection) : ?array {
        $entries = getWikiEntries($dbConnection);
        return $entries;
    }

    function getFavorites(Database $dbConnection, int $userID) : array {
        $favorites = Favorite::getFavorites($dbConnection);
        return $favorites;
    }

    function getEntryRatings(Database $dbConnection, int $wikiEntryID) : array{
        $ratings = Rating::getEntryRatings($dbConnection, $wikiEntryID);
        return $ratings;
    }

    function getUserRatings(Database $dbConnection, int $userID) : array {
        $ratings = User::getUserRatings($dbConnection, $userID);
        return $ratings;
    }
    function getWikiPageGuestView(WikiEntry $wikiEntry, array $gameList) {
        $wikiPageGuestView = generateWikiPageGuestUser($wikiEntry, $gameList);
        return $wikiPageGuestView;
    }

    //This function needs to be tested. Can't remember if it should be $wikiEntry->getGameName() or
    //if it should be $wikiEntry.getGameName()
    function getGameList(array $wikiEntries) : array {
        $gameList = array();
        
        foreach($wikiEntries as $wikiEntry) {
            array_push($gamelist, $wikiEntry->getGameName());
        }
        return $gameList;
    }
?>
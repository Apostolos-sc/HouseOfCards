<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 16-02-2023
    //Last Edit By      : Apostolos Scondrianis
    //Last Edited     	: 20-02-2023
    //Filename          : controller.php
    //Version           : 0.2 - Stub File
    //include php files of model
    

    //include('../view/view_functions.php);
    //This line forces return types on functions

    declare(strict_types=1);
    include('../controller/functions.php');
    //Stub Functions
    //The idea here is to have static functions inside each class of the Model that
    //access the db and then return the information needed.

    //returns null 
    function getUsers(Database $dbConnection) : Array {
        $users = User::fetchUsers($dbConnection);
        return $users;
    }

    function getCommentsByEntryID(Database $dbConnection, int $wikiEntryID): Array {
        $comments = Comment::fetchComments($dbConnection, $wikiEntryID);
        return $comments;
    }

    function getCommentRepliesByCommentID(Database $dbConnection, int $commentID): Array {
        $commentReplies = CommentReply::fetchCommentRepliesByCommentID($dbConnection, $commentID);
        return $commentReplies;
    }

    function getWikiEntries(Database $dbConnection) : Array {
        $entries = getWikiEntries($dbConnection);
        return $entries;
    }

    function getFavouritesByUserID(Database $dbConnection, int $userID) : Array {
        $favorites = Favourite::fetchFavouritesByUserID($dbConnection, $userID);
        return $favorites;
    }

    function getRatingsByEntryID(Database $dbConnection, int $wikiEntryID) : Array{
        $ratings = Rating::fetchRatingsByEntryID($dbConnection, $wikiEntryID);
        return $ratings;
    }

    function getUserByID(Database $dbConnection, int $userID) : ?User {
        $ratings = User::fetchUserByID($dbConnection, $userID);
        return $ratings;
    }
    function getWikiPageGuestView(WikiEntry $wikiEntry, array $gameList) {
        $wikiPageGuestView = generateWikiPageGuestUser($wikiEntry, $gameList);
        return $wikiPageGuestView;
    }

    //This function needs to be tested. Can't remember if it should be $wikiEntry->getGameName() or
    //if it should be $wikiEntry.getGameName()
    function getGameList(Array $wikiEntries) : Array {
        $gameList = [];
        
        foreach($wikiEntries as $wikiEntry) {
           $gameList[] = $wikiEntry->getGameName();
        }
        return $gameList;
    }
?>
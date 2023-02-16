<?php
    //Author            : Team 31
    //Date Created      : 16-02-2023
    //Last Edited     	: ----------
    //Filename          : controller.php
    //Version           : 0.0 - Stub File
    //include php files of model
    //include('../model/User.php);
    //include('../model/WikiPage.php');
    //include('../model/Rating.php);
    //include('../model/Favorite.php);
    //include('../model/Comment.php);
    //include('../model/CommentReply.php);
    //include('../view/view_functions.php);
    //This line forces return types on functions
    declare(strict_types=1);

    //Stub Functions
    //The idea here is to have static functions inside each class of the Model that
    //access the db and then return the information needed.
    function getUsers() : array {
        //Call to static method of class User providing a db object 
        //in order to be able to access the db. User.getUsers(Database $dbObject)
        $array = [1, 2, 3];
        return $array;
    }

    function getComments(int $wikiEntryID): array {
        $array = [1,2,3];
        return $array;
    }

    function getCommentReplies(int $commentReplyID): array {
        $array = [1,2,3];
        return $array;
    }

    function getWikiEntries() :  Array {
        $entry = [0,1,2];
        return $entry;
    }

    function getFavorites(int $userID) : array {
        $array = [0,1,2];
        return $array;
    }

    function getEntryRatings(int $wikiEntryID) : array{
        $array = [0, 1, 2];
        return $array;
    }

    function getUserRatings(int $userID) : array {
        $array = [0,1,2];
        return $array;
    }
    function getWikiPageGuestView(WikiEntry $wikiEntry, array $gameList) {
        $gameCardEntries = getWikiEntries();
        $gameList = array();
        
        foreach($gameCardEntries as $gameCardEntry) {
            array_push($gamelist, $gameCardEntry.gameName);
        }
        $wikiPageGuestView = generateWikiPageGuestUser($wikiEntry);
        return $wikiPageGuestView;
    }
?>
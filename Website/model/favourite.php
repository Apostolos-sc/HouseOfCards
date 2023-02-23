<?php
    //Author            : Carter Marcelo
    //Date Created      : 19-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On    : 22-02-2023
    //Filename          : favourite.php
    //Version           : 1.2

    //Class Favourite
    class Favourite {

        //Properties
        private int $userID;
        private int $entryID;

        //Constructor
        public function _construct(int $userID, int $entryID) {
            $this->$userID = $userID;
            $this->$entryID = $entryID;
        }

        //Setters
        public function setUserID(int $userID) {
            $this->userID = $userID;
        }

        public function setEntryID(int $entryID) {
            $this->entryID = $entryID;
        }

        //Getters
        public function getUserID() {
            return $this->userID;
        }

        public function getEntryID() {
            return $this->entryID;
        }

        //Database Stubs
        /*
            DB Table Schema
            `userID` int(10) NOT NULL,
            `entryID` int(10) NOT NULL
        */
        public static function fetchFavouritesByUserID(Database $dbConnection, int $userID) : Array {
            //Query db to see which entries did a user with ID = $userID favourite
            $favourites = [];
            return $favourites;
        }
        public static function fetchFavouritesByEntryID(Database $dbConnection, int $entryID) : Array {
            //Query db to see who has favourited a specific wiki entry whose ID = $entryID
            $favourites = [];
            return $favourites;
        }
    }
?>
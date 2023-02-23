<?php
    //Author            : Carter Marcelo
    //Date Created      : 21-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On    : 22-02-2023
    //Filename          : rating.php
    //Version           : 1.2

    //Class Rating
    class Rating {

        //Properties
        private int $ratingID;
        private int $entryID;
        private int $userID;
        private int $rating;

        //Constructor
        public function _construct(int $ratingID, int $entryID, int $userID, int $rating){
            $this->ratingID = $ratingID;
            $this->entryID = $entryID;
            $this->userID = $userID;
            $this->rating = $rating;
        }

        //Setters
        public function setRatingID(int $ratingID) {
            $this->ratingID = $ratingID;
        }

        public function setEntryID(int $entryID) {
            return $this->entryID = $entryID;
        }

        public function setUserID(int $userID) {
            return $this->userID;
        }

        public function setRating(int $rating) {
            $this->rating = $rating;
        }

        //Getters
        public function getRatingID() {
            return $this->ratingID;
        }

        public function getEntryID() {
            return $this->entryID;
        }

        public function getUserID() {
            return $this->userID;
        }

        public function getRating() {
            return $this->rating;
        }

        //Database stubs
        /*
            DB Table Schema
            `id` int(10) NOT NULL,
            `entryID` int(10) NOT NULL,
            `userID` int(10) NOT NULL,
            `rating` int(10) NOT NULL
        */
        public static function fetchRatingsByUserID(Database $dbConnection, int $userID) : Array {
            //Query db for the ratings a user has given.
            $ratings = [];
            return $ratings;
        }
        public static function fetchRatingsByEntryID(Database $dbConnection, int $entryID) : Array {
            //Query db for the ratings a wiki entry whose ID is $entryID.
            $ratings = [];
            return $ratings;
        }
        public static function fetchRatings(Database $dbConnection) : Array {
            //Query db and return all ratings for all entries
            $ratings = [];
            return $ratings;
        }
    }
?>
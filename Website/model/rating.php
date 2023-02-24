<?php
    //Author            : Carter Marcelo
    //Date Created      : 21-02-2023
    //Last Edited By    : Ethan Winters
    //Last Edited On    : 23-02-2023
    //Filename          : rating.php
    //Version           : 1.3

    //Class Rating
    class Rating {

        //Properties
        private int $ratingID;
        private int $entryID;
        private int $userID;
        private int $rating;

        //Database Credidentials
        $hostname = ;
        $username = ;
        $password = ;
        $dbname = "HouseOfCardsDB";

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
            mysqli_connect($hostname, $username, $password) or die ("<html>script language='JavaScript'>alert('Unable to connect to database'),history.go(-1)<script></html>");
            mysqli_select_db($dbname); // connect to the MySQL server and select the correct database
            $query = "SELECT * FROM Rating WHERE userID == $userID";
            $results = mysqli_query($query); // compile and execute the query to select the entries
            $ratings = array();
            if($results){
                while($entry = mysqli_fetch_array($results)){ // fill the array
                    array_push($comments, $entry);
                }
            }
            mysql_close();
            return $ratings;
        }
        public static function fetchRatingsByEntryID(Database $dbConnection, int $entryID) : Array {
            //Query db for the ratings a wiki entry whose ID is $entryID.
            mysqli_connect($hostname, $username, $password) or die ("<html>script language='JavaScript'>alert('Unable to connect to database'),history.go(-1)<script></html>");
            mysqli_select_db($dbname); // connect to the MySQL server and select the correct database
            $query = "SELECT * FROM Rating WHERE entryID == $entryID";
            $results = mysqli_query($query); // compile and execute the query to select the entries
            $ratings = array();
            if($results){
                while($entry = mysqli_fetch_array($results)){ // fill the array
                    array_push($comments, $entry);
                }
            }
            mysql_close();
            return $ratings;
        }
        public static function fetchRatings(Database $dbConnection) : Array {
            //Query db and return all ratings for all entries
            mysqli_connect($hostname, $username, $password) or die ("<html>script language='JavaScript'>alert('Unable to connect to database'),history.go(-1)<script></html>");
            mysqli_select_db($dbname); // connect to the MySQL server and select the correct database
            $query = "SELECT * FROM Rating";
            $results = mysqli_query($query); // compile and execute the query to select the entries
            $ratings = array();
            if($results){
                while($entry = mysqli_fetch_array($results)){ // fill the array
                    array_push($comments, $entry);
                }
            }
            mysql_close();
            return $ratings;
        }
    }
?>
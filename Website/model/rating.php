<?php
    //Author            : Carter Marcelo
    //Date Created      : 21-02-2023
    //Last Edited By    : Alexander Sembrat
    //Last Edited On    : 19-03-2023
    //Filename          : rating.php
    //Version           : 1.4

    //Class Rating
    class Rating {

        //Properties
        private int $ratingID;
        private int $entryID;
        private int $userID;
        private int $rating;

        //Constructor
        public function __construct(int $ratingID, int $entryID, int $userID, int $rating){
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
            $this->entryID = $entryID;
        }

        public function setUserID(int $userID) {
            $this->$userID = $userID;
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
        public static function fetchRatingsByUserID(Database $dbConnection, int $userID) : ?Array {
            //Query db for the ratings a user has given.
            $ratings = [];
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM Rating WHERE Rating.userID=?');
                $stmt->bind_param('i', $userID);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return an empty array.
                    return $ratings;
                } else {
                    //get rows of the table one by one to process in an associative manner
                    while($row = $result->fetch_assoc()) {
                        //create Rating object from the fetched information
                        $rating = new Rating($row['id'], $row['entryID'], $row['userID'], $row['rating']);
                        //add the comment to the comment array
                        $ratings[] = $rating;
                    }
                    return $ratings;
                }
            } else {
                //database connection provided is invalid, return null
                return null;
            }
        }
        public static function fetchRatingsByEntryID(Database $dbConnection, int $entryID) : ?Array {
            //Query db for the ratings a wiki entry whose ID is $entryID.
            $ratings = [];
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM Rating WHERE Rating.entryID=?');
                $stmt->bind_param('i', $entryID);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return an empty array.
                    return $ratings;
                } else {
                    //get rows of the table one by one to process in an associative manner
                    while($row = $result->fetch_assoc()) {
                        //create Rating object from the fetched information
                        $rating = new Rating($row['id'], $row['entryID'], $row['userID'], $row['rating']);
                        //add the comment to the comment array
                        $ratings[] = $rating;
                    }
                    return $ratings;
                }
            } else {
                //database connection provided is invalid, return null
                return null;
            }
            return $ratings;
        }
        public static function fetchRatings(Database $dbConnection) : ?Array {
            //Query db and return all ratings for all entries
            $ratings = [];
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM Rating');
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return an empty array.
                    return $ratings;
                } else {
                    //get rows of the table one by one to process in an associative manner
                    while($row = $result->fetch_assoc()) {
                        //create Rating object from the fetched information
                        $rating = new Rating($row['id'], $row['entryID'], $row['userID'], $row['rating']);
                        //add the comment to the comment array
                        $ratings[] = $rating;
                    }
                    return $ratings;
                }
            } else {
                //database connection provided is invalid, return null
                return null;
            }
        }
    }
?>
<?php
    //Author            : Carter Marcelo
    //Date Created      : 19-02-2023
    //Last Edited By    : Alexander Sembrat
    //Last Edited On    : 19-03-2023
    //Filename          : favourite.php
    //Version           : 1.4

    //Class Favourite
    class Favourite {

        //Properties
        private int $userID;
        private int $entryID;

        //Constructor
        public function __construct(int $userID, int $entryID) {
            $this->userID = $userID;
            $this->entryID = $entryID;
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
        public static function fetchFavouritesByUserID(Database $dbConnection, int $userID) : ?Array {
            //Query db to see which entries did a user with userID = $userID favourite
            $favourites = [];
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM Favourite WHERE Favourite.userID=?');
                $stmt->bind_param('i', $userID);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return an empty array.
                    return $favourites;
                } else {
                    //get rows of the table one by one to process in an associative manner
                    while($row = $result->fetch_assoc()) {
                        //create userType object from the fetched information
                        $favourite = new Favourite($row['userID'], $row['entryID']);
                        //add the userType to the favourites array
                        $favourites[] = $favourite;
                    }
                    return $favourites;
                }
            } else {
                //database connection provided is invalid, return null
                return null;
            }
        }
        public static function fetchFavouritesByEntryID(Database $dbConnection, int $entryID) : ?Array {
            //Query db to see who has favourited a specific wiki entry whose entryID = $entryID
            $favourites = [];
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM Favourite WHERE Favourite.entryID=?');
                $stmt->bind_param('i', $entryID);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return an empty array.
                    return $favourites;
                } else {
                    //get rows of the table one by one to process in an associative manner
                    while($row = $result->fetch_assoc()) {
                        //create Favourite object from the fetched information
                        $favourite = new Favourite($row['userID'], $row['entryID']);
                        //add the Favourite to the favourites array
                        $favourites[] = $favourite;
                    }
                    return $favourites;
                }
            } else {
                //database connection provided is invalid, return null
                return null;
            }
        }
    }
?>
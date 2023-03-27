<?php
    //Author            : Carter Marcelo
    //Date Created      : 19-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On    : 19-03-2023
    //Filename          : favourite.php
    //Version           : 1.5

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

        /*
            fetchFavouritesByUserID returns an array whose keys value is the entryID
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
                        $favourites[$row['entryID']] = $favourite;
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

        public static function insertFavourite($dbConnection, Favourite $favourite) : ?bool {
            if($dbConnection->is_connected()) {
                $uID = $favourite->getUserID();
                $eID = $favourite->getEntryID();
                $stmt = $dbConnection->connection->prepare('INSERT INTO Favourite (userID, entryID) VALUES (?, ?)');
                $stmt->bind_param('ii', $uID, $eID);
                $stmt->execute();
                if($stmt->affected_rows > 0 ) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return null;
            }
        }

        public static function deleteFavourite($dbConnection, Favourite $favourite) : ?bool {
            if($dbConnection->is_connected()) {
                $uID = $favourite->getUserID();
                $eID = $favourite->getEntryID();
                $stmt = $dbConnection->connection->prepare('DELETE FROM Favourite WHERE userID=? AND entryID = ?');
                $stmt->bind_param('ii', $uID, $eID);
                $stmt->execute();
                if($stmt->affected_rows > 0 ) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return null;
            }
        }
    }
?>
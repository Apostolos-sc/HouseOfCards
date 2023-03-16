<?php
    //Author            : Nicholas Lam
    //Date Created      : 12-15-2023
    //Last Edit By      : Apostolos Scondrianis
    //Last Edited     	: 26-20-2023
    //Filename          : wikientry.php
    //Version           : 1.4

    //Class User
    class WikiEntry {
        //Properties
        private int $entryID;
        private String $gameName;
        private String $requiredItems;
        private String $objective;
        private String $setUp;
        private String $gamePlay;
        private String $rules;
        private Date $lastEditedOn;
        private User $lastEditedBy;
        private Array $comments = [];
        private Array $ratings = [];
        private int $minPlayers;
        private int $maxPlayers;

        //Constructor
        public function __construct(int $entryID, String $gameName, String $requiredItems, String $objective,
                                    String $setUp, String $gamePlay, String $rules, Date $lastEditedOn, User $lastEditedBy, 
                                    Array $comments, Array $ratings, int $minPlayers, int $maxPlayers) {
            $this->entryID = $entryID;
            $this->gameName = $gameName;
            $this->requiredItems = $requiredItems;
            $this->objective = $objective;
            $this->setUp = $setUp;
            $this->gamePlay = $gamePlay;
            $this->rules = $rules;
            $this->lastEditedOn = $lastEditedOn;
            $this->lastEditedBy = $lastEditedBy;
            $this->comments = $comments;
            $this->ratings = $ratings;
            $this->minPlayers = $minPlayers;
            $this->maxPlayers = $maxPlayers;
        }

        //Setters
        public function setEntryID(int $entryID) {
            $this->entryID = $entryID;
        }

        public function setGameName(String $gameName) {
            $this->gameName = $gameName;
        }

        public function setRequiredItems(String $requiredItems) {
            $this->requiredItems = $requiredItems;
        }

        public function setObjective(String $objective) {
            $this->objective = $objective;
        }

        public function setSetUp(String $setUp) {
            $this->setUp = $setUp;
        } 

        public function setGamePlay(String $gamePlay) {
            $this->gamePlay = $gamePlay;
        }

        public function setRules(String $rules) {
            $this->rules = $rules;
        }

        public function setLastEditedOn(Date $lastEditedOn) {
            $this->lastEditedOn = $lastEditedOn;
        }

        public function setLastEditedByUserID(User $lastEditedBy) {
            $this->lastEditedBy = $lastEditedBy;
        }

        public function setComments(Array $comments) {
            $this->comments = $comments;
        }

        public function setRatings(Array $ratings) {
            $this->ratings = $ratings;
        }

        public function setMinPlayers(int $minPlayers) {
            $this->minPlayers = $minPlayers;
        }
        
        public function setMaxPlayers(int $maxPlayers) {
            $this->maxPlayers = $maxPlayers;
        }


        //Getters
        public function getEntryID() {
            return $this->entryID;
        }

        public function getGameName() {
            return $this->gameName;
        }

        public function getRequiredItems() {
            return $this->requiredItems;
        }

        public function getObjective() {
            return $this->objective;
        }

        public function getSetUp() {
            return $this->setUp;
        } 

        public function getGamePlay() {
            return $this->gamePlay;
        }

        public function getRules() {
            return $this->rules;
        }

        public function getLastEditedOn() {
            return $this->lastEditedOn;
        }

        function getLastEditedBy() {
            return $this->lastEditedBy;
        }

        public function getComments() {
            return $this->comments;
        }

        public function getRatings() {
            return $this->ratings;
        }

        public function getMinPlayers() {
            return $this->minPlayers;
        }
        
        public function getMaxPlayers() {
            return $this->maxPlayers;
        }

        //Database Access Stubs
        /*
            DB Table Schema
            `id` int(10) NOT NULL,
            `gameName` varchar(200) NOT NULL,
            `requiredItems` varchar(200) NOT NULL,
            `objective` varchar(200) NOT NULL,
            `setUp` varchar(200) NOT NULL,
            `gamePlay` varchar(200) NOT NULL,
            `rules` varchar(200) NOT NULL,
            `lastEditedBy` int(10) NOT NULL,
            `lastEditedDate` date,
            `lastEditedTime` time(6) DEFAULT NULL
            `minPlayer` int(10) NOT NULL,
            `maxPlayer` int(10) NOT NULL
        */
        public static function fetchWikiEntries(Database $dbConnection) : ?Array {
            //access the database and for each row of wiki entries, populate one WikiEntry object.
            //Return all the wiki entries of the database in the form of an array
            //Check to see if the db object has a valid connection
            $entries = [];
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM wikiEntry');
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return an empty array.
                    return $entries;
                } else {
                    //fetch associatively a row. Use $row to get the data needed.
                    while ($row = $result->fetch_assoc()) {
                        //instead of using array_push, use array[] faster operation
                        $user = User::fetchUserByID($dbConnection, $row['lastEditedBy']);
                        //Maria DB time format is YYYY-MM-DD
                        //Create an array of strings using - as a delimeter.
                        $date_arr = explode ("-", $row['lastEditedDate']);
                        //Create an array of strings using : as a delimiter
                        $time_arr = explode(":", $row['lastEditedTime']);
                        //Adding an integer, i.e. 0, does an implicit String conversion from String to integer
                        //Create Date object
                        $date = new Date($date_arr[2]+0, $date_arr[1] + 0, $date_arr[0], $time_arr[0]+0, $time_arr[1]+0, $time_arr[2] + 0);
                        //Get ratings of the entry
                        $ratings = Rating::fetchRatingsByEntryID($dbConnection, $row['id']);
                        //get comments of the rating
                        $comments = Comment::fetchCommentsByEntryID($dbConnection, $row['id'], $row['id']);
                        $wikiEntry = new WikiEntry($row['id'], $row['gameName'], $row['requiredItems'], $row['objective'], 
                                                    $row['setUp'], $row['gamePlay'], $row['rules'], $date, $user, $comments, $ratings, $row['minPlayer'], $row['maxPlayer']);
                        //Add the entry to the next slot of the array. This is the fastest way to do it. Don't use "array_push" function
                        $entries[] = $wikiEntry;
                    }
                    //Done fetching rows, return array
                    return $entries;
                }
            } else {
                //db object is not connected. Return Null.
                return null;
            }
        }
        
        public static function fetchWikiEntry(Database $dbConnection, int $entryID) : ?WikiEntry {
            //Query the database for a wiki entry that corresponds to one with an ID of $entryID.
            //If it doesn't exist in the database return null.
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM wikiEntry WHERE wikiEntry.id=?');
                $stmt->bind_param('i', $entryID);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return an empty array.
                    return null;
                } else {
                    //fetch associatively a row. Use $row to get the data needed.
                    $row = $result->fetch_assoc();
                    //instead of using array_push, use array[] faster operation
                    $user = User::fetchUserByID($dbConnection, $row['lastEditedBy']);
                    //need to implement date conversion function
                    //Maria DB time format is YYYY-MM-DD
                    //Create an array of strings using - as a delimeter.
                    $date_arr = explode ("-", $row['lastEditedDate']);
                    //Create an array of strings using : as a delimiter
                    $time_arr = explode(":", $row['lastEditedTime']);
                    //Adding an integer, i.e. 0, does an implicit String conversion from String to integer
                    //Create Date object
                    $date = new Date($date_arr[2]+0, $date_arr[1] + 0, $date_arr[0], $time_arr[0]+0, $time_arr[1]+0, $time_arr[2] + 0);
                    //Get ratings of the entry
                    $ratings = Rating::fetchRatingsByEntryID($dbConnection, $row['id']);
                    //get comments of the rating
                    $comments = Comment::fetchCommentsByEntryID($dbConnection, $row['id'], $row['id']);
                    $wikiEntry = new WikiEntry($row['id'], $row['gameName'], $row['requiredItems'], $row['objective'], 
                                                $row['setUp'], $row['gamePlay'], $row['rules'], $date, $user, $comments, $ratings, $row['minPlayer'], $row['maxPlayer']);
                    return $wikiEntry;
                }
            } else {
                //db object is not connected. Return Null.
                return null;
            }
        }
    }
?>
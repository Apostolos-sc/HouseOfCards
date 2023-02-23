<?php
    //Author            : Nicholas Lam
    //Date Created      : 12-15-2023
    //Last Edit By      : Apostolos Scondrianis
    //Last Edited     	: 22-20-2023
    //Filename          : wikientry.php
    //Version           : 1.2
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
        private Date $lastEdit;
        private int $lastEditedByUserID;
        private Comment $comments = array();
        private Rating $ratings = array();
        private int $minPlayers;
        private int $maxPlayers;

        //Constructor
        public function __construct(int $entryID, String $gameName, String $requiredItems, String $objective,
                                    String $setUp, String $gamePlay, String $rules, Date $lastEdit, int $lastEditedByUserID, 
                                    Array $comments, Array $ratings, int $minPlayers, int $maxPlayers) {
            $this->entryID = $entryID;
            $this->gameName = $gameName;
            $this->requiredItems = $requiredItems;
            $this->objective = $objective;
            $this->setUp = $setUp;
            $this->gamePlay = $gamePlay;
            $this->rules = $rules;
            $this->lastEdit = $lastEdit;
            $this->lastEditedByUserID = $lastEditedByUserID;
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

        public function setLastEdit(Date $lastEdit) {
            $this->lastEdit = $lastEdit;
        }

        public function setLastEditedByUserID(int $lastEditedByUserID) {
            $this->lastEditedByUserID = $lastEditedByUserID;
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

        public function getLastEdit() {
            return $this->lastEdit;
        }

        function getLastEditUser() {
            return $this->lastEditedByUserID;
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
        public static function fetchWikiEntries(Database $dbConnection) : Array {
            //access the database and for each row of wiki entries, populate one WikiEntry object.
            //Return all the wiki entries of the database in the form of an array
            $entries = [];
            return $entries;
        }
        
        public static function fetchWikiEntry(Database $dbConnection, int $entryID) : ?WikiEntry {
            //Query the database for a wiki entry that corresponds to one with an ID of $entryID.
            //If it doesn't exist in the database return null.
            return null;
        }
    }
?>
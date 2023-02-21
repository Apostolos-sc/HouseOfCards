<?php
    //Author            : Nicholas Lam
    //Date Created      : 12-15-2023
    //Last Edit By      : Apostolos Scondrianis
    //Last Edited     	: 12-20-2023
    //Filename          : wikientry.php
    //Version           : 1.1
    //Class User
    class WikiEntry {
        //Properties
        private int $entryID;
        private String $gameName;
        private String $description;
        private String $rules;
        private Date $lastEdit;
        private int $lastEditedByUserID;
        private Comment $comments = array();
        private Rating $ratings = array();
        private int $minPlayers;
        private int $maxPlayers;

        //Constructor
        public function __construct(int $entryID, String $gameName, String $description, 
                                    String $rules, Date $lastEdit, int $lastEditedByUserID, Array $comments,
                                    Array $ratings, int $minPlayers, int $maxPlayers) {
            $this->entryID = $entryID;
            $this->gameName = $gameName;
            $this->description = $description;
            $this->rules = $rules;
            $this->lastEdit = $lastEdit;
            $this->lastEditedByUserID = $lastEditedByUserID;
            $this->comments = $comments;
            $this->ratings = $ratings;
            $this->minPlayers = $minPlayers;
            $this->maxPlayers = $maxPlayers;
        }

        //Setters
        function setEntryID(int $entryID) {
            $this->entryID = $entryID;
        }

        function setGameName(String $gameName) {
            $this->gameName = $gameName;
        }

        function setDescription(String $description) {
            $this->description = $description;
        }

        function setRules(String $rules) {
            $this->rules = $rules;
        }

        function setLastEdit(Date $lastEdit) {
            $this->lastEdit = $lastEdit;
        }

        function setLastEditedByUserID(int $lastEditedByUserID) {
            $this->lastEditedByUserID = $lastEditedByUserID;
        }

        function setComments(Array $comments) {
            $this->comments = $comments;
        }

        function setRatings(Array $ratings) {
            $this->ratings = $ratings;
        }

        function setMinPlayers(int $minPlayers) {
            $this->minPlayers = $minPlayers;
        }
        
        function setMaxPlayers(int $maxPlayers) {
            $this->maxPlayers = $maxPlayers;
        }


        //Getters
        function getEntryID() {
            return $this->entryID;
        }

        function getGameName() {
            return $this->gameName;
        }

        function getDescription() {
            return $this->description;
        }

        function getRules() {
            return $this->rules;
        }

        function getLastEdit() {
            return $this->lastEdit;
        }

        function getLastEditUser() {
            return $this->lastEditedByUserID;
        }

        function getComments() {
            return $this->comments;
        }

        function getRatings() {
            return $this->ratings;
        }

        function getMinPlayers() {
            return $this->minPlayers;
        }
        
        function getMaxPlayers() {
            return $this->maxPlayers;
        }
    }
?>
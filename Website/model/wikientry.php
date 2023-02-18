<?php
    //Author            : Nicholas Lam
    //Date Created      : 12-15-2023
    //Last Edited     	: 12-18-2023
    //Filename          : wikientry.php
    //Version           : 1.0
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
        function set_entryID(int $entryID) {
            $this->entryID = $entryID;
        }

        function set_gameName(String $gameName) {
            $this->gameName = $gameName;
        }

        function set_description(String $description) {
            $this->description = $description;
        }

        function set_rules(String $rules) {
            $this->rules = $rules;
        }

        function set_lastEdit(Date $lastEdit) {
            $this->lastEdit = $lastEdit;
        }

        function set_lastEditUser(int $lastEditUser) {
            $this->lastEditUser = $lastEditUser;
        }

        function set_comments(Array $comments) {
            $this->comments = $comments;
        }

        function set_ratings(Array $ratings) {
            $this->ratings = $ratings;
        }

        function set_minPlayers(int $minPlayers) {
            $this->minPlayers = $minPlayers;
        }
        
        function set_maxPlayers(int $maxPlayers) {
            $this->maxPlayers = $maxPlayers;
        }


        //Getters
        function get_entryID() {
            return $this->entryID;
        }

        function get_gameName() {
            return $this->gameName;
        }

        function get_description() {
            return $this->description;
        }

        function get_rules() {
            return $this->rules;
        }

        function get_lastEdit() {
            return $this->lastEdit;
        }

        function get_lastEditUser() {
            return $this->lastEditUser;
        }

        function get_comments() {
            return $this->comments;
        }

        function get_ratings() {
            return $this->ratings;
        }

        function get_minPlayers() {
            return $this->minPlayers;
        }
        
        function get_maxPlayers() {
            return $this->maxPlayers;
        }
    }
?>
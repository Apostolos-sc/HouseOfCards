<?php
    //Author            : Carter Marcelo
    //Date Created      : 21-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On    : 21-02-2023
    //Filename          : rating.php
    //Version           : 1.1

    //Class Rating
    class Rating {

        //Properties
        private int $userID;
        private int $entryID;
        private int $ratingID;
        private int $rating;

        //Constructor
        public function _construct(int $userID, int $entryID, int $ratingID, int $rating){
            $this->userID = $userID;
            $this->entryID = $entryID;
            $this->ratingID = $ratingID;
            $this->rating = $rating;
        }

        //Setters
        public function settUserID(int $userID) {
            return $this->userID;
        }

        public function setEntryID(int $entryID) {
            return $this->entryID = $entryID;
        }

        public function setRatingID(int $ratingID) {
            $this->ratingID = $ratingID;
        }

        public function setRating(int $rating) {
            $this->rating = $rating;
        }

        //Getters
        public function getUserID() {
            return $this->userID;
        }

        public function getEntryID() {
            return $this->entryID;
        }
        
        public function getRatingID() {
            return $this->ratingID;
        }

        public function getRating() {
            return $this->rating;
        }

    }
?>
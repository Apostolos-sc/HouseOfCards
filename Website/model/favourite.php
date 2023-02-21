<?php
    //Author            : Carter Marcelo
    //Date Created      : 19-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On    : 21-02-2023
    //Filename          : favourite.php
    //Version           : 1.1

    //Class Favourite
    class Favourite {

        //Properties
        private int $userID;
        private int $entryID;

        //Constructor
        public function _construct(int $userID, int $entryID) {
            $this->$userID = $userID;
            $this->$entryID = $entryID;
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

    }
?>
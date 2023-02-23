<?php
    //Author            : Ethan Winters
    //Date Created      : 21-02-2023
    //Last Edited By    : Ethan Winters
    //Last Edited On 	: 21-02-2023
    //Filename          : comment.php
    //Version           : 1.0

    //Class Comment
    class Comment {
        
        //Properties
        private int $commentID;
        private int $entryID;
        private int $userID;
        private int $positionID;
        private Date $postedOn;
        private string $content;

        //Constructor
        public function __construct(int $commentID, int $entryID, int $userID, int $positionID, Date $postedOn, string $content) {
            $this->commentID = $commentID;
            $this->entryID = $entryID;
            $this->userID = $userID;
            $this->positionID = $positionID;
            $this->postedOn = $postedOn;
            $this->content = $content;
        }

        //Setters
        public function setCommentID(int $commentID) {
            $this->commentID = $commentID;
        }

        public function setEntryID(int $entryID) {
            $this->entryID = $entryID;
        }

        public function setUserID(int $userID) {
            $this->userID = $userID;
        }

        public function setPositionID(int $positionID) {
            $this->positionID = $positionID;
        }

        public function setPostedOn(Date $postedOn) {
            $this->postedOn = $postedOn;
        }

        public function setContent(string $content) {
            $this->content = $content;
        }

        //Getters
        public function getCommentID() {
            return $this->commentID;
        }

        public function getEntryID() {
            return $this->entryID;
        }

        public function getUserID() {
            return $this->userID;
        }

        public function getPositionID() {
            return $this->positionID;
        }

        public function getPostedOn() {
            return $this->postedOn;
        }

        public function getContent() {
            return $this->content;
        }
    }
?>
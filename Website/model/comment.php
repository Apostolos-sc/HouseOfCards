<?php
    //Author            : Ethan Winters
    //Date Created      : 21-02-2023
    //Last Edited By    : Ethan Winters
    //Last Edited On 	: 22-02-2023
    //Filename          : comment.php
    //Version           : 1.1

    //Class Comment
    class Comment {

        //Properties
        private int $commentID;
        private int $entryID;
        private User $postedBy;
        private int $positionID;
        private Date $postedOn;
        private string $content;
        private Array $commentReplies = [];


        //Constructor
        public function __construct(int $commentID, int $entryID, User $postedBy, int $positionID, Date $postedOn, string $content, Array $commentReplies) {
            $this->commentID = $commentID;
            $this->entryID = $entryID;
            $this->postedBy= $postedBy;
            $this->positionID = $positionID;
            $this->postedOn = $postedOn;
            $this->content = $content;
            $this->commentReplies = $commentReplies;
        }

        //Setters
        public function setCommentID(int $commentID) {
            $this->commentID = $commentID;
        }

        public function setEntryID(int $entryID) {
            $this->entryID = $entryID;
        }

        public function setPostedBy(User $postedBy) {
            $this->postedBy = $postedBy;
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

        public function setCommentReplies(Array $commentReplies) {
            $this->commentReplies = $commentReplies;
        }

        //Getters
        public function getCommentID() {
            return $this->commentID;
        }

        public function getEntryID() {
            return $this->entryID;
        }

        public function getPostedBy() {
            return $this->postedBy;
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

        public function getCommentReplies() {
            return $this->commentReplies;
        }

        //Database Access stubs
        /*
            DB Table Schema - Updated
            `id` int(10) NOT NULL,
            `content` varchar(200) NOT NULL,
            `entryID` int(10) NOT NULL,
            `userID` int(10) NOT NULL,
            `positionID` int(10) NOT NULL,
            `postedOnDate` date,
            `postedOnTime` time(6) DEFAULT NULL
        */
        public static function fetchCommentsByEntryID(Database $dbConnection, int $entryID) : Array {
            //Query db for comments of the wiki entry whose ID = $entryID
            $comments = [];
            return $comments;
        }

        public static function fetchCommentsByUserID(Database $dbConnection, int $userID) : Array {
            //Query db for comments posted by user whose ID = $userID
            $comments = [];
            return $comments;
        }

        public static function fetchComments(Database $dbConnection) : Array {
            //Query db for all comments in the database
            $comments = [];
            return $comments;
        }
    }
?>
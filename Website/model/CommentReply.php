<?php
    //Author            : Ethan Winters
    //Date Created      : 15-02-2023
    //Last Edited By    : Apostolos Scodnrianis
    //Last Edited On 	: 22-02-2023
    //Filename          : commentReply.php
    //Version           : 1.3

    //Class CommentReply
    class CommentReply {

        //Properties
        private int $replyID;
        private int $commentID;
        private int $positionID;
        private int $userID;
        private Date $postedOn;

        //Constructor
        public function __construct(int $replyID, int $commentID, int $positionID, int $userID, Date $postedOn) {
            $this->replyID = $replyID;
            $this->commentID = $commentID;
            $this->positionID = $positionID;
            $this->userID = $userID;
            $this->postedOn = $postedOn;
        }

        //Setters
        function setReplyID(int $replyID){
            $this->replyID = $replyID;
        }

        function setCommentID(int $commentID){
            $this->commentID = $commentID;
        }

        function setPositionID(int $positionID){
            $this->positionID = $positionID;
        }

        function setUserID(int $userID){
            $this->userID = $userID;
        }

        function setPostedOn(Date $postedOn) {
            $this->postedOn = $postedOn;
        }

        //Getters
        function getReplyID(){
            return $this->replyID;
        }

        function getCommentID(){
            return $this->commentID;
        }

        function getPositionID(){
            return $this->positionID;
        }

        function getUserID(){
            return $this->userID;
        }

        function getPostedOn() {
            return $this->postedOn;
        }

        //Database Stubs
        public static function fetchCommentRepliesByCommentID(Database $dbConnection, int $commentID) : Array {
            //Query db to find CommentReplies for a Comment whose ID = $commentID
            $commentReplies = [];
            return $commentReplies;
        }

        public static function fetchCommentRepliesByUserID(Database $dbConnection, int $userID) : Array {
            //Query db to find CommentReplies by a user whose ID = $userID
            $commentReplies = [];
            return $commentReplies;
        }
    }
?>
<?php
    //Author            : Ethan Winters
    //Date Created      : 15-02-2023
    //Last Edited     	: 15-02-2023
    //Filename          : CommentReply.php
    //Version           : 1.0
    //Class CommentReply
    class CommentReply {
        private int $replyID;
        private int $commentID;
        private int $positionID;
        private int $userID;

        //Constructor
        public function __construct(int $replyID, int $commentID, int $positionID, int $userID) {
            $this->replyID = $replyID;
            $this->commentID = $commentID;
            $this->positionID = $positionID;
            $this->userID = $userID;
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
    }
?>
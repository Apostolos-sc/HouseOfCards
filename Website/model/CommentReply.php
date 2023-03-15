<?php
    //Author            : Ethan Winters
    //Date Created      : 15-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On 	: 26-02-2023
    //Filename          : commentReply.php
    //Version           : 1.5

    //Class CommentReply
    class CommentReply {

        //Properties
        private int $replyID;
        private int $commentID;
        private int $positionID;
        private String $content;
        private User $postedBy;
        private Date $postedOn;

        //Constructor
        public function __construct(int $replyID, int $commentID, int $positionID, String $content, User $postedBy, Date $postedOn) {
            $this->replyID = $replyID;
            $this->commentID = $commentID;
            $this->positionID = $positionID;
            $this->content = $content;
            $this->postedBy = $postedBy;
            $this->postedOn = $postedOn;
        }

        //Setters
        function setReplyID(int $replyID) {
            $this->replyID = $replyID;
        }

        function setCommentID(int $commentID) {
            $this->commentID = $commentID;
        }

        function setPositionID(int $positionID) {
            $this->positionID = $positionID;
        }

        function setContent(String $content) {
            $this->content = $content;
        }
        function setPostedBy(User $postedBy){
            $this->postedBy = $postedBy;
        }

        function setPostedOn(Date $postedOn) {
            $this->postedOn = $postedOn;
        }

        //Getters
        function getReplyID() {
            return $this->replyID;
        }

        function getCommentID() {
            return $this->commentID;
        }

        function getPositionID() {
            return $this->positionID;
        }

        function getContent() {
            return $this->content;
        }

        function getPostedBy(){
            return $this->postedBy;
        }

        function getPostedOn() {
            return $this->postedOn;
        }

        //Database Access Stubs
        /*
            Database Schema - Updated
            `id` int(10) NOT NULL,
            `commentID` int(10) NOT NULL,
            `positionID` int(10) NOT NULL,
            `userID` int(10) NOT NULL,
            `content` varchar(200) NOT NULL,
            `postedOnDate` date,
            `postedOnTime` time(6) DEFAULT NULL
        */
        public static function fetchCommentRepliesByCommentID(Database $dbConnection, int $commentID) : ?Array {
            //Query db to find CommentReplies for a Comment whose ID = $commentID
            $commentReplies = [];
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM CommentReply WHERE CommentReply.commentID=?');
                $stmt->bind_param('i', $commentID);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return an empty array.
                    return $commentReplies;
                } else {
                    //get rows of the table one by one to process in an associative manner
                    while($row = $result->fetch_assoc()) {
                        //create the user object
                        $user = User::fetchUserByID($dbConnection, $row['userID']);
                        //Maria DB time format is YYYY-MM-DD
                        //Create an array of strings using - as a delimeter.
                        $date_arr = explode ("-", $row['postedOnDate']);
                        //Create an array of strings using : as a delimiter
                        $time_arr = explode(":", $row['postedOnTime']);
                        //Adding an integer, i.e. 0, does an implicit String conversion from String to integer
                        //Create Date object
                        $date = new Date($date_arr[2]+0, $date_arr[1] + 0, $date_arr[0], $time_arr[0]+0, $time_arr[1]+0, $time_arr[2] + 0);
                        //create CommentReply object from the fetched information
                        $commentReply = new CommentReply($row['id'], $row['commentID'], $row['positionID'], $row['content'], $user, $date);
                        //add the comment to the comment array
                        $commentsReplies[] = $commentReply;
                    }
                    return $commentsReplies;
                }
            } else {
                //database connection provided is invalid, return null
                return null;
            }
        }

        public static function fetchCommentRepliesByUserID(Database $dbConnection, int $userID) : ?Array {
            //Query db to find CommentReplies by a user whose ID = $userID
            $commentReplies = [];
            //check if we have a valid database connection
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM commentReply WHERE CommentReply.userID=?');
                $stmt->bind_param('i', $userID);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return an empty array.
                    return $commentReplies;
                } else {
                    //get rows of the table one by one to process in an associative manner
                    while($row = $result->fetch_assoc()) {
                        //create the user object
                        $user = User::fetchUserByID($dbConnection, $row['userID']);
                        //Maria DB time format is YYYY-MM-DD
                        //Create an array of strings using - as a delimeter.
                        $date_arr = explode ("-", $row['postedOnDate']);
                        //Create an array of strings using : as a delimiter
                        $time_arr = explode(":", $row['postedOnTime']);
                        //Adding an integer, i.e. 0, does an implicit String conversion from String to integer
                        //Create Date object
                        $date = new Date($date_arr[2]+0, $date_arr[1] + 0, $date_arr[0], $time_arr[0]+0, $time_arr[1]+0, $time_arr[2] + 0);
                        //create CommentReply object from the fetched information
                        $commentReply = new CommentReply($row['id'], $row['commentID'], $user,  $row['positionID'], $row['content'], $user, $date);
                        //add the comment to the comment array
                        $commentsReplies[] = $commentReply;
                    }
                    return $commentsReplies;
                }
            } else {
                //database connection provided is invalid, return null
                return null;
            }
        }
    }
?>
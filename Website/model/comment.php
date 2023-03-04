<?php
    //Author            : Ethan Winters
    //Date Created      : 21-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On 	: 26-02-2023
    //Filename          : comment.php
    //Version           : 1.3

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
        public static function fetchCommentsByEntryID(Database $dbConnection, int $entryID) : ?Array {
            //Query db to find Comments whose entryID = $entryID
            $comments = [];
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM Comment WHERE Comment.entryID=?');
                $stmt->bind_param('i', $entryID);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return an empty array.
                    return $comments;
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
                        //get CommentReplies of the Comment
                        $commentReplies = CommentReply::fetchCommentRepliesByCommentID($dbConnection, $row['id']);
                        //create Comment object from the fetched information
                        $comment = new Comment($row['id'], $row['entryID'], $user, $row['positionID'], $date, $row['content'], $commentReplies);
                        //add the comment to the comment array
                        $comments[] = $comment;
                    }
                    return $comments;
                }
            } else {
                //database connection provided is invalid, return null
                return null;
            }
        }

        public static function fetchCommentsByUserID(Database $dbConnection, int $userID) : ?Array {
            //Query db to find Comments whose ID = $userID
            $comments = [];
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM Comment WHERE Comment.userID=?');
                $stmt->bind_param('i', $userID);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return an empty array.
                    return $comments;
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
                        //get CommentReplies of the Comment
                        $commentReplies = CommentReply::fetchCommentRepliesByCommentID($dbConnection, $row['id']);
                        //create Comment object from the fetched information
                        $comment = new Comment($row['id'], $row['entryID'], $user,  $row['positionID'], $date, $row['content'], $commentReplies);
                        //add the comment to the comment array
                        $comments[] = $comment;
                    }
                    return $comments;
                }
            } else {
                //database connection provided is invalid, return null
                return null;
            }
        }

        public static function fetchComments(Database $dbConnection) : ?Array {
            //Query db to select all comments in the database
            //Query db to find Comments whose entryID = $entryID
            $comments = [];
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM Comment');
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return an empty array.
                    return $comments;
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
                        //get CommentReplies of the Comment
                        $commentReplies = CommentReply::fetchCommentRepliesByCommentID($dbConnection, $row['id']);
                        //create Comment object from the fetched information
                        $comment = new Comment($row['id'], $row['entryID'], $user,  $row['positionID'], $date, $row['content'], $commentReplies);
                        //add the comment to the comment array
                        $comments[] = $comment;
                    }
                    return $comments;
                }
            } else {
                //database connection provided is invalid, return null
                return null;
            }
        }
    }
?>
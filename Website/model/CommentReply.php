<?php
    //Author            : Ethan Winters
    //Date Created      : 15-02-2023
    //Last Edited By    : Ethan Winters
    //Last Edited On 	: 23-02-2023
    //Filename          : commentReply.php
    //Version           : 1.4

    //Class CommentReply
    class CommentReply {

        //Properties
        private int $replyID;
        private int $commentID;
        private int $positionID;
        private String $content;
        private User $postedBy;
        private Date $postedOn;

        //Database Credidentials
        $hostname = ;
        $username = ;
        $password = ;
        $dbname = "HouseOfCardsDB";

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
        public static function fetchCommentRepliesByCommentID(Database $dbConnection, int $commentID) : Array {
            //Query db to find CommentReplies for a Comment whose ID = $commentID
            mysqli_connect($hostname,$username, $password) or die ("<html>script language='JavaScript'>alert('Unable to connect to database'),history.go(-1)<script></html>");
            mysqli_select_db($dbname); // connect to the MySQL server and select the correct database
            $query = "SELECT * FROM CommentReply WHERE commentID == $commentID";
            $results = mysqli_query($query); // compile and execute the query to select the entries
            $commentReplies = array();
            if($results){
                while($entry = mysqli_fetch_array($results)){ // fill the array
                    array_push($commentReplies, $entry);
                }
            }
            mysql_close(); // close the database connection
            return $commentReplies;
        }

        public static function fetchCommentRepliesByUserID(Database $dbConnection, int $userID) : Array {
            //Query db to find CommentReplies by a user whose ID = $userID
            mysqli_connect($hostname,$username, $password) or die ("<html>script language='JavaScript'>alert('Unable to connect to database'),history.go(-1)<script></html>");
            mysqli_select_db($dbname); // connect to the MySQL server and select the correct database
            $query = "SELECT * FROM CommentReply WHERE userID == $userID";
            $results = mysqli_query($query); // compile and execute the query to select the entries
            $commentReplies = array();
            if($results){
                while($entry = mysqli_fetch_array($results)){ // fill the array
                    array_push($commentReplies, $entry);
                }
            }
            mysql_close(); // close the database connection
            return $commentReplies;
        }
    }
?>
<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited     	: 12-02-2023
    //Filename          : user.php
    //Version           : 1.0
    //Class User
    class User {
        //properties
        private int $userID;
        private UserType $userGroup;
        private String $fname;
        private String $lname;
        private String $email;
        private String $username;
        private String $password;
        private Date $bdate;
        private Favorite $favorites = array();

        //Constructor
        public function __construct(int $userID, UserType $userGroup, String $fname, String $lname, 
                                    String $email, String $username, String $password, Date $bdate,
                                    Array $favorites) {
            $this->userID = $userID;
            $this->userGroup = $userGroup;
            $this->fname = $fname;
            $this->lname = $lname;
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;
            $this->bdate = $bdate;
            $this->favorites = $favorites;
        }

        //Setters
        function set_userID(int $userID) {
            $this->userID = $userID;
        }

        function set_userGroup(userType $userGroup) {
            $this->userGroup = $userGroup;
        }

        function set_fname(String $fname) {
            $this->fname = $fname;
        }

        function set_lname(String $lname) {
            $this->lname = $lname;
        }

        function set_email(String $email) {
            $this->email = $email;
        }

        function set_password(String $password) {
            $this->password = $password;
        }

        function set_bdate(Date $bdate) {
            $this->bdate = $bdate;
        }

        function set_favorites(Array $favorites) {
            $this->favorites = $favorites;
        }
        //Getters

        function get_userID() {
            return $this->userID;
        }

        function get_userGroup() {
            return $this->userGroup;
        }

        function get_fname() {
            return $this->fname;
        }

        function get_lname() {
            return $this->lname;
        }

        function get_email() {
            return $this->email;
        }

        function get_password() {
            return $this->password;
        }

        function get_bdate() {
            return $this->bdate;
        }

        function get_favorites() {
            return $this->favorites;
        }
    }
?>
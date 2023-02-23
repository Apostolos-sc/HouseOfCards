<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited     	: 21-02-2023
    //Filename          : user.php
    //Version           : 1.2
    //Class User
    class User {

        //Properties
        private int $userID;
        private UserType $userGroup;
        private String $firstName;
        private String $lastName;
        private String $email;
        private String $username;
        private String $password;
        private Date $dob;
        private Favourite $favourites = array();

        //Constructor
        public function __construct(int $userID, UserType $userGroup, String $firstName, String $lastName, 
                                    String $email, String $username, String $password, Date $dob,
                                    Array $favourites) {
            $this->userID = $userID;
            $this->userGroup = $userGroup;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;
            $this->dob = $dob;
            $this->favourites = $favourites;
        }

        //Setters
        public function setUserID(int $userID) {
            $this->userID = $userID;
        }

        public function setUserGroup(userType $userGroup) {
            $this->userGroup = $userGroup;
        }

        public function setFname(String $fname) {
            $this->firstName = $fname;
        }

        public function setLastName(String $lastName) {
            $this->lastName = $lastName;
        }

        public function setEmail(String $email) {
            $this->email = $email;
        }

        public function setUsername(String $username) {
            $this->username = $username;
        }

        public function setPassword(String $password) {
            $this->password = $password;
        }

        public function setDOB(Date $dob) {
            $this->dob = $dob;
        }

        public function setFavourites(Array $favourites) {
            $this->favourites = $favourites;
        }

        //Getters
        public function getUserID() {
            return $this->userID;
        }

        public function getUserGroup() {
            return $this->userGroup;
        }

        public function getFirstName() {
            return $this->firstName;
        }

        public function getLastName() {
            return $this->lastName;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getDOB() {
            return $this->dob;
        }

        public function getFavourites() {
            return $this->favourites;
        }

        //Database Access Function stubs
        /*
            DB Table Schema - Updated
            `id` int(10) NOT NULL,
            `username` varchar(200) NOT NULL,
            `email` varchar(200) NOT NULL,
            `userAccessLevel` varchar(200) DEFAULT NULL,
            `fname` varchar(200) DEFAULT NULL,
            `lname` varchar(200) DEFAULT NULL,
            `password` varchar(200) NOT NULL,
            `dob` date
        */
        //stubs for functions that access db
        public static function fetchUserByID(Database $dbConnection, int $userID) : ?User {
            //request a user by ID, returns null if not found
            $user = null;
            return $user;
        }

        public static function fetchUserByUsername(Database $dbConnection, String $username) : ?User {
            //request a user by ID, returns null if not found
            $user = null;
            return $user;
        }

        public static function fetchUsers(Database $dbConnection) : array {
            //Query database to return all users.
            $users = [];
            return $users;
        }
    }
?>
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
        //stubs for functions that access db
        public static function getUserByID(int $userID, Database $dbConnection) : ?User {
            //request a user by ID, returns null if not found
            $user = null;
            return $user;
        }

        public static function getUserByUsername(String $username, Database $dbConnection) : ?User {
            //request a user by ID, returns null if not found
            $user = null;
            return $user;
        }

        public static function getUsers(Database $dbConnection) : ?array {
            $users = [];
            return $users;
        }
    }
?>
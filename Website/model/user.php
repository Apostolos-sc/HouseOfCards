<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On    : 03-02-2023
    //Filename          : user.php
    //Version           : 1.3
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
        private Array $favourites = []; //PHP is loosely typed
        //Should consider if we should carry the ratings in the user for each user or if we should query the db each time
        // we need them 

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
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM users WHERE users.id=?');
                $stmt->bind_param('i', $userID);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return null
                    return null;
                } else {
                    //fetch associatively a row. Use $row to get the data needed. Only one user should be found.
                    $row = $result->fetch_assoc();
                    $userType = UserType::fetchUserType($dbConnection, $row['userAccessLevel']);
                    //Create an array of strings using - as a delimeter.
                    $date_arr = explode ("-", $row['dob']);
                    //Create Date object
                    $dob = new Date($date_arr[2]+0, $date_arr[1] + 0, $date_arr[0], "00"+0, "00"+0, "00" + 0);
                    //Get faovurites of the users
                    $favourites = Favourite::fetchFavouritesByUserID($dbConnection, $userID);
                    $user = new User($row['id'], $userType, $row['fname'], $row['lname'], $row['email'], 
                                                $row['username'], $row['password'], $dob, $favourites);
                    return $user;
                }
            } else {
                //db object is not connected. Return Null.
                return null;
            }
        }

        public static function fetchUserByUsername(Database $dbConnection, String $username) : ?User {
            //request a user by username, returns null if not found
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM users WHERE users.username=?');
                $stmt->bind_param('s', $username);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return null
                    return null;
                } else {
                    //fetch associatively a row. Use $row to get the data needed. Only one user should be found.
                    //usernames should also be unique
                    $row = $result->fetch_assoc();
                    $userType = UserType::fetchUserType($dbConnection, $row['userAccessLevel']);
                    //Create an array of strings using - as a delimeter.
                    $date_arr = explode ("-", $row['dob']);
                    //Create Date object
                    $dob = new Date($date_arr[2]+0, $date_arr[1] + 0, $date_arr[0], "00"+0, "00"+0, "00" + 0);
                    //Get favourites of the user
                    $favourites = Favourite::fetchFavouritesByUserID($dbConnection, $row['id']);
                    $user = new User($row['id'], $userType, $row['fname'], $row['lname'], $row['email'], 
                                                $row['username'], $row['password'], $dob, $favourites);
                    return $user;
                }
            } else {
                //db object is not connected. Return Null.
                return null;
            }
        }

        public static function fetchUsers(Database $dbConnection) : ?Array {
            //Query database to return all users.
            $users = [];
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM users');
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no return empty array
                    return $users;
                } else {
                    while($row = $result->fetch_assoc()) {
                        //fetch associatively a row. Use $row to get the data needed.
                        $userType = UserType::fetchUserType($dbConnection, $row['userAccessLevel']);
                        //Create an array of strings using - as a delimeter.
                        $date_arr = explode ("-", $row['dob']);
                        //Create Date object
                        $dob = new Date($date_arr[2]+0, $date_arr[1] + 0, $date_arr[0], "00"+0, "00"+0, "00" + 0);
                        //Get faovurites of the users
                        $favourites = Favourite::fetchFavouritesByUserID($dbConnection, $row['id']);
                        $user = new User($row['id'], $userType, $row['fname'], $row['lname'], $row['email'], 
                                                    $row['username'], $row['password'], $dob, $favourites);
                        //add User object to $users array.
                        $users[] = $user;
                    }
                    //done fetching users from db. Return array of users.
                    return $users;
                }
            } else {
                //db object is not connected. Return Null.
                return null;
            }
        }
    }
?>
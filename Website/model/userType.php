<?php
    //Author            : Carter Marcelo
    //Date Created      : 19-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On    : 22-02-2023
    //Filename          : userType.php
    //Version           : 1.4
    class UserType{
        
        //Properties
        private int $accessLevel;
        private string $userGroup;

        //Constructor
        public function _construct(int $accessLevel, string $userGroup){
            $this->$accessLevel = $accessLevel;
            $this->userGroup = $userGroup;
        }

        //Getters
        public function getAccessLevel() {
            return $this->accessLevel;
        }
        
        public function getUserGrpoup() {
            return $this->userGroup;
        }

        //Setters
        public function setAccessLevel(int $accessLevel) {
            $this->$accessLevel = $accessLevel;
        }
    
        public function setUserGroup(string $userGroup) {
            $this->$userGroup = $userGroup;
        }

        //Database access stubs
        /*
            DB Schema Table - Updated
            `accessLevel` int(10) NOT NULL,
            `userGroup` varchar(200) DEFAULT NULL
        */
        public static function fetchUserTypes(Database $dbConnection) : ?Array {
            //access the database and for each row of userTypes, populate one user Type object.
            //Return all the user types of the database in the form of an array
            $userTypes = [];
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM UserType');
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //no result. Return an empty array.
                    return $userTypes;
                } else {
                    //get rows of the table one by one to process in an associative manner
                    while($row = $result->fetch_assoc()) {
                        //create userType object from the fetched information
                        $userType = new UserType($row['accessLevel'], $row['userGroup']);
                        //add the userType to the userTypes array
                        $userTypes[] = $userType;
                    }
                    return $userTypes;
                }
            } else {
                //database connection provided is invalid, return null
                return null;
            }
            return $userTypes;
        }

        public static function fetchUserType(Database $dbConnection, int $userAccessLevel) : ?UserType {
            //Query the database for a wiki entry that corresponds to one with an ID of $wikiEntryID.
            //If it doesn't exist in the database return null.
            if($dbConnection->is_connected()) {
                $stmt = $dbConnection->connection->prepare('SELECT * FROM UserTypes WHERE UserType.accessLevel=?');
                $stmt->bind_param('i', $userAccessLevel);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 0) {
                    //No result was found
                    return null;
                } else {
                    //$userAccessLevel is a Primary Key. There should be only one result if we find one.
                    $row = $result->fetch_assoc();
                    $userType = new UserType($row['accessLevel'], $row['userGroup']);
                    //add the userType to the userTypes array
                    return $userType;
                }
            } else {
                //connection was not valid
                return null;
            }
        }
    }
?>
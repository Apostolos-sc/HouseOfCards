<?php
    //Author            : Carter Marcelo
    //Date Created      : 19-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On    : 21-02-2023
    //Filename          : userType.php
    //Version           : 1.2
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
        public function getUserGrpoup() {
            return $this->userGroup;
        }

        public function getAccessLevel() {
            return $this->accessLevel;
        }

        //Setters
        public function setAccessLevel(int $accessLevel) {
            $this->$accessLevel = $accessLevel;
        }
    
        public function setUserClass(string $userClass) {
            $this->$userClass = $userClass;
        }

        //Database access stubs
        public static function fetchUserTypes(Database $dbConnection) : Array {
            //access the database and for each row of userTypes, populate one user Type object.
            //Return all the user types of the database in the form of an array
            $userTypes = [];
            return $userTypes;
        }

        public static function fetchUserType(Database $dbConnection, int $userAccessLevel) : ?UserType {
            //Query the database for a wiki entry that corresponds to one with an ID of $wikiEntryID.
            //If it doesn't exist in the database return null.
            return null;
        }
    }
?>
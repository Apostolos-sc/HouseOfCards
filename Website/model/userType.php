<?php
    //Author            : Carter Marcelo
    //Date Created      : 19-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On    : 21-02-2023
    //Filename          : userType.php
    //Version           : 1.1
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
    }
?>
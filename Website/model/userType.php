<?php
#Author: Carter Marcelo
#Version: 1.0
#Created: 2023-02-19
#Edited: 2023-02-19
class UserType{
    private int $accessLevel;
    private string $userClass;
    public function _construct(int $accessLevel, string $userClass){
        $this->$accessLevel = $accessLevel;
        $this->userClass = $userClass;
    }
    public function getUserClass(){
        return $this->$userClass;
    }
    public function setUserClass(string $userClass){
        $this->$userClass = $userClass;
    }
    public function getAccessLevel(){
        return $this->$accessLevel;
    }
    public function setAccessLevel(int $accessLevel){
        $this->$accessLevel = $accessLevel;
    }
}
?>
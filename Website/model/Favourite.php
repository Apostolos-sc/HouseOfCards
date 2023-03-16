<?php
class Favourite{
    private int $userID;
    private int $entryID;
    public function _construct(int $userID, int $entryID){
        $this->$userID = $userID;
        $this->$entryID = $entryID;
    }
    public function getEntryID(){
        return $this->$entryID;
    }
    public function getUserID(){
        return $this->$userID;
    }
}
?>
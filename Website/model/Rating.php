<?php 
class Rating{
    private int $userID;
    private int $entryID;
    private int $ratingID;
    private int $rating;
    public function _construct(int $userID, int $entryID, int $ratingID, int $rating){
        $this->$userID = $userID;
        $this->$entryID = $entryID;
        $this->$ratingID = $ratingID;
        $this->$rating = $rating;
    }
    public function getRating(){
        return $this->$rating;
    }
    public function setRating(int $rating){
        $this->$rating = $rating;
    }
    public function getEntryID(){
        return $this->entryID;
    }
    public function getUserID(){
        return $this->$userID;
    }
    public function getRatingID(){
        return $this->$ratingID;
    }
}
?>
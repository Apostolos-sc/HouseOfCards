<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 23-03-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited     	: 23-03-2023
    //Filename          : profile.php
    //Version           : 1.0
    $GLOBALS["title"] = "Welcome to House of Cards Wiki - My Profile";
    include 'controller/connectDB.php';

    if(!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
        header("Location: index.php");
        exit();
    }
    include 'controller/header.php';
    include 'controller/left-menu.php';
    include('view/view_functions.php');
    include('model/favourite.php');
    include('model/user.php');
    include('model/wikientry.php');
    include('model/rating.php');
    include('model/comment.php');
    include('model/CommentReply.php');
    include('model/userType.php');
    include('model/date.php');
    include('controller/controller_functions.php');
?>
                <div class="center">
                    <div id="center-content">
                        <?php
                            $ID = $_SESSION['userID'];
                            $user = User::fetchUserByID($db, $ID);
                            foreach($user->getFavourites() as $fav){
                                $favourites = $favourites . WikiEntry::fetchWikiEntry($db,$fav->getEntryID())->getGameName() . "<br>";  //THIS WILL FAIL FOR SAYMA BECAUSE SHE HAS A GAME FAVOURITED WHICH DOES NOT EXIST
                                //$favourites = $favourites . WikiEntry::fetchWikiEntry($db,1)->getGameName() . "<br>";
                            }
                            $userRatings = Rating::fetchRatingsByUserID($db,$user->getUserID());
                            $ratings = "";
                            foreach($userRatings as $rating){
                                $ratings = $ratings . WikiEntry::fetchWikiEntry($db,$rating->getEntryId())->getGameName() . " " . $rating->getRating() . "/5" . "<br>";
                                //$ratings = $ratings . WikiEntry::fetchWikiEntry($db,1)->getGameName() . " " . 1 . "/5" . "<br>";
                            }
                            echo generateProfileView($user, $favourites, $ratings);
                        ?>
                    </div>
                </div>
<?php
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
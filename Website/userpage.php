<?php
    //Author            : Alexander Sembrat
    //Date Created      : 19-02-2023
    //Last Edited     	: 20-03-2023
    //Filename          : userpage.php
    //Version           : 1.0
    include('controller/connectDB.php');
    if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        header("Location: index.php");
        exit();
    }
    include('controller/header.php');
    include('controller/left-menu.php');
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
                    if(isset($_GET['ID'])) {
                        //entryID was give through the Get Method
                        if(ctype_digit(strval($_GET['ID']))) {
                            //entryID is a zero or positive integer
                            $user = User::fetchUserByID($db, intval($_GET['ID']));
                            if($user != null) {
                                $userFavourites = Favourite::fetchFavouritesByUserID($db,$user->getUserID());
                                $favourites = "";
                                foreach($userFavourites as $fav){
                                    $favourites = $favourites . WikiEntry::fetchWikiEntry($db,$fav->getEntryID())->getGameName() . "<br>";  //THIS WILL FAIL FOR SAYMA BECAUSE SHE HAS A GAME FAVOURITED WHICH DOES NOT EXIST
                                    //$favourites = $favourites . WikiEntry::fetchWikiEntry($db,1)->getGameName() . "<br>";
                                }
                                $userRatings = Rating::fetchRatingsByUserID($db,$user->getUserID());
                                $ratings = "";
                                foreach($userRatings as $rating){
                                    $ratings = $ratings . WikiEntry::fetchWikiEntry($db,$rating->getEntryId())->getGameName() . " " . $rating->getRating() . "/5" . "<br>";
                                    //$ratings = $ratings . WikiEntry::fetchWikiEntry($db,1)->getGameName() . " " . 1 . "/5" . "<br>";
                                }
                                //entry exists, print information
                                echo generateUserPageGuestUser($user, $favourites, $ratings, getUserList(User::fetchUsers($db))); //upto here is where I finished
                            } else {
                                //entry returned null, i.e., it does not exist.
                                echo generateUserPageNotExist(getUserList(User::fetchUsers($db)));
                            }
                        } else {
                            //not a digit, generate wiki page with an error message
                            echo generateUserPageWrongEntry(getUserList(User::fetchUsers($db)));
                        }
                    } else {
                        //if entry GET wasn't set, welcome the user.
                        echo generateUserPageWelcome(getUserList(User::fetchUsers($db)));
                    }
?>
                    </div>
                </div>
<?php
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
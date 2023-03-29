<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 23-03-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited     	: 26-03-2023
    //Filename          : profile.php
    //Version           : 1.1
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
                            $userRatings = Rating::fetchRatingsByUserID($db,$user->getUserID());
                            if(!empty($userRatings)) {
                                foreach($userRatings as $rating){
                                    $ratings = $ratings . WikiEntry::fetchWikiEntry($db,$rating->getEntryId())->getGameName() . " " . $rating->getRating() . "/5" . "<br>";
                                    //$ratings = $ratings . WikiEntry::fetchWikiEntry($db,1)->getGameName() . " " . 1 . "/5" . "<br>";
                                }
                            } else {
                                $ratings = "";
                            }
                            $wikientries = WikiEntry::fetchWikiEntries($db);
                            echo generateProfileView($user, $wikientries, $ratings);
                        ?>
                        <script>
                            $('.favourite').on('click', favouriteFunction);
                            function favouriteFunction(e) {
                                e.preventDefault();
                                var entryID = $(this).attr('entryID');
                                var button = $(this);
                                button.off('click');
                                $.ajax({
                                    url: "favouriteRemove.php",
                                    data: {"entryID": entryID},
                                    type: 'post',
                                    success: function (response){
                                        if (response) {
                                            button.closest("tr").remove();
                                        } else {
                                            alert('Failure to remove an entry!');
                                        }
                                    }
                                }).always(function() {
                                    button.closest("tr").remove();
                                    button.on('click', favouriteFunction);
                                });
                            };
                            $("div.star-wrapper i").on("mouseover", function () {
                                if ($(this).siblings("i.vote-recorded").length == 0) {
                                    $(this).prevAll().addBack().addClass("fas gray").removeClass("far");  
                                    $(this).nextAll().removeClass("fas gray").addClass("far");
                                } else {
                                    $(this).next().addBack().addClass("fas gray").removeClass("vote-recorded");  
                                    $(this).prevAll().addBack().addClass("fas gray").removeClass("vote-recorded");  
                                    $(this).nextAll().removeClass("fas gray").removeClass("vote-recorded").addClass("far");
                                }
                            });
                            $("div.star-wrapper i").on("click", function () {
                                let rating = $(this).prevAll().length + 1;
                                let postid = $(this).closest("div.rating-wrapper").data("id");
                                var current_rating = $('#current_rating_'+postid).text();
                                if ($(this).siblings("i.vote-recorded").length == 0) {
                                    $(this).prevAll().addBack().addClass("vote-recorded");
                                    if(current_rating != rating) {
                                        $.ajax({
                                                url: 'rating_ajax.php',
                                                type: 'post',
                                                data: {"postid":postid,"rating":rating},
                                                dataType: 'json',
                                                success: function(data){
                                                    var percentage = data['averageRating']*100/5;
                                                    if (data['result']) {
                                                        //$('#result_rating_'+postid).text('Successful Update!');
                                                        //$('#result_rating_'+postid).fadeIn();
                                                        //$('#result_rating_'+postid).fadeOut(2000);
                                                        $('#current_rating_'+postid).text(rating);
                                                    } else {
                                                        $('#result_rating_'+postid).text('Failed to Update!');
                                                        $("#result_rating_"+postid).fadeIn();
                                                        $("#result_rating_"+postid).fadeOut(2000);
                                                    }
                                                }
                                        });
                                    }
                                    
                                }
                            });
                        </script>
                    </div>
                </div>
<?php
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
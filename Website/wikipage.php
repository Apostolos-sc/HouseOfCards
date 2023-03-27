<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited     	: 08-03-2023
    //Filename          : wikipage.php
    //Version           : 1.2
    include('controller/connectDB.php');
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
                    if(isset($_GET['entry'])) {
                        //entryID was give through the Get Method
                        if(ctype_digit(strval($_GET['entry']))) {
                            //entryID is a zero or positive integer
                            $entry = WikiEntry::fetchWikiEntry($db, intval($_GET['entry']));
                            if($entry != null) {
                                if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
                                    echo generateWikiPageLoggedInUser($entry, User::fetchUserByUsername($db, $_SESSION['username']),getGameList(WikiEntry::fetchWikiEntries($db)));
                                } else {
                                    //entry exists, print information
                                    echo generateWikiPageGuestUser($entry, getGameList(WikiEntry::fetchWikiEntries($db)));
                                }
                            } else {
                                //entry returned null, i.e., it does not exist.
                                echo generateWikiPageNotExist(getGameList(WikiEntry::fetchWikiEntries($db)));
                            }
                        } else {
                            //not a digit, generate wiki page with an error message
                            echo generateWikiPageWrongEntry(getGameList(WikiEntry::fetchWikiEntries($db)));
                        }
                    } else {
                        //if entry GET wasn't set, welcome the user.
                        echo generateWikiPageWelcome(getGameList(WikiEntry::fetchWikiEntries($db)));
                    }
?>
                    </div>
                </div>
                <script>
                    $("textarea").each(function () {
                        this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                        }).on("input", function () {
                        this.style.height = 0;
                        this.style.height = (this.scrollHeight) + "px";
                    });
                    $("#commentButton").click(function () {
            	        $("#comment-message").css('display', 'none');
                        var comment_content_post = $('#comment-content-post').val();
                        var comment_entryID_post = $('#comment-entryID-post').val();

                        $.ajax({
                            url: "commentAdd.php",
                            data: {"comment-content-post": comment_content_post,
                                   "comment-entryID-post": comment_entryID_post},
                            type: 'post',
                            success: function (response)
                            {
                                if (response)
                                {
                                    location.reload();
                                } else
                                {
                                    alert("Failed to add comments !");
                                    return false;
                                }
                            }
                        });
                    });
                    $("#newCommentButton").click(function (e) {
                        e.preventDefault();
                        $("#newCommentSection").css('display', 'flex');
                        $("html").animate(
                        {
                            scrollTop: $("#newCommentSection").offset().top
                        },
                        800 //speed
                        );
                    });
                    $(".commentReplyButton").click(function (e) {
                        e.preventDefault();
                        e.stopPropagation();
                        e.stopImmediatePropagation();
                        
                        var comID = $(this).attr('commenthead');
                        $('div[commentid='+ comID + ']').css('display', 'block');
                        $("html").animate(
                        {
                            scrollTop: $('div[commentid='+ comID + ']').offset().top
                        },
                        800 //speed
                        );
                    });
                    $(".publishCommentReplyButton").click(function (e) {
                        var comID = $(this).attr('comment-reply-button-id');
                        var comment_reply_content_post = $('#comment-reply-content-post-'+ comID +'').val();
                        $.ajax({
                            url: "commentReplyAdd.php",
                            data: {"comment-content-reply-post": comment_reply_content_post,
                                   "comment-ID": comID},
                            type: 'post',
                            success: function (response)
                            {
                                if (response)
                                {
                                    location.reload();
                                } else
                                {
                                    alert("Failed to add comment reply !");
                                    return false;
                                }
                            }
                        });
                    });
                    $('#favourite').on('click', favouriteFunction);
                    function favouriteFunction(e) {
                        e.preventDefault();
                        var entryID = $(this).attr('entryID');
                        var button = $(this);
                        button.off('click');
                        if($(this).val() === 'Favourite') {
                            $.ajax({
                                url: "favouriteAdd.php",
                                data: {"entryID": entryID},
                                type: 'post',
                                success: function (response){
                                    if (response) {
                                        $('#result_favourite').text('Successful Update!');
                                        $("#result_favourite").fadeIn();
                                        $("#result_favourite").fadeOut(2000);
                                    } else {
                                        $('#result_favourite').text('Failed to Update!');
                                        $("#result_favourite").fadeIn();
                                        $("#result_favourite").fadeOut(2000);
                                    }
                                }
                            }).always(function() {
                                button.val('Remove Favourite');
                                button.on('click', favouriteFunction);
                            });
                        } else {
                            $.ajax({
                                url: "favouriteRemove.php",
                                data: {"entryID": entryID},
                                type: 'post',
                                success: function (response){
                                    if (response) {
                                        $('#result_favourite').text('Successful Update!');
                                        $("#result_favourite").fadeIn();
                                        $("#result_favourite").fadeOut(2000);
                                    } else {
                                        $('#result_favourite').text('Failed to Update!');
                                        $("#result_favourite").fadeIn();
                                        $("#result_favourite").fadeOut(2000);
                                    }
                                }
                            }).always(function() {
                                button.val('Favourite');
                                button.on('click', favouriteFunction);
                            });
                        }
                    };
                    $( "#dialog" ).dialog({
                        autoOpen: false,  
                    });
                </script>
<?php
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
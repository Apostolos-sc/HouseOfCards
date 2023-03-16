<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited     	: 16-02-2023
    //Filename          : wikipage.php
    //Version           : 1.1
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
                            echo $_GET['entry'];
                            if($entry != null) {
                                //entry exists, print information
                                echo generateWikiPageGuestUser($entry, getGameList(WikiEntry::fetchWikiEntries($db)));
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
<?php
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
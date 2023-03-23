<?php
    //Author            : Team 31
    //Date Created      : 16-02-2023
    //Last Edited     	: ----------
    //Filename          : view_functions.php
    //Version           : 0.1 - First Draft
    
    //There are some more edits that need to be done on the php classes when you guys finish them.
    //I forgot that php passes objects by reference. There it's okay instead of holding the id's of users
    //to simply hold the object itself in the classes where we store "userID" such as the Comment class.

    //Completed by Apostolos Scondrianis
    //Function that generates the View of a Wiki Page for the Guest Users
    
    function generateWikiPageGuestUser(WikiEntry $wikiPage, Array $gameList): string {
        $view = "<div id=\"card-game-body\">
                    <div id=\"wikiTitle\">
                    Card Games Wiki Pages
                    </div>
                    <div id=\"wikiContent\">
                        <table id='wiki_table'>
                            <tr class='wiki_table_row'>
                                <td id='wiki_table_title' colspan='2' >
                                    ". $wikiPage->getGameName() ." <img alt ='img' src=\"https://goldenagesolutions.ca/HouseOfCards/images/star2.png\" style=\"vertical-align:middle;height:20px;width:120px;\">
                                </td>
                            </tr>
                            <tr class='wiki_table_row' >
                                <td class='wiki_table_data_left'>
                                    # of Players :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getMinPlayers()." - ".$wikiPage->getMaxPlayers()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row' >
                                <td class='wiki_table_data_left'>
                                    Required Items :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getRequiredItems()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Objective :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getObjective()."    
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Set Up :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getSetUp()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Play :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getGamePlay()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Rules :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getRules()."                                     
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id=\"wikiNav\">
                        <div id=\"wikiNavTitle\">
                            Game List
                        </div>
                        <div id=\"wikiNavContent\">
                            <ul style=\"list-style: none;text-align:left; margin:0; padding:0;\">";
        foreach($gameList as $game) {
            $view .="<li><a href=\"https://goldenagesolutions.ca/HouseOfCards/wikipage.php?entry=".$game[0]."\">".$game[1]."</a></li>";
        }                   
        $view .= "
                            </ul>
                        </div>
                    </div>
                    <div id=\"pageInfo\">
                        Last Edit By : <a href =\"\">".$wikiPage->getLastEditedBy()->getUsername()."</a> - Last Edit On : ".$wikiPage->getLastEditedOn()->generateDateTimeString()."
                    </div>
                    <div id=\"wikiComments\">
                        <div id=\"commentHeader\">
                            Discussion Board <a href=\"\"></a>
                        </div>";
        //generate HTML code for each comment of the wiki page
        if($wikiPage->getComments() == null || sizeof($wikiPage->getComments()) == 0) {
            $view .= "No comments have been posted yet.";
        }
        foreach($wikiPage->getComments() as $comment) {
            $view .= "
                        <div class=\"comment_container\">
                            <div class=\"comment_user_info_container\">
                                <div class=\"comment_user_info_group\">
                                    ".$comment->getPostedBy()->getUserGroup()->getUserGroup()."
                                </div>
                                <div class=\"comment_user_info_image\">
                                    <img alt ='img' src=\"https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg\">
                                </div>
                                <div class=\"comment_user_info_username\">
                                    <a href=\"\">".$comment->getPostedBy()->getUsername()."</a>
                                </div>
                            </div>
                            <div class=\"comment_content_container\">
                                <div class=\"comment_content_header\">
                                    #".$comment->getPositionID()." Posted on <i>Monday, February 15th 2023, 7:15:25 PM MT</i>
                                </div>
                                <div style=\"position:relative\" class=\"comment_content_main\">
                                    ".$comment->getContent()."
                                </div>
                            </div>
                        </div>";
            //generate code for each comment reply posted to each comment of the wiki page
            foreach($comment->getCommentReplies() as $reply) {
                $view .= "
                        <div class=\"comment_reply_container\">
                            <div class=\"comment_reply_user_info_container\">
                                <div class=\"comment_reply_user_info_group\">
                                    ".$reply->getPostedBy()->getUserGroup()->getUserGroup()."
                                </div>
                                <div class=\"comment_reply_user_info_image\">
                                    <img alt ='img' src=\"https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg\">
                                </div>
                                <div class=\"comment_reply_user_info_username\">
                                    <a href=\"\">".$reply->getPostedBy()->getUsername()."</a>
                                </div>
                            </div>
                            <div class=\"comment_reply_content_container\">
                                <div class=\"comment_reply_content_header\">
                                        #".$comment->getPositionID()."-".$reply->getPositionID()." Posted on <i>".$reply->getPostedOn()->generateDateTimeString()."</i>
                                </div>
                                <div style=\"position:relative\" class=\"comment_reply_content_main\">
                                    ".$reply->getContent()."    
                                </div>
                            </div>
                        </div>        
                        ";
            }
        }
        $view .= "
                    </div>
                </div>
                ";
        return $view;
    }
    function generateWikiPageWrongEntry(Array $gameList): string {
        $view = "<div id=\"card-game-body\">
                    <div id=\"wikiTitle\">
                    Card Games Wiki Pages
                    </div>
                    <div id=\"wikiContent\">
                        An invalid entry ID has been selected. It must be a positive or zero integer.
                    </div>
                    <div id=\"wikiNav\">
                        <div id=\"wikiNavTitle\">
                            Game List
                        </div>
                        <div id=\"wikiNavContent\">
                            <ul style=\"list-style: none;text-align:left; margin:0; padding:0;\">";
        foreach($gameList as $game) {
            $view .="<li><a href=\"https://goldenagesolutions.ca/HouseOfCards/wikipage.php?entry=".$game[0]."\">".$game[1]."</a></li>";
        }                   
        $view .= "
                            </ul>
                        </div>
                    </div>
                    <div id=\"pageInfo\"> 
                    </div>
                    <div id=\"wikiComments\">
                    </div>
                </div>";
        return $view;
    }
    function generateWikiPageWelcome(Array $gameList): string {
        $view = "<div id=\"card-game-body\">
                    <div id=\"wikiTitle\">
                    Card Games Wiki Pages
                    </div>
                    <div id=\"wikiContent\">
                        Welcome to the House of Cards Wiki Page, please select one of the games from the left navigation to view its gameplay and rules.
                    </div>
                    <div id=\"wikiNav\">
                        <div id=\"wikiNavTitle\">
                            Game List
                        </div>
                        <div id=\"wikiNavContent\">
                            <ul style=\"list-style: none;text-align:left; margin:0; padding:0;\">";
        foreach($gameList as $game) {
            $view .="<li><a href=\"https://goldenagesolutions.ca/HouseOfCards/wikipage.php?entry=".$game[0]."\">".$game[1]."</a></li>";
        }                   
        $view .= "
                            </ul>
                        </div>
                    </div>
                    <div id=\"pageInfo\">
                    </div>
                    <div id=\"wikiComments\">
                    </div>
                </div>";
        return $view;
    }
    function generateWikiPageNotExist(Array $gameList): string {
        $view = "<div id=\"card-game-body\">
                    <div id=\"wikiTitle\">
                    Card Games Wiki Pages
                    </div>
                    <div id=\"wikiContent\">
                        The entry you have selected to view does not exist. Please try again.    
                    </div>
                    <div id=\"wikiNav\">
                        <div id=\"wikiNavTitle\">
                            Game List
                        </div>
                        <div id=\"wikiNavContent\">
                            <ul style=\"list-style: none;text-align:left; margin:0; padding:0;\">";
        foreach($gameList as $game) {
            $view .="<li><a href=\"https://goldenagesolutions.ca/HouseOfCards/wikipage.php?entry=".$game[0]."\">".$game[1]."</a></li>";
        }                   
        $view .= "
                            </ul>
                        </div>
                    </div>
                    <div id=\"pageInfo\">
                    </div>
                    <div id=\"wikiComments\">
                    </div>
                </div>";
        return $view;
    }

    function generateWikiPageLoggedInUser(WikiEntry $wikiPage, User $user, Array $gameList): string {
        $view = "<div id=\"card-game-body\">
                    <div id=\"wikiTitle\">
                    Card Games Wiki Pages
                    </div>
                    <div id=\"wikiContent\">
                        <table id='wiki_table'>
                            <tr class='wiki_table_row'>
                                <td id='wiki_table_title' colspan='2' >
                                    ". $wikiPage->getGameName() ." <img alt ='img' src=\"https://goldenagesolutions.ca/HouseOfCards/images/star2.png\" style=\"vertical-align:middle;height:20px;width:120px;\">
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    # of Players :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getMinPlayers()." - ".$wikiPage->getMaxPlayers()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Required Items :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getRequiredItems()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Objective :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getObjective()."    
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Set Up :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getSetUp()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Play :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getGamePlay()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Rules :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getRules()."                                     
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id=\"wikiNav\">
                        <div id=\"wikiNavTitle\">
                            Game List
                        </div>
                        <div id=\"wikiNavContent\">
                            <ul style=\"list-style: none;text-align:left; margin:0; padding:0;\">";
        foreach($gameList as $game) {
            $view .="<li><a href=\"https://goldenagesolutions.ca/HouseOfCards/wikipage.php?entry=".$game[0]."\">".$game[1]."</a></li>";
        }                   
        $view .= "
                            </ul>
                        </div>
                    </div>
                    <div id=\"pageInfo\">
                        Last Edit By : <a href=\"userpage.php?ID=".$wikiPage->getLastEditedBy()->getUserID()."\">".$wikiPage->getLastEditedBy()->getUsername()."</a> - Last Edit On : ".$wikiPage->getLastEditedOn()->generateDateTimeString()."
                    </div>
                    <div id=\"wikiComments\">
                        <div id=\"commentHeader\">
                            Discussion Board <a href=\"\"><input type='button' id='newCommentButton' value='Add Comment' />
                        </div>";
        if($wikiPage->getComments() == null || sizeof($wikiPage->getComments()) == 0) {
            $view .= "No comments have been posted yet.";
        }
        foreach($wikiPage->getComments() as $comment) {
            $view .= "
                        <div class=\"comment_container\">
                            <div class=\"comment_user_info_container\">
                                <div class=\"comment_user_info_group\">
                                    ".$comment->getPostedBy()->getUserGroup()->getUserGroup()."
                                </div>
                                <div class=\"comment_user_info_image\">
                                    <img alt ='img' src=\"https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg\">
                                </div>
                                <div class=\"comment_user_info_username\">
                                    <a href=\"userpage.php?ID=".$comment->getPostedBy()->getUserID()."\">".$comment->getPostedBy()->getUsername()."</a>
                                </div>
                            </div>
                            <div class=\"comment_content_container\">
                                <div class=\"comment_content_header\">
                                    #<span style='display:none' class='comment-span-ID'>".$comment->getCommentID()."</span>".$comment->getPositionID()." Posted on <i>".$comment->getPostedOn()->generateDateTimeString()."</i><input type='button' class='commentReplyButton' commenthead='".$comment->getCommentID()."' value='Reply' />
                                </div>
                                <div class=\"comment_content_main\">
                                    ".$comment->getContent()."
                                </div>
                            </div>
                        </div>";
            //generate code for each comment reply posted to each comment of the wiki page
            foreach($comment->getCommentReplies() as $reply) {
                $view .= "
                        <div class=\"comment_reply_container\">
                            <div class=\"comment_reply_user_info_container\">
                                <div class=\"comment_reply_user_info_group\">
                                    ".$reply->getPostedBy()->getUserGroup()->getUserGroup()."
                                </div>
                                <div class=\"comment_reply_user_info_image\">
                                    <img alt ='img' src=\"https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg\"/>
                                </div>
                                <div class=\"comment_reply_user_info_username\">
                                    <a href=\"userpage.php?ID=".$reply->getPostedBy()->getUserID()."\">".$reply->getPostedBy()->getUsername()."</a>
                                </div>
                            </div>
                            <div class=\"comment_reply_content_container\">
                                <div class=\"comment_reply_content_header\">
                                        #".$comment->getPositionID()."-".$reply->getPositionID()." Posted on <i>".$reply->getPostedOn()->generateDateTimeString()."</i>
                                </div>
                                <div style=\"position:relative\" class=\"comment_reply_content_main\">
                                    ".$reply->getContent()."    
                                </div>
                            </div>
                        </div>        
                        ";
            }
            $view .= "
            <div class=\"commentReplyPost\" comment=\"reply\" commentid=\"".$comment->getCommentID()."\">
                <div class=\"comment_reply_container\">
                    <div class=\"comment_reply_user_info_container\">
                        <div class=\"comment_reply_user_info_group\">
                            ".$user->getUserGroup()->getUserGroup()."
                        </div>
                        <div class=\"comment_reply_user_info_image\">
                            <img alt ='img' src=\"https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg\"/>
                        </div>
                        <div class=\"comment_reply_user_info_username\">
                            <a href=\"userpage.php?ID=".$user->getUserID()."\">".$user->getUsername()."</a>
                        </div>
                    </div>
                    <div class=\"comment_reply_content_container\">
                        <div class=\"comment_reply_content_header\">
                            Post a new Comment Reply
                        </div>
                        <div style=\"position:relative\" class=\"comment_reply_content_main\">
                            <form id='frm-comment-reply-".$comment->getCommentID()."'>
                                <input style='display:none' name='comment-reply-post-id-".$comment->getCommentID()."' id='comment-reply-post-id-".$comment->getCommentID()."' type='text' value='".$comment->getCommentID()."' />
                                <textarea class='auto-resize-textarea' name='comment-reply-content-post-".$comment->getCommentID()."' id='comment-reply-content-post-".$comment->getCommentID()."'
                                placeholder='Your comment Reply here'></textarea>
                                <input type='button' class='publishCommentReplyButton' comment-reply-button-id='".$comment->getCommentID()."' value='Reply' />
                                <div id='comment-message'>Comment Reply added successfully.</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> ";
            //comment "specific" block ends
        }
        $view .= "
        <div id=\"newCommentSection\" class=\"comment_container\">
            <div class=\"comment_user_info_container\">
                <div class=\"comment_user_info_group\">
                    ".$user->getUserGroup()->getUserGroup()."
                </div>
                <div class=\"comment_user_info_image\">
                    <img alt ='img' src=\"https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg\">
                </div>
                <div class=\"comment_user_info_username\">
                    <a href=\"\">".$user->getUsername()."</a>
                </div>
            </div>
            <div class=\"comment_content_container\">
                <div class=\"comment_content_header\">
                    <i>Post a new Comment.</i>
                </div>
                <div  class=\"comment_content_main\">
                    <form id='frm-comment'>
                        <input style='display:none' name='comment-entryID-post' id='comment-entryID-post' type='text' value='".$wikiPage->getEntryID()."' />
                        <textarea class='auto-resize-textarea' name='comment-content-post' id='comment-content-post'
                        placeholder='Your comment here'></textarea>
                        <input type='button' id='commentButton' value='Publish' />
                        <div id='comment-message'>Comment added successfully.</div>
                    </form>
                </div>
            </div>
        </div>";
        $view .= "
                    </div>
                </div>
                ";
        
        return $view;
    }
    //Functions below added for View Users by Alex on March 19

    function generateUserPageWrongEntry(Array $userList): string {
        $view = "<div id=\"card-game-body\">
                    <div id=\"wikiTitle\">
                    User Pages
                    </div>
                    <div id=\"wikiContent\">
                        An invalid user ID has been selected. It must be a positive or zero integer.
                    </div>
                    <div id=\"wikiNav\">
                        <div id=\"wikiNavTitle\">
                            User List
                        </div>
                        <div id=\"wikiNavContent\">
                            <ul style=\"list-style: none;text-align:left; margin:0; padding:0;\">";
        foreach($userList as $user) {
            $view .="<li><a href=\"https://goldenagesolutions.ca/HouseOfCards/userpage.php?ID=".$user[0]."\">".$user[1]."</a></li>";
        }                   
        $view .= "
                            </ul>
                        </div>
                    </div>
                    <div id=\"pageInfo\"> 
                    </div>
                    <div id=\"wikiComments\">
                    </div>
                </div>";
        return $view;
    }
    function generateUserPageWelcome(Array $userList): string {
        $view = "<div id=\"card-game-body\">
                    <div id=\"wikiTitle\">
                    User Pages
                    </div>
                    <div id=\"wikiContent\">
                       Please select a user to view their details.
                    </div>
                    <div id=\"wikiNav\">
                        <div id=\"wikiNavTitle\">
                            User List
                        </div>
                        <div id=\"wikiNavContent\">
                            <ul style=\"list-style: none;text-align:left; margin:0; padding:0;\">";
        foreach($userList as $user) {
            $view .="<li><a href=\"https://goldenagesolutions.ca/HouseOfCards/userpage.php?ID=".$user[0]."\">".$user[1]."</a></li>";
        }                   
        $view .= "
                            </ul>
                        </div>
                    </div>
                    <div id=\"pageInfo\">
                    </div>
                    <div id=\"wikiComments\">
                    </div>
                </div>";
        return $view;
    }
    function generateUserPageNotExist(Array $userList): string {
        $view = "<div id=\"card-game-body\">
                    <div id=\"wikiTitle\">
                    User Pages
                    </div>
                    <div id=\"wikiContent\">
                        The entry you have selected to view does not exist. Please try again.    
                    </div>
                    <div id=\"wikiNav\">
                        <div id=\"wikiNavTitle\">
                            User List
                        </div>
                        <div id=\"wikiNavContent\">
                            <ul style=\"list-style: none;text-align:left; margin:0; padding:0;\">";
        foreach($userList as $user) {
            $view .="<li><a href=\"https://goldenagesolutions.ca/HouseOfCards/userpage.php?ID=".$user[0]."\">".$user[1]."</a></li>";
        }                   
        $view .= "
                            </ul>
                        </div>
                    </div>
                    <div id=\"pageInfo\">
                    </div>
                    <div id=\"wikiComments\">
                    </div>
                </div>";
        return $view;
    }
    function generateUserPageGuestUser(User $user, String $favourites, String $ratings, Array $userList): string {
       // $favourites = "";
        //foreach(Favourite::fetchFavouritesByUserID($db,$user->getUserID()) as $fav ){
        $view = "<div id=\"card-game-body\">
                    <div id=\"wikiTitle\">
                    User Pages
                    </div>
                    <div id=\"wikiContent\">
                        <table id='wiki_table'>
                            <tr class='wiki_table_row'>
                                <td id='wiki_table_title' >
                                    ". $user->getUsername() ."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    First Name :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$user->getFirstName()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Last Name :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$user->getLastName()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    User Type :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$user->getUserGroup()->getUserGroup()."    
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Favourites :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$favourites."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Rated Games :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$ratings."
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id=\"wikiNav\">
                        <div id=\"wikiNavTitle\">
                            User List
                        </div>
                        <div id=\"wikiNavContent\">
                            <ul style=\"list-style: none;text-align:left; margin:0; padding:0;\">";
        foreach($userList as $user) {
            //$view .="<li><a href=\"userpage.php?entry=".$user[0]."\">".$user[1]."</a></li>"; 
            $view .="<li><a href=\"https://goldenagesolutions.ca/HouseOfCards/userpage.php?ID=".$user[0]."\">".$user[1]."</a></li>";
        }
        $view .= "
                            </ul>
                        </div>
                    </div>
                    <div id=\"pageInfo\">
                    </div>
                    <div id=\"wikiComments\">
                    </div>
                </div>";                         
        return $view;
    }
?>
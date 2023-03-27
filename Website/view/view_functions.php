<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 16-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On    : 24-03-2023
    //Filename          : view_functions.php
    //Version           : 1.0
    
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
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Favourite This Game :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ";
        if(!empty($user->getFavourites())) {
            if(array_key_exists($wikiPage->getEntryID(), $user->getFavourites())) {
                $view .= "<input type='button' id='favourite' entryID='".$wikiPage->getEntryID()."' value='Remove Favourite' />";
            } else {
                $view .= "<input type='button' id='favourite' entryID='".$wikiPage->getEntryID()."' value='Favourite' />";
            }
        } else {
            $view .= "<input type='button' id='favourite' entryID='".$wikiPage->getEntryID()."' value='Favourite' />";
        }
        if(!empty($user->getRatings())) {
            if(array_key_exists($wikiPage->getEntryID(), $user->getRatings())) {
                $rating = $user->getRatings()[$wikiPage->getEntryID()];
            } else {
                $rating = 0;
            }
        }
        $view .= "<span style='hidden;margin-left: 15px;' id='result_favourite'></span>                                
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                            <td class='wiki_table_data_left'>
                                Rate This Game :
                            </td>
                            <td class='wiki_table_data_right'>
                      
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
                            Discussion Board <input type='button' id='newCommentButton' value='Add Comment' />
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
                            <tr class='wiki_table_row_data'>
                                <td id='wiki_table_title' colspan='2'>
                                    ". $user->getUsername() ."
                                </td>
                            </tr>
                            <tr class='wiki_table_data_row'>
                                <td class='wiki_table_data_left'>
                                    User Type :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$user->getUserGroup()->getUserGroup()."    
                                </td>
                            </tr>
                            <tr class='wiki_table_row_data'>
                                <td class='wiki_table_data_left'>
                                    Favourites :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$favourites."
                                </td>
                            </tr>
                            <tr class='wiki_table_row_data'>
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

    function generateProfileView(User $user, Array $wikientries, string $ratings): string {
        $view = "
                <div id=\"card-game-body\">
                        <div id=\"wikiTitle\">
                            Profile Information Page
                        </div>
                        <div id=\"wikiContent\">
                            <table id='wiki_table'>
                            <tr class='wiki_table_row_data'>
                                <td id='wiki_table_title' colspan='2' >
                                    My Profile :
                                </td>
                            </tr>
                            <tr class='wiki_table_row_data'>
                                <td class='wiki_table_data_left'>
                                    Username :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$user->getUsername()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row_data'>
                                <td class='wiki_table_data_left'>
                                    User Group :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$user->getUserGroup()->getUserGroup()."
                                </td>
                            </tr>     
                            <tr class='wiki_table_row_data'>
                                <td class='wiki_table_data_left'>
                                    Email :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$user->getEmail()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row_data'>
                                <td class='wiki_table_data_left'>
                                    First Name :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$user->getFirstName()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row_data'>
                                <td class='wiki_table_data_left'>
                                    Last Name :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$user->getLastName()."
                                </td>
                            </tr>  
                            <tr class='wiki_table_row_data'>
                                <td class='wiki_table_data_left'>
                                    Date of Birth :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$user->getDOB()->generateDateString()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row_data'>
                                <td class='wiki_table_data_left' colspan='2'>
                                    Favourites :
                                </td>
                            </tr> ";
                            $favourites = $user->getFavourites();
                            if(!empty($favourites)) {
                                foreach($favourites as $favID => $favourite) {
                                    $view .="
                                    <tr>
                                        <td class='wiki_table_data_left'>
                                            ".$wikientries[($favourite->getEntryID())]->getGameName()."
                                        </td>
                                        <td class='wiki_table_data_right'>
                                            <input type='button' class='favourite' entryID='".$favourite->getEntryID()."' value='Remove Favourite' />
                                        </td>
                                    </tr>    
                                    ";
                                }
                            }else {
                                $view .= "
                                        <tr class='wiki_table_row_data'>
                                            <td class='wiki_table_data_left' colspan='2'>
                                                You have not favourited any games yet!
                                            </td>
                                        </tr> ";
                            }

                        $view .= "
                            <tr class='wiki_table_row_data'>
                                <td class='wiki_table_data_left'>
                                    Ratings
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$ratings."
                                </td>
                            </tr>                
                        </table>
                    </div>
                    <div id=\"wikiNav\">
                        <div id=\"wikiNavTitle\">
                            <span style=\"visibility:hidden\">testtesttest</span>
                        </div>
                        <div id=\"wikiNavContent\">
                            <span style=\"visibility:hidden\">testtesttest</span>
                        </div>
                    </div>
                    <div id=\"pageInfo\">
                    </div>
                    <div id=\"wikiComments\">
                    </div>
                </div>";  
            return $view;
    }

    function generateEditProfileView(User $user, string $message) : string {
        $view = "
        <div id=\"card-game-body\">
            <div id=\"wikiTitle\">
                Edit Profile Page
            </div>
            <div id=\"wikiContent\">
                <form id=\"edit_profile\" action='".htmlspecialchars($_SERVER['PHP_SELF '])."' method='post'>
                    <table id='wiki_table'>
                        <tr class='wiki_table_row_data'>
                            <td id='wiki_table_title' colspan='2' >
                                My Profile Information :
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Username :
                            </td>
                            <td class='wiki_table_data_right'>
                                ".$user->getUsername()."
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                User Group :
                            </td>
                            <td class='wiki_table_data_right'>
                                ".$user->getUserGroup()->getUserGroup()."
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Password :
                            </td>
                            <td class='wiki_table_data_right'>
                                <div class=\"password_container\" style=\"position:relative;\">
                                    <input class='input-password-field' name='password' type='password' id=\"password\" value='".$user->getPassword()."' />
                                    <i class=\"fas fa-eye-slash\" style=\"color: #333333; cursor:pointer; position:absolute; margin-top:4px; margin-left:-25px;\" id=\"eye\"></i>
                                </div>
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Repeat Password :
                            </td>
                            <td class='wiki_table_data_right'>
                                <div class=\"password_container\" style=\"position:relative;\">
                                    <input class='input-password-field' name='repeat_password' id=\"repeat_password\" type='password' value='".$user->getPassword()."' />
                                    <i class=\"fas fa-eye-slash\" style=\"color: #333333; cursor:pointer; position:absolute; margin-top:4px; margin-left:-25px;\" id=\"repeat_eye\"></i>
                                </div>
                            </td>
                        </tr>   
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Email :
                            </td>
                            <td class='wiki_table_data_right'>
                                <div class=\"password_container\" style=\"position:relative;\">
                                    <input class='input-password-field' name='email' id=\"email\" type='text' value='".$user->getEmail()."' />
                                    <i class=\"fas fa-check\" style=\"color: #333333; cursor:pointer; position:absolute; margin-top:4px; margin-left:-25px;\" id=\"email_check\"></i>
                                </div>
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Repeat Email :
                            </td>
                            <td class='wiki_table_data_right'>
                                <div class=\"password_container\" style=\"position:relative;\">
                                    <input class='input-password-field' name='repeat_email' id=\"repeat_email\" type='text' value='".$user->getEmail()."' />
                                    <i class=\"fas fa-check\" style=\"color: #333333; cursor:pointer; position:absolute; margin-top:4px; margin-left:-25px;\" id=\"repeat_email_check\"></i>
                                </div>
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                First Name :
                            </td>
                            <td class='wiki_table_data_right'>
                                <input class='input-fields' name='first_name' type='text' value='".$user->getFirstName()."' />
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Last Name :
                            </td>
                            <td class='wiki_table_data_right'>
                            <input class='input-fields' name='last_name' type='text' value='".$user->getLastName()."' />
                            </td>
                        </tr>  
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Date of Birth :
                            </td>
                            <td class='wiki_table_data_right'>
                                <input class ='input-fields' name='date' type='date' value='".$user->getDOB()->generateDateString()."' min='1940-01-01' max='2009-12-31' />
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='table_players_data' colspan='2'>
                                <input type ='submit' class='submit-inputs' value='Save Changes' />
                            </td>
                        </tr>          
                    </table>
                </form>
            </div>
            <div id=\"wikiNav\">
                <div id=\"wikiNavTitle\">
                    <span style=\"visibility:hidden\">testtesttest</span>
                </div>
                <div id=\"wikiNavContent\">
                    <span style=\"visibility:hidden\">testtesttest</span>
                </div>
            </div>
            <div id=\"pageInfo\">
                ".$message."
            </div>
            <div id=\"wikiComments\">
            </div>
        </div>";  
        return $view;
    }
    function generateRegisterPage(string $message) : string {
        $view = "
        <div id=\"card-game-body\">
            <div id=\"wikiTitle\">
                Register Page
            </div>
            <div id=\"wikiContent\">
                <form id=\"register\" action='".htmlspecialchars($_SERVER['PHP_SELF '])."' method='post'>
                ";
        $view .="
                    <table id='wiki_table'>
                        <tr class='wiki_table_row_data'>
                            <td id='wiki_table_title' colspan='2' >
                                Register
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Username :
                            </td>
                            <td class='wiki_table_data_right'>
                            <input class='input-password-field' name='username' type='text' id=\"username\" value='' />
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Password :
                            </td>
                            <td class='wiki_table_data_right'>
                                <div class=\"password_container\" style=\"position:relative;\">
                                    <input class='input-password-field' name='password' type='password' id=\"password\" value='' />
                                    <i class=\"fas fa-eye-slash\" style=\"color: #333333; cursor:pointer; position:absolute; margin-top:4px; margin-left:-25px;\" id=\"eye\"></i>
                                </div>
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Repeat Password :
                            </td>
                            <td class='wiki_table_data_right'>
                                <div class=\"password_container\" style=\"position:relative;\">
                                    <input class='input-password-field' name='repeat_password' id=\"repeat_password\" type='password' value='' />
                                    <i class=\"fas fa-eye-slash\" style=\"color: #333333; cursor:pointer; position:absolute; margin-top:4px; margin-left:-25px;\" id=\"repeat_eye\"></i>
                                </div>
                            </td>
                        </tr>   
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Email :
                            </td>
                            <td class='wiki_table_data_right'>
                                <div class=\"password_container\" style=\"position:relative;\">
                                    <input class='input-password-field' name='email' id=\"email\" type='text' value='' />
                                    <i class=\"fas fa-times-circle\" style=\"color: #333333; cursor:pointer; position:absolute; margin-top:4px; margin-left:-25px;\" id=\"email_check\"></i>
                                </div>
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Repeat Email :
                            </td>
                            <td class='wiki_table_data_right'>
                                <div class=\"password_container\" style=\"position:relative;\">
                                    <input class='input-password-field' name='repeat_email' id=\"repeat_email\" type='text' value='' />
                                    <i class=\"fas fa-times-circle\" style=\"color: #333333; cursor:pointer; position:absolute; margin-top:4px; margin-left:-25px;\" id=\"repeat_email_check\"></i>
                                </div>
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                First Name :
                            </td>
                            <td class='wiki_table_data_right'>
                                <input class='input-fields' name='first_name' id='first_name' 'type='text' value='' />
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Last Name :
                            </td>
                            <td class='wiki_table_data_right'>
                                <input class='input-fields' name='last_name' id='last_name' type='text' value='' />
                            </td>
                        </tr>  
                        <tr class='wiki_table_row_data'>
                            <td class='wiki_table_data_left'>
                                Date of Birth :
                            </td>
                            <td class='wiki_table_data_right'>
                                <input class ='input-fields' name='date' type='date' value='' min='1940-01-01' max='2009-12-31' />
                            </td>
                        </tr>
                        <tr class='wiki_table_row_data'>
                            <td class='table_players_data' colspan='2'>
                                <input type ='submit' class='submit-inputs' value='Register' />
                            </td>
                        </tr>          
                    </table>
                </form>
            </div>
            <div id=\"wikiNav\">
                <div id=\"wikiNavTitle\">
                    <span style=\"visibility:hidden\">testtesttest</span>
                </div>
                <div id=\"wikiNavContent\">
                    <span style=\"visibility:hidden\">testtesttest</span>
                </div>
            </div>
            <div id=\"pageInfo\">
                ".$message."
            </div>
            <div id=\"wikiComments\">
            </div>
        </div>";  
        return $view;
    }
    function generateSuccessfulRegisterPage(User $user) : string {
        $view = "
        <div id=\"card-game-body\">
            <div id=\"wikiTitle\">
                Register Page
            </div>
            <div id=\"wikiContent\">
                <table id='wiki_table'>
                    <tr class='wiki_table_row_data'>
                        <td id='wiki_table_title' colspan='2' >
                            Register
                        </td>
                    </tr>
                    <tr class='wiki_table_row_data'>
                        <td class='wiki_table_data_left'>
                            Username :
                        </td>
                        <td class='wiki_table_data_right'>
                            ".$user->getUsername()."
                        </td>
                    </tr>
                    <tr class='wiki_table_row_data'>
                        <td class='wiki_table_data_left'>
                            Password :
                        </td>
                        <td class='wiki_table_data_right'>
                            <div class=\"password_container\" style=\"position:relative;\">
                                <input class='input-password-field' name='password' type='password' id=\"password\" value='".$user->getPassword()."' />
                                <i class=\"fas fa-eye-slash\" style=\"color: #333333; cursor:pointer; position:absolute; margin-top:4px; margin-left:-25px;\" id=\"eye\"></i>
                            </div>
                        </td>
                    </tr>
                    <tr class='wiki_table_row_data'>
                        <td class='wiki_table_data_left'>
                            Email :
                        </td>
                        <td class='wiki_table_data_right'>
                            ".$user->getEmail()."
                        </td>
                    </tr>
                    <tr class='wiki_table_row_data'>
                        <td class='wiki_table_data_left'>
                            First Name :
                        </td>
                        <td class='wiki_table_data_right'>
                            ".$user->getFirstName()."
                        </td>
                    </tr>
                    <tr class='wiki_table_row_data'>
                        <td class='wiki_table_data_left'>
                            Last Name :
                        </td>
                        <td class='wiki_table_data_right'>
                            ".$user->getLastName()."
                        </td>
                    </tr>  
                    <tr class='wiki_table_row_data'>
                        <td class='wiki_table_data_left'>
                            Date of Birth :
                        </td>
                        <td class='wiki_table_data_right'>
                            ".$user->getDOB()->generateDateString()."
                        </td>
                    </tr>       
                </table>
            </div>
            <div id=\"wikiNav\">
                <div id=\"wikiNavTitle\">
                    <span style=\"visibility:hidden\">testtesttest</span>
                </div>
                <div id=\"wikiNavContent\">
                    <span style=\"visibility:hidden\">testtesttest</span>
                </div>
            </div>
            <div id=\"pageInfo\">
                You have successfully registered!
            </div>
            <div id=\"wikiComments\">
            </div>
        </div>";  
        return $view;
    }
    function generateLoginPage(string $message) : string {
        $view = 
            "<div id=\"card-game-body\">
                <div id=\"wikiTitle\">
                    Login Page
                </div>
                <div id=\"wikiContent\">
                    <table id='wiki_table'>
                        <tr class='wiki_table_row'>
                            <td class='wiki_table_data_left' id='wiki_table_title' colspan='2' >
                                Login
                            </td>
                        </tr>
                        <form action='login.php' method='post'>
                        <tr class='wiki_table_row'>
                            <td class='wiki_table_data_left'>
                                Username :
                            </td>
                            <td class='wiki_table_data_right'>
                                <input class='input-fields' onfocus=\"this.value=''\" name='username' type='text' value='Enter Username' />
                            </td>
                        </tr>
                        <tr class='wiki_table_row'>
                            <td class='wiki_table_data_left'>
                                Password :
                            </td>
                            <td class='wiki_table_data_right'>
                                <input class='input-fields' onfocus=\"this.value=''\" name='password' type='password' value='password' />
                            </td>
                        </tr>
                        <tr class='wiki_table_row'>
                            <td class='wiki_table_data' colspan='2'>
                                <input type ='submit' class='submit-inputs' value='Login' />
                            </td>
                        </tr>
                        </form>
                    </table>
                </div>
                <div id=\"wikiNav\">
                    <div id=\"wikiNavTitle\">
                        <span style=\"visibility:hidden\">testtesttest</span>
                    </div>
                    <div id=\"wikiNavContent\">
                        <span style=\"visibility:hidden\">testtesttest</span>
                    </div>
                </div>
                <div id=\"pageInfo\">
                    ".$message."
                </div>
                <div id=\"wikiComments\">
                </div>
            </div>";
        return $view;
    }
    function generateCreateWikiPageView(string $message) : string {
        $view = "<div id=\"card-game-body\">
                    <div id=\"wikiTitle\">
                        Administration Panel
                    </div>
                    <div id=\"wikiContent\">
                        <form id=\"createWikiEntry\" action=\"createpage.php\" method=\"post\">
                            <table id='wiki_table'>
                                <tr class='wiki_table_row'>
                                    <td id='wiki_table_title' colspan='2' >
                                        Create Wiki Page Entry
                                    </td>
                                </tr>
                                <tr class='wiki_table_row' >
                                    <td class='wiki_table_data_left'>
                                        Game Name :
                                    </td>
                                    <td class='wiki_table_data_right'>
                                    <input class='input-password-field' name='gameName' type='text' id=\"gameName\" value='' />
                                    </td>
                                </tr>
                                <tr class='wiki_table_row' >
                                    <td class='wiki_table_data_left'>
                                        # of Minimum Players :
                                    </td>
                                    <td class='wiki_table_data_right'>
                                        <input class='input-password-field' name='minPlayers' type='text' id=\"minPlayers\" value='' />
                                    </td>
                                </tr>
                                <tr class='wiki_table_row' >
                                    <td class='wiki_table_data_left'>
                                        # of Maximum Players :
                                    </td>
                                    <td class='wiki_table_data_right'>
                                        <input class='input-password-field' name='maxPlayers' type='text' id=\"maxPlayers\" value='' />
                                    </td>
                                </tr>
                                <tr class='wiki_table_row' >
                                    <td class='wiki_table_data_left'>
                                        Required Items :
                                    </td>
                                    <td class='wiki_table_data_right'>
                                    <textarea class='auto-resize-textarea' name='requiredItems' id='requiredItems'
                                    placeholder='Required Items Description Here'></textarea>
                                    </td>
                                </tr>
                                <tr class='wiki_table_row'>
                                    <td class='wiki_table_data_left'>
                                        Objective :
                                    </td>
                                    <td class='wiki_table_data_right'>
                                        <textarea class='auto-resize-textarea' name='objective' id='objective'
                                        placeholder='Objective Description Here'></textarea>
                                    </td>
                                </tr>
                                <tr class='wiki_table_row'>
                                    <td class='wiki_table_data_left'>
                                        Set Up :
                                    </td>
                                    <td class='wiki_table_data_right'>
                                        <textarea class='auto-resize-textarea' name='setUp' id='setUp'
                                        placeholder='Set Up Description Here'></textarea>
                                    </td>
                                </tr>
                                <tr class='wiki_table_row'>
                                    <td class='wiki_table_data_left'>
                                        Play :
                                    </td>
                                    <td class='wiki_table_data_right'>
                                        <textarea class='auto-resize-textarea' name='gamePlay' id='gamePlay'
                                        placeholder='Game Play Description Here'></textarea>
                                    </td>
                                </tr>
                                <tr class='wiki_table_row'>
                                    <td class='wiki_table_data_left'>
                                        Rules :
                                    </td>
                                    <td class='wiki_table_data_right'>
                                        <textarea class='auto-resize-textarea' name='rules' id='rules'
                                        placeholder='Rules Desciption Here'></textarea>                               
                                    </td>
                                </tr>
                                <tr class='wiki_table_row'>
                                    <td class='wiki_table_data_left' colspan='2'>
                                        <input type ='submit' class='submit-inputs' value='Create Page' />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div id=\"wikiNav\">
                        <div id=\"wikiNavTitle\">
                            <span style=\"visibility:hidden\">testtesttest</span>
                        </div>
                        <div id=\"wikiNavContent\">
                            <span style=\"visibility:hidden\">testtesttest</span>
                        </div>
                    </div>
                    <div id=\"pageInfo\">
                        ".$message."
                    </div>
                    <div id=\"wikiComments\">
                    </div>
                </div>
                ";
        return $view;
    }

    function generateSuccessfulCreateWikiPageView(WikiEntry $entry) : string {
        $view = "<div id=\"card-game-body\">
                    <div id=\"wikiTitle\">
                        Administration Panel
                    </div>
                    <div id=\"wikiContent\">
                        <table id='wiki_table'>
                            <tr class='wiki_table_row'>
                                <td id='wiki_table_title' colspan='2' >
                                    Create Wiki Page Entry
                                </td>
                            </tr>
                            <tr class='wiki_table_row' >
                                <td class='wiki_table_data_left'>
                                    Game Name :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$entry->getGameName()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row' >
                                <td class='wiki_table_data_left'>
                                    # of Minimum Players :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$entry->getMinPlayers()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row' >
                                <td class='wiki_table_data_left'>
                                    # of Maximum Players :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$entry->getMaxPlayers()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row' >
                                <td class='wiki_table_data_left'>
                                    Required Items :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$entry->getRequiredItems()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Objective :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$entry->getObjective()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Set Up :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$entry->getSetUp()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Play :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$entry->getGamePlay()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Rules :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$entry->getRules()."                              
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id=\"wikiNav\">
                        <div id=\"wikiNavTitle\">
                            <span style=\"visibility:hidden\">testtesttest</span>
                        </div>
                        <div id=\"wikiNavContent\">
                            <span style=\"visibility:hidden\">testtesttest</span>
                        </div>
                    </div>
                    <div id=\"pageInfo\">
                        Successful Creation of the wiki entry!
                    </div>
                    <div id=\"wikiComments\">
                    </div>
                </div>";
        return $view;
    }
?>
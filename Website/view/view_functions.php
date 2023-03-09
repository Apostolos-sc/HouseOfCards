<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 16-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited On    : 08-03-2023
    //Filename          : view_functions.php
    //Version           : 0.2 - WikiPage View Complete
    
    //There are some more edits that need to be done on the php classes when you guys finish them.
    //I forgot that php passes objects by reference. There it's okay instead of holding the id's of users
    //to simply hold the object itself in the classes where we store "userID" such as the Comment class.

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
                                    ". $wikiPage->getGameName() ." <img src=\"https://goldenagesolutions.ca/HouseOfCards/images/star2.png\" style=\"vertical-align:middle;height:20px;width:120px;\"/>
                                </td>
                            </tr>
                            <tr class='wiki_table_row' colspan=2>
                                <td class='wiki_table_data_left'>
                                    # of Players :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getMinPlayers()." - ".$wikiPage->getMaxPlayers()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row' colspan=2>
                                <td class='wiki_table_data_left'>
                                    Required Items :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getRequiredItems()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'colspan=2>
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
                            <tr class='wiki_table_row' colspan=2>
                                <td class='wiki_table_data_left'>
                                    Play :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage->getGamePlay()."
                                </td>
                            </tr>
                            <tr class='wiki_table_row' colspan=2>
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
                            <ul>
                        </div>
                    </div>
                    <div id=\"pageInfo\">
                        Last Edit By : <a href>".$wikiPage->getLastEditedBy()->getUsername()."</a> - Last Edit On : ".$wikiPage->getLastEditedOn()->generateDateTimeString()."
                    </div>
                    <div id=\"wikiComments\">
                        <div id=\"commentHeader\">
                            Discussion Board <a href=\"\"><img style=\"position: absolute; bottom: 0; right: 0; height:30px; width:30px;\" src=\"https://goldenagesolutions.ca/HouseOfCards/images/reply.png\"/></a>
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
                                    <img src=\"https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg\"/>
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
                                    <a href=\"\"><img style=\"position: absolute; bottom: 0; right: 0; height:30px; width:30px;\" src=\"https://goldenagesolutions.ca/HouseOfCards/images/reply.png\"/></a>
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
                                    <img src=\"https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg\"/>
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
                            <ul>
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
                            <ul>
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
                            <ul>
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
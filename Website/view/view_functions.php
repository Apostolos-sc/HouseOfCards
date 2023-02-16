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
    function generateWikiPageGuestUser(WikiPage $wikiPage, array $gameList): string {
        $view = "<div id=\"card-game-body\">
                    <div id=\"wikiTitle\">
                    Card Games Wiki Pages
                    </div>
                    <div id=\"wikiContent\">
                        <table id='wiki_table'>
                            <tr class='wiki_table_row'>
                                <td id='wiki_table_title' colspan='2' >
                                    ".$wikiPage.gameName." <img src=\"https://goldenagesolutions.ca/HouseOfCards/images/star2.png\" style=\"vertical-align:middle;height:20px;width:120px;\"/>
                                </td>
                            </tr>
                            <tr class='wiki_table_row' colspan=2>
                                <td class='wiki_table_data_left'>
                                    # of Players :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage.minPlayers." - ".$wikiPage.maxPlayers."
                                </td>
                            </tr>
                            <tr class='wiki_table_row' colspan=2>
                                <td class='wiki_table_data_left'>
                                    Required Items :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage.requiredItems."
                                </td>
                            </tr>
                            <tr class='wiki_table_row'colspan=2>
                                <td class='wiki_table_data_left'>
                                    Objective :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage.objective."    
                                </td>
                            </tr>
                            <tr class='wiki_table_row'>
                                <td class='wiki_table_data_left'>
                                    Set Up :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage.setUp."
                                </td>
                            </tr>
                            <tr class='wiki_table_row' colspan=2>
                                <td class='wiki_table_data_left'>
                                    Play :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage.gamePlay."
                                </td>
                            </tr>
                            <tr class='wiki_table_row' colspan=2>
                                <td class='wiki_table_data_left'>
                                    Rules :
                                </td>
                                <td class='wiki_table_data_right'>
                                    ".$wikiPage.gameplay."                                     
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
            $view = $view + "<li><a href=\"\">".$game."</a></li>";
        }                   
        $view = $view + "
                            <ul>
                        </div>
                    </div>
                    <div id=\"pageInfo\">
                        Last Edit By : <a href>".$wikiPage.LastEditedBy.username."</a> - Last Edit On : ".$wikiPage.LastEditOn.generateDateTimeString()."
                    </div>
                    <div id=\"wikiComments\">
                        <div id=\"commentHeader\">
                            Discussion Board <a href=\"\"><img style=\"position: absolute; bottom: 0; right: 0; height:30px; width:30px;\" src=\"https://goldenagesolutions.ca/HouseOfCards/images/reply.png\"/></a>
                        </div>";
        //generate HTML code for each comment of the wiki page
        foreach($wikiPage.comments as $comment) {
            $view = $view + "
                        <div class=\"comment_container\">
                            <div class=\"comment_user_info_container\">
                                <div class=\"comment_user_info_group\">
                                    ".$comment.user.userType.userClass."
                                </div>
                                <div class=\"comment_user_info_image\">
                                    <img src=\"https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg\"/>
                                </div>
                                <div class=\"comment_user_info_username\">
                                    <a href=\"\">".$comment.user.username."</a>
                                </div>
                            </div>
                            <div class=\"comment_content_container\">
                                <div class=\"comment_content_header\">
                                    #".$comment.positionID." Posted on <i>Monday, February 15th 2023, 7:15:25 PM MT</i>
                                </div>
                                <div style=\"position:relative\" class=\"comment_content_main\">
                                    ".$comment.content."
                                    <a href=\"\"><img style=\"position: absolute; bottom: 0; right: 0; height:30px; width:30px;\" src=\"https://goldenagesolutions.ca/HouseOfCards/images/reply.png\"/></a>
                                </div>
                            </div>
                        </div>";
            //generate code for each comment reply posted to each comment of the wiki page
            foreach($comment.replies as $reply) {
                $view = $view + "
                        <div class=\"comment_reply_container\">
                            <div class=\"comment_reply_user_info_container\">
                                <div class=\"comment_reply_user_info_group\">
                                    ".$reply.user.userGroup.userClass."
                                </div>
                                <div class=\"comment_reply_user_info_image\">
                                    <img src=\"https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg\"/>
                                </div>
                                <div class=\"comment_reply_user_info_username\">
                                    <a href=\"\">".$reply.user.username."</a>
                                </div>
                            </div>
                            <div class=\"comment_reply_content_container\">
                                <div class=\"comment_reply_content_header\">
                                        #".$comment.positionID."-".$reply.positionID." Posted on <i>".$reply.postedDate."</i>
                                </div>
                                <div style=\"position:relative\" class=\"comment_reply_content_main\">
                                    ".$reply.content."    
                                </div>
                            </div>
                        </div>        
                        ";
            }
        }
        $view = $view+ "
                    </div>
                </div>
                /*

                */";
        return $view;
    }
?>
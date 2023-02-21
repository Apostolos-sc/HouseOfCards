<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited     	: 16-02-2023
    //Filename          : wikipage.php
    //Version           : 1.1
    include 'controller/connectDB.php';
    include 'controller/header.php';
    include 'controller/left-menu.php';
?>
                <div class="center">
                    <div id="center-content">
                        <div id="card-game-body">
                            <div id="wikiTitle">
                            Card Games Wiki Pages
                            </div>
                            <div id="wikiContent">
                                <table id='wiki_table'>
                                    <tr class='wiki_table_row'>
                                        <td id='wiki_table_title' colspan='2' >
                                            Thirty One <img src="https://goldenagesolutions.ca/HouseOfCards/images/star2.png" style="vertical-align:middle;height:20px;width:120px;"/>
                                        </td>
                                    </tr>
                                    <tr class='wiki_table_row' colspan=2>
                                        <td class='wiki_table_data_left'>
                                            # of Players :
                                        </td>
                                        <td class='wiki_table_data_right'>
                                            2+
                                        </td>
                                    </tr>
                                    <tr class='wiki_table_row' colspan=2>
                                        <td class='wiki_table_data_left'>
                                            Required Items :
                                        </td>
                                        <td class='wiki_table_data_right'>
                                            52 cards deck
                                        </td>
                                    </tr>
                                    <tr class='wiki_table_row'colspan=2>
                                        <td class='wiki_table_data_left'>
                                            Objective :
                                        </td>
                                        <td class='wiki_table_data_right'>
                                            To win, a player must obtain a hand which is nearest to a total of 31 in cards of one suit during the showdown.
                                        </td>
                                    </tr>
                                    <tr class='wiki_table_row'>
                                        <td class='wiki_table_data_left'>
                                            Set Up :
                                        </td>
                                        <td class='wiki_table_data_right'>
                                            Deal three cards face down to each player and the rest of the deck is placed between all players with
                                            additional room for a discard pile.
                                        </td>
                                    </tr>
                                    <tr class='wiki_table_row' colspan=2>
                                        <td class='wiki_table_data_left'>
                                            Play :
                                        </td>
                                        <td class='wiki_table_data_right'>
                                            The player to the left of the dealer may start the play. During a players turn, the player can choose to 
                                            pick a card from the deck or discard pile and then they must discard a card. 

                                            When a player is comfortable with their hand, they may call for a showdown by knocking on the table. Each 
                                            player (not including the one who knocked) will have one more turn to try and improve their hand. The player 
                                            with the lowest hand loses the round, and if the player who called for the showdown has the lowest hand, it 
                                            counts as 2 losses. After losing 4 times, the player is out of the game. The last player left wins the game.
                                        </td>
                                    </tr>
                                    <tr class='wiki_table_row' colspan=2>
                                        <td class='wiki_table_data_left'>
                                            Rules :
                                        </td>
                                        <td class='wiki_table_data_right'>
                                            Face cards count for 10 points, Ace cards count for 11 points, and numbered cards count for their respective 
                                            number value. A three of a kind is worth 30 points regardless of the card value.
                                            (Optional Rules)
                                            A hand greater than 31 will not be counted during the showdown.                                        
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div id="wikiNav">
                                <div id="wikiNavTitle">
                                    Game List
                                </div>
                                <div id="wikiNavContent">
                                    <ul style="list-style: none;text-align:left; margin:0; padding:0;">
                                        <li><a href="">Go Fish</a></li>
                                        <li><a href="">Blackjack</a></li>
                                        <li><a href="">Crazy Eights</a></li>
                                        <li><a href="">Poker</a></li>
                                        <li><a href="">Solitaire</a></li>
                                        <li><a href="">War</a></li>
                                        <li><a href="">Thirty-One</a></li>
                                        <li><a href="">Big Two</a></li>
                                        <li><a href="">Trash</a></li>
                                        <li><a href="">Palace</a></li>
                                        <li><a href="">Snap</a></li>
                                        <li><a href="">Speed</a></li>
                                        <li><a href="">Rum</a></li>
                                        <li><a href="">Six Card Gold</a></li>
                                        <li><a href="">Cheat</a></li>
                                        <li><a href="">Uno</a></li>
                                        <li><a href="">Cards Against Holder</a></li>
                                    <ul>
                                </div>
                            </div>
                            <div id="pageInfo">
                                Last Edit By : <a href>TestUser</a> - Last Edit On : 15/02/2023 - 15:35:25
                            </div>
                            <div id="wikiComments">
                                <div id="commentHeader">
                                    Discussion Board <a href=""><img style="position: absolute; bottom: 0; right: 0; height:30px; width:30px;" src="https://goldenagesolutions.ca/HouseOfCards/images/reply.png"/></a>
                                </div>
                                <div class="comment_container">
                                    <div class="comment_user_info_container">
                                        <div class="comment_user_info_group">
                                            Administrator
                                        </div>
                                        <div class="comment_user_info_image">
                                            <img src="https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg"/>
                                        </div>
                                        <div class="comment_user_info_username">
                                            <a href="">John Doe</a>
                                        </div>
                                    </div>
                                    <div class="comment_content_container">
                                        <div class="comment_content_header">
                                            #1 Posted on <i>Monday, February 15th 2023, 7:15:25 PM MT</i>
                                        </div>
                                        <div style="position:relative" class="comment_content_main">
                                            This game was so great. Me and my family plays this game every day. It is very fast paced and requires a lot of focus.
                                            <a href=""><img style="position: absolute; bottom: 0; right: 0; height:30px; width:30px;" src="https://goldenagesolutions.ca/HouseOfCards/images/reply.png"/></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment_reply_container">
                                    <div class="comment_reply_user_info_container">
                                        <div class="comment_reply_user_info_group">
                                            User
                                        </div>
                                        <div class="comment_reply_user_info_image">
                                            <img src="https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg"/>
                                        </div>
                                        <div class="comment_reply_user_info_username">
                                            <a href="">Jeff Bozo</a>
                                        </div>
                                    </div>
                                    <div class="comment_reply_content_container">
                                        <div class="comment_reply_content_header">
                                                #1.1 Posted on <i>Tuesday, February 16th 2023, 7:15:25 PM MT</i>
                                        </div>
                                        <div style="position:relative" class="comment_reply_content_main">
                                            I disagree with you John Doe. This game is fairly boring and the action is just not challenging enough for me and my friends.
                                        </div>
                                    </div>
                                </div>
                                <div class="comment_reply_container">
                                    <div class="comment_reply_user_info_container">
                                        <div class="comment_reply_user_info_group">
                                            User
                                        </div>
                                        <div class="comment_reply_user_info_image">
                                            <img src="https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg"/>
                                        </div>
                                        <div class="comment_reply_user_info_username">
                                            <a href="">Puppet Lover</a>
                                        </div>
                                    </div>
                                    <div class="comment_reply_content_container">
                                        <div class="comment_reply_content_header">
                                                #1.2 Posted on <i>Tuesday, February 16th 2023, 9:15:25 PM MT</i>
                                        </div>
                                        <div style="position:relative" class="comment_content_main">
                                            I'd rather be fishing than playing this.
                                        </div>
                                    </div>
                                </div>
                                <div class="comment_container">
                                    <div class="comment_user_info_container">
                                        <div class="comment_user_info_group">
                                            Moderator
                                        </div>
                                        <div class="comment_user_info_image">
                                            <img src="https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg"/>
                                        </div>
                                        <div class="comment_user_info_username">
                                            <a href="">Tarnished Pride</a>
                                        </div>
                                    </div>
                                    <div class="comment_content_container">
                                        <div class="comment_content_header">
                                            #2 Posted on <i>Thursday, February 17th 2023, 3:15:25 PM MT</i>
                                        </div>
                                        <div style="position:relative" class="comment_content_main">
                                            Well, i think Blackjack is more fun than this.
                                            <a href=""><img style="position: absolute; bottom: 0; right: 0; height:30px; width:30px;" src="https://goldenagesolutions.ca/HouseOfCards/images/reply.png"/></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment_reply_container">
                                    <div class="comment_reply_user_info_container">
                                        <div class="comment_reply_user_info_group">
                                            User
                                        </div>
                                        <div class="comment_reply_user_info_image">
                                            <img src="https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg"/>
                                        </div>
                                        <div class="comment_reply_user_info_username">
                                            <a href="">Pesky Bugger</a>
                                        </div>
                                    </div>
                                    <div class="comment_reply_content_container">
                                        <div class="comment_reply_content_header">
                                                #2.1 Posted on <i>Thursday February 17th 2023, 9:15:25 PM MT</i>
                                        </div>
                                        <div style="position:relative" class="comment_content_main">
                                            This is a fun place to visit. Good community.
                                        </div>
                                    </div>
                                </div>
                                <div class="comment_reply_container">
                                    <div class="comment_reply_user_info_container">
                                        <div class="comment_reply_user_info_group">
                                            Moderator
                                        </div>
                                        <div class="comment_reply_user_info_image">
                                            <img src="https://goldenagesolutions.ca/HouseOfCards/images/beans.jpg"/>
                                        </div>
                                        <div class="comment_reply_user_info_username">
                                            <a href="">Transient Love</a>
                                        </div>
                                    </div>
                                    <div class="comment_reply_content_container">
                                        <div class="comment_reply_content_header">
                                                #2.2 Posted on <i>Friday, February 18th 2023, 9:15:25 PM MT</i>
                                        </div>
                                        <div style="position:relative" class="comment_content_main">
                                            Testing Reply Comment System
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
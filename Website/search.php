<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited     	: 09-03-2023
    //Filename          : search.php
    //Version           : 1.0
    include 'controller/connectDB.php';
    include 'controller/controller_functions.php';
    include('model/favourite.php');
    include('model/user.php');
    include('model/wikientry.php');
    include('model/rating.php');
    include('model/comment.php');
    include('model/CommentReply.php');
    include('model/userType.php');
    include('model/date.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $gameName = test_input($_POST["gameName"]);
        $result = WikiEntry::fetchWikiEntryByName($db, $gameName);
        if($result != null) {
            ?>
            <script type="text/javascript">
            window.location.assign("<? echo "http://goldenagesolutions.ca/HouseOfCards/wikipage.php?entry=".$result->getEntryID(); ?>");
            </script> 
            <?
        }
    }
    include 'controller/header.php';
    include 'controller/left-menu.php';
    /*Comparisons in php are important. Here is a little note.
                empty    is_null 
               ==null  ===null  isset   array_key_exists
        ϕ     | T     |   T   |   F   |   F   
        null  |   T   |   T   |   F   |   T   
        ""    |   T   |   F   |   T   |   T   
        []    |   T   |   F   |   T   |   T
        0     |   T   |   F   |   T   |   T      
        false |   T   |   F   |   T   |   T   
        true  |   F   |   F   |   T   |   T   
        1     |   F   |   F   |   T   |   T   
        \0    |   F   |   F   |   T   |   T 
    */
?>
                <div class="center">
                    <div id="center-content">
                        <h1>Search a Card Game</h1> (not case sensitive)
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                           if($result === null) {
                                echo "No result was found. Try searching for a different game!";
                                echo "
                                <form action='".htmlspecialchars($_SERVER['PHP_SELF '])."' method='post'>
                                    <input class='input-fields' onfocus=\"this.value=''\" name='gameName' type='text' value='Enter Game Name' />
                                    <input type ='submit' class='submit-inputs' value='Search' />
                                </form>
                                ";
                            }
                        } else {
                            echo "
                                <form action='".htmlspecialchars($_SERVER['PHP_SELF '])."' method='post'>
                                    <input class='input-fields' onfocus=\"this.value=''\" name='gameName' type='text' value='Enter Game Name' />
                                    <input type ='submit' class='submit-inputs' value='Search' />
                                </form>
                            ";
                        }?>
                    </div>
                </div>
<?php
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
<?php
    //Author            : Apostolos Scondrianis / Alexander Sembrat
    //Date Created      : 19-03-2023
    //Last Edited     	: 19-03-2023
    //Filename          : usersearch.php
    //Version           : 1.0
    include 'controller/connectDB.php';
    include 'controller/controller_functions.php';
    include 'model/wikientry.php';
    include 'model/user.php';
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
                        <h1>Search a User</h1> (not case sensitive)
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $userName = test_input($_POST["userName"]);
                            $result = User::searchUserByName($db, $userName);
                            if($result != null && sizeof($result) > 0) {
                                echo "A user has been found. Click on the link to view their information : ";
                                echo "<a href=\"http://goldenagesolutions.ca/HouseOfCards/userpage.php?entry=".$result[0]."\">".$result[1]."</a>. ";
                                echo "To search again go to the following link : <a href=\"http://goldenagesolutions.ca/HouseOfCards/usersearch.php\">Search</a>";
                            } else {
                                if($result === null) {
                                    echo "There was an issue with the database Connection. Try again later";
                                    echo "
                                    <form action='".htmlspecialchars($_SERVER['PHP_SELF '])."' method='post'>
                                        <input class='input-fields' onfocus=\"this.value=''\" name='userName' type='text' value='Enter User Name' />
                                        <input type ='submit' class='submit-inputs' value='Search' />
                                    </form>
                                    ";
                                } else {
                                    if(sizeof($result) == 0) {
                                        echo "No result was found. Please try again.";
                                        echo "
                                        <form action='".htmlspecialchars($_SERVER['PHP_SELF '])."' method='post'>
                                            <input class='input-fields' onfocus=\"this.value=''\" name='userName' type='text' value='Enter User Name' />
                                            <input type ='submit' class='submit-inputs' value='Search' />
                                        </form>
                                        ";                                        
                                    }
                                }
                            }
                        } else {
                            echo "
                                <form action='".htmlspecialchars($_SERVER['PHP_SELF '])."' method='post'>
                                    <input class='input-fields' onfocus=\"this.value=''\" name='userName' type='text' value='Enter User Name' />
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
<?php
    //Author            : Alexander Sembrat
    //Date Created      : 19-03-2023
    //Last Edited By    : Alexander Sembrat
    //Last Edited     	: 19-03-2023
    //Filename          : usersearch.php
    //Version           : 1.0
    include 'controller/connectDB.php';
    if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
        header("Location: index.php");
        exit();
    }
    include 'controller/controller_functions.php';
    include('model/favourite.php');
    include('model/user.php');
    include('model/rating.php');
    include('model/comment.php');
    include('model/CommentReply.php');
    include('model/userType.php');
    include('model/date.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userName = test_input($_POST["userName"]);
        $result = User::fetchUserByUsername($db, $userName);
        if($result != null) {
            ?>
            <script type="text/javascript">
            window.location.assign("<? echo "http://goldenagesolutions.ca/HouseOfCards/userpage.php?ID=".$result->getUserID(); ?>");
            </script> 
            <?
        }
    }
    include 'controller/header.php';
    include 'controller/left-menu.php';
?>
                <div class="center">
                    <div id="center-content">
                        <h1>Search a User</h1> (not case sensitive)
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if($result === null) {
                                echo "No result was found. Try searching for a different username.";
                                echo "
                                <form action='".htmlspecialchars($_SERVER['PHP_SELF '])."' method='post'>
                                    <input class='input-fields' onfocus=\"this.value=''\" name='userName' type='text' value='Enter User Name' />
                                    <input type ='submit' class='submit-inputs' value='Search' />
                                </form>
                                ";

                            } else {
                                //echo "<a href=\"http://goldenagesolutions.ca/HouseOfCards/userpage.php?ID=".$result->getUserID()."\">".$result->getUsername()."</a>. ";
                                //echo "To search again go to the following link : <a href=\"http://goldenagesolutions.ca/HouseOfCards/usersearch.php\">Search</a>";
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
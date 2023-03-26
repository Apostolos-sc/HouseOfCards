<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 24-04-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited     	: 24-04-2023
    //Filename          : createpage.php
    //Version           : 1.1
    $GLOBALS["title"] = "Welcome to House of Cards Wiki - Admin Panel - Create Wiki Page";
    include('controller/connectDB.php');
    if(!isset($_SESSION['username']) || !isset($_SESSION['password']) || !isset($_SESSION['accessLevel'])) {
        header("Location: index.php");
        exit();
    }
    if(intval($_SESSION['accessLevel']) != 1) {
            header("Location: index.php");
            exit();
    }
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
        <?
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $message = "";
            $ID = intval($_SESSION['userID']);
            $name = $_POST["gameName"];
            $min = $_POST["minPlayers"];
            $max = $_POST["maxPlayers"];
            $obj = $_POST["objective"];
            $set = $_POST["setUp"];
            $play = $_POST["gamePlay"];
            $items = $_POST["requiredItems"];
            $gameRules = $_POST["rules"];
            if(empty($gameRules) || empty($name) || empty($min) || empty($max) || empty($obj) || empty($set) || empty($play) || empty($items)) {
                $message .= "One of the fields is empty.</br>";
            }
            $playersIntegers = false;
            if(ctype_digit(strval($_POST['minPlayers']))) {
                if(intval($_POST['minPlayers']) == 0) {
                    $message .= "Minimum Players must be positive number.</br>";
                } else {
                    $playersIntegers = true;
                }
            } else {
                $message .= "Minimum Players must be a positive number.</br>";
            }
            if(ctype_digit(strval($_POST['maxPlayers']))) {
                if(intval($_POST['maxPlayers']) == 0) {
                    $message .= "Maximum Players must be positive number.</br>";
                } else {
                    $playersIntegers = true;
                }
            } else {
                $message .= "Maximum Players must be a positive number.</br>";
            }
            if($playersIntegers == true) {
                if(intval($_POST['minPlayers']) >= intval($_POST['maxPlayers'])) {
                    $message .= "Maximum Players must be greater than minimum Players.</br>";
                }
            }
            if(empty($message)) {
                $now = new DateTime();
                $now->setTimezone(new DateTimeZone('America/Edmonton'));
                $date_string = $now->format('Y-m-d');
                $time = $now->format('H:i:s');
                $date_arr = explode ("-", $date_string);
                //Create an array of strings using : as a delimiter
                $time_arr = explode(":", $time);
                $user = User::fetchUserByID($db, $ID);
                $date = new Date($date_arr[2], $date_arr[1], $date_arr[0], $time_arr[0], $time_arr[1], $time_arr[2]);
                $comments = [];
                $ratings = [];
                $maximum = intval($_POST["maxPlayers"]);
                $minimum = intval($_POST["minPlayers"]);
                $entry = new WikiEntry(-1, $name, $items, $obj, $set, $play, $gameRules, $date, $user, $comments, $ratings, $minimum, $maximum);
                $okay = WikiEntry::insertWikiEntry($db, $entry);
                if($okay != null) {
                    if($okay) {
                        echo generateSuccessfulCreateWikiPageView($entry);
                    } else {
                        echo generateCreateWikiPageView("Unable to create Wiki Entry. Database error encountered.");
                    }
                } else {
                    echo generateCreateWikiPageView("Database Connection Error encountered.");
                }
                //echo generateSuccessfulCreateWikiPage();
            } else {
                echo generateCreateWikiPageView($message);
            }
        } else {
            echo generateCreateWikiPageView("");
        }
        ?>
        <script>
            $("textarea").each(function () {
                this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                }).on("input", function () {
                this.style.height = 0;
                this.style.height = (this.scrollHeight) + "px";
            });
        </script>
        </div>
    </div>
    <?
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
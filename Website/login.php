<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited     	: 21-02-2023
    //Filename          : login.php
    //Version           : 1.1
    $GLOBALS["title"] = "Welcome to House of Cards Wiki - Login";
    include 'controller/connectDB.php';
    include('model/favourite.php');
    include('model/user.php');
    include('model/wikientry.php');
    include('model/rating.php');
    include('model/comment.php');
    include('model/CommentReply.php');
    include('model/userType.php');
    include('model/date.php');
    include ('view/view_functions.php');
    if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
        header("Location: index.php");
        exit();
    }

    if(isset($_POST['username']) && isset($_POST['password'])) {
        //$_POST['username'] represents account ID only for this page.
        $process = true;
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $stmt = $db->connection->prepare('SELECT * FROM users WHERE users.username = ? AND users.password = ?');
        $stmt->bind_param('ss', $uname, $pass); // 's' specifies the variable type => 'string'
    
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 0) {
            $success = false;
        } else {
            $account = $result->fetch_row();
            $success = true;
            $_SESSION["userID"] = $account[0];
            $_SESSION["username"] = $account[1];
            $_SESSION["password"] = $account[2];
            $_SESSION["accessLevel"] = $account[3];
        }
    } else {
        $process = false;
    }
    include 'controller/header.php';
    include 'controller/left-menu.php';
?>
                <div class="center">
                    <div id="center-content">
                        <?php
                        if($process == true) {
                            if($success == true) {
                                echo "You have successfully logged in.";
                                header("Location: index.php");
                            } else {
                                $message = "You cannot login with the given credentials. Please try again.";
                                echo generateLoginPage($message);
                            }
                        } else {
                            echo generateLoginPage("");
                        }
                        ?>
                    </div>
                </div>
<?php
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
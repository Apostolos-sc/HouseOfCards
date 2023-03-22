<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited     	: 21-02-2023
    //Filename          : login.php
    //Version           : 1.1
    $GLOBALS["title"] = "Welcome to House of Cards Wiki - Login";
    include 'controller/connectDB.php';

    if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
        header("Location: index.php");
        exit();
    }

    if(isset($_POST['username']) && isset($_POST['password'])) {
        //$_POST['username'] represents account ID only for this page.
        $process = true;
        $stmt = $db->connection->prepare('SELECT * FROM users WHERE users.username = ? AND users.password = ?');
        $stmt->bind_param('ss', $_POST['username'], $_POST['password']); // 's' specifies the variable type => 'string'
    
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
                                echo "You cannot login with the given credentials. Please try again.";
                            }
                        } else {
                            echo "
                                <table id='table_players'>
                                <tr class='table_players_row'>
                                    <td class='table_players_data' id='table_players_title' colspan='2' >
                                        Login
                                    </td>
                                </tr>
                                <form action='login.php' method='post'>
                                <tr class='table_players_row'>
                                    
                                    <td class='table_players_data'>
                                        Username :
                                    </td>
                                    <td class='table_players_data'>
                                        <input class='input-fields' onfocus=\"this.value=''\" name='username' type='text' value='Enter Username' />
                                    </td>
                                </tr>
                                <tr class='table_players_row'>
                                    <td class='table_players_data'>
                                        Password :
                                    </td>
                                    <td class='table_players_data'>
                                        <input class='input-fields' onfocus=\"this.value=''\" name='password' type='password' value='password' />
                                    </td>
                                </tr>

                                <tr class='table_players_row'>
                                    <td class='table_players_data' colspan='2'>
                                        <input type ='submit' class='submit-inputs' value='Login' />
                                    </td>
                                </tr>
                                </form>
                            </table>
                            ";
                        }
                        ?>
                    </div>
                </div>
<?php
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
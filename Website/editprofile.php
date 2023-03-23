<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 23-03-2023
    //Last Edited By    : Apostolos Scondrianis
    //Last Edited     	: 23-03-2023
    //Filename          : profile.php
    //Version           : 1.0
    $GLOBALS["title"] = "Welcome to House of Cards Wiki - Edit Profile";
    include 'controller/connectDB.php';

    if(!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
        header("Location: index.php");
        exit();
    }
    include 'controller/header.php';
    include 'controller/left-menu.php';
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
                        <?php
                            if(!isset($_POST['password'])) {
                                $ID = $_SESSION['userID'];
                                $user = User::fetchUserByID($db, $ID);
                                echo generateEditProfileView($user, "");
                            } else {
                                $ID = $_SESSION['userID'];
                                $password = $_POST['password'];
                                $repeat_password = $_POST['repeat_password'];
                                $email = $_POST['email'];
                                $repeat_email = $_POST['repeat_email'];
                                $fname = $_POST['first_name'];
                                $lname = $_POST['last_name'];
                                $dob = $_POST['date'];
                                $user = User::fetchUserByID($db, $ID);
                                if(empty($password) || empty($repeat_password) || empty($email) || empty($repeat_email) || empty($fname) || empty($lname) || empty($dob)) { 
                                    $message = "One or more fields are empty!";
                                } else {
                                    if(strlen($password) < 8 || strlen($repeat_password) < 8) {
                                        $message = "Password and Password repeat must be greater than 8 characters!\n";
                                    } else {
                                        if(strcmp($password, $repeat_password) == 0) {
                                            if(strcmp($email, $repeat_email) == 0) {
                                                
                                                $user->setPassword($password);
                                                $user->setEmail($email);
                                                $user->setFirstName($fname);
                                                $user->setLastName($lname);
                                                $date_arr = explode ("-", $dob);
                                                $user->getDOB()->setYear($date_arr[0]);
                                                $user->getDOB()->setMonth($date_arr[1]);
                                                $user->getDOB()->setDay($date_arr[2]);
                                                $entry = User::updateUser($db, $user);
                                                $message = "Successful update!";
                                            } else {
                                                $message = "Emails do not match!";
                                            }
                                        } else {
                                            $message = "Passwords do not match!";
                                        }
                                    }
                                }
                                echo generateEditProfileView($user, $message);
                            }
                        ?>
                        <script>
                            $(function(){

                            $('#eye').click(function(){
                                
                                if($(this).hasClass('fa-eye-slash')){

                                    $(this).removeClass('fa-eye-slash');
                                    
                                    $(this).addClass('fa-eye');
                                    
                                    $('#password').attr('type','text');
                                        
                                    }else{
                                    
                                    $(this).removeClass('fa-eye');
                                    
                                    $(this).addClass('fa-eye-slash');  
                                    
                                    $('#password').attr('type','password');
                                }
                            });
                            });
                            $(function(){
                            $('#repeat_eye').click(function(){
                                
                                if($(this).hasClass('fa-eye-slash')){
                                    
                                    $(this).removeClass('fa-eye-slash');
                                    
                                    $(this).addClass('fa-eye');
                                    
                                    $('#repeat_password').attr('type','text');
                                        
                                    }else{
                                    
                                    $(this).removeClass('fa-eye');
                                    
                                    $(this).addClass('fa-eye-slash');  
                                    
                                    $('#repeat_password').attr('type','password');
                                }
                            });
                            });
                            function validateEmail(email) {
                            return email.match(
                                /(?:[a-z0-9+!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/i
                            );
                            }
                            $(function(){
                            $('#email').on('input', function(){
                                email = $('#email').val();
                                console.log(email)

                                if (validateEmail(email)) {
                                    if($('#email_check').hasClass('fa-times-circle')) {
                                        $('#email_check').removeClass('fa-times-circle');
                                        $('#email_check').addClass('fa-check');
                                    }    
                                } else {
                                    if($('#email_check').hasClass('fa-check')) {
                                        $('#email_check').removeClass('fa-check');
                                        $('#email_check').addClass('fa-times-circle');
                                    }
                                }
                            });
                            });
                            $(function(){
                            $('#repeat_email').on('input', function(){
                                email = $('#repeat_email').val();
                                console.log(email)

                                if (validateEmail(email)) {
                                    if($('#repeat_email_check').hasClass('fa-times-circle')) {
                                        $('#repeat_email_check').removeClass('fa-times-circle');
                                        $('#repeat_email_check').addClass('fa-check');
                                    }    
                                } else {
                                    if($('#repeat_email_check').hasClass('fa-check')) {
                                        $('#repeat_email_check').removeClass('fa-check');
                                        $('#repeat_email_check').addClass('fa-times-circle');
                                    }
                                }
                            });
                            });
                        </script>
                    </div>
                </div>
<?php
    include 'controller/right-menu.php';
    include 'controller/footer.php';
?>
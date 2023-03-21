<!--
    Author            : Apostolos Scondrianis
    Date Created      : 12-02-2023
    Last Edited By    : Apostolos Scondrianis
    Last Edited On    : 21-02-2023
    Filename          : right-menu.php
    Version           : 1.1
-->
                <div class="right">
                    <div class="menu-header">
                        User Info
                    </div>
                    <div class="menu-content">
                    <?php
                        if(isset($_SESSION["username"]) && isset($_SESSION["password"])) {
                                echo "Welcome <b>".$_SESSION["username"]."</b>!<br/>";
                                echo "</div>";
                                echo "
                                    <div class='menu-header'>
                                        User Panel
                                    </div>                    
                                    <div class='menu-content'>
                                        <a href='logout.php'>Logout</a><br/>
                                        <a href='profile.php'>View My Profile</a><br>
                                        <a href='editprofile.php'>Edit My Profile</a><br>
                                        <a href='favorites.php'>My Favorites</a><br>
                                    </div>
                                    ";
                        } else {
                            echo "Welcome, Guest.<br>";
                            echo "</div>";
                            echo "
                                <div class='menu-header'>
                                    User Panel
                                </div>   
                                <div class='menu-content'>
                                    <a href='login.php'>Login</a><br>
                                    <a href='register.php'>Register</a><br>
                                </div>
                            ";
                            
                        }
                    ?>
                </div>
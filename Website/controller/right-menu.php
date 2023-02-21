<!--
    Author            : Apostolos Scondrianis
    Date Created      : 12-02-2023
    Last Edited       : 15-02-2023
    Filename          : right-menu.php
    Version           : 1.0 
-->
                <div class="right">
                    <div class="menu-header">
                        User Info
                    </div>
                    <div class="menu-content">
                    <?php
                        if(isset($_COOKIE["admin"]) && isset($_COOKIE['password'])) {
                                echo "Welcome ".$_COOKIE["admin"]."!<br/>";
                                echo "<a href='logout.php'>Logout</a>";
                                echo "
                                    <div class='menu-header'>
                                        Admin Panel
                                    </div>                    
                                    <div class='menu-content'>
                                        <a href='createwikipage.php'>Create Wiki Entry</a><br>
                                        <a href='editwikipage.php'>Edit Wiki Entry</a><br>
                                        <a href='selecteditguild.php'>Edit Guild</a><br>
                                    </div>
                                    ";
                        } else {
                            echo "Welcome, Guest.<br>
                            <a href='login.php'>Login</a><br>
                            <a href='profile.php'>View My Profile</a><br>
                            <a href='editprofile.php'>Edit My Profile</a><br>
                            <a href='favorites.php'>My Favorites</a><br>
                            ";
                            
                        }
                    ?>
                    </div>
                    <div>

                    </div>

                </div>
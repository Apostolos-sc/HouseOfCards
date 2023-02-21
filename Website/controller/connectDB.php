<?php
    //Author            : Apostolos Scondrianis
    //Date Created      : 12-02-2023
    //Last Edited     	: 15-02-2023
    //Filename          : connectDB.php
    //Version           : 1.0
    include 'controller/functions.php';
    session_start();
    //setcookie("admin", "Godlike", time()+3600);
    $db = new Database();
    $db -> init_connection('db5011903138.hosting-data.io', 'dbs10023131', 'dbu5422963', 'CardsWiki2023!', '3306');
    //cookies code :
    //setcookie($name, $value, $expire, $path, $domain); <-- should appear before HTML TAG.
    //example : setcookie("user", "John Doe", time()+3600); cookies are small files.
    //in order to store information about in a php session you need to first start one. Also before html tag.
    //stores information for all pages in our application
    //session_start(); how to use a cookie : example
    //if(isset($_COOKIE["user"])) { echo "Welcome". $_COOKIE["user"]."!<br/>"}
    //else {echo "Welcome Guest.";}
    //when you delete a cookie you need to just set the expiration date in the past.
    //setcookie("user", "", time()-3600);
    //a cookie is automaticoall URLencoded/decoded. To avoid that just use setrawcookie()
?>
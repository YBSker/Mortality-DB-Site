<?php
    include 'dbase-conf.php';
    $mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

//shell_exec(“ssh schu17@ugradx.cs.jhu.edu -p 22”);
//shell_exec(“ssh schu17@ugradx.cs.jhu.edu -p 22”);

//$db = mysqli_connect(‘127.0.0.1’, ‘sqluser’, ‘sqlpassword’, ‘rjmadmin’, 3307);

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        die ('Error connecting to mysql. :-( <br/>');
    } else {
        // uncomment the line below if you want a success message
         echo 'We have connected to MySQL! :-) <br/>';
    }
?>


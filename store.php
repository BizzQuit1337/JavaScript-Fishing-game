<<?php

    $object = $_POST['obj'];
    $values = json_decode($object);
    echo $values."<br>";

    //config
    $config = array(
        "db_host" => "localhost",
        "db_login"      => "root",
        "db_passwd" => ""
    );

    //connecting to the database
    $conn = mysqli_connect($config['db_host'],$config['db_login'],$config['db_passwd']);
    if(mysqli_connect_errno()){
        printf("Boohoo. Connect failed: %s\n", mysqli_connect_error());
    }else{
        echo "connected to sql"."<br>";
    }

    //selecting the database
    $select = mysqli_select_db($conn, 'details');
    if(!$select) {
        echo "selection failed!!!"."<br>";
    }else {
        echo "selection successful"."<br>";
    }

    //collecting username and password
    $name = $_POST['name'];
    $password = $_POST['password'];

    //adding info to database
    $sql_query = "INSERT INTO `details` (`username`, `password`) VALUES ('$name', '$password');";
    if($conn->query($sql_query) === TRUE) {
        echo "record added successfully!!!!"."<br>";
        header("Location: https://www.google.com/search?rlz=1C1CHBD_en-GBGB991GB991&sxsrf=ALiCzsYyFpGZ6f0LybLm6eOdZOH_ZG_0ZQ:1652181824494&q=pictures+of+llamas&spell=1&sa=X&ved=2ahUKEwjukIP26NT3AhVKa8AKHR5VAWkQBSgAegQIARAy&biw=1920&bih=969$");
        exit();
    }else {
        echo "record failed to add!!!"."<br>";
    }

    $conn->close();


?>


<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "kullanici_veritabani";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);

    }
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT *FROM users WHERE username='$username' AND password='$password'";

    $result = $conn->query($query);

    if($result->num_rows == 1){
        header("Location: movmovie_second.html");
        exit();
    }



    $conn->close();
}

?>
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
// Formdan gelen verileri alırım ve güvenli hale getiririm
$username = $conn->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);



// Veritabanına verileri eklerim
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    header("Location: movmovie_second.html");
    exit();
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Bağlantıyı kapatırım
$conn->close();}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "kullanici_veritabani";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }
     

    $film_name = $_POST['film_name'];
    $comment = $_POST['comment'];
    $rating = $_POST['rating'];

    $stmt = $conn->prepare("INSERT INTO film (film_name, comment, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $film_name, $comment, $rating);

  
    if ($stmt->execute()) {
        // Yorum kaydedildiyse 3 saniye sonra movmovie_second.html sayfasına yönlendirecegim fonksiyon
        header("Refresh: 1; URL=movmovie_second.html");
        echo "The comment has been saved successfully. You are being directed...";
        exit(); 
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>

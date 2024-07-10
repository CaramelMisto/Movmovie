<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "kullanici_veritabani";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$film_name = isset($_GET['film_name']) ? $_GET['film_name'] : '';

$stmt = $conn->prepare("SELECT comment, rating FROM film WHERE film_name = ?");
$stmt->bind_param("s", $film_name);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Yorumlar - <?php echo htmlspecialchars($film_name); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .comment-box {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
        }
        .comment-box p {
            margin: 5px 0;
        }
        .comment-box .rating {
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>
<div class="container">
        <h1><?php echo htmlspecialchars($film_name); ?> Movie Reviews</h1>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='comment-box'>";
                echo "<p><strong>Comment:</strong> " . htmlspecialchars($row['comment']) . "</p>";
                echo "<p class='rating'><strong>Rating:</strong> " . htmlspecialchars($row['rating']) . "/10</p>";
                echo "</div>";
            }
        } else {
            echo "<p>There are no comments for this movie yet :(.</p>";
        }
        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
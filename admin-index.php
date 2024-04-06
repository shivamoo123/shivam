<?php
session_start();

include 'dbinfo.php';

$mobiles_query = "SELECT * FROM mobiles";
$mobiles_result = mysqli_query($con, $mobiles_query);

$background_image_url = "image1.jpg"; // Change this to the path of your background image

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mobile Dashboard</title>
<style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        background-image: url('image1.jpg'); 
        background-size: cover;
        background-position: center;
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 800px;
        margin: 20px auto;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
    }
    h1 {
        text-align: center;
    }
    .mobile {
        display: flex;
        margin-bottom: 20px;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .mobile img {
        width: 150px;
        height: auto;
        border-radius: 5px;
        margin-right: 20px;
    }
    .mobile-content {
        flex: 1;
    }
    .mobile-title {
        font-size: 20px;
        margin-bottom: 10px;
        color: #333;
    }
    .mobile-superpower {
        font-size: 16px;
        color: #666;
    }
    .add-form {
        margin-top: 20px;
    }
    .add-form h3 {
        text-align: center;
    }
    .add-form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    .add-form input[type="text"],
    .add-form textarea {
        width: calc(100% - 18px);
        padding: 8px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    .add-form input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        background-color: #400b0d;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .add-form input[type="submit"]:hover {
        background-color: #400b0d;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Types of Mobiles.</h1>

    <?php
    if ($mobiles_result->num_rows > 0) {
        while($row = $mobiles_result->fetch_assoc()) {
            echo "<div class='mobile'>";
            echo "<img src='" . $row["image_url"] . "' alt='mobile Image'>";
            echo "<div class='mobile-content'>";
            echo "<div class='mobile-title'>" . $row["title"] . "</div>";
            echo "<div class='mobile-superpower'>" . substr($row["content"], 0, 100) . "...</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No mobiles found</p>";
    }
    ?>

</div>
</body>
</html>

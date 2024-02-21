<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .course-details {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .course-details img {
            max-width: 100%;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .course-details p {
            margin-bottom: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Our Courses</h1>
    <?php
    include("connect.php");
    $stmt = $pdo->prepare("SELECT * FROM notes");
    $stmt->execute();
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php foreach ($notes as $notes): ?>
        

    <div class="course-details">
    
    <img src="images /<?= $notes['image'] ;?>" alt="Image" style="max-width: 100px;">
   
        <p><strong>Name:</strong> <?php echo $notes['name']; ?></p>
        <p><strong>Description:</strong> <?php echo $notes['description']; ?></p>
        <a href="documents/<?php echo $note['file']; ?>" class="btn" download>Notes</a>

        
    </div>
    <?php endforeach; ?>
</body>
</html>




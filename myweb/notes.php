

<!DOCTYPE html>
<html lang="en">



<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<section class="notes">

    <div class="icon">
        <h2 class="logo">NOTEnsion</h2>
    
    </div>

    

    <div class="menu">
        <ul>
            <li><a href="index.html">HOME</a></li>
            <li><a href="about.html">ABOUT</a></li>
        </ul>
        
    </div>
  

   
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
            max-width: 500px;
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
   
    
</body>
</html>

<div class="images">
            <img src="notesbg.jpg" alt="image5">
        </div>

           
            <?php
    include("connect.php");
    $stmt = $pdo->prepare("SELECT * FROM notes");
    $stmt->execute();
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <?php foreach ($notes as $note): ?>
    <div class="course-details">
    <img src="MYWEB/<?php echo $note['image']; ?>" alt="Note Image">
   

        <p><strong>Name:</strong> <?php echo $note['name']; ?></p>
        <p><strong>Description:</strong> <?php echo $note['description']; ?></p>
        
        <a href="MYWEB/<?php echo $note['file']; ?>" class="btn" download>Download Notes</a>
     
             
    

    </div>
    <?php endforeach; ?>
        </div>
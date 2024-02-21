h1{
    position: relative;
    font-size: 12vw;
    color: #44666f;
    -webkit-text-stroke: 0.08vw #ecf3f3;
    text-transform: uppercase;

  }

  h1::before
  {
    content: attr(data-text);
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    color: #188f8d;
    -webkit-text-stroke:0vw #383d52 ;
    border-right:2px solid #03f0ec ;
    overflow: hidden;
    animation: animate 6s linear infinite ;


  }
  

  @keyframes animate {
    0%, 10%, 100% {
        width: 0;
    }
    70%, 90% {
        width: 100%;
    }
}










           

Dclass="search">
<input class="srch" type="search" name="" placeholder="Type To text">
<a OCTYPE html>
<html< lang="en">
<head>
<title>Webpage Design</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main">
<div class="navbar">
<div class="icon">
<h2 class="logo">NOTEnsion</h2>
</div>

<div class="menu">
<ul>
    <li><a href="#">HOME</a></li>
    <li><a href="#">ABOUT</a></li>
    <li><a href="#">SERVICE</a></li>
    <li><a href="#">DESIGN</a></li>
    <li><a href="#">CONTACT</a></li>
</ul>
</div>

<div href="#"> <button class="btn">Search</button></a>
</div>

</div> 
<div class="content">
<h1>NOTEnsion</h1>


<button class="cn"><a href="#">JOIN US</a></button>

<div class="form">
    <h2>Login Here</h2>
    <input type="email" name="email" placeholder="Enter Email Here">
    <input type="password" name="" placeholder="Enter Password Here">
    <button class="btnn"><a href="#">Login</a></button>

    <p class="link">Don't have an account<br>
    <a href="#">Sign up </a> here</a></p>
    <p class="liw">Log in with</p>

    <div class="icons">
        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
        <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
    </div>

</div>
    </div>
</div>
</div>
</div>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>










<?php
    if(isset($_POST["submit"])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();

        if(empty($firstname) OR empty($lastname) OR empty($email) OR empty($password)) {
            array_push($errors, "All fields are required");
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid ");
        }
        if(strlen($password) < 8) {
            array_push($errors, "Password must be at least 8 characters long");
        }
        require_once "database.php";
        $sql="SELECT * FROM users WHERE email='$email'";
       $result=mysqli_query($conn,$sql);
       $rowCount=mysqli_num_rows($result);
       if($rowCount>0) {
        array_push($error,"Email already exists!");
       }

        if(count($errors) > 0) {
            foreach($errors as $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {
          
            $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);

            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
            if($prepareStmt) {
                mysqli_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            } else {
                die("Something went wrong");
            }
        }
    }
?>





















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="admin-container">
        <h1>Welcome, Admin</h1>
        <div class="upload-form">
            <h2>Upload New Note</h2>
            <form action="upload_note.php" method="post" enctype="multipart/form-data">
                <label for="note_title">Note Title:</label>
                <input type="text" id="note_title" name="note_title" required>
                <label for="note_file">Choose Note File:</label>
                <input type="file" id="note_file" name="note_file" required>
                <button type="submit" name="upload">Upload Note</button>
                <button type="submit" name="Delete">Delete Note</button>
                <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add your CSS file -->
</head>
<body>
    <header>
        <h1>Welcome to the Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Notes</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
       
           
        </section>
        
        <section class="users">
            <h2>User Management</h2>
            <ul>
                <li><a href="#">View Users</a></li>
                <li><a href="#">Add New User</a></li>
                <li><a href="#">Edit User</a></li>
                <li><a href="#">Delete User</a></li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Note Availability Website. All rights reserved.</p>
    </footer>
</body>
</html>

            </form>
        </div>
    </div>
    
</body>
</html>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Availability</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Welcome to Notes Availability</h1>
    <!-- Button to get notes -->
    <button onclick="getNotes()">Get Notes</button>
    
    <!-- Container for the notes table -->
    <div id="notesTableContainer"></div>

    <!-- JavaScript to fetch and display notes -->
    <script>
        function getNotes() {
            // Fetch notes from the server (you can use AJAX or fetch API)
            // For demonstration, let's assume notes are hardcoded
            const notes = [
                { id: 1, title: "Note 1", content: "This is the content of Note 1" },
                { id: 2, title: "Note 2", content: "This is the content of Note 2" },
                { id: 3, title: "Note 3", content: "This is the content of Note 3" }
            ];

            // Create a table to display the notes
            let tableHtml = "<table>";
            tableHtml += "<tr><th>ID</th><th>Title</th><th>Content</th></tr>";
            notes.forEach(note => {
                tableHtml += `<tr><td>${note.id}</td><td>${note.title}</td><td>${note.content}</td></tr>`;
            });
            tableHtml += "</table>";

            // Display the table in the notesTableContainer
            document.getElementById("notesTableContainer").innerHTML = tableHtml;
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Availability</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Welcome to Notes Availability</h1>
    <!-- Button to get notes -->
    <button onclick="getNotes()">Get Notes</button>
    
    <!-- Container for the notes table -->
    <div id="notesTableContainer"></div>

    <!-- JavaScript to fetch and display notes -->
    <script>
        function getNotes() {
            // Fetch notes from the server (you can use AJAX or fetch API)
            // For demonstration, let's assume notes are hardcoded
            const notes = [
                { id: 1, title: "Note 1", content: "This is the content of Note 1" },
                { id: 2, title: "Note 2", content: "This is the content of Note 2" },
                { id: 3, title: "Note 3", content: "This is the content of Note 3" }
            ];

            // Create a table to display the notes
            let tableHtml = "<table>";
            tableHtml += "<tr><th>ID</th><th>Title</th><th>Content</th></tr>";
            notes.forEach(note => {
                tableHtml += `<tr><td>${note.id}</td><td>${note.title}</td><td>${note.content}</td></tr>`;
            });
            tableHtml += "</table>";

            // Display the table in the notesTableContainer
            document.getElementById("notesTableContainer").innerHTML = tableHtml;
        }
    </script>
</body>
</html>
















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Management</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

<h2>Note Management</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
           
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch notes from the database and populate the table
        // Replace this with your actual database query to fetch note information
        $notes = [
            ['id' => 1, 'title' => 'Note 1', 'description' => 'Description for Note 1'],
            ['id' => 2, 'title' => 'Note 2', 'description' => 'Description for Note 2'],
            // Add more note data as needed
        ];

        foreach ($notes as $note) {
            echo "<tr>";
            echo "<td>{$note['id']}</td>";
            echo "<td>{$note['title']}</td>";
           
            echo "<td>
                      <a href='edit_note.php?id={$note['id']}'>Edit</a> | 
                      <a href='delete_note.php?id={$note['id']}' onclick='return confirm(\"Are you sure you want to delete this note?\")'>Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>





















<div class="menu">
    <ul>
        <li><a href="index.html">HOME</a></li>
        <li><a href="about.html">ABOUT</a></li>
    </ul>
</div>



<h2 class="heading"></h2>



<div class="box-container">
    <div class="box">
        <div class="images">
            <img src="dsa.png" alt="image1">
        </div>
        <div class="content">
            <p>Get your Data Structure<br> and Algorithm notes</p>
            <a href="insertnotes.php?note=dsa" class="btn">Get notes</a> 
            
        </div>
    </div>

    <!-- Repeat the structure for other boxes -->
    
    <div class="box">
        <div class="images">
            <img src="chem.jpeg" alt="image2">
        </div>
        <div class="content">
            <p>Get your chemistry notes</p>
          
            <a href="insertnotes.php?note=chemistry" class="btn">Get notes</a> 
        </div>
    </div>

    <div class="box">
        <div class="images">
            <img src="phy.jpeg" alt="image3">
        </div>
        <div class="content">
            <p>Get your Physics notes</p>
            
            <a href="insertnotes.php?note=physics" class="btn">Get notes</a> 
        </div>
    </div> 

    <div class="box">
        <div class="images">
            <img src="ath.png" alt="image4">
        </div>
        <div class="content">
            <p>Get your Maths notes</p>
           
            <a href="insertnotes.php?note=maths" class="btn">Get notes</a> 
        </div>
    </div>

    <div class="box">
        <div class="images">
            <img src="dbms.png" alt="image5">
        </div>
        <div class="content">
            <p>Get your Database<br>Management System notes</p>
           
            <a href="insertnotes.php?note=dbms" class="btn">Get notes</a> 
        </div>
    </div>

    <div class="box">
        <div class="images">
            <img src="c++.png" alt="image5">
        </div>
        <div class="content">
            <p>Get your programming<br>in C++ notes</p>
            
            <a href="insertnotes.php?note=c++" class="btn">Get notes</a> 
        </div>
    </div>

    <div class="box">
        <div class="images">
            <img src="os.jpeg" alt="image5">
        </div>
        <div class="content">
            <p>Get your ooperating<br>system notes</p>
           
            <a href="insertnotes.php?note=os" class="btn">Get notes</a> 
        </div>
    </div>

    <div class="box">
        <div class="images">
            <img src="cprog.png" alt="image5">
        </div>
        <div class="content">
            <p>Get your programming<br>in C notes</p>
           
            <a href="insertnotes.php?note=c" class="btn">Get notes</a> 
        </div>
    </div>

    <div class="box">
        <div class="images">
            <img src="bee.jpeg" alt="image5">
        </div>
        <div class="content">
            <p>Get your basic<br>electical engineering notes</p>
            
            <a href="insertnotes.php?note=BEE" class="btn">Get notes</a> 
            
        </div>
    </div>

    <div class="box">
        <div class="images">
            <img src="lc.jpeg" alt="image5">
        </div>
        <div class="content">
            <p>Get your logic circuit notes</p>
           
            <a href="insertnotes.php?note=logic circuit" class="btn">Get notes</a> 
        </div>
    </div>


</div>

</section>

</body>
</html>







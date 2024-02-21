<?php
// Function to retrieve booking requests from the database
function getSignupRequests() {
    include('connect.php');

    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $requests = $stmt->fetchAll();

    return $requests;
}

// Function to update the status of a booking request
function updateRequestStatus($id, $status) {
    include('connect.php');

    $stmt = $pdo->prepare("UPDATE users SET status=? WHERE id=?");
    $stmt->execute([$status, $id]);
}

if(isset($_POST['approve'])) {
    $id = $_POST['id'];
    updateRequestStatus($id, 'approved');
}

if(isset($_POST['reject'])) {
    $id = $_POST['id'];
    updateRequestStatus($id, 'rejected');
}

$SignupRequests = getSignupRequests();

// Function to retrieve package requests from the database
function getnotesrequests() {
    include("connect.php");

    $stmt = $pdo->prepare("SELECT * FROM notes");
    $stmt->execute();
    $requests = $stmt->fetchAll();
    
    return $requests;
}

// Function to update an existing package
function updatenote($id, $name,  $description, $image) {
    include("connect.php");

    $stmt = $pdo->prepare("UPDATE notes SET name=?,  description=?, image=? WHERE id=?");
    $stmt->execute([$name, $description, $image, $id]);
}

// Function to delete a package
function deletenote($id) {
    include("connect.php");

    $stmt = $pdo->prepare("DELETE FROM packages WHERE id=?");
    $stmt->execute([$id]);
}

// Check if form is submitted for adding/updating package
if(isset($_POST['send'])) {
    // Extract form data
    $name = $_POST['name'];
    
    $description = $_POST['description'];
    // Handle image upload if needed
    if(isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        // Move uploaded image to the desired location
        $target = "images/".basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        // If image is not uploaded, set $image to null or an empty string
        $image = ""; // or $image = null;
    }

    include("connect.php");

    $stmt = $pdo->prepare("INSERT INTO notes (name,  description, image) VALUES (?,  ?, ?)");
    $stmt->execute([$name, $description, $image]);
}

// Check if delete button is clicked
if(isset($_POST['del'])) {
    $id = $_POST['note_id'];
    deletenote($id);
}

// Check if form is submitted for updating package
if(isset($_POST['update'])) {
    // Extract form data
    $id = $_POST['note_id'];
    $name = $_POST['name'];
    
    $description = $_POST['description'];
    $image = $_POST['existing_image']; // Add this line to retain existing image path

    // Perform package update
    updatenote($id, $name, $description, $image);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f2f2f2;
        }

        form {
            display: inline;
        }
    </style>
</head>
<body>
    <h1>User Signup Requests</h1>
    <!-- Booking requests table -->
    <table>
        <tr>
        <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($SignupRequests as $request): ?>
            
        <tr>
            <td><?= $request['first_name'] ?></td>
            <td><?= $request['last_name'] ?></td>
            <td><?= $request['email'] ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?= $request['id'] ?>">
                    <button type="submit" name="approve">Approve</button>
                    <button type="submit" name="reject">Reject</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    
    
    <h1>Admin Panel - Manage notes</h1>

    <!-- Form for uploading a new note -->
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Note Name" required>
        <input type="file" name="file" required>
        <input type="text" name="description" placeholder="Note Description" required>
        <input type="file" name="image" required>
        <button type="submit" name="upload">Upload</button>
    </form>

   <!-- Table to display existing notes -->
   <table>
    <tr>
        <th>Note Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
        <?php
        $notes = getnotesrequests();
        foreach ($notes as $note): ?>
        <tr>
            <td><?= $note['name'] ?></td>
            
            <td><?= $note['description'] ?></td>
            <td><img src="<?= $note['image'] ?>" alt="Image" style="max-width: 100px;"></td>
            <td>
                <!-- Form for deleting a package -->
                <form method="post">
                    <input type="hidden" name="note_id" value="<?= $note['id'] ?>">
                    <button type="submit" name="del">Delete</button>
                </form>
                <!-- Form for updating a package -->
                <form method="post">
                    <input type="hidden" name="note_id" value="<?= $note['id'] ?>">
                    <input type="hidden" name="existing_image" value="<?= $note['image'] ?>">
                    <input type="text" name="name" value="<?= $note['name'] ?>">
                    <input type="text" name="description" value="<?= $note['description'] ?>">
                    <button type="submit" name="update">Update</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
<?php
include 'includes/db_connect.inc'; // Handle database connection
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $petname = $_POST['petname'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $image = $_FILES['image']['name'];
    $caption = $_POST['caption'];

    $target = 'images/' . basename($image);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO pets (petname, type, description, age, location, image, caption) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssdsss', $petname, $type, $description, $age, $location, $image, $caption);
        $stmt->execute();
    }
}
?>
<form method="post" enctype="multipart/form-data">
    <!-- Form Fields Here -->
</form>

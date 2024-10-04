<?php include 'includes/header.inc'; ?>
<?php include 'includes/nav.inc'; ?>

<main>
    <h1>Add a New Pet</h1>
    <form action="add.php" method="post" enctype="multipart/form-data">
        Pet Name: <input type="text" name="petname" required><br>
        Type: <select name="type" required>
            <option value="cat">Cat</option>
            <option value="dog">Dog</option>
            <option value="other">Other</option>
        </select><br>
        Description: <textarea name="description" required></textarea><br>
        Age (months): <input type="number" name="age" required><br>
        Location: <input type="text" name="location" required><br>
        Image: <input type="file" name="image" required><br>
        <input type="submit" value="Add Pet">
    </form>
</main>

<?php
include 'includes/db_connect.inc';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petname = $_POST['petname'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $image = $_FILES['image']['name'];

    $target = 'images/' . basename($image);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "INSERT INTO pets (petname, type, description, age, location, image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$petname, $type, $description, $age, $location, $image]);
    }
}
?>

<?php include 'includes/footer.inc'; ?>

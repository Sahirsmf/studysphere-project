<?php
include 'db.php';

// Logic to add a new subject
if (isset($_POST['add_subject'])) {
    $sub_name = $_POST['subject_name'];
    $sql = "INSERT INTO subjects (name) VALUES ('$sub_name')";
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Subject '$sub_name' added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error adding subject.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <h1>Admin Dashboard</h1>
    <h2>Manage Subjects</h2>
    
    <form method="POST">
        <label>New Subject Name:</label>
        <input type="text" name="subject_name" required>
        <button type="submit" name="add_subject">Add Subject</button>
    </form>

    <h3>Current Subjects List:</h3>
    <ul>
        <?php
        // Fetch and display all subjects
        $result = $conn->query("SELECT * FROM subjects");
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row['name'] . "</li>";
        }
        ?>
    </ul>
</body>
</html>
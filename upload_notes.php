<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<body>
    <h2>Upload Study Notes</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Subject:</label><br>
        <select name="subject_id">
            <?php
            // Populate the dropdown with subjects from the database
            $result = $conn->query("SELECT * FROM subjects");
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row['id']."'>".$row['name']."</option>";
            }
            ?>
        </select><br><br>

        <label>Select File (PDF, JPG, PNG):</label><br>
        <input type="file" name="note_file" required><br><br>

        <button type="submit" name="upload">Upload Note</button>
    </form>

    <?php
    if (isset($_POST['upload'])) {
        $title = $_POST['title'];
        $subject_id = $_POST['subject_id'];
        
        // File properties
        $fileName = $_FILES['note_file']['name'];
        $fileTmpName = $_FILES['note_file']['tmp_name'];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Allowed file types
        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileType, $allowed)) {
            // Create a unique name to prevent overwriting
            $newFileName = uniqid() . "." . $fileType;
            $uploadPath = "uploads/" . $newFileName;

            // Move file from temporary storage to our 'uploads' folder
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                // Save info to database (assuming User ID 1 for now)
                $sql = "INSERT INTO notes (user_id, subject_id, title, file_path, file_type, upload_date) 
                        VALUES (1, '$subject_id', '$title', '$uploadPath', '$fileType', NOW())";
                
                if ($conn->query($sql)) {
                    echo "<p style='color:green;'>File uploaded successfully!</p>";
                }
            } else {
                echo "Failed to move file.";
            }
        } else {
            echo "<p style='color:red;'>Only PDF, JPG, and PNG files allowed.</p>";
        }
    }
    ?>
</body>
</html>
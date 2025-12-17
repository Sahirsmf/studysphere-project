<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<body>
    <h1>Study Dashboard</h1>
    
    <h3>Record a Study Session</h3>
    <form method="POST">
        <label>Subject:</label>
        <select name="subject">
            <option value="Physics">Physics</option>
            <option value="Math">Math</option>
            <option value="Biology">Biology</option>
        </select>
        
        <label>Duration (mins):</label>
        <input type="number" name="duration" required>
        
        <button type="submit" name="record">Log Session</button>
    </form>

    <hr>

    <h3>Your Analytics</h3>
    <?php
    // Logic to save data if the button was clicked
    if (isset($_POST['record'])) {
        $sub = $_POST['subject'];
        $dur = $_POST['duration'];
        $date = date("Y-m-d");
        
        // Save to database [cite: 3]
        $sql = "INSERT INTO study_sessions (subject, duration, date) VALUES ('$sub', '$dur', '$date')";
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>Session recorded!</p>";
        }
    }

    // Logic to display total hours [cite: 5]
    $result = $conn->query("SELECT SUM(duration) AS total FROM study_sessions");
    $row = $result->fetch_assoc();
    $total_hours = round($row['total'] / 60, 2);
    
    echo "<p>Total Hours Studied: <strong>" . $total_hours . " hrs</strong></p>";
    ?>
</body>
</html>
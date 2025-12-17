<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; background: #f4f4f9; padding: 20px; }
        .note-card { background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .btn { cursor: pointer; padding: 5px 10px; border: none; border-radius: 4px; }
        .btn-like { background: #007bff; color: white; }
        .btn-unlike { background: #dc3545; color: white; } /* Red for Unlike */
        .comment-box { background: #f0f0f0; padding: 10px; margin-top: 10px; border-radius: 5px; }
        small { color: #666; }
    </style>
</head>
<body>
    <h1>Study Library</h1>
    <a href="index.php">Back to Home</a> <hr>

    <?php
    // --- LOGIC SECTION ---

    // 1. Handle Like Toggle
    if (isset($_POST['toggle_like'])) {
        $note_id = $_POST['note_id'];
        $user_id = 1; // Assuming User ID 1 for now (Hardcoded until Login is fully active)

        // Check if user already liked this specific note
        $check = $conn->query("SELECT * FROM interactions WHERE user_id=$user_id AND note_id=$note_id AND type='like'");

        if ($check->num_rows > 0) {
            // Already liked -> DELETE it (Unlike)
            $conn->query("DELETE FROM interactions WHERE user_id=$user_id AND note_id=$note_id AND type='like'");
        } else {
            // Not liked yet -> INSERT it (Like)
            $conn->query("INSERT INTO interactions (note_id, user_id, type) VALUES ('$note_id', '$user_id', 'like')");
        }
    }

    // 2. Handle New Comment
    if (isset($_POST['post_comment'])) {
        $note_id = $_POST['note_id'];
        $comment = $_POST['comment_text'];
        $user_id = 1; // Assuming User ID 1

        if (!empty($comment)) {
            $sql = "INSERT INTO interactions (note_id, user_id, type, comment_text) VALUES ('$note_id', '$user_id', 'comment', '$comment')";
            $conn->query($sql);
        }
    }

    // --- DISPLAY SECTION ---

    // Fetch all notes
    $sql = "SELECT notes.*, subjects.name as subject_name FROM notes 
            JOIN subjects ON notes.subject_id = subjects.id 
            ORDER BY upload_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $note_id = $row['note_id'];
            
            // Calculate Logic for THIS note
            $like_count_res = $conn->query("SELECT COUNT(*) as total FROM interactions WHERE note_id=$note_id AND type='like'");
            $like_count = $like_count_res->fetch_assoc()['total'];
            
            // Check if WE liked it (to change button color)
            $my_like = $conn->query("SELECT * FROM interactions WHERE note_id=$note_id AND user_id=1 AND type='like'");
            $is_liked = ($my_like->num_rows > 0);

            echo "<div class='note-card'>";
            echo "<h3>" . $row['title'] . " <small>(" . $row['subject_name'] . ")</small></h3>";
            echo "<a href='" . $row['file_path'] . "' target='_blank'>View File</a><br><br>";

            // Like Button Form
            $btn_class = $is_liked ? 'btn-unlike' : 'btn-like';
            $btn_text  = $is_liked ? 'Unlike' : 'Like';
            
            echo "<form method='POST' style='display:inline;'>
                    <input type='hidden' name='note_id' value='$note_id'>
                    <button type='submit' name='toggle_like' class='btn $btn_class'>$btn_text ($like_count)</button>
                  </form>";

            // Comments Section
            echo "<div class='comment-box'>";
            echo "<strong>Comments:</strong><br>";
            
            // Fetch comments for THIS note
            $comments_res = $conn->query("SELECT * FROM interactions WHERE note_id=$note_id AND type='comment'");
            while($c = $comments_res->fetch_assoc()) {
                echo "<p style='margin: 5px 0; font-size: 14px;'>&bull; " . $c['comment_text'] . "</p>";
            }

            // Add Comment Form
            echo "<form method='POST' style='margin-top:10px;'>
                    <input type='hidden' name='note_id' value='$note_id'>
                    <input type='text' name='comment_text' placeholder='Write a comment...' required style='width: 70%;'>
                    <button type='submit' name='post_comment' class='btn btn-like'>Post</button>
                  </form>";
            echo "</div>"; // End comment-box

            echo "</div>"; // End note-card
        }
    } else {
        echo "No notes uploaded yet.";
    }
    ?>
</body>
</html>
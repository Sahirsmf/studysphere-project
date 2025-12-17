<!DOCTYPE html>
<html>
<head>
    <title>StudySphere Home</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; text-align: center; padding: 50px; background: #eef2f3; }
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; max-width: 800px; margin: 40px auto; }
        .card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: transform 0.2s; }
        .card:hover { transform: translateY(-5px); }
        a { text-decoration: none; color: #333; font-weight: bold; font-size: 18px; display: block; }
        .icon { font-size: 40px; margin-bottom: 10px; display: block; }
    </style>
</head>
<body>
    <h1>Welcome to StudySphere</h1>
    <p>Select a module to begin:</p>

    <div class="menu-grid">
        <div class="card">
            <span class="icon">📊</span>
            <a href="dashboard.php">My Progress</a>
            <p>Track study hours & stats</p>
        </div>

        <div class="card">
            <span class="icon">📚</span>
            <a href="view_notes.php">Note Library</a>
            <p>Download notes & Discuss</p>
        </div>

        <div class="card">
            <span class="icon">⬆️</span>
            <a href="upload_notes.php">Upload Notes</a>
            <p>Share knowledge</p>
        </div>

        <div class="card">
            <span class="icon">⚙️</span>
            <a href="admin.php">Admin Panel</a>
            <p>Manage subjects</p>
        </div>
        
        <div class="card">
             <span class="icon">👤</span>
             <a href="register.html">Register / Login</a>
             <p>Create your account</p>
        </div>
    </div>
</body>
</html>
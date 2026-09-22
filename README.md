# StudySphere

StudySphere is a full-stack web platform that brings study tracking, note sharing, group collaboration, and gamified learning into one place for students. It combines a personal study dashboard with a community-driven notes library, smart recommendations, and a quiz/leaderboard system to keep learners engaged.

## Features

### 📊 Study Habit Tracker
- Log study sessions by subject, duration, and date
- Personal dashboard showing total hours studied, weekly goals, and subject-wise breakdowns
- Visual analytics (bar charts, graphs, trend metrics) on study habits and performance over time
- Compares actual study hours against user-set goals, with motivational prompts and badges

### 📚 Notes Sharing Platform
- Upload and share study materials (PDFs, lecture notes, images), tagged by subject and concept
- Searchable, filterable library of notes uploaded by the community
- Highlights popular and highly rated notes
- Like, comment on, and download shared materials

### 👥 Group Study & Collaboration
- Create or join study groups based on subject or interest
- Group dashboard showing combined study hours, shared files, and top contributors

### 🎯 Smart Recommendations
- Keyword-matching engine that recommends notes based on a user's most-studied subjects
- Suggests materials for topics a user hasn't covered yet
- Ranks recommendations higher based on likes and downloads
- Surfaces top-rated resources automatically after a study session is logged

### 🔐 User Authorization & Profile Management
- Secure registration and login via email or student ID, with password encryption
- Personalized profile showing study statistics, uploaded materials, and group memberships
- Editable profile details (name, photo, academic focus)

### 🧩 Knowledge Gap Identifier
- Users can flag confusing sections while reading notes ("I don't understand this")
- Flags feed a community-wide "Struggle Meter" per concept
- Concepts that cross a struggle threshold trigger a Micro-Lesson Challenge, inviting other users to submit short explainer videos or summaries
- Top-voted micro-lessons become verified "Community Clarifications" attached to the note

## Tech Stack

- **Backend:** PHP
- **Database:** MySQL / MariaDB
- **Database Management:** phpMyAdmin
- **Local Development Environment:** XAMPP (Apache + MySQL/MariaDB + PHP)

## Prerequisites

- [XAMPP](https://www.apachefriends.org/) (or a standalone Apache + PHP + MySQL/MariaDB setup)
- A modern web browser

## Installation

1. **Clone the repository** into your XAMPP `htdocs` folder:
   ```bash
   cd C:/xampp/htdocs   # or /Applications/XAMPP/htdocs on macOS
   git clone https://github.com/Sahirsmf/studysphere-project.git
   ```

2. **Start Apache and MySQL/MariaDB** from the XAMPP Control Panel.

3. **Create the database** via phpMyAdmin (`http://localhost/phpmyadmin`):
   - Create a new database, e.g. `[studysphere_db]`
   - Import the project's SQL file (`[e.g. database/studysphere.sql]`) to set up the required tables

4. **Configure the database connection**:
   - Open `[e.g. config.php / includes/db_connect.php]`
   - Update the host, username, password, and database name to match your local setup

5. **Run the app**:
   - Visit `http://localhost/studysphere-project` in your browser

## Usage

- Register a new account or log in with your email/student ID
- Log a study session from your dashboard to start tracking hours and goals
- Browse or upload notes in the Notes library, tagged by subject
- Create or join a study group to collaborate with peers

## Project Structure

```
studysphere-project/
├── [assets/]          # CSS, JS, images
├── [includes/]        # DB connection, shared PHP includes
├── [pages/]           # Feature pages (tracker, notes, groups, quizzes, etc.)
├── [database/]        # SQL schema / seed file
└── index.php
```
> Update this section to match your actual folder layout.

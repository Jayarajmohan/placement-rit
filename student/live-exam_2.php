<?php
session_start();
if (!isset($_SESSION['log_id'])) {
    header('location:../login.html');
    exit(); // Stop further execution
}

include_once("../config/connection.php");

$sql = "SELECT * FROM english ORDER BY RAND() LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $questions = array();
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
} else {
    echo "No questions found in the database.";
}

// $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Aptitude Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
     body {
            background-color: #f0f0f0;
        }
        .card {
            background-color: #ffffff;
            margin-bottom: 20px;
            border: 1px solid #e0e0e0;
        }
        .btn-primary {
            background-color: #007BFF;
            border-color: #007BFF;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
</style>
<body>
    <a href="student-dash.php" class="btn btn-secondary float-right">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <div class="container">
        <h1>English Test</h1>
        <div id="timer">Time Remaining: Loading...</div>
        <form method="post" action="evaluate-1.php" id="examForm">
            <?php
            if (!empty($questions)) {
                foreach ($questions as $question) {
                    $question_id = $question['question_id'];
                    $question_text = $question['question_text'];
                    $option_a = $question['option_a'];
                    $option_b = $question['option_b'];
                    $option_c = $question['option_c'];
                    $option_d = $question['option_d'];
    
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $question_text . '</h5>';
                    echo '<div class="form-check">';
                    echo '<input type="radio" class="form-check-input" name="question_' . $question_id . '" value="A" required>';
                    echo '<label class="form-check-label">' . $option_a . '</label>';
                    echo '</div>';
                    echo '<div class="form-check">';
                    echo '<input type="radio" class="form-check-input" name="question_' . $question_id . '" value="B" required>';
                    echo '<label class="form-check-label">' . $option_b . '</label>';
                    echo '</div>';
                    echo '<div class="form-check">';
                    echo '<input type="radio" class="form-check-input" name="question_' . $question_id . '" value="C" required>';
                    echo '<label class="form-check-label">' . $option_c . '</label>';
                    echo '</div>';
                    echo '<div class="form-check">';
                    echo '<input type="radio" class="form-check-input" name="question_' . $question_id . '" value="D" required>';
                    echo '<label class="form-check-label">' . $option_d . '</label>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
            <button type="submit" class="btn btn-primary">Submit Answers</button>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const timerDisplay = document.getElementById('timer');

        let secondsRemaining = localStorage.getItem('remainingTime'); // Get remaining time from localStorage
        if (secondsRemaining === null) {
            secondsRemaining = 120; // Set initial countdown time in seconds (if not found in localStorage)
            localStorage.setItem('initialTime', secondsRemaining); // Store initial time in localStorage
        } else {
            secondsRemaining = parseInt(secondsRemaining, 10);
        }

        // Function to update and display the countdown timer
        function updateTimer() {
            const minutes = Math.floor(secondsRemaining / 60);
            const seconds = secondsRemaining % 60;
            timerDisplay.textContent = `Time remaining: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }

        // Update and display the initial countdown timer
        updateTimer();

        // Update the timer every second
        const countdown = setInterval(function () {
            secondsRemaining--;
            localStorage.setItem('remainingTime', secondsRemaining); // Update remaining time in localStorage
            updateTimer();

            // Submit the form when the timer reaches zero
            if (secondsRemaining <= 0) {
                clearInterval(countdown); // Stop the countdown
                alert('Time Up! Your answers will be submitted automatically.');
                document.getElementById('examForm').submit(); // Submit the form
                localStorage.removeItem('remainingTime'); // Remove stored time after submission
            }
        }, 1000); // Update every second (1000 milliseconds)
    });
</script>


    
</body>
</html>

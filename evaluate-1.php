<?php

include_once("./config/connection.php");

$score = 0;

foreach ($_POST as $key => $value) {
    if (strpos($key, 'question_') === 0) {
        $question_id = substr($key, strlen('question_'));
        // Fetch the correct answer from the database
        $sql = "SELECT correct_answer FROM english WHERE question_id = $question_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $correct_answer = $row['correct_answer'];
            if ($value === $correct_answer) {
                $score++;
            }
        }
    }
}

// Close the database connection
$conn->close();

// Display the result
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Test Result</title>";
echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>";
echo "</head>";
echo "<body>";
echo "<div class='container'>";
echo "<h2>Your Score</h2>";
echo "<p>You answered " . $score . " questions correctly out of " . count($_POST) . ".</p>";
echo "</div>";
echo "</body>";
echo "</html>";
?>

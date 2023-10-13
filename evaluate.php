<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection settings
   
    include_once("./config/connection.php");

    $correct_answers = 0;

    // Fetch user answers from POST data
    $user_answers = [];
    for ($i = 1; $i <= 5; $i++) {
        $user_answers[$i] = $_POST["q$i"];
    }

    // Fetch correct answers from the database
    $sql = "SELECT question_id, correct_answer FROM aptitude";
    $result = $conn->query($sql);

    // Compare user's answers to correct answers
    while ($row = $result->fetch_assoc()) {
        $question_id = $row['question_id'];
        $correct_answer = $row['correct_answer'];

        if (isset($user_answers[$question_id]) && $user_answers[$question_id] == $correct_answer) {
            $correct_answers++;
        }
    }

    // Close the database connection
    $conn->close();

    echo "You got $correct_answers out of 5 questions correct.";
}
?>

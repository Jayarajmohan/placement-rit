<?php
session_start();
if (!isset($_SESSION['log_id'])) {
    header('location:../login.php');

}
else{
    include_once("../config/connection.php");

$score = 0;
$wronglyAnsweredQuestions = [];


foreach ($_POST as $key => $value) {
    if (strpos($key, 'question_') === 0) {
        $question_id = substr($key, strlen('question_'));
        // Fetch the correct answer and the user's answer from the database
        $sql = "SELECT * FROM aptitude WHERE question_id = $question_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $correct_answer = $row['correct_answer'];
            $question_text = $row['question_text'];
            $option_a =$row['option_a'];
            $option_b =$row['option_b'];
            $option_c =$row['option_c'];
            $option_d =$row['option_d'];
            if ($value === $correct_answer) {
                $score++;
            }
                // Store the wrongly answered question, user's answer, and correct answer
                $wronglyAnsweredQuestions[] = [
                    'question' => $question_text,
                    'user_answer' => $value,
                    'correct_answer' => $correct_answer,
                    'option_a'=> $option_a,
                    'option_b'=> $option_b,
                    'option_c'=> $option_c,
                    'option_d'=> $option_d
                ];
            
        }
    }
}


// Display the result
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Test Result</title>";
echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>";
echo "<style>
    body {
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
    }
    h2 {
        text-align: center;
    }
    p {
        text-align: center;
    }
    h3 {
        color: Blue; /* Set the color for wrong answers */
    }
    ul {
        list-style: none;
        padding: 0;
    }
    li {
        margin-bottom: 20px;
        border: 1px solid #ccc;
        padding: 10px;
    }
    li.correct {
        background-color: #c9e2c3; /* Set the background color for correct answers */
    }
    .your-correct-answer {
        color: #4CBB17; 
    }
    .your-wrong-answer {
        color: red; 
    }
</style>";
echo "</head>";
echo "<body>";
echo "<a href='student-dash.php' class='btn btn-secondary float-right'>
<i class='fas fa-arrow-left'></i> Back
</a>";
echo "<div class='container'>";
echo "<h2>Your Score</h2>";
echo "<p>You answered " . $score . " questions correctly out of "  . count($_POST) .  ".</p>";

$newScore = $score; // Adjust this according to your input method
$studentID = $_SESSION['log_id'];
// // $examname ='aptitude'; // Adjust this according to your input method
// echo $examname;
// Check if the student ID exists in the table
$checkSql = "SELECT * FROM exam_score WHERE id = $studentID AND exam_name='aptitude'";
$checkResult = $conn->query($checkSql);

if ($checkResult->num_rows > 0) {
    // Student ID exists, update the existing record
    $row = $checkResult->fetch_assoc();
    $highScore = $row['high_score'];
    $lowestScore = $row['lowest_score'];
    $countExamAttended = $row['count_exam_attended'];

    if ($newScore > $highScore || $countExamAttended == 0) {
        $highScore = $newScore;
    }

    if ($newScore < $lowestScore || $countExamAttended == 0) {
        $lowestScore = $newScore;
    }

    $countExamAttended++;

    // Update the database
    $updateSql = "UPDATE exam_score SET high_score = $highScore, lowest_score = $lowestScore, count_exam_attended = $countExamAttended WHERE id = $studentID AND exam_name='aptitude'";
    if ($conn->query($updateSql) === TRUE) {
        echo "Scores updated successfully!";
    } else {
        echo "Error updating scores: " . $conn->error;
    }
} else {
    // Student ID doesn't exist, insert a new record
    $insertSql = "INSERT INTO exam_score (id, high_score, lowest_score, exam_name, count_exam_attended) VALUES ($studentID, $newScore, $newScore, 'aptitude', 1)";
    if ($conn->query($insertSql) === TRUE) {
        echo "New record inserted successfully!";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

// Display wrongly answered questions, user's answers, and correct answers
if (!empty($wronglyAnsweredQuestions)) {
    echo "<h3>Your Response</h3>";
    echo "<ul>";
    foreach ($wronglyAnsweredQuestions as $questionData) {
        echo "<li>";
        echo "Question: " . $questionData['question'] . "<br>";
        echo "Option A: " . $questionData['option_a'] . "<br>";
        echo "Option B: " . $questionData['option_b'] . "<br>";
        echo "Option C: " . $questionData['option_c'] . "<br>";
        echo "Option D: " . $questionData['option_d'] . "<br>";
        echo "<span ". ($questionData['user_answer'] === $questionData['correct_answer'] ? " class='your-correct-answer'" : "class='your-wrong-answer'") ."> Your Answer: " . $questionData['user_answer'] . "</span><br>";
        echo "Correct Answer: " . $questionData['correct_answer'] . "<br>";
        echo "</li>";
    }
    echo "</ul>";
}

echo "</div>";
echo "</body>";
echo "</html>";
}


?>

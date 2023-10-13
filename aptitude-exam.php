<?php
// Start a session
session_start();

// Database connection settings
include_once("./config/connection.php");

// Check if questions and answers are already set in the session
if (!isset($_SESSION['questions']) || !isset($_SESSION['correct_answers'])) {
    // Fetch 5 random questions and answers from the database
    $sql = "SELECT * FROM aptitude ORDER BY RAND() LIMIT 5";
    $result = $conn->query($sql);

    $questions = [];
    $correct_answers = [];

    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
        $correct_answers[] = $row['correct_answer'];
    }

    // Store questions and correct answers in session variables
    $_SESSION['questions'] = $questions;
    $_SESSION['correct_answers'] = $correct_answers;
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_answers = [];

    for ($i = 1; $i <= 5; $i++) {
        $user_answers[] = $_POST["q$i"];
    }

    $correct_answers = $_SESSION['correct_answers'];

    $score = 0;

    for ($i = 0; $i < 5; $i++) {
        if ($user_answers[$i] === $correct_answers[$i]) {
            $score++;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>MCQ Online Exam</title>
</head>
<body>
    <h1>MCQ Online Exam</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
        if (!isset($score)) {
            $question_number = 1;
            foreach ($_SESSION['questions'] as $question) {
                echo "<p>{$question_number}. {$question['question_text']}</p>";
                echo "<input type='radio' name='q{$question_number}' value='A'> A. {$question['option_a']}<br>";
                echo "<input type='radio' name='q{$question_number}' value='B'> B. {$question['option_b']}<br>";
                echo "<input type='radio' name='q{$question_number}' value='C'> C. {$question['option_c']}<br>";
                echo "<input type='radio' name='q{$question_number}' value='D'> D. {$question['option_d']}<br><br>";
                $question_number++;
            }
            echo "<input type='submit' value='Submit'>";
        } else {
            echo "You got $score out of 5 questions correct.";
        }
        ?>
    </form>
</body>
</html>

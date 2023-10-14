<?php
// Replace with your database connection code
include_once("./config/connection.php");

// Query to retrieve questions from the database
$sql = "SELECT * FROM aptitude ORDER BY RAND() LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $questions = array();
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
} else {
    echo "No questions found in the database.";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Aptitude Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
        /* Customize the color theme */
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
<a href="career_prep_1.php" class="btn btn-secondary float-right">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
    <div class="container">
        <h1>Aptitude Test</h1>
        <form method="post" action="evaluate.php">
            <?php
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
            ?>
            <button type="submit" class="btn btn-primary">Submit Answers</button>
        </form>
    </div>
</body>
</html>

<?php

include_once("../config/connection.php");
$id = $_SESSION['log_id'];


// SQL query to retrieve data from the table
$sql = "SELECT * FROM login_1 WHERE log_id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$examsql = "SELECT * FROM exam_score WHERE id=$id AND exam_name='aptitude'";
$examresult = $conn->query($examsql);
$examrow = $examresult->fetch_assoc();

$examsql1 = "SELECT * FROM exam_score_1 WHERE id=$id AND exam_name='english'";
$examresult1 = $conn->query($examsql1);
$examrow1 = $examresult1->fetch_assoc();

$personalsql = "SELECT * FROM student_profile WHERE id=$id";
$personalresult = $conn->query($personalsql);
$personalrow = $personalresult->fetch_assoc();


?>

<div class='card'>
    <div class='card-header'>
        <h1>Welcome
            <?php echo $row['name']; ?>
        </h1>
    </div>
    <div class='card-body'>
        <div class="exam-card" style="display:flex;justify-content:space-evenly;">
            <!-- <div class="item">
                            <div class="item-list">Total Aptitude Attended: <?php echo $examrow['count_exam_attended']; ?></div>
                            <div class="item-list">highest Score : <?php echo $examrow['high_score']; ?></div>
                            <div class="item-list">lowest Score : <?php echo $examrow['lowest_score']; ?></div>
                        </div>
                        <div class="item">
                            <div class="item-list">Total English Attended: <?php echo $examrow1['count_exam_attended']; ?></div>
                            <div class="item-list">highest Score : <?php echo $examrow1['high_score']; ?></div>
                            <div class="item-list">lowest Score : <?php echo $examrow1['lowest_score']; ?></div>
                        </div> -->
                        <img width="200px" src="../<?php echo $personalrow['profilePic']; ?>" alt="" srcset=""/>
                        <div class="details" style="display:flex;flex-direction:column;">
                        <p>Name : <?php echo $personalrow['firstName'] . " " .  $personalrow['lastName']; ?></p>
                        <p>Date of Birth :<?php echo $personalrow['dob']; ?></p>
                        <p>Address :<?php echo $personalrow['address']; ?></p>
                        <p>Department :<?php echo $personalrow['department']; ?></p>
                        <p>Admission number :<?php echo $personalrow['admissionNumber']; ?></p>
                        </div>
        </div>
    </div>
</div>
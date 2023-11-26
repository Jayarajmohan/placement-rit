<?php
session_start();

// Include TCPDF library

require_once('../vendor/tecnickcom/tcpdf/tcpdf.php');

if (isset($_POST['download_pdf'])) {
    $Id = $_SESSION['log_id'];
    include_once("../config/connection.php");
    // Your existing code to get student details from the session or database
    $sql = "SELECT firstName, lastName , department FROM student_profile WHERE id = $Id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $studentName = $row['firstName'] .' '.$row['lastName']; // Replace with actual name
    $department = $row['department']; // Replace with actual department
    $date = date("Y-m-d");

    // Create PDF instance
    $pdf = new TCPDF();

    // Set document information
    $pdf->SetCreator('Your Creator');
    $pdf->SetAuthor('Your Author');
    $pdf->SetTitle('No Dues Certificate');
    $pdf->SetSubject('No Dues Certificate');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // Your content
    $pdf->SetXY(50, 10);
    $pdf->Cell(100, 10, 'Rajiv Gandhi Institute of Technology Kottayam', 0, 1, 'C');
    $pdf->SetXY(50, 20);
    $pdf->Cell(100, 10, 'The Placement Cell And Career Guidance', 0, 1, 'C');

    // Right side content
    $pdf->SetXY(120, 20);
    $pdf->Cell(80, 20, "Dated: $date", 0, 1, 'R');

    // Certificate title
    $pdf->SetXY(50, 40);
    $pdf->Cell(100, 10, 'NO DUES CERTIFICATE', 0, 1, 'C');

    // Left side content

    // Justified content
    $pdf->SetXY(10, 60);
    $pdf->MultiCell(100, 10, "This is to certify that this placement office has ‘NO DUES’ against (Mr/mis). $studentName Deptt. $department RIT Kottayam.", 0, 'J');

    // Aligned at the right
    $pdf->SetXY(120, $pdf->GetY() + 10);
    $pdf->Cell(80, 10, "(Prof.Ebin M Manuel)\nPlacement Officer", 0, 1, 'R');
    // Output the content to PDF
    

    // Save the PDF to a file or force download
    $pdf->Output('NoDuesCertificate.pdf', 'D');
    echo "<script> alert('Your Certificate Downloading!');
    window.location= 'student-dash.php';
    </script>";
    exit;
}
?>




    <?php
    // Database connection
    include_once("../config/connection.php");
    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv'])) {
        $csvFile = $_FILES['csv']['tmp_name'];

        if (($handle = fopen($csvFile, "r")) !== FALSE) {
            // Loop through rows and insert/update data
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (count($data) === 10) {
                    $company = $data[0];
                    $ce = $data[1];
                    $cse = $data[2];
                    $ece = $data[3];
                    $eee = $data[4];
                    $me = $data[5];
                    $mtech = $data[6];
                    $mca = $data[7];
                    $barch = $data[8];
                    $total = $data[9];

                    // Check if the company already exists in the table
                    $checkCompany = "SELECT * FROM placement_statistics WHERE Company = '$company'";
                    $result = $conn->query($checkCompany);

                    if ($result->num_rows > 0) {
                        // Update existing record
                        $updateQuery = "UPDATE placement_statistics SET 
                            CE = '$ce',
                            CSE = '$cse',
                            ECE = '$ece',
                            EEE = '$eee',
                            ME = '$me',
                            MTECH = '$mtech',
                            MCA = '$mca',
                            BARCH = '$barch',
                            Total = '$total'
                            WHERE Company = '$company'";
                    } else {
                        // Insert new record
                        $updateQuery = "INSERT INTO placement_statistics (Company, CE, CSE, ECE, EEE, ME, MTECH, MCA, BARCH,Total)
                            VALUES ('$company', '$ce', '$cse', '$ece', '$eee', '$me', '$mtech', '$mca', '$barch','$total')";
                    }

                    if ($conn->query($updateQuery) !== TRUE) {
                        echo "<p>Error updating data: " . $conn->error . "</p>";
                    }
                }
            }
            fclose($handle);
        }

        echo "<p>Data updated successfully!</p>";
        echo "<script> alert('Data updated successfully!');
        window.location= 'dashboard-admin.php';
        </script>";
    }
    ?>

    <!-- Form for adding/updating data from CSV -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label for="csv">Upload CSV File:</label>
        <input type="file" name="csv" id="csv" accept=".csv">
        <br>
        <input type="submit" value="Submit">
    </form>


<?php
// Close the database connection
// $conn->close();
?>

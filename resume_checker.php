

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['resume'])) {
        // Process the uploaded file
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['resume']['name']);

        if (move_uploaded_file($_FILES['resume']['tmp_name'], $uploadFile)) {
            // File uploaded successfully
            // Now, calculate the scores (replace these scores with actual logic)
            $resumeScores = [
                'relevance' => 8,
                'education' => 9,
                'experience' => 7,
                'skills' => 8,
                'achievements' => 9,
                'reputation' => 7,
                'adaptability' => 8,
                'culturalFit' => 9,
                'communication' => 8,
                'attentionToDetail' => 9,
                'coverLetter' => 7,
            ];

            // Calculate overall score
            $overallScore = calculateOverallScore($resumeScores);

            // Display the result
            // echo "<p>Overall Resume Score: $overallScore</p>";
            echo "<script> alert('Overall Resume Score: $overallScore');
            window.location= 'Placement_event_6.php';
            </script>";

        } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
        }
    }
    ?>

    <!-- Form for file upload -->
    

    <?php
    // Function to calculate the overall score
    function calculateOverallScore($scores) {
        // Replace this with your scoring logic
        $weights = [
            'relevance' => 1,
            'education' => 1,
            'experience' => 2,
            'skills' => 2,
            'achievements' => 2,
            'reputation' => 1,
            'adaptability' => 1,
            'culturalFit' => 1,
            'communication' => 1,
            'attentionToDetail' => 1,
            'coverLetter' => 1,
        ];

        $weightedSum = 0;

        foreach ($scores as $category => $score) {
            $weightedSum += $score * $weights[$category];
        }

        $totalWeight = array_sum($weights);

        return round($weightedSum / $totalWeight, 2);
    }
    ?>

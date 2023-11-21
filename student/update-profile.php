<?php
if (!isset($_SESSION['log_id'])) {
  header('location:../login.html');

} else {
  include_once("../config/connection.php");
  $id = $_SESSION['log_id'];


  $personalsql = "SELECT * FROM student_profile WHERE id=$id";
  $personalresult = $conn->query($personalsql);
  $personalrow = $personalresult->fetch_assoc();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDirectory = "profile_pics/";  // Change this to your desired directory
    $profilePic = $targetDirectory . basename($_FILES["profilePic"]["name"]);
    move_uploaded_file($_FILES["profilePic"]["tmp_name"], $profilePic);
    $pemail = $_POST["pemail"];
    $mobile = $_POST["mobile"];
    $linkedin = $_POST["linkedin"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $pinCode = $_POST["pinCode"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $currentSemester = $_POST["currentSemester"];

    $updateSql = "UPDATE student_profile 
              SET 
                profilePic = ?,
                email = ?,
                mobile = ?,
                linkedin = ?,
                address = ?,
                city = ?,
                pinCode = ?,
                state = ?,
                country = ?,
                currentSemester = ?
              WHERE 
                id = ?";

// Create a prepared statement
$stmt = $conn->prepare($updateSql);

// Bind the parameters
$stmt->bind_param("ssssssssssi", $profilePic, $pemail, $mobile, $linkedin, $address, $city, $pinCode, $state, $country, $currentSemester, $id);

// Execute the prepared statement
if ($stmt->execute()) {
    
    echo "<script> alert('Record updated successfully!');
        window.location= 'student-dash.php';
        </script>";
} else {
    
    echo "<script> alert('Error updating record!');
    window.location= 'student-dash.php';
    </script>";
}
  }

}
?>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  .container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  h2 {
    text-align: center;
    color: #333;
  }

  form {
    display: grid;
    gap: 10px;
  }

  label {
    font-weight: bold;
  }

  input,
  select {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
  }

  .file-upload {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .file-upload img {
    max-width: 150px;
    max-height: 150px;
    margin-top: 10px;
    border-radius: 50%;
  }

  button {
    background-color: #005b96;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .qualification-section {
    margin-top: 10px;
  }

  .qualification-row {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 10px;
  }

  @media (max-width: 600px) {
    .container {
      padding: 10px;
    }
  }
</style>

<h2>Profile Registration Form</h2>

<form action="" method="post" enctype="multipart/form-data">
  <div class="file-upload">
    <label for="profilePic">Upload Profile Picture:</label>
    <input value="<?php echo $personalrow['profilePic']; ?>" type="file" id="profilePic" name="profilePic" accept="image/*" />
    <img src="../<?php echo $personalrow['profilePic']; ?>" id="previewImage" alt="Preview Image" />
  </div>
  <label for="firstName">First Name:</label>
  <input type="text" id="firstName" disabled value="<?php echo $personalrow['firstName'] ?>" name="firstName"
    required />

  <label for="lastName">Last Name:</label>
  <input type="text" id="lastName" disabled value="<?php echo $personalrow['lastName'] ?>" name="lastName" required />

  <!-- <label for="dob">Date of Birth:</label>
  <input type="date" id="dob" value="<?php echo $personalrow['dob'] ?>" name="dob" required /> -->

  <!-- <label for="username">Username:</label>
  <input type="text" id="username" name="username" required />

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required /> -->

  <!-- <label for="cemail">College Email ID:</label>
  <input type="email" id="email" name="cemail" required /> -->

  <label for="pemail">Personal Email ID:</label>
  <input type="email" id="email" value="<?php echo $personalrow['email'] ?>" name="pemail" required />

  <label for="mobile">Mobile Number:</label>
  <input type="tel" id="mobile" value="<?php echo $personalrow['mobile'] ?>" name="mobile" required />

  <label for="linkedin">LinkedIn:</label>
  <input type="text" id="linkedin" value="<?php echo $personalrow['linkedin'] ?>" name="linkedin" />

  <!-- <label for="gender">Gender:</label>
  <select id="gender" name="gender">
    <option value="" selected disabled>Select Gender</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="other">Other</option>
  </select> -->

  <label for="address">Address:</label>
  <input type="text" id="address" value="<?php echo $personalrow['address'] ?>" name="address" />

  <label for="city">City:</label>
  <input type="text" id="city" value="<?php echo $personalrow['city'] ?>" name="city" />

  <label for="pinCode">PIN Code:</label>
  <input type="text" id="pinCode" value="<?php echo $personalrow['pinCode'] ?>" name="pinCode" />

  <label for="state">State:</label>
  <input type="text" id="state" value="<?php echo $personalrow['state'] ?>" name="state" />

  <label for="country">Country:</label>
  <input type="text" id="country" value="<?php echo $personalrow['country'] ?>" name="country" />

  <!-- <label for="admissionNumber">Admission Number:</label>
  <input type="number" id="admissionNumber" name="admissionNumber" /> -->

  <!-- <label for="department">Department:</label>
  <select id="department" name="department">
    <option value="" selected disabled>Select Department</option>
    <option value="CSE">CSE</option>
    <option value="EEE">EEE</option>
    <option value="EC">EC</option>
    <option value="MECH">MECH</option>
    <option value="MCA">MCA</option>
    <option value="MTECH">MTECH</option>
    <option value="CIVIL">CIVIL</option>
    <option value="BARCH">BARCH</option>
  </select> -->

  <label for="currentSemester">Current Semester:</label>
  <input type="text" id="currentSemester" value="<?php echo $personalrow['currentSemester'] ?>"
    name="currentSemester" />



  <button type="submit">Update</button>
</form>
<script>
  // Display preview of the uploaded image
  document
    .getElementById("profilePic")
    .addEventListener("change", function (event) {
      var preview = document.getElementById("previewImage");
      var file = event.target.files[0];
      var reader = new FileReader();

      reader.onloadend = function () {
        preview.src = reader.result;
      };

      if (file) {
        reader.readAsDataURL(file);
      } else {
        preview.src = "";
      }
    });

  document
    .getElementById("showDiplomaFields")
    .addEventListener("change", function () {
      var diplomaFields = document.getElementById("diplomaFields");
      diplomaFields.style.display = this.checked ? "block" : "none";
    });

  document
    .getElementById("showGraduationFields")
    .addEventListener("change", function () {
      var graduationFields = document.getElementById("graduationFields");
      graduationFields.style.display = this.checked ? "block" : "none";
    });
</script>
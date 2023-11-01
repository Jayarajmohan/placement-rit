<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <title></title>
    <style>
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .wrapper {
            max-width: 350px;
            width: 100%;
            background: #fff;
            padding: 25px;
            border-radius: 5px;
            box-shadow: 1px 1px 1px rgb(189, 207, 228);
        }

        .wrapper h2 {
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #332902;
        }

        .wrapper .input_field {
            margin-bottom: 10px;
        }

        .wrapper .input_field input[type="text"],
        .wrapper textarea {
            border: 1px solid #66dbff;
            border-radius: 5px;
            width: 100%;
            padding: 10px;
        }

        .wrapper textarea {
            resize: none;
            height: 80px;
        }

        .wrapper .btn input[type="submit"] {
            border: 0px;
            margin-top: 15px;
            padding: 10px;
            text-align: center;
            width: 100%;
            background: #00a2ff;
            color: #332902;
            text-transform: uppercase;
            letter-spacing: 5px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        #error_message {
            margin-bottom: 20px;
            background: #fe8b8e;
            padding: 0px;
            text-align: center;
            font-size: 14px;
            transition: all 0.5s ease;
        }
    </style>
</head>

<body>
    <?php include_once("header.php") ?>
    <div class="container">

        <div class="wrapper">
            <h2>Feedback Form</h2>
            <div id="error_message"></div>
            <form id="myform" action="process_feedback.php" method="post">
                <div class="input_field">
                    <input type="text" placeholder="Name" id="fname" name="name">
                </div>
                <div class="input_field">
                    <input type="text" placeholder="Phone" id="phone" name="phone">
                </div>
                <div class="input_field">
                    <input type="text" placeholder="Email" id="email" name="email">
                </div>
                <div class="input_field">
                    <p>Is there a section for alumni success stories or a forum for community interaction?</p>
                    <label><input type="radio" name="Q1" value="1"> Yes</label>
                    <label><input type="radio" name="Q1" value="0"> No</label>
                </div>
                <div class="input_field">
                    <p>Is contact information for the placement cell easy to find?</p>
                    <label><input type="radio" name="Q2" value="1"> Yes</label>
                    <label><input type="radio" name="Q2" value="0"> No</label>
                </div>
                <div class="input_field">
                    <p>Is there an easy way to submit resumes and applications through the website?</p>
                    <label><input type="radio" name="Q3" value="1"> Yes</label>
                    <label><input type="radio" name="Q3" value="0"> No</label>
                </div>
                <div class="input_field">
                    <p>Is there relevant content, such as career advice, interview tips, and resume templates?</p>
                    <label><input type="radio" name="Q4" value="1"> Yes</label>
                    <label><input type="radio" name="Q4" value="0"> No</label>
                </div>
                <div class="input_field">
                    <p>Is the website easy to navigate?</p>
                    <label><input type="radio" name="Q5" value="1"> Yes</label>
                    <label><input type="radio" name="Q5" value="0"> No</label>
                </div>
                <div class="input_field">
                    <p>Is it clear how to apply for job listings?</p>
                    <label><input type="radio" name="Q6" value="1"> Yes</label>
                    <label><input type="radio" name="Q6" value="0"> No</label>
                </div>
                <div class="input_field">
                    <p>Is there an easy way to submit?</p>
                    <label><input type="radio" name="Q7" value="1"> Yes</label>
                    <label><input type="radio" name="Q7" value="0"> No</label>
                </div>
                <div class="btn">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
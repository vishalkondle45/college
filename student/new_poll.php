<?php
include_once 'header.php';
include_once 'session.php';

// When Submit's a Form
if (isset($_POST['submit'])) {
    $question = $_POST['question'];
    if (mysqli_query($conn, "INSERT INTO poll VALUES(NULL, '$question', '$collegeid', '$usertype', '$userid', current_timestamp())")) {
        $query = mysqli_query($conn, "SELECT * FROM poll WHERE question = '$question' AND college_id = '$collegeid' AND poll_by = '$usertype' AND `user_id` = '$userid' ORDER BY id DESC LIMIT 1");
        $row = mysqli_fetch_array($query);
        $poll_id = $row['id'];
        foreach ($_POST['options'] as $selected) {
            if (mysqli_query($conn, "INSERT INTO options VALUES(NULL, '$poll_id', '$selected')")) {
                // echo "<script>alert('Working')</script>";
            }
        }
        echo "<script>window.location.href='polls.php'</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatHub</title>
</head>

<body>
    <br><br><br><br>
    <div class="w3-row w3-panel">
        <div class="w3-col w3-hide-small" style="width:20%">&emsp;</div>
        <div class="w3-col" style="width:60%">
            <div class="w3-container w3-border">
                <p class="w3-xxlarge w3-center w3-container w3-blue w3-margin-top">Create a new Poll</p>
                <form action="" method="post">
                    <br>
                    <input type="text" class="input" name="question" placeholder="Poll Question" required>
                    <br><br>
                    <div class="w3-container" id="options">
                        <input type="text" class="input" name="options[]" placeholder="Option" required>
                        <br><br>
                        <input type="text" class="input" name="options[]" placeholder="Option" required>
                    </div>
                    <br>
                    <button class="w3-btn w3-red w3-half" type="button" id="add">New Option</button>
                    <button class="w3-btn w3-green w3-right w3-half" type="submit" name="submit">Submit</button>
                    <br><br>
                </form>
            </div>
        </div>
        <div class="w3-col w3-hide-small" style="width:20%"></div>
    </div>




    <!-- <div class="w3-row w3-panel">
        <div class="w3-col w3-hide-small" style="width:20%">&emsp;</div>
        <div class="w3-col" style="width:60%">
            <div class="w3-container">
                <form action="" method="post">
                    <input type="text" class="w3-input w3-border" name="question" placeholder="Poll Question" required>
                    <br>
                    <div class="w3-container" id="options">
                        <input type="text" class="w3-input" name="options[]" placeholder="Option" required>
                        <input type="text" class="w3-input" name="options[]" placeholder="Option" required>
                    </div>
                    <br>
                    <button class="w3-btn w3-red" type="button" id="add">+</button>
                    <button class="w3-btn w3-green w3-right" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
        <div class="w3-col w3-hide-small" style="width:20%"></div>
    </div> -->
</body>

</html>

<script>
    $(document).ready(function() {
        // var count = 2;
        $("#add").click(function() {
            // count++;
            $("#options").append('<input type="text" class="input w3-margin-top" style="width:89%;" name="options[]" placeholder="Option" required> <button style="width:10%;" onclick="$(this).prev().remove(); $(this).remove();" type="button" class="w3-btn w3-black w3-margin-top"> Delete </button>');
        });
    });
</script>
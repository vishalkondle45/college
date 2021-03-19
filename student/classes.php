<?php
include_once 'header.php';
include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatHub</title>
</head>
<style>
    @media only screen and (max-width: 1026px) {
        .hidethis {
            display: none;
        }
    }

    .image-cropper {
        width: 50px;
        height: 50px;
        position: relative;
        overflow: hidden;
        border-radius: 50%;
        border: solid 0.0002em black;
    }

    .profile-pic {
        display: inline;
        margin: 0 auto;
        /* margin-left: 25%; */
        /* height: 100%; */
        width: auto;
    }

    /* a,
    a:visited,
    a:hover,
    a:active {
        color: inherit;
    } */
</style>

<body>

    <br><br><br>
    <div class="w3-container">

        <button class="button is-primary"> <i class="fa fa-chalkboard-teacher"></i>&nbsp;&nbsp;Join Class</button>
        &emsp;
        <button class="button is-info"> <i class="fa fa-calendar"></i>&nbsp;&nbsp;Calender</button>
        <!-- Classes -->
        <div class="w3-row-padding w3-margin-top">

            <?php
            // Check all Classes
            $query = mysqli_query($conn, "SELECT * FROM `classes` WHERE `college_id`= 1");
            $i = 0;
            while ($row = mysqli_fetch_array($query)) {
                // Incrementing i Value
                $i++;

                // Fetching needed Data
                $teacher_id = $row['teacher_id'];
                $subject = $row['subject'];

                // Searching Teachers Data
                $query1 = mysqli_query($conn, "SELECT * FROM users WHERE id='$teacher_id'");
                $row1 = mysqli_fetch_assoc($query1);
            ?>
                <!-- Fetching Each Class -->
                <a href="class.php?clsss=<?php echo $row['class_key']; ?>" style="color: inherit;">
                    <div class="w3-quarter">
                        <div class="w3-card" style="width:80%">
                            <img src="../media/dp/<?php echo $row1['photo'] ?>" class="w3-image" alt="Person" style="width:100%">
                            <div class="w3-padding">
                                <h4><b><?php echo "Prof. " . $row1['fname'] . ' ' . $row1['lname'] ?></b></h4>
                                <p><?php echo $row['subject'] ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            <?php
                // Check capacity of a line of 4
                if ($i % 4 === 0)
                    echo "<p>&emsp;</p>";
            } ?>
        </div>

    </div>

</body>

</html>

<script>
    $(document).ready(function() {

    });
</script>
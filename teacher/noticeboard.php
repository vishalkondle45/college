<?php
include_once 'header.php';
include_once 'session.php';
// * Highlight
// ! Error
// ? Question
// // Strike
// TODO Todo

$colors = array("is-primary", "is-link", "is-success", "is-warning", "is-danger", "is-info", "is-dark")

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticeboard</title>
</head>
<style>
    @media only screen and (max-width: 1026px) {
        .hidethis {
            display: none;
        }
    }
</style>

<body>

    <br><br><br>

    <div class="w3-container">
        <div class="w3-green w3-center w3-round w3-padding w3-xlarge w3-margin-bottom">
            Noticeboard
        </div>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM noticeboard WHERE college_id='$collegeid'");
        while ($row = mysqli_fetch_array($query)) {
            $n = mt_rand(0, 7);
        ?>
            <article class="message <?php echo $colors[$n]; ?> w3-card-4">
                <div class="message-header">
                    <p><?php echo $row['title']; ?></p>
                    <!-- <button class="delete" aria-label="delete"></button> -->
                </div>
                <div class="message-body">
                    <?php echo $row['notice']; ?>
                </div>
            </article>
        <?php
        }
        ?>
    </div>
    <br>
</body>

</html>

<script>
    $(document).ready(function() {});
</script>
<?php
include_once 'header.php';
include_once 'session.php';
// * Highlight
// ! Error
// ? Question
// // Strike
// TODO Todo
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
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
    <div class="w3-container w3-responsive">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="is-selected">
                    <th>#</th>
                    <th>Subject</th>
                    <th>Shared By</th>
                    <th>Download</th>
                    <th>Shared on</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $notes = mysqli_query($conn, "SELECT * FROM `notes` WHERE `department`='CSE'");
                while ($row = mysqli_fetch_array($notes)) {
                    $teacher_id = $row['shared_by'];
                    $teacher = mysqli_query($conn, "SELECT * FROM users WHERE id = '$teacher_id'");
                    $row1 = mysqli_fetch_assoc($teacher);
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row1['fname'] . ' ' . $row1['lname']; ?></td>
                        <td><a href="../media/notes/<?php echo $row['file']; ?>" download><?php echo $row['file']; ?></a></td>
                        <td><?php echo $row['time']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {});
</script>
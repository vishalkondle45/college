<?php
include_once 'header.php';
include_once 'session.php';

if (isset($_POST['new_assignment'])) {

    $subject = $_POST["subject"];
    $last_date = $_POST["last_date"];
    //Status
    $tempname = $_FILES["assignment"]["tmp_name"];
    $filename = $_FILES["assignment"]["name"];

    //Setting File Name
    $id = md5(time());
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filename =  $id . '.' . $ext;
    $folder = "../media/assignment/" . $filename;

    //Uploading File
    if (move_uploaded_file($tempname, $folder)) {
    } else {
        echo "<script>alert('Error While Uploading Logo!!!')</script>";
        exit();
    }


    foreach ($_POST['show'] as $show) {
        if (mysqli_query($conn, "INSERT INTO assignment VALUES(NULL, '$collegeid', '$subject', '$show', '$department', '$userid', '$filename', current_timestamp(), '$last_date')")) {
            echo "<script>
                alert('Notes Added Successful!!!')
                window.location.href='assignment.php';
            </script>";
        } else {
            echo "INSERT INTO assignment VALUES(NULL, '$collegeid', '$subject', '$show', '$department', '$userid', '$filename', current_timestamp(), '$last_date')";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submissions</title>
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
    <div class="w3-responsive w3-container">
        <input type="text" class="w3-input" oninput="w3.filterHTML('#id01', '.item', this.value)" placeholder="Search Keywords..">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth" id="id01">
            <thead>
                <tr class="is-selected">
                    <th>#</th>
                    <th>Assignmet ID</th>
                    <th>User ID</th>
                    <th>Reply</th>
                    <th>Shared on</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $notes = mysqli_query($conn, "SELECT * FROM `submissions`");
                while ($row = mysqli_fetch_assoc($notes)) {
                    $assignment_id = $row['assignment_id'];
                    $assignment = mysqli_query($conn, "SELECT * FROM assignment WHERE id = '$assignment_id'");
                    $assignment = mysqli_fetch_assoc($assignment);
                    $user = $assignment['shared_by'];
                    if ($user != $userid)
                        continue;
                    $submitter = $row['user_id'];
                    $submitter = mysqli_query($conn, "SELECT * FROM users WHERE id = '$submitter'");
                    $submitter = mysqli_fetch_assoc($submitter);
                    $user = mysqli_query($conn, "SELECT * FROM users WHERE `id` = '$user'");
                    $user = mysqli_fetch_assoc($user);
                    $query3 = mysqli_query($conn, "SELECT * FROM `submissions` WHERE `assignment_id`='$assignment_id'");
                ?>
                    <tr class="item">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $assignment['subject']; ?></td>
                        <td><a href="profile.php?user=<?php echo $submitter['username']; ?>"><?php echo $submitter['username']; ?></a></td>
                        <td><a href="../media/notes/<?php echo $row['assignment_answer'];; ?>" download>Download <i class="fa fa-download"></i></a></td>
                        <td><?php echo date("d/m/Y", strtotime($assignment['time'])); ?></td>
                        <td><i class="fa fa-trash-o w3-hover-text-red remove" id="<?php echo $assignment['id']; ?>"></i></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $(".remove").click(function() {
            var d = $(this);
            var id = $(this).attr("id");
            // alert(id);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'delete_assignment',
                    id: id
                },
                success: function(data) {
                    d.parent("td").parent("tr").hide();
                }
            });
        });
    });
</script>
<?php
include_once 'header.php';
include_once 'session.php';

if (isset($_POST['upload'])) {

    $assignment_id = $_POST["assignment_id"];
    //Status
    $tempname = $_FILES["upload_file"]["tmp_name"];
    $filename = $_FILES["upload_file"]["name"];

    //Setting File Name
    $id = md5(time());
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filename =  $id . '.' . $ext;
    $folder = "../media/submissions/" . $filename;

    //Uploading File
    if (move_uploaded_file($tempname, $folder)) {
    } else {
        echo "<script>alert('Error While Uploading Logo!!!')</script>";
        exit();
    }

    if (mysqli_query($conn, "INSERT INTO `submissions` VALUES(NULL, '$assignment_id', '$userid', '$filename', current_timestamp())")) {
        echo "<script>
                alert('Assignment Submission Successful!!!')
                window.location.href='assignment.php';
            </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>
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
        <input type="text" class="w3-input" oninput="w3.filterHTML('#id01', '.item', this.value)" placeholder="Search Keywords..">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth" id="id01">
            <thead>
                <tr class="is-selected">
                    <th>#</th>
                    <th>Subject</th>
                    <th>Shared By</th>
                    <th>Download</th>
                    <th>Upload</th>
                    <th>Shared on</th>
                    <th>Last Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $notes = mysqli_query($conn, "SELECT * FROM `assignment` WHERE `department`='$user_department' AND `year`='$user_year'");
                while ($row = mysqli_fetch_assoc($notes)) {
                    $assignment_id = $row['id'];
                    $teacher_id = $row['shared_by'];
                    $teacher = mysqli_query($conn, "SELECT * FROM users WHERE id = '$teacher_id'");
                    $row1 = mysqli_fetch_assoc($teacher);
                    $query3 = mysqli_query($conn, "SELECT * FROM `submissions` WHERE `assignment_id`='$assignment_id' AND `user_id`='$userid'");
                ?>
                    <tr class="item">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row1['fname'] . ' ' . $row1['lname']; ?></td>
                        <td><a href="../media/notes/<?php echo $row['file'];; ?>" download><?php echo $row['file']; ?></a></td>
                        <td class="w3-row">
                            <?php
                            if (mysqli_num_rows($query3) == 0) {
                            ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $assignment_id; ?>" name="assignment_id">
                                    <input type="file" name="upload_file" id="" class="w3-threequarter">
                                    <button class="button w3-rest is-danger" name="upload">Upload</button>
                                </form>
                            <?php } else {
                                echo "Already Submitted!!";
                            } ?>
                        </td>
                        <td><?php echo $row['time']; ?></td>
                        <td><?php echo $row['last']; ?></td>
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
    $(document).ready(function() {
        // $(".upload").click(function() {
        //     alert($(this).siblings("input").val());
        // });
    });
</script>
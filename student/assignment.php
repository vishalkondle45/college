<?php
include_once 'header.php';
include_once 'session.php';

if (isset($_POST['upload'])) {

    $id = $_POST["id"];
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

    if (mysqli_query($conn, "INSERT INTO `submissions` VALUES(NULL, '$id', '$userid', '$filename', current_timestamp())")) {
        echo "<script>
                alert('College Added Successful!!!')
                location.reload();
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
        <table class="table is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="is-selected">
                    <th>#</th>
                    <th>Subject</th>
                    <th>Shared By</th>
                    <th>Download</th>
                    <th>Upload</th>
                    <th>Shared on</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $notes = mysqli_query($conn, "SELECT * FROM `assignment` WHERE `department`='CSE'");
                while ($row = mysqli_fetch_assoc($notes)) {
                    $assignment_id = $row['id'];
                    $teacher_id = $row['shared_by'];
                    $teacher = mysqli_query($conn, "SELECT * FROM users WHERE id = '$teacher_id'");
                    $row1 = mysqli_fetch_assoc($teacher);
                    $query3 = mysqli_query($conn, "SELECT * FROM `submissions` WHERE `assignment_id`='$assignment_id'");
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row1['fname'] . ' ' . $row1['lname']; ?></td>
                        <td><a href="../media/notes/<?php echo $row['file']; ?>"><?php echo $row['file']; ?></a></td>
                        <td class="w3-row">
                            <?php
                            if (mysqli_num_rows($query3) == 0) {
                            ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                    <input type="file" name="upload_file" id="" class="w3-threequarter">
                                    <button class="button w3-rest is-danger" name="upload">Upload</button>
                                </form>
                            <?php } else {
                                echo "Already Submitted!!";
                            } ?>
                        </td>
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
    $(document).ready(function() {
        // $(".upload").click(function() {
        //     alert($(this).siblings("input").val());
        // });
    });
</script>
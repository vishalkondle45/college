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
    <div class="w3-row">
        <div class="w3-half">.
            <div class="w3-container">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="field">
                        <label class="label w3-left-align">Subject</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="text" name="subject" placeholder="Subject ?">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">Year</label>
                        <div class="select is-multiple">
                            <select multiple size="4" name="show[]">
                                <?php
                                $query = mysqli_query($conn, "SELECT DISTINCT `year` FROM `year` WHERE `college_id` = '$collegeid'");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">Assignemnt</label>
                        <div class="controls">
                            <input type="file" name="assignment" id="" accept='image/*,application/pdf,image/x-eps'>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">Last Date</label>
                        <div class="controls">
                            <input type="date" name="last_date" class="date">
                        </div>
                    </div>

                    <hr>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-success" type="submit" name="new_assignment">Submit</button>
                        </div>
                        <div class="control">
                            <button class="button is-danger" name="cancel" type="reset">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="w3-half w3-responsive w3-container">
            <input type="text" class="w3-input" oninput="w3.filterHTML('#id01', '.item', this.value)" placeholder="Search Keywords..">
            <table class="table is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr class="is-selected">
                        <th>#</th>
                        <th>Subject</th>
                        <th>Year</th>
                        <th>Download</th>
                        <th>Shared on</th>
                        <th>Last Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $notes = mysqli_query($conn, "SELECT * FROM `assignment` WHERE `shared_by`='$userid'");
                    while ($row = mysqli_fetch_assoc($notes)) {
                        $assignment_id = $row['id'];
                        $teacher_id = $row['shared_by'];
                        $teacher = mysqli_query($conn, "SELECT * FROM users WHERE id = '$teacher_id'");
                        $row1 = mysqli_fetch_assoc($teacher);
                        $query3 = mysqli_query($conn, "SELECT * FROM `submissions` WHERE `assignment_id`='$assignment_id'");
                    ?>
                        <tr class="item">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['year']; ?></td>
                            <td><a href="../media/notes/<?php echo $row['file'];; ?>" download>Download <i class="fa fa-download"></i></a></td>
                            <td><?php echo date("d/m/Y", strtotime($row['time'])); ?></td>
                            <td><?php echo date("d/m/Y", strtotime($row['last'])); ?></td>
                            <td><i class="fa fa-trash-o w3-hover-text-red remove" id="<?php echo $row['id']; ?>"></i></td>
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
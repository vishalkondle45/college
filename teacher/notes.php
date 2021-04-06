<?php
include_once 'header.php';
include_once 'session.php';
if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    // $notes = $_POST['notes'];

    //Photo
    $tempname = $_FILES["notes"]["tmp_name"];
    $filename = $_FILES["notes"]["name"];
    //Setting File Name
    $id = md5(time());
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filename =  $id . '.' . $ext;
    $folder = "../media/notes/" . $filename;
    //Uploading File
    if (move_uploaded_file($tempname, $folder)) {
    } else {
        echo "<script>alert('Error While Uploading Image!!!')</script>";
        exit();
    }

    foreach ($_POST['show'] as $show) {
        if (mysqli_query($conn, "INSERT INTO notes VALUES(NULL, '$collegeid', '$subject', '$show', '$department', '$userid', '$filename', current_timestamp())")) {
            echo "<script>alert('Notes Added Successful!!!')
            window.location.href='notes.php';
            </script>";
        } else {
            echo "INSERT INTO notes VALUES(NULL, '$collegeid', '$subject', '$show', '$department', '$userid', '$filename', current_timestamp())";
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
    <div class="w3-row">
        <div class="w3-col w3-border-right" style="width:40%">
            <!-- Main Content -->
            <div class="section">
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
                        <label class="label w3-left-align">Notes</label>
                        <div class="controls">
                            <input type="file" name="notes" id="" accept='image/*,application/pdf,image/x-eps'>
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

                    <hr>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-success" type="submit" name="submit">Submit</button>
                        </div>
                        <div class="control">
                            <button class="button is-danger" name="cancel" type="reset">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="w3-rest">
            <div class="section">
                <!-- <div class="w3-container w3-responsive"> -->
                <input type="text" class="w3-input" oninput="w3.filterHTML('#id01', '.item', this.value)" placeholder="Search Keywords..">
                <table class="table is-striped is-narrow is-hoverable is-fullwidth" id="id01">
                    <thead>
                        <tr class="is-selected">
                            <th>#</th>
                            <th>Subject</th>
                            <th>Year</th>
                            <th>Download</th>
                            <th>Shared on</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $notes = mysqli_query($conn, "SELECT * FROM `notes` WHERE `shared_by`='$userid'");
                        while ($row = mysqli_fetch_array($notes)) {
                            $teacher_id = $row['shared_by'];
                            $teacher = mysqli_query($conn, "SELECT * FROM users WHERE id = '$teacher_id'");
                            $row1 = mysqli_fetch_assoc($teacher);
                        ?>
                            <tr class="item">
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td><?php echo $row['year']; ?></td>
                                <td><a href="../media/notes/<?php echo $row['file']; ?>" download><?php echo $row['file']; ?></a></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><i class="fa fa-trash-o w3-hover-text-red remove" id="<?php echo $row['id']; ?>"></i></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- </div> -->
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
                    action: 'delete_notes',
                    id: id
                },
                success: function(data) {
                    d.parent("td").parent("tr").hide();
                }
            });
        });
    });
</script>
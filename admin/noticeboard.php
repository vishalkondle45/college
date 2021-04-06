<?php
include_once 'session.php';
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');
$students = mysqli_query($conn, "SELECT * FROM noticeboard ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<style>
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
</style>

<body>
    <?php include_once 'header.php'; ?>
    <br>
    <!-- Main Content -->
    <div class="table-container section">
        <input type="text" class="w3-input" oninput="w3.filterHTML('#id01', '.item', this.value)" placeholder="Search Keywords..">
        <table class="table is-striped is-narrow is-hoverable" id="id01">
            <thead>
                <tr class="is-selected">
                    <th>#</th>
                    <th>C#</th>
                    <th>Title</th>
                    <th>Notice</th>
                    <th>Year</th>
                    <th>Department</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($students)) {
                ?>
                    <tr class="item">
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['college_id'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['notice'] ?></td>
                        <td><?php echo $row['year'] ?></td>
                        <td><?php echo $row['department'] ?></td>
                        <td><?php echo $row['time'] ?></td>
                        <td>
                            <button class="button is-danger remove" id="<?php echo $row['id'] ?>">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>


<script>
    $(document).ready(function() {
        $(".remove").click(function() {
            var d = $(this);
            var id = $(this).attr("id");
            // alert(a);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'delete_notice',
                    id: id
                },
                success: function(data) {
                    d.parent("td").parent("tr").hide();
                }
            });
        });
    });
</script>
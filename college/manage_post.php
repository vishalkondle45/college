<?php
include_once 'session.php';
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');
$students = mysqli_query($conn, "SELECT * FROM posts WHERE college_id='$collegeid'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<style>
    span {
        width: 250px;
        overflow: hidden;
        display: inline-block;
        text-overflow: ellipsis;
        text-decoration: none;
        white-space: nowrap;
        color: #000;
    }

    abbr[title] {
        border-bottom: none !important;
        cursor: inherit !important;
        text-decoration: none !important;
    }
</style>

<body>
    <?php include_once 'header.php'; ?>
    <br>
    <!-- Main Content -->

    <div class="table-container section" id="id01">
        <input type="text" class="w3-input" oninput="w3.filterHTML('#id01', '.item', this.value)" placeholder="Search Keywords..">
        <table class="table is-striped is-narrow is-hoverable is-fullwidth" id="id01">
            <thead>
                <tr class="is-selected">
                    <th>#</th>
                    <th>Poster_ID</th>
                    <th>Post_Link</th>
                    <th>Post_Description</th>
                    <th>Time</th>
                    <th class="w3-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($students)) {
                ?>
                    <tr class="item">
                        <td><?php echo $row['id'] ?></td>
                        <td>
                            <?php
                            $current_user =  $row['userid'];
                            if ($current_user != 0)
                                $query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$current_user'");
                            else
                                $query = mysqli_query($conn, "SELECT * FROM college WHERE id = '$collegeid'");

                            $row1 = mysqli_fetch_assoc($query);
                            echo $row1['username'];
                            ?>
                        </td>
                        <td>
                            <a href="post.php?key=<?php echo $row['post_key']; ?>">
                                <?php echo $row['post'] ?>
                            </a>
                        </td>
                        <td>
                            <span><abbr title="<?php echo $row['caption']; ?>"><?php echo $row['caption']; ?></abbr></span>
                        </td>
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
                    action: 'delete_post',
                    id: id
                },
                success: function(data) {
                    d.parent("td").parent("tr").hide();
                }
            });
        });
    });
</script>
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
    <title>Mail</title>
</head>
<style>
    body {
        background-image: url("../media/wallpaper/wallpaper1.webp");
    }
</style>

<body>

    <br><br><br>
    <div class="w3-container">
        <div class="w3-sidebar w3-white w3-bar-block w3-border" style="width:15%; height:640px;">
            <p class="w3-bar-item menu-label"><span class="hidethis">vishal.kondle@gmail.com</span></p>
            <hr>
            <a href="compose.php" class="w3-bar-item w3-button"><i class="fa fa-plus-circle"></i> <span class="hidethis">Compose</span></a>
            <a href="inbox.php" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> <span class="hidethis">Inbox</span></a>
            <a href="starred.php" class="w3-bar-item w3-button w3-grey"><i class="fa fa-star"></i> <span class="hidethis">Starred</span></a>
            <a href="sent.php" class="w3-bar-item w3-button"><i class="fa fa-paper-plane"></i> <span class="hidethis">Sent</span></a>
        </div>
        <div style="margin-left:15%; height:640px; overflow-y: scroll;" class="w3-light-grey w3-border">
            <input type="text" class="w3-input" oninput="w3.filterHTML('#id01', '.item', this.value)" placeholder="Search Keywords..">
            <table class="table" id="id01">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>From</th>
                        <th>Subject</th>
                        <th>Time</th>
                        <th>Star</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM inbox WHERE receiver='$email'");
                    while ($row = mysqli_fetch_array($query)) {
                        $mail_id = $row['id'];
                        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM starred WHERE mail_id='$mail_id' AND user_id='$userid'")) == 0) {
                            continue;
                        }
                    ?>
                        <tr class="item">
                            <th><?php echo $row['id'] ?></th>
                            <td><a href="compose.php?email=<?php echo $row['sender']; ?>"><?php echo $row['sender']; ?></a></td>
                            <td><a href="mail.php?id=<?php echo $row['id']; ?>"><?php echo $row['subject']; ?></a></td>
                            <td><?php echo $row['time']; ?></td>
                            <td>
                                <?php
                                if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM starred WHERE mail_id='$mail_id'")) > 0)
                                    echo '<i class="fas fa-star star" id="' . $mail_id . '"></i>';
                                else
                                    echo '<i class="far fa-star star" id="' . $mail_id . '"></i>';
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>

    </div>

</body>

</html>

<script>
    $(document).ready(function() {
        $(".star").click(function() {
            var id = $(this).attr("id");
            var t = $(this);
            $.ajax({
                url: "ajax.php",
                method: "POST",
                data: {
                    action: 'star',
                    id: id
                },
                success: function(data) {
                    t.parent().parent("tr").hide();
                }
            })
        });
    });
</script>
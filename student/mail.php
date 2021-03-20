<?php
include_once 'header.php';
include_once 'session.php';

if (empty($_GET['id']) || $_GET['id'] == '') {
    echo "<script>window.location.href='inbox.php'</script>";
}

if (isset($_GET['id'])) {
    $key = $_GET['id'];
    $query1 = mysqli_query($conn, "SELECT * FROM inbox WHERE id='$key' AND receiver='vishalkondle@gmail.com'");
    $row = mysqli_fetch_assoc($query1);
    if (mysqli_num_rows($query1) != 1) {
        echo "<script>alert('Oversmart!!')</script>";
        echo "<script>window.location.href='inbox.php'</script>";
    }
    echo $sender_id = $row['sender'];
    $query2 = mysqli_query($conn, "SELECT * FROM users WHERE email='$sender_id'");
    $sender = mysqli_fetch_assoc($query2);
    $mail_id = $row['id'];
}
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

    @media only screen and (max-width: 1026px) {
        .hidethis {
            display: none;
        }

        hr {
            display: none;
        }
    }

    body {
        background-image: url("../media/wallpaper/wallpaper1.webp");
    }
</style>

<body class="w3-light-grey">

    <br><br><br>
    <div class="w3-container">
        <div class="w3-sidebar w3-white w3-bar-block w3-border" style="width:15%; height:640px;">
            <p class="w3-bar-item menu-label"><span class="hidethis">vishal.kondle@gmail.com</span></p>
            <hr>
            <a href="compose.php" class="w3-bar-item w3-button"><i class="fa fa-plus-circle"></i> <span class="hidethis">Compose</span></a>
            <a href="mail.php" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> <span class="hidethis">Inbox</span></a>
            <a href="starred.php" class="w3-bar-item w3-button"><i class="fa fa-star"></i> <span class="hidethis">Starred</span></a>
            <a href="sent.php" class="w3-bar-item w3-button"><i class="fa fa-paper-plane"></i> <span class="hidethis">Sent</span></a>
        </div>
        <div style="margin-left:15%; height:640px; overflow-y: scroll;" class="w3-white w3-border w3-container">
            <h3 class="w3-margin-top"><?php echo $row['subject'] ?></h3>
            <hr>
            <div class="w3-bar">
                <div class="w3-bar-item">
                    <div class="image-cropper hidethis">
                        <img src="../media/dp/<?php echo $sender['photo'] ?>" alt="avatar" class="profile-pic">
                    </div>
                </div>
                <a href="compose.php?email=<?php echo $row['sender'] ?>&subject=<?php echo $row['subject'] ?>" class="w3-bar-item"><b><?php echo $row['sender'] ?></b></a>
                <p class="w3-bar-item w3-right w3-opacity">
                    <?php
                    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM starred WHERE mail_id='$mail_id'")) > 0)
                        echo '<i class="fas fa-star star" id="' . $mail_id . '"></i>';
                    else
                        echo '<i class="far fa-star star" id="' . $mail_id . '"></i>';
                    ?>
                </p>
                <p class="w3-bar-item w3-right w3-opacity"><?php echo $row['time'] ?></p>
            </div>
            <!-- Mail Body -->
            <div class="w3-container">
                <div class="w3-panel w3-leftbar w3-border-blue w3-light-grey w3-padding">
                    <p class="w3-xlarge w3-serif">
                        <i><?php echo $row['body'] ?></i>
                    </p>
                    <br><br>
                    <p>Yours Sincerely</p>
                    <p><b>Vishal Kondle</b></p>
                </div>
                <p>Attachments</p>
                <a href="" download>Attachment1.png</a>
            </div>
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
                    if (data == 'star') {
                        t.removeClass("far");
                        t.addClass("fas")
                    }
                    if (data == 'unstar') {
                        t.removeClass("fas");
                        t.addClass("far")
                    }
                }
            })
        });
    });
</script>
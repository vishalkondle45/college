<?php
include_once 'header.php';
include_once 'session.php';

if (isset($_GET['user'])) {
    $key = $_GET['user'];
    $query1 = mysqli_query($conn, "SELECT * FROM users WHERE unique_key='$key' AND college_id='$collegeid'");
    $row1 = mysqli_fetch_assoc($query1);
    if (mysqli_num_rows($query1) != 1) {
        echo "<script>alert('Oversmart!!')</script>";
        // $_SESSION['chat_user_id'];
        echo "<script>window.location.href='index.php'</script>";
    } else {
        $receiver = $_SESSION['chat_user_id'] = $row1['id'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatHub</title>
</head>
<style>
    body {
        background-image: url("../media/wallpaper/wallpaper1.webp");
    }

    #messages {
        /* background-image: url("../media/wallpaper/2.jpg"); */
    }

    @media only screen and (max-width: 1026px) {
        .hidethis {
            display: none;
        }
    }

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
    <br><br>
    <div class="w3-row w3-panel">
        <div class="w3-col w3-border example w3-white" style="height:630px; overflow-y:scroll; width:25%;">
            <input type="text" name="" oninput="w3.filterHTML('#users', 'li', this.value)" class="w3-input w3-border hidethis" placeholder="&#xF002; Search or start new chat" id="" style="font-family:Arial, FontAwesome">
            <ul class="w3-ul" id="users">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM users WHERE id != '$userid'");
                while ($row = mysqli_fetch_assoc($query)) {
                    $current_user = $row['id'];
                    $query3 = mysqli_query($conn, "SELECT * FROM `message` WHERE (sender='$userid' && receiver='$current_user') || (sender='$current_user' && receiver='$userid') ORDER BY id DESC LIMIT 1");
                    $row3 = mysqli_fetch_assoc($query3);
                    if (mysqli_num_rows($query3)) {
                        $show = $row3['message'];
                        $time = $row3['time'];

                        $time = strtotime($time);             // returns bool(false)

                        $time = date('H:i', $time);   // returns 1970-01-01 00:00:00

                    } else {
                        $show = $row['fname'] . ' ' . $row['lname'];
                        $time = "";
                    }
                ?>
                    <a href="chathub.php?user=<?php echo $row['unique_key']; ?>">
                        <li class="w3-bar w3-border">
                            <img src="../media/dp/<?php echo $row['photo']; ?>" class="w3-image w3-circle w3-left" width="65" height="65">
                            <span class="w3-right w3-margin w3-small w3-text-black is-hidden-mobile"><?php echo $time; ?></span>
                            <div class="w3-bar-item is-hidden-mobile w3-margin-right">
                                <span class="w3-large w3-text-black"><?php echo $row['username']; ?></span>
                                <p class="w3-text-black" style="white-space: nowrap; width: 160px; overflow: hidden; text-overflow: ellipsis;"><?php echo $show; ?></p>
                            </div>
                        </li>
                    </a>
                <?php
                }
                ?>
            </ul>
        </div>

        <div class="w3-col w3-border" style=" width:75%;">
            <?php
            if (isset($_GET['user'])) {
            ?>
                <ul class="w3-ul w3-border-bottom w3-light-grey">
                    <li class="w3-bar">
                        <figure class="w3-bar-item media-left">
                            <div class="image-cropper is-48x48">
                                <img src="../media/dp/<?php echo $row1['photo'] ?>" alt="" srcset="" class="profile-pic">
                            </div>
                        </figure>
                        <div class="w3-bar-item">
                            <span><?php echo $row1['username']; ?></span><br>
                            <span class="is-hidden-mobile" id="last_msg"><?php echo $row1['fname'] . ' ' . $row1['lname']; ?></span>
                        </div>
                    </li>
                </ul>
                <div class="w3-border w3-container w3-white" style="height:504px; overflow-y:scroll;" id="messages">
                    <input type="hidden" name="" id="receiver" value="<?php echo $_SESSION['chat_user_id']; ?>">
                    <input type="hidden" name="" id="sender" value="<?php echo $_SESSION['userid']; ?>">
                    <br>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM `message` WHERE (sender='$userid' && receiver='$receiver') || (sender='$receiver' && receiver='$userid')");
                    $query2 = mysqli_query($conn, "SELECT * FROM `message` WHERE (sender='$userid' && receiver='$receiver') || (sender='$receiver' && receiver='$userid') ORDER BY id DESC LIMIT 1");
                    $row2 = mysqli_fetch_array($query2);
                    $last_date = 0;
                    while ($row = mysqli_fetch_array($query)) {

                        // Last Message time
                        $lm = $row['time'];
                        $lm = strtotime($lm);
                        $show_time = date("h:i", $lm);
                        $lm = date("d-m-Y", $lm);

                        if ($lm != $last_date) {
                            $today = date("d-m-Y", time());
                            if ($today == $lm) {
                    ?>
                                <center>
                                    <br>
                                    <p class="w3-border w3-round w3-light-blue w3-container" style="width: max-content"><?php echo "Today"; ?></p>
                                </center>
                            <?php
                            } else {
                            ?>
                                <center>
                                    <br>
                                    <p class="w3-border w3-round w3-light-blue w3-container" style="width: max-content"><?php echo $lm; ?></p>
                                </center>
                        <?php
                            }
                        }
                        ?>

                        <?php
                        if ($row['receiver'] == $userid) {
                        ?>
                            <div class="w3-leftbar w3-border-blue w3-container" style="margin-bottom: 10px;"><?php echo $row['message']; ?> <span class="w3-right w3-opacity w3-small"><?php echo $show_time; ?></span></div>
                        <?php } else {
                        ?>
                            <div class="w3-leftbar w3-border-green w3-container" style="margin-bottom: 10px;"><?php echo $row['message']; ?> <span class="w3-right w3-opacity w3-small"><?php echo $show_time; ?></span></div>
                        <?php
                        }
                        ?>
                    <?php

                        $last_date = $lm;
                    }
                    ?>
                    <span id="last_message" style="display: none"><?php echo $row2['id'] ?></span>
                </div>
                <input type="text" name="" id="message" class="w3-input w3-border" placeholder="Enter Message">
            <?php
            } else {
            ?>
                <center>
                    <img src="../media/messangers.jpg" class="w3-image" style="height:628px;" alt="">
                </center>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        // Scroll to Bottom 
        $('#messages').scrollTop($('#messages').prop("scrollHeight"));

        // Send Message
        $('#message').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            var sender = $("#sender").val();
            var receiver = $("#receiver").val();
            var message = $(this).val();
            if (keycode == '13' && message != '') {
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    data: {
                        action: 'message',
                        sender: sender,
                        receiver: receiver,
                        message: message
                    },
                    success: function(data) {
                        $("#message").val('');
                        $('#messages').scrollTop($('#messages').prop("scrollHeight"));
                    }
                });
            }
        });

        // Check for New Messages
        setInterval(function() {
            var sender = $("#sender").val();
            var receiver = $("#receiver").val();
            var last_message = $("#last_message").text();
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'update',
                    sender: sender,
                    receiver: receiver,
                    last_message: last_message
                },
                success: function(data) {
                    if (data != false) {
                        $('#messages').append(data.message);
                        $("#last_message").text(data.new_id);
                        $('#messages').scrollTop($('#messages').prop("scrollHeight"));
                    }
                }
            });
        }, 100)
    });
</script>
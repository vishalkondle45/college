<?php
include_once 'header.php';
include_once 'session.php';

if (empty($_GET['user']) || $_GET['user'] == '') {
    echo "<script>window.location.href='profile.php?user=" . $user_key . "'</script>";
}

if (isset($_GET['user'])) {
    $key = $_GET['user'];
    $query1 = mysqli_query($conn, "SELECT * FROM users WHERE unique_key='$key' AND college_id='$collegeid'");
    $row1 = mysqli_fetch_assoc($query1);
    if (mysqli_num_rows($query1) != 1) {
        echo "<script>alert('Oversmart!!')</script>";
        echo "<script>window.location.href='profile.php?user=" . $user_key . "'</script>";
    } else {
        $receiver = $row1['id'];
        $posts = mysqli_query($conn, "SELECT * FROM `posts` WHERE `userid`='$receiver'");
        $followers = mysqli_query($conn, "SELECT * FROM `follow` WHERE `following`='$receiver' AND `status`=1 ORDER BY RAND()");
        $following = mysqli_query($conn, "SELECT * FROM `follow` WHERE `follower`='$receiver' AND `status`=1 ORDER BY RAND()");
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

    a:hover {
        text-decoration: underline;
    }

    a {
        color: inherit;
    }
</style>


<body>
    <div class="w3-row w3-panel">
        <div class="w3-col w3-hide-small" style="width:20%">&emsp;</div>
        <div class="w3-col" style="width:60%"></div>
        <div class="w3-col w3-hide-small" style="width:20%"></div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        $(".follow").click(function() {
            var id = $(this).attr("id");
            var followers = $(this).children("span").val();
            var t = $(this);

            // Give Warning if Already Following..
            var searchValue = "Following";
            $(this).each(function() {
                if ($(this).html().indexOf(searchValue) > -1) {
                    // alert("Follwoing");
                    if (confirm("If you change your mind, you'll have to request to follow again.")) {
                        $.ajax({
                            url: "ajax.php",
                            type: "POST",
                            data: {
                                action: 'follow',
                                id: id
                            },
                            success: function(data) {
                                if (data == 0) {
                                    t.html('<i class="fa fa-user-plus"></i> &nbsp; Follow &emsp; <span class="tag is-info">' + followers-- + '</span>');
                                } else if (data == 1) {
                                    t.html('<i class="fa fa-user-circle"></i> &nbsp; Requested &emsp; <span class="tag is-info">' + ++followers + '</span>');
                                }
                            }
                        })
                    }
                } else {
                    $.ajax({
                        url: "ajax.php",
                        type: "POST",
                        data: {
                            action: 'follow',
                            id: id
                        },
                        success: function(data) {
                            if (data == 0) {
                                t.html('<i class="fa fa-user-plus"></i> &nbsp; Follow &emsp; <span class="tag is-info">' + followers-- + '</span>');
                            } else if (data == 1) {
                                t.html('<i class="fa fa-user-circle"></i> &nbsp; Requested &emsp; <span class="tag is-info">' + ++followers + '</span>');
                            }
                        }
                    })
                }
            });

        });

        $(".delete").click(function() {
            $(this).parent("header").parent("div").parent("div").toggleClass("is-active");
        });

    });
</script>
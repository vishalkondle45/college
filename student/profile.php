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
        $followers = mysqli_query($conn, "SELECT * FROM `follow` WHERE `following`='$receiver' AND `status`=1");
        $following = mysqli_query($conn, "SELECT * FROM `follow` WHERE `follower`='$receiver' AND `status`=1");
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
</style>


<body>
    <br><br>
    <div class="w3-row w3-panel">
        <div class="w3-col" style="width:20%">&emsp;</div>
        <div class="w3-col" style="width:60%">
            <br>
            <div class="w3-container w3-row">
                <!-- Image -->
                <div class="w3-col" style="width:30%">
                    <br>
                    <img src="../media/dp/<?php echo $row1['photo']; ?>" alt="" class="w3-image w3-circle" style="width:150px" srcset="">
                </div>
                <!-- Bio -->
                <div class="w3-col" style="width:70%">
                    <h3><?php echo $row1['username']; ?>
                        &emsp;
                        <?php
                        $query6 = mysqli_query($conn, "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$receiver'");
                        $row6 = mysqli_fetch_array($query6);
                        // echo "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$receiver'";
                        if (mysqli_num_rows($query6) == 0) { ?>
                            <button class="button is-info is-outlined follow" id="<?php echo $receiver; ?>"> <i class="fa fa-user-plus"></i> &nbsp; Follow &emsp; <span class="tag"><?php echo mysqli_num_rows($query6) ?></span> </button>
                            <?php
                        } else {
                            if ($row6['status'] == 0) {
                            ?>
                                <button class="button is-info is-outlined follow" id="<?php echo $receiver; ?>"> <i class="fa fa-user-circle"></i> &nbsp; Requested &emsp; <span class="tag is-info"><?php echo mysqli_num_rows($query6) ?></span> </button>
                            <?php
                            } else {
                            ?>
                                <button class="button is-info follow" id="<?php echo $receiver; ?>"> <i class="fa fa-user-check"></i> &nbsp; Following &emsp; <span class="tag is-info"><?php echo mysqli_num_rows($query6) ?></span> </button>
                        <?php
                            }
                        }
                        ?>
                    </h3>
                    <br>
                    <p class="w3-row">
                        <!-- Posts -->
                    <p class="w3-third"> <b><?php echo mysqli_num_rows($posts); ?></b> Posts</p>
                    <!-- Followers -->
                    <p class="w3-third" onclick="w3.toggleClass('#followers', 'is-active')"> <b><?php echo mysqli_num_rows($followers); ?></b> Followers</p>
                    <!-- Following -->
                    <p class="w3-third" onclick="w3.toggleClass('#followings', 'is-active')"> <b><?php echo mysqli_num_rows($following); ?></b> Following</p>
                    </p>
                    <br>
                    <div>
                        <b>
                            <p><?php echo $row1['fname'] . ' ' . $row1['mname'] . ' ' . $row1['lname']; ?></p>
                        </b>
                        <?php echo $row1['education'] . ' - ' . $row1['department']  ?><br>
                        <?php echo "<b>Key - " . $row1['unique_key'] . "</b>"; ?>
                    </div>
                </div>
            </div>
            <hr>

            <!-- Posts -->
            <div>
                <div class="w3-row-padding w3-margin-top">

                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM posts WHERE `userid`='$receiver'");
                    $i = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $i++;
                    ?>
                        <div class="w3-third">
                            <div class="w3-card-4">
                                <a href="post.php?post=<?php echo $row['post_key']; ?>">
                                    <img src="../media/posts/<?php echo $row['post']; ?>" style="width:100%">
                                </a>
                            </div>
                        </div>
                    <?php
                        if ($i % 3 === 0)
                            echo "<p>&emsp;</p>";
                    } ?>
                </div>
            </div>

        </div>
        <div class="w3-col" style="width:20%"></div>
    </div>

    <div class="modal" id="followers">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Followers</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <!-- Content ... -->
                <ul class="w3-ul">
                    <?php
                    while ($row = mysqli_fetch_array($followers)) {
                        $id = $row['follower'];
                        if ($id == $receiver) {
                            continue;
                        }
                        $query = mysqli_query($conn, "SELECT * FROM users WHERE id ='$id'");
                        $row2 = mysqli_fetch_array($query);
                    ?>
                        <li class="w3-bar">
                            <img src="../media/dp/<?php echo $row2['photo']; ?>" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
                            <div class="w3-bar-item">
                                <span class="w3-large"><?php echo $row2['username']; ?></span><br>
                                <span><?php echo $row2['fname'] . ' ' . $row2['lname']; ?></span>
                            </div>
                            <?php
                            $query6 = mysqli_query($conn, "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$id'");
                            $row6 = mysqli_fetch_array($query6);
                            if ($row2['id'] == $userid) {
                                continue;
                            }
                            // echo "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$id'";
                            if (mysqli_num_rows($query6) == 0) { ?>
                                <button class="button is-info is-outlined follow w3-right" id="<?php echo $id; ?>"> <i class="fa fa-user-plus"></i> &nbsp; Follow &emsp; <span class="tag"><?php echo mysqli_num_rows($query6) ?></span> </button>
                                <?php
                            } else {
                                if ($row6['status'] == 0) {
                                ?>
                                    <button class="button is-info is-outlined follow w3-right" id="<?php echo $id; ?>"> <i class="fa fa-user-circle"></i> &nbsp; Requested &emsp; <span class="tag is-info"><?php echo mysqli_num_rows($query6) ?></span> </button>
                                <?php
                                } else {
                                ?>
                                    <button class="button is-info follow w3-right" id="<?php echo $id; ?>"> <i class="fa fa-user-check"></i> &nbsp; Following &emsp; <span class="tag is-info"><?php echo mysqli_num_rows($query6) ?></span> </button>
                            <?php
                                }
                            }
                            ?>
                            <!-- <button class="button is-info follow w3-right" id="<?php echo $id; ?>"> <i class="fa fa-user-check"></i> &nbsp; Following &emsp; <span class="tag is-info"><?php echo mysqli_num_rows($query6) ?></span> </button> -->
                        </li>
                    <?php } ?>
                </ul>
            </section>
        </div>
        <!-- <button class="modal-close is-large" aria-label="close"></button> -->
    </div>

    <div class="modal" id="followings">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Following</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <!-- Content ... -->
                <ul class="w3-ul">
                    <?php
                    while ($row = mysqli_fetch_array($following)) {
                        $id = $row['following'];
                        $query = mysqli_query($conn, "SELECT * FROM users WHERE id ='$id'");
                        $row2 = mysqli_fetch_array($query);
                    ?>
                        <li class="w3-bar">
                            <img src="../media/dp/<?php echo $row2['photo']; ?>" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
                            <div class="w3-bar-item">
                                <span class="w3-large"><?php echo $row2['username']; ?></span><br>
                                <span><?php echo $row2['fname'] . ' ' . $row2['lname']; ?></span>
                            </div>
                            <?php
                            if ($row2['id'] == $userid) {
                                continue;
                            }
                            $query6 = mysqli_query($conn, "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$id'");
                            $row6 = mysqli_fetch_array($query6);
                            if (mysqli_num_rows($query6) == 0) { ?>
                                <button class="button is-info is-outlined follow w3-right" id="<?php echo $id; ?>"> <i class="fa fa-user-plus"></i> &nbsp; Follow &emsp; <span class="tag"><?php echo mysqli_num_rows($query6) ?></span> </button>
                                <?php
                            } else {
                                if ($row6['status'] == 0) {
                                ?>
                                    <button class="button is-info is-outlined follow w3-right" id="<?php echo $id; ?>"> <i class="fa fa-user-circle"></i> &nbsp; Requested &emsp; <span class="tag is-info"><?php echo mysqli_num_rows($query6) ?></span> </button>
                                <?php
                                } else {
                                ?>
                                    <button class="button is-info follow w3-right" id="<?php echo $id; ?>"> <i class="fa fa-user-check"></i> &nbsp; Following &emsp; <span class="tag is-info"><?php echo mysqli_num_rows($query6) ?></span> </button>
                            <?php
                                }
                            }
                            ?>
                            <!-- <button class="button is-info follow w3-right" id="<?php echo $id; ?>"> <i class="fa fa-user-check"></i> &nbsp; Following &emsp; <span class="tag is-info"><?php echo mysqli_num_rows($query6) ?></span> </button> -->
                        </li>
                    <?php } ?>
                </ul>
            </section>
        </div>
        <!-- <button class="modal-close is-large" aria-label="close"></button> -->
    </div>

</body>

</html>

<script>
    $(document).ready(function() {

        $(".follow").click(function() {
            var id = $(this).attr("id");
            var followers = $(this).children("span").val();
            var t = $(this);
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
            // alert($(this).attr('id'));
        });

        $(".delete").click(function() {
            $(this).parent("header").parent("div").parent("div").toggleClass("is-active");
        });

    });
</script>
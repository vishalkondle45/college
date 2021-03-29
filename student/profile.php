<?php
include_once 'header.php';
include_once 'session.php';

if (empty($_GET['user']) || $_GET['user'] == '') {
    echo "<script>window.location.href='profile.php?user=" . $user_id . "'</script>";
}

if (isset($_GET['user'])) {
    $key = $_GET['user'];
    $query1 = mysqli_query($conn, "SELECT * FROM users WHERE username='$key' AND college_id='$collegeid'");
    $row1 = mysqli_fetch_assoc($query1);
    if (mysqli_num_rows($query1) != 1) {
        echo "<script>window.location.href='profile.php?user=" . $user_id . "'</script>";
    } else {
        $receiver = $row1['id'];
        $posts = mysqli_query($conn, "SELECT * FROM `posts` WHERE `userid`='$receiver'");
        $followers = mysqli_query($conn, "SELECT * FROM `follow` WHERE `following`='$receiver' AND `status`=1 ORDER BY RAND()");
        echo "SELECT * FROM `follow` WHERE `following`='$receiver' AND `status`=1";
        $following = mysqli_query($conn, "SELECT * FROM `follow` WHERE `follower`='$receiver' AND `status`=1 ORDER BY RAND()");
        echo "SELECT * FROM `follow` WHERE `follower`='$receiver' AND `status`=1";
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

    .extra {
        width: 25px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>


<body>
    <br><br>
    <div class="w3-row w3-panel">
        <div class="w3-col w3-hide-small" style="width:20%">&emsp;</div>
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
                        if ($userid != $receiver) {
                            $query6 = mysqli_query($conn, "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$receiver'");
                            $row6 = mysqli_fetch_array($query6);
                            // echo "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$receiver'";
                            if (mysqli_num_rows($query6) == 0) { ?>
                                <button class="button is-info is-outlined follow" style="margin-right: 40px;" id="<?php echo $receiver; ?>"> Follow </button>
                                <?php
                            } else {
                                if ($row6['status'] == 0) {
                                ?>
                                    <button class="button is-info is-outlined follow" id="<?php echo $receiver; ?>"> Requested </button>
                                <?php
                                } else {
                                ?>
                                    <button class="button is-info follow" style="margin-right: 40px;" id="<?php echo $receiver; ?>"> Following </button>
                                    <a class="button is-danger" href="chathub.php?user=<?php echo $row1['username']; ?>"> <i class="fa fa-comment"></i> &nbsp; Message </a>
                            <?php
                                }
                            }
                        } else {
                            ?>
                            <a href="edit.php" class="button is-outlined is-dark w3-small">Edit Profile</a>
                        <?php
                        }
                        ?>
                    </h3>
                    <br>
                    <?php
                    $query7 = mysqli_query($conn, "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$receiver' AND `status`=1");
                    ?>

                    <div class="field is-grouped is-grouped-multiline">
                        <div class="control" style="margin-right: 40px;">
                            <div class="tags has-addons are-medium">
                                <span class="tag is-dark"><?php echo mysqli_num_rows($posts); ?></span>
                                <span class="tag is-link">Posts</span>
                            </div>
                        </div>
                        <?php
                        if (mysqli_num_rows($query7) > 0 || $userid == $receiver) {
                        ?>
                            <div class="control" style="margin-right: 40px;" onclick="w3.toggleClass('#followers', 'is-active')">
                                <div class="tags has-addons are-medium">
                                    <span class="tag is-dark"><?php echo mysqli_num_rows($followers) ?></span>
                                    <span class="tag is-success">Followers</span>
                                </div>
                            </div>

                            <div class="control" onclick="w3.toggleClass('#followings', 'is-active')">
                                <div class="tags has-addons are-medium">
                                    <span class="tag is-dark"><?php echo mysqli_num_rows($following) ?></span>
                                    <span class="tag is-primary">Following</span>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="control" style="margin-right: 40px;">
                                <div class="tags has-addons are-medium">
                                    <span class="tag is-dark"><?php echo mysqli_num_rows($followers) ?></span>
                                    <span class="tag is-success">Followers</span>
                                </div>
                            </div>

                            <div class="control">
                                <div class="tags has-addons are-medium">
                                    <span class="tag is-dark"><?php echo mysqli_num_rows($following) ?></span>
                                    <span class="tag is-primary">Following</span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div>
                        <div class="tags are-medium" style="margin-bottom: 0px;margin-top: 10px;">
                            <span class="tag is-danger"><?php echo $row1['fname'] . ' ' . $row1['mname'] . ' ' . $row1['lname']; ?></span>
                        </div>
                        <div class="control">
                            <div class="tags has-addons">
                                <span class="tag is-dark w3-small"><?php echo $row1['education']; ?></span>
                                <span class="tag is-info w3-small"><?php echo $row1['department']; ?></span>
                            </div>
                        </div>
                        <b></b>

                        <!-- Mutual Followers -->
                        <div class="extra" id="mutuals" name="" style="display:none">
                            <?php
                            echo "<p>Followed By - ";
                            $i = 0;
                            $query8 = mysqli_query($conn, "SELECT * FROM follow WHERE `following`='$receiver'");
                            while ($row = mysqli_fetch_array($query8)) {
                                $i++;
                                $follower = $row['follower'];
                                if ($follower == $receiver || $follower == $userid) {
                                    continue;
                                }
                                if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$follower'")) > 0) {
                            ?>
                                    <span onclick="w3.toggleClass('#mutual', 'is-active' )"><?php echo $follower; ?></span>,
                            <?php
                                    if ($i > 3) {
                                        echo "...";
                                        break;
                                    }
                                }
                            }
                            echo "</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <!-- Tabs -->
            <div class="tabs is-centered">
                <ul>
                    <li class="is-active tab" id="posts">
                        <a>
                            <span class="icon is-small"><i class="fas fa-image" aria-hidden="true"></i></span>
                            <span>Posts</span>
                        </a>
                    </li>
                    <li class="tab" id="forums">
                        <a>
                            <span class="icon is-small"><i class="fas fa-comments" aria-hidden="true"></i></span>
                            <span>Forums</span>
                        </a>
                    </li>
                    <li class="tab" id="polls">
                        <a>
                            <span class="icon is-small"><i class="fas fa-poll" aria-hidden="true"></i></span>
                            <span>Polls</span>
                        </a>
                    </li>
                    <li class="tab" id="requests">
                        <a>
                            <span class="icon is-small"><i class="fas fa-user-circle" aria-hidden="true"></i></span>
                            <span>Requests</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Posts -->
            <div class="posts">
                <div class="w3-row-padding w3-margin-top w3-center">
                    <?php
                    if (mysqli_num_rows($query7) > 0 || $userid == $receiver) {
                        $query = mysqli_query($conn, "SELECT * FROM posts WHERE `userid`='$receiver' ORDER BY id DESC");
                        $i = 0;
                        while ($row = mysqli_fetch_array($query)) {
                            $i++;
                    ?>
                            <div class="w3-third w3-padding">
                                <div class="w3-card-4">
                                    <a href="post.php?post=<?php echo $row['post_key']; ?>">
                                        <?php
                                        $path_parts = pathinfo($row['post']);
                                        if (in_array($path_parts['extension'], array("png", "jpg", "jpeg"))) {
                                        ?>
                                            <img src="../media/posts/<?php echo $row['post']; ?>" style="width:100%">
                                        <?php } else { ?>
                                            <video width="" height="" class="video" id="video" controls loop onload="" controlsList="nodownload nofullscreen" disablePictureInPicture>
                                                <source src="../media/posts/<?php echo $row['post']; ?>" type="video/mp4">
                                                <source src="../media/posts/<?php echo $row['post']; ?>" type="video/mov">
                                                <source src="../media/posts/<?php echo $row['post']; ?>" type="video/webm">
                                                <source src="../media/posts/<?php echo $row['post']; ?>" type="video/avi">
                                                <source src="../media/posts/<?php echo $row['post']; ?>" type="video/mkv">
                                            </video>
                                        <?php } ?>
                                    </a>
                                    <div class="w3-container w3-left-align">
                                        <p><?php echo $row['caption']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                            if ($i % 3 === 0)
                                echo "<p>&emsp;</p>";
                        }
                    } else {
                        ?>
                        <div class="w3-border w3-padding-64 w3-light-grey">
                            <p><b>This Account is Private</b></p>
                            <p>Follow to see their photos and videos.</p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <!-- Forums -->
            <div class="forums" style="display:none">
                <ul class="w3-ul w3-white" id="forums_list">
                    <?php
                    $forums = mysqli_query($conn, "SELECT * FROM forums WHERE college_id = '$collegeid' AND user_id = '$receiver' ORDER BY id DESC");
                    while ($row = mysqli_fetch_array($forums)) {
                        $id = $row['user_id'];
                        $forum_id = $row['id'];
                        $user = mysqli_query($conn, "SELECT * FROM users WHERE id ='$id'");
                        $row1 = mysqli_fetch_array($user);
                        $replies = mysqli_query($conn, "SELECT * FROM forum_replies WHERE `forum_id`='$forum_id'");
                        $views = mysqli_query($conn, "SELECT * FROM views WHERE `content_id`='$forum_id' AND `content`='forum'");
                        $array = array("w3-border-red", "w3-border-blue", "w3-border-green", "w3-border-pink", "w3-border-purple", "w3-border-amber", "w3-border-aqua", "w3-border-brown", "w3-border-cyan", "w3-border-light-green", "w3-border-indigo", "w3-border-khaki", "w3-hover-border-lime", "w3-border-orange", "w3-border-deep-orange", "w3-border-deep-purple", "w3-border-sand", "w3-border-teal", "w3-border-yellow", "w3-border-black", "w3-border-grey", "w3-border-light-grey", "w3-border-dark-grey");
                        // echo sizeof($array);
                    ?>
                        <li class="w3-bar w3-leftbar <?php echo $array[mt_rand(0, 22)]; ?> w3-border-0">
                            <div class="w3-bar-item w3-left">
                                <a href="forum.php?id=<?php echo $forum_id; ?>" style="text-decoration: none; color:black;">
                                    <span class="ellipsis w3-large"><?php echo $row['forum']; ?></span><br>
                                    <span class="w3-small w3-opacity">By <?php echo $row1['username']; ?>, <?php echo $row['time']; ?></span>
                                </a>
                            </div>

                            <div class="w3-bar-item w3-right w3-border-left">
                                <span class=""><?php echo mysqli_num_rows($replies); ?> replies</span><br>
                                <span class="w3-small w3-opacity"><?php echo mysqli_num_rows($views); ?> views</span>
                            </div>
                        </li>
                        <hr style="margin-top: 5px;margin-bottom: 5px;">
                    <?php } ?>
                </ul>
            </div>

            <!-- Polls -->
            <div class="polls" style="display:none">
                <ul class="w3-ul w3-white" id="forums_list">
                    <?php
                    $forums = mysqli_query($conn, "SELECT * FROM poll WHERE college_id = '$collegeid' AND `user_id` = '$receiver' ORDER BY id DESC");
                    while ($row = mysqli_fetch_array($forums)) {
                        $id = $row['user_id'];
                        $forum_id = $row['id'];
                        $poll_by = $row['poll_by'];
                        $user = mysqli_query($conn, "SELECT * FROM `$poll_by` WHERE id ='$id'");
                        $row1 = mysqli_fetch_array($user);
                        $replies = mysqli_query($conn, "SELECT * FROM results WHERE `poll_id`='$forum_id'");
                        $views = mysqli_query($conn, "SELECT * FROM views WHERE `content_id`='$forum_id' AND `content`='poll'");
                        $array = array("w3-border-red", "w3-border-blue", "w3-border-green", "w3-border-pink", "w3-border-purple", "w3-border-amber", "w3-border-aqua", "w3-border-brown", "w3-border-cyan", "w3-border-light-green", "w3-border-indigo", "w3-border-khaki", "w3-hover-border-lime", "w3-border-orange", "w3-border-deep-orange", "w3-border-deep-purple", "w3-border-sand", "w3-border-teal", "w3-border-yellow", "w3-border-black", "w3-border-grey", "w3-border-light-grey", "w3-border-dark-grey");
                    ?>
                        <li class="w3-bar w3-leftbar <?php echo $array[mt_rand(0, 22)]; ?> w3-border-0">
                            <div class="w3-bar-item w3-left">
                                <a href="poll.php?id=<?php echo $forum_id; ?>" style="text-decoration: none; color:black;">
                                    <span class="ellipsis w3-large"><?php echo $row['question']; ?></span><br>
                                    <span class="w3-small w3-opacity">By <?php echo $row1['username']; ?>, <?php echo $row['time']; ?></span>
                                </a>
                            </div>

                            <div class="w3-bar-item w3-right w3-border-left">
                                <span class=""><?php echo mysqli_num_rows($replies); ?> Votes</span><br>
                                <span class="w3-small w3-opacity"><?php echo mysqli_num_rows($views); ?> views</span>
                            </div>
                        </li>
                        <hr style="margin-top: 5px;margin-bottom: 5px;">
                    <?php } ?>
                </ul>
            </div>

            <div class="requests" style="display:none">
                <ul class="w3-ul w3-white" id="request">
                    <?php
                    $forums = mysqli_query($conn, "SELECT * FROM follow WHERE `following` = '$receiver' AND `status`=0 ORDER BY id DESC");
                    if (mysqli_num_rows($forums) > 0) {
                        while ($row = mysqli_fetch_array($forums)) {
                            $follower_id = $row['follower'];
                            $user = mysqli_query($conn, "SELECT * FROM `users` WHERE id ='$follower_id'");
                            $row1 = mysqli_fetch_array($user);
                            $array = array("w3-border-red", "w3-border-blue", "w3-border-green", "w3-border-pink", "w3-border-purple", "w3-border-amber", "w3-border-aqua", "w3-border-brown", "w3-border-cyan", "w3-border-light-green", "w3-border-indigo", "w3-border-khaki", "w3-hover-border-lime", "w3-border-orange", "w3-border-deep-orange", "w3-border-deep-purple", "w3-border-sand", "w3-border-teal", "w3-border-yellow", "w3-border-black", "w3-border-grey", "w3-border-light-grey", "w3-border-dark-grey");
                    ?>
                            <li class="w3-bar w3-leftbar <?php echo $array[mt_rand(0, 22)]; ?> w3-border-0">
                                <div class="w3-bar-item w3-left">
                                    <a href="profile.php?user=<?php echo $row1['username']; ?>" style="text-decoration: none; color:black;">
                                        <span class="ellipsis w3-large"><?php echo $row1['username']; ?></span>
                                    </a>
                                </div>
                                <div class="w3-bar-item w3-right w3-border-left">
                                    <button class="is-success button accept" id="<?php echo $row['id']; ?>"> <i class="fa fa-check-circle"></i> &nbsp; Accept</button>
                                    &emsp;
                                    <button class="is-danger button reject" id="<?php echo $row['id']; ?>"> <i class="fa fa-ban"></i> &nbsp; Reject</button>
                                </div>
                            </li>
                            <hr style="margin-top: 5px;margin-bottom: 5px;">
                    <?php
                        }
                    } else {
                        echo "<h1>No Requests</h1>";
                    }
                    ?>
                </ul>
            </div>

        </div>
        <div class="w3-col w3-hide-small" style="width:20%"></div>
    </div>

    <div class="modal" id="followers">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title w3-center">Followers</p>
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
                                <span class="w3-large"> <a href="profile.php?user=<?php echo $row2['username']; ?>"> <?php echo $row2['username']; ?> </a></span><br>
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
                                <button class="button is-info is-outlined follow w3-right" id="<?php echo $id; ?>"> Follow </button>
                                <?php
                            } else {
                                if ($row6['status'] == 0) {
                                ?>
                                    <button class="button is-info is-outlined follow w3-right" id="<?php echo $id; ?>"> Requested </button>
                                <?php
                                } else {
                                ?>
                                    <button class="button is-info follow w3-right" id="<?php echo $id; ?>"> Following  </button>
                            <?php
                                }
                            }
                            ?>
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
                <p class="modal-card-title w3-center">Following</p>
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
                                <span class="w3-large"> <a href="profile.php?user=<?php echo $row2['username']; ?>"> <?php echo $row2['username']; ?> </a></span><br>
                                <span><?php echo $row2['fname'] . ' ' . $row2['lname']; ?></span>
                            </div>
                            <?php
                            if ($row2['id'] == $userid) {
                                continue;
                            }
                            $query6 = mysqli_query($conn, "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$id'");
                            $row6 = mysqli_fetch_array($query6);
                            if (mysqli_num_rows($query6) == 0) { ?>
                                <button class="button is-info is-outlined follow w3-right" id="<?php echo $id; ?>"> Follow </button>
                                <?php
                            } else {
                                if ($row6['status'] == 0) {
                                ?>
                                    <button class="button is-info is-outlined follow w3-right" id="<?php echo $id; ?>"> Requested </button>
                                <?php
                                } else {
                                ?>
                                    <button class="button is-info follow w3-right" id="<?php echo $id; ?>"> Following  </button>
                            <?php
                                }
                            }
                            ?>
                        </li>
                    <?php } ?>
                </ul>
            </section>
        </div>
        <!-- <button class="modal-close is-large" aria-label="close"></button> -->
    </div>

    <!-- Mutual followers Modal -->
    <div class="modal" id="mutual">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title w3-center">Mutual Followers</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <!-- Content ... -->
                <ul class="w3-ul">
                    <?php
                    $query10 = mysqli_query($conn, "SELECT * FROM follow WHERE `following`='$receiver'");
                    while ($row = mysqli_fetch_array($query10)) {
                        $id = $row['follower'];
                        if ($id == $receiver || $id == $userid) {
                            continue;
                        }
                        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$id'")) > 0) {
                            $query9 = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
                            $row9 = mysqli_fetch_array($query9);
                    ?>
                            <li class="w3-bar">
                                <img src="../media/dp/<?php echo $row9['photo']; ?>" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
                                <div class="w3-bar-item">
                                    <span class="w3-large"> <a href="profile.php?user=<?php echo $row9['username']; ?>"> <?php echo $row9['username']; ?> </a></span><br>
                                    <span><?php echo $row9['fname'] . ' ' . $row9['lname']; ?></span>
                                </div>
                                <?php
                                $query6 = mysqli_query($conn, "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$id'");
                                $row6 = mysqli_fetch_array($query6);
                                if ($row9['id'] == $userid) {
                                    continue;
                                }
                                // echo "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$id'";
                                if (mysqli_num_rows($query6) == 0) { ?>
                                    <button class="button is-info is-outlined follow w3-right" id="<?php echo $id; ?>"> Follow </button>
                                    <?php
                                } else {
                                    if ($row6['status'] == 0) {
                                    ?>
                                        <button class="button is-info is-outlined follow w3-right" id="<?php echo $id; ?>"> Requested </button>
                                    <?php
                                    } else {
                                    ?>
                                        <button class="button is-info follow w3-right" id="<?php echo $id; ?>"> Following  </button>
                                <?php
                                    }
                                }
                                ?>
                            </li>
                    <?php }
                    } ?>
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
                                    t.html('Follow');
                                } else if (data == 1) {
                                    t.html('Requested ');
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
                                t.html('Follow ');
                            } else if (data == 1) {
                                t.html('Requested');
                            }
                        }
                    })
                }
            });
        });

        // Delete
        $(".delete").click(function() {
            $(this).parent("header").parent("div").parent("div").toggleClass("is-active");
        });

        //Accept Follow Request
        $(".accept").click(function() {
            var id = $(this).attr("id");
            var t = $(this);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'accept',
                    id: id
                },
                success: function(data) {
                    t.parent("div").parent("li").hide();
                }
            });
        });

        //Reject Follow Request
        $(".reject").click(function() {
            var id = $(this).attr("id");
            var t = $(this);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'reject',
                    id: id
                },
                success: function(data) {
                    t.parent("div").parent("li").hide();
                }
            });
        });

        // Tabs
        $(".tab").click(function() {
            $(".is-active").removeClass("is-active");
            $(this).addClass("is-active");
            var choice = $(this).attr("id");
            if (choice == "posts") {
                $(".forums").hide();
                $(".polls").hide();
                $(".requests").hide();
                $(".posts").show();
            } else if (choice == "forums") {
                $(".posts").hide();
                $(".polls").hide();
                $(".requests").hide();
                $(".forums").show();
            } else if (choice == "polls") {
                $(".posts").hide();
                $(".forums").hide();
                $(".requests").hide();
                $(".polls").show();
            } else if (choice == "requests") {
                $(".posts").hide();
                $(".forums").hide();
                $(".polls").hide();
                $(".requests").show();
            }
        });
    });
</script>
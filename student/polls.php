<?php
include_once 'session.php';
include_once 'header.php';
$array = array("w3-border-red", "w3-border-blue", "w3-border-green", "w3-border-pink", "w3-border-purple", "w3-border-amber", "w3-border-aqua", "w3-border-brown", "w3-border-cyan", "w3-border-light-green", "w3-border-indigo", "w3-border-khaki", "w3-hover-border-lime", "w3-border-orange", "w3-border-deep-orange", "w3-border-deep-purple", "w3-border-sand", "w3-border-teal", "w3-border-yellow", "w3-border-black", "w3-border-grey", "w3-border-light-grey", "w3-border-dark-grey");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polls</title>
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

    body {
        color: #000 !important;
        background-color: #EDF0F4 !important
    }

    .ellipsis {
        /* height: 18px; */
        width: 840px;
        padding: 0;
        overflow: hidden;
        position: relative;
        display: inline-block;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

<body>
    <br>
    <div class="columns section">
        <div class="column is-1"></div>
        <div class="column is-10">
            <div class="w3-bar">
                <p class="w3-bar-item w3-left w3-xlarge"><b>Polls</b></p>
                <a class="w3-bar-item w3-right button is-danger" href="new_poll.php">Create New Poll</a>
            </div>

            <input type="text" name="" class="w3-input w3-border" oninput="w3.filterHTML('#forums_list', 'li', this.value)" id="" placeholder="Search..">

            <ul class="w3-ul w3-white w3-border-right w3-border-bottom" id="forums_list">
                <?php
                $forums = mysqli_query($conn, "SELECT * FROM poll WHERE college_id = '$collegeid' ORDER BY id DESC");
                while ($row = mysqli_fetch_array($forums)) {
                    $id = $row['user_id'];
                    $poll_by = $row['poll_by'];
                    $forum_id = $row['id'];

                    if ($id != 0) {
                        $user = mysqli_query($conn, "SELECT * FROM users WHERE id ='$id'");
                        // echo "SELECT * FROM users WHERE id ='$id'";
                    } else {
                        $user = mysqli_query($conn, "SELECT * FROM college WHERE id ='$collegeid'");
                        // echo "SELECT * FROM college WHERE id ='$collegeid'";
                    }

                    $row1 = mysqli_fetch_array($user);
                    $replies = mysqli_query($conn, "SELECT * FROM results WHERE `poll_id`='$forum_id'");
                    $views = mysqli_query($conn, "SELECT * FROM options WHERE `poll_id`='$forum_id'");
                ?>
                    <li class="w3-bar w3-leftbar <?php echo $array[mt_rand(0, 22)]; ?>">
                        <div class="w3-bar-item w3-left">
                            <a href="poll.php?id=<?php echo $forum_id; ?>" style="text-decoration: none; color:black;">
                                <span class="ellipsis w3-large"><?php echo $row['question']; ?></span><br>
                                <span class="w3-small w3-opacity">By <?php echo $row1['username']; ?>, <?php echo $row['time']; ?></span>
                            </a>
                        </div>
                        <div class="w3-bar-item w3-right">
                            <a href="profile.php?user=<?php echo $row1['username']; ?>">
                                <span class=""><?php echo $row1['username']; ?></span>
                            </a>
                            <br>
                            <span class="w3-small w3-opacity"> <?php echo $row['time']; ?></span>
                        </div>
                        <figure class="w3-bar-item w3-right media-left" style="margin: 0; padding-right: 0;">
                            <div class="image-cropper is-48x48">
                                <?php
                                if ($id != 0) { ?>
                                    <img src="../media/dp/<?php echo $row1['photo']; ?>" alt="" srcset="" class="profile-pic">
                                <?php } else { ?>
                                    <img src="../media/logo/<?php echo $row1['logo']; ?>" alt="" srcset="" class="profile-pic">
                                <?php } ?>
                            </div>
                        </figure>
                        <div class="w3-bar-item w3-right w3-border-right">
                            <span class=""><?php echo mysqli_num_rows($replies); ?> Votes</span><br>
                            <span class="w3-small w3-opacity"><?php echo mysqli_num_rows($views); ?> Options</span>
                        </div>
                    </li>
                <?php } ?>
            </ul>

            <div class="modal">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <form action="" method="post">
                        <header class="modal-card-head">
                            <p class="modal-card-title">Start New Topic</p>
                            <button class="delete" onclick="w3.toggleClass('.modal', 'is-active')" aria-label="close"></button>
                        </header>
                        <section class="modal-card-body">
                            <div class="field">
                                <label class="label">Topic</label>
                                <div class="control">
                                    <textarea class="textarea" name="topic" placeholder="Topic"></textarea>
                                </div>
                            </div>
                        </section>
                        <footer class="modal-card-foot">
                            <button class="button is-success" name="submit">Submit</button>
                            <button class="button" onclick="w3.toggleClass('.modal', 'is-active')">Cancel</button>
                        </footer>
                    </form>
                </div>
            </div>
        </div>
        <div class="column is-1"></div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $("#new_topic").click(function() {
            $(".modal").addClass('is-active');
        });
    });
</script>
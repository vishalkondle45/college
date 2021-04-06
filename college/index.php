<?php
include_once 'header.php';
if (isset($_POST['post'])) {
    if (!(empty($_FILES['file']['name']))) {
        $tempname = $_FILES["file"]["tmp_name"];
        $filename = $_FILES["file"]["name"];
        $id = md5(time());
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $filename =  $id . '.' . $ext;
        $folder = "../media/posts/" . $filename;
        if (move_uploaded_file($tempname, $folder)) {
        } else {
            echo "<script>alert('Error While Uploading Image!!!')</script>";
            exit();
        }
    }
    $key = md5(time() + 3);
    $caption = nl2br($_POST['caption']);
    if (mysqli_query($conn, "INSERT INTO posts VALUES(NULL, '0', 'college', '$collegeid', '$filename', '$caption', '$key', NULL)")) {
        echo "<script>location.href='index.php'</script>";
    } else {
        echo "<script>alert('Failure')</script>";
        echo "INSERT INTO posts VALUES(NULL, '0', 'college', '$collegeid', '$filename', '$caption', '$key', NULL)";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollegeWeb</title>
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
    <br>
    <div class="columns section">
        <div class="column is-3">
        </div>
        <div class="column is-6 is-info">
            <article class="message is-primary">
                <!-- Post Header -->
                <div class="message-header level">
                    <p>New Post</p>
                </div>

                <!-- Post Body -->
                <div class="message-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <textarea name="caption" id="" placeholder="Caption" class="textarea" cols="30" rows="2"></textarea>
                        <br />
                        <input type="file" name="file" id="" required>
                        <button class="button is-primary w3-right" name="post"><i class="fa fa-pen"></i>&nbsp;Post</button>
                    </form>
                </div>
            </article>
            <?php
            $post = mysqli_query($conn, "SELECT * FROM posts WHERE `college_id`='$collegeid' order by id desc");
            while ($posts = mysqli_fetch_assoc($post)) {
                $id = $posts['userid'];
                if ($id != 0) {
                    $poster = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
                    $poster = mysqli_fetch_assoc($poster);
                    if ($collegeid != $poster['college_id']) {
                        continue;
                    }
                } else {
                    $poster = mysqli_query($conn, "SELECT * FROM college WHERE id='$collegeid'");
                    $poster = mysqli_fetch_assoc($poster);
                    if ($collegeid != $poster['id']) {
                        continue;
                    }
                }
                $postid = $posts['id'];
                $likes = mysqli_query($conn, "SELECT * FROM likes WHERE post_id='$postid'");
                $comments = mysqli_query($conn, "SELECT * FROM comments WHERE post_id='$postid'");
            ?>
                <article class="message is-link">
                    <!-- Post Header -->
                    <div class="message-header level">
                        <div class="level-left">
                            <div class="image-cropper is-48x48">
                                <?php
                                if ($id != 0) { ?>
                                    <img src="../media/dp/<?php echo $poster['photo'] ?>" alt="" srcset="" class="profile-pic">
                                <?php
                                } else { ?>
                                    <img src="../media/logo/<?php echo $poster['logo'] ?>" alt="" srcset="" class="profile-pic">
                                <?php
                                }
                                echo $row1['logo'];
                                ?>
                            </div>
                        </div>
                        <a href="profile.php?user=<?php echo $poster['username'] ?>" style="text-decoration: none;"><?php echo $poster['username'] ?></a>
                        <div class="level-right">
                            <div class="dropdown is-hoverable">
                                <div class="dropdown-trigger">
                                    <button class="button is-link" aria-haspopup="true" aria-controls="dropdown-menu3">
                                        <span class="icon is-small">
                                            <i class="fa fa-ellipsis-v w3-text-white" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </div>
                                <div class="dropdown-menu" id="dropdown-menu3" role="menu">
                                    <div class="dropdown-content">
                                        <a href="#" class="dropdown-item">
                                            spam
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            inappropriate
                                        </a>
                                        <hr class="dropdown-divider">
                                        <a href="#" class="dropdown-item">
                                            report
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Post Body -->
                    <div class="message-body">
                        <figure class="image">
                            <?php
                            $path_parts = pathinfo($posts['post']);
                            if (in_array($path_parts['extension'], array("png", "jpg", "jpeg"))) {
                            ?>
                                <img src="../media/posts/<?php echo $posts['post']; ?>">
                            <?php
                            } else {
                            ?>
                                <video width="" height="" class="video" id="<?php echo $posts['id']; ?>" controls autoplay muted loop onload="" controlsList="nodownload nofullscreen" disablePictureInPicture>
                                    <source src="../media/posts/<?php echo $posts['post']; ?>" type="video/mp4">
                                    <source src="../media/posts/<?php echo $posts['post']; ?>" type="video/mov">
                                    <source src="../media/posts/<?php echo $posts['post']; ?>" type="video/webm">
                                    <source src="../media/posts/<?php echo $posts['post']; ?>" type="video/avi">
                                    <source src="../media/posts/<?php echo $posts['post']; ?>" type="video/mkv">
                                </video>
                            <?php
                            }
                            ?>
                        </figure>
                        <br>
                        <p><?php echo $posts['caption']; ?></p>


                        <!-- Like Comment Share -->
                        <nav class="level is-mobile post_extensions">
                            <div class="level-left like_comment">
                                <input type="hidden" name="" id="post_id" class="post_id" value="<?php echo $postid; ?>">
                                <div class="level-item like_section">
                                    <div class="tags has-addons">
                                        <?php
                                        $liked = mysqli_query($conn, "SELECT * FROM likes WHERE liker_id='$userid' AND post_id='$postid'");
                                        if (mysqli_num_rows($liked) > 0) { ?>
                                            <span class="tag has-text-danger likes"><?php echo mysqli_num_rows($likes) ?></span>
                                            <i class="fa fa-heart button like is-danger"></i>
                                        <?php
                                        } else {
                                        ?>
                                            <span class="tag is-danger likes"><?php echo mysqli_num_rows($likes) ?></span>
                                            <i class="fa fa-heart button has-text-danger like"></i>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="level-item comment_section">
                                    <div class="tags has-addons">
                                        <?php
                                        $comments = mysqli_query($conn, "SELECT * FROM comments WHERE post_id='$postid'");
                                        ?>
                                        <span class="tag is-primary"><?php echo mysqli_num_rows($comments); ?></span>
                                        <i class="fa fa-comment button has-text-primary comment"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="level-right share_section">
                                <div class="level-item">
                                    <i class="fa fa-send button has-text-info share"></i>
                                </div>
                            </div>
                        </nav>

                        <!-- Share Modal -->
                        <div class="modal">
                            <br><br><br><br><br>
                            <div class="modal-background"></div>
                            <div class="modal-card">
                                <header class="modal-card-head">
                                    <p class="modal-card-title">Share With</p>
                                    <button class="delete close-modal" aria-label="close"></button>
                                </header>
                                <section class="modal-card-body">
                                    <?php
                                    $user = mysqli_query($conn, "SELECT * FROM users WHERE college_id='$collegeid'");
                                    while ($users = mysqli_fetch_assoc($user)) {
                                    ?>
                                        <article class="media">
                                            <figure class="media-left">
                                                <div class="image-cropper is-48x48">
                                                    <img src="../media/dp/<?php echo $poster['photo'] ?>" alt="" srcset="" class="profile-pic">
                                                </div>
                                            </figure>
                                            <div class="media-content">
                                                <div class="content level">
                                                    <div class="level-item">
                                                        <span><?php echo $poster['username'] ?></span>
                                                    </div>
                                                    <p class="level-item">
                                                        <button class="button is-info"><i class="fa fa-send"></i>&nbsp; Share</button>
                                                    </p>
                                                </div>
                                            </div>
                                        </article>
                                    <?php } ?>
                                </section>
                            </div>
                        </div>

                        <!-- Comment -->
                        <input type="text" name="" id="<?php echo $postid; ?>" class="input comment_box" placeholder="Comment Here... [ Enter Key to Comment ]">
                        <br><br>
                        <span class="has-text-dark is-clickable all_comments">All Comments</span>

                        <!-- All Comments -->
                        <div class="" id="Comments" style="display:none">
                            <hr>
                            <?php
                            $all_comments = mysqli_query($conn, "SELECT * FROM comments WHERE `post_id`='$postid' ORDER BY id DESC");
                            while ($comment = mysqli_fetch_assoc($all_comments)) {
                                $current_user = $comment['commenter_id'];
                                if ($current_user != 0) {
                                    $user = mysqli_query($conn, "SELECT * FROM users WHERE id='$current_user'");
                                } else {
                                    $user = mysqli_query($conn, "SELECT * FROM college WHERE id='$collegeid'");
                                }
                                $user = mysqli_fetch_assoc($user);

                                $time = strtotime($comment['time']);
                                $time = date("Y-m-d H:i:s", $time);
                            ?>
                                <article class="media">
                                    <figure class="media-left">
                                        <div class="image-cropper is-48x48">
                                            <?php
                                            if ($current_user != 0) { ?>
                                                <img src="../media/dp/<?php echo $user['photo'] ?>" alt="" srcset="" class="profile-pic">
                                            <?php
                                            } else { ?>
                                                <img src="../media/logo/<?php echo $user['logo'] ?>" alt="" srcset="" class="profile-pic">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </figure>
                                    <div class="media-content">
                                        <div class="content has-text-dark">
                                            <p>
                                                <strong class="username">@<?php echo $user['username'] ?></strong>
                                                <span class="is-size-7"><?php echo time_elapsed_string($time); ?></span>
                                                <br>
                                                <span class="commented"><?php echo $comment['comment'] ?></span>
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            <?php } ?>
                        </div>

                    </div>
                </article>
            <?php
            } ?>
        </div>
        <div class="column is-3 is-hidden-mobile"></div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        $(".share").click(function() {
            $(this).parent().parent().parent().siblings(".modal").show();
        });

        $(".like").click(function() {
            var post_id = $(this).parent().parent().siblings(".post_id").val();
            var t = $(this);
            var likes = $(this).siblings("span").text();
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'like',
                    post_id: post_id
                },
                success: function(data) {
                    if (data == 1) {
                        t.siblings("span").text(++likes);
                        t.siblings("span").removeClass('is-danger');
                        t.siblings("span").addClass('has-text-danger');
                        t.addClass('is-danger');
                        t.removeClass('has-text-danger');
                    } else {
                        t.siblings("span").text(--likes);
                        t.siblings("span").addClass('is-danger');
                        t.siblings("span").removeClass('has-text-danger');
                        t.removeClass('is-danger');
                        t.addClass('has-text-danger');
                    }
                }
            });
        });

        $('.comment_box').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);

            var post_id = $(this).attr("id");
            var comment = $(this).val();
            var t = $(this);
            var comments = $(this).siblings("nav").children(".like_comment").children(".comment_section").children(".tags").children(".tag").text();
            var c = $(this).siblings("#Comments");

            if (keycode == '13' && comment != '') {
                $.ajax({
                    url: "ajax.php",
                    type: "POST",
                    data: {
                        action: 'comment',
                        post_id: post_id,
                        comment: comment
                    },
                    success: function(data) {
                        t.val('');
                        t.siblings("nav").children(".like_comment").children(".comment_section").children(".tags").children(".tag").text(++comments);
                        c.prepend(data);
                        c.show();
                    }
                });
            }
        });


        $(".comment").click(function() {
            $(this).parent().parent().parent().parent().siblings(".comment_box").focus();
        });

        $(".close-modal").click(function() {
            $(this).parent().parent().parent().hide();
        });

        $(".all_comments").click(function() {
            $(this).siblings("#Comments").toggle();
        });

    });

    // onkeypress="return myKeyPress(event)"
    // function myKeyPress(e) {
    //     var keynum;

    //     if (window.event) { // IE                  
    //         keynum = e.keyCode;
    //     }

    //     alert(String.fromCharCode(keynum));
    // }
</script>
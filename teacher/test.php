<article class="message is-link">
    <!-- Post Header -->
    <div class="message-header level">
        <div class="level-left">
            <div class="image-cropper w3-margin-right">
                <img src="../media/dp/<?php echo $poster['photo'] ?>" alt="" srcset="" class="profile-pic">
            </div>
        </div>
        <a href="profile.php?user=<?php echo $poster['unique_key'] ?>" style="text-decoration: none;"><?php echo $poster['username'] ?></a>
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
            <img src="../media/posts/<?php echo $row1['post']; ?>">
        </figure>
        <br>

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
                        $comments = mysqli_query($conn, "SELECT * FROM comments WHERE commenter_id='$id' AND post_id='$postid'");
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
            $all_comments = mysqli_query($conn, "SELECT * FROM comments WHERE `post_id`='$postid'");
            while ($comment = mysqli_fetch_assoc($all_comments)) {
                $current_user = $comment['commenter_id'];
                $user = mysqli_query($conn, "SELECT * FROM users WHERE id='$current_user'");
                $user = mysqli_fetch_assoc($user);

                $time = strtotime($comment['time']);
                $time = date("Y-m-d H:i:s", $time);
            ?>
                <article class="media">
                    <figure class="media-left">
                        <div class="image-cropper is-48x48">
                            <img src="../media/dp/<?php echo $user['photo'] ?>" alt="" srcset="" class="profile-pic">
                        </div>
                    </figure>
                    <div class="media-content">
                        <div class="content has-text-dark">
                            <p>
                                <strong>@<?php echo $user['username'] ?></strong>
                                <span class="is-size-7"><?php echo time_elapsed_string($time); ?></span>
                                <br>
                                <?php echo $comment['comment'] ?>
                            </p>
                        </div>
                    </div>
                </article>
            <?php } ?>
        </div>

    </div>
</article>
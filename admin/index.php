<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
    <?php include_once 'header.php'; ?>
    <br>
    <div class="columns section">
        <div class="column is-3 is-hidden-mobile"></div>
        <div class="column is-6 is-info">
            <article class="message is-dark">
                <!-- Post Header -->
                <div class="message-header level">
                    <p>New Post</p>
                </div>

                <!-- Post Body -->
                <div class="message-body">
                    <textarea name="" id="" placeholder="Caption" class="textarea" cols="30" rows="2"></textarea>
                    <br />
                    <input type="file" name="" id="">
                    <button class="button is-info w3-right"><i class="fa fa-pen"></i>&nbsp;Post</button>
                </div>
            </article>
            <?php
            $a = 0;
            while ($a < 10) {
            ?>
                <article class="message is-dark">
                    <!-- Post Header -->
                    <div class="message-header level">
                        <div class="level-left">
                            <div class="image-cropper w3-margin-right">
                                <img src="../media/dp/090b9b6bb28ee515e10dc22177f6d54e.png" alt="" srcset="" class="profile-pic">
                            </div>
                        </div>
                        <a href="vishalkondle45" style="text-decoration: none;">vishalkondle45</a>
                        <div class="level-right">
                            <div class="dropdown is-hoverable">
                                <div class="dropdown-trigger">
                                    <button class="button is-dark" aria-haspopup="true" aria-controls="dropdown-menu3">
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
                            <img src="../media/dp/4fd64468c7b8cdb1eeafce4076cef360.png">
                        </figure>
                        <br>

                        <!-- Like Comment Share Download -->
                        <nav class="level is-mobile">
                            <div class="level-left">
                                <input type="hidden" name="" id="post_id" class="post_id" value="<?php echo $a; ?>">
                                <div class="level-item">
                                    <div class="tags has-addons">
                                        <span class="tag is-danger">12</span>
                                        <i class="fa fa-heart button has-text-danger like"></i>
                                    </div>
                                </div>
                                <div class="level-item">
                                    <div class="tags has-addons">
                                        <span class="tag is-primary">12</span>
                                        <i class="fa fa-comment button has-text-primary comment"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="level-right">
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
                                    <article class="media">
                                        <figure class="media-left">
                                            <p class="image is-48x48">
                                                <img src="https://versions.bulma.io/0.7.0/images/placeholders/128x128.png">
                                            </p>
                                        </figure>
                                        <div class="media-content">
                                            <div class="content level">
                                                <div class="level-item">
                                                    <span>@commenter_id</span>
                                                </div>
                                                <p class="level-item">
                                                    <button class="button is-info"><i class="fa fa-send"></i>&nbsp; Share</button>
                                                </p>
                                            </div>
                                        </div>
                                    </article>
                                </section>
                            </div>
                        </div>

                        <!-- Comment -->
                        <input type="text" name="" id="comment" class="input" placeholder="Comment Here... [ Enter Key to Comment ]">
                        <br><br>
                        <span class="has-text-dark is-clickable all_comments">All Comments</span>

                        <!-- All Comments -->
                        <div class="" id="Comments" style="display:none">
                            <hr>
                            <article class="media">
                                <figure class="media-left">
                                    <p class="image is-48x48">
                                        <img src="https://versions.bulma.io/0.7.0/images/placeholders/128x128.png">
                                    </p>
                                </figure>
                                <div class="media-content">
                                    <div class="content">
                                        <p>
                                            <strong>Commenter Name</strong> <small>@commenter_id</small> <small>time</small>
                                            <br>
                                            Hey
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>

                    </div>
                </article>
            <?php
                $a++;
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
            alert('Liked - ' + post_id);
        });
        $(".comment").click(function() {
            $(this).parent().parent().parent().parent().siblings("#comment").focus();
        });
        $(".close-modal").click(function() {
            $(this).parent().parent().parent().hide();
        });
        $(".all_comments").click(function() {
            $(this).siblings("#Comments").toggle();
        });
    });
</script>
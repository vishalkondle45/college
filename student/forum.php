<?php
include_once 'header.php';
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

    /* hr.style1 {
        border-top: 1px solid #8c8b8b;
    } */
    body {
        color: #000 !important;
        background-color: #EDF0F4 !important
    }
</style>

<body>
    <br>
    <div class="columns section">
        <div class="column is-1"></div>
        <div class="column is-10">
            <div class="w3-container w3-border w3-white">
                <p class="w3-xlarge">CSS Tutorial and Reference</p>
                <hr class="style1">
                <div class="w3-bar" style="margin:0;">
                    <figure class="w3-bar-item media-left w3-hide-small" style="margin: 0; padding-right: 0;">
                        <div class="image-cropper is-48x48">
                            <img src="../media/dp/090b9b6bb28ee515e10dc22177f6d54e.png" alt="" srcset="" class="profile-pic">
                        </div>
                    </figure>
                    <div class="w3-bar-item" style="margin:0;">
                        <a href="user.php?">
                            <b><span class="">By Ingolme</span></b>
                        </a>
                        <br>
                        <span class="w3-small w3-opacity">September 27, 2005 in CSS</span>
                    </div>
                    <div class="w3-bar-item w3-right" style="margin:0;">
                        <button class="button is-info is-outlined"> <i class="fa fa-reply"></i> &nbsp; Reply &nbsp; <span class="tag is-info">1</span></button>
                        &emsp13;
                        <button class="button is-info w3-right w3-hide-small"> <i class="fa fa-user-plus"></i> &nbsp; Followers &nbsp; <span class="tag is-white">1</span></button>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="w3-row w3-white w3-container w3-padding w3-border w3-responsive">
                <div class="w3-col w3-center w3-border-right w3-hide-small" style="width:10%;">
                    <b>
                        <p class="">kaijim</p>
                    </b>
                    <p>Newbie</p>
                    <br>
                    <img src="../media/dp/090b9b6bb28ee515e10dc22177f6d54e.png" alt="" srcset="" class="w3-image w3-circle w3-hide-small" style="width:75px"><br>
                    <p class="w3-opacity">123 Posts</p>
                </div>
                <div class="w3-col w3-container" style="width:90%;">
                    <span class="w3-opacity">Posted September 27, 2005</span>
                    <span class="w3-responsive">Before you ask a question in this forum, you should check out our CSS Tutorial.For the CSS Tutorial: W3Schools CSS TutorialFor a complete CSS Reference: W3Schools CSS Reference</span>
                    <hr>
                    <button class="button is-success"> <i class="fa fa-arrow-up"></i> &nbsp; Upvote &nbsp; <span class="tag is-white">1</span></button>
                    <button class="button is-info w3-right w3-hide-small"> <i class="fa fa-user-plus"></i> &nbsp; Followers &nbsp; <span class="tag is-white">1</span></button>
                </div>
            </div>
        </div>
        <div class=" column is-1"></div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

    });
</script>
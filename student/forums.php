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
        text-align: center;
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
                <p class="w3-bar-item w3-left w3-xlarge"><b>Forums</b></p>
                <button class="w3-bar-item w3-right button is-info" id="new_topic">Start new topic</button>
            </div>
            <input type="text" name="" class="w3-input w3-border" id="" placeholder="Search..">
            <ul class="w3-ul w3-border w3-white">
                <li class="w3-bar">
                    <div class="w3-bar-item w3-left">
                        <a href="forum.php?">
                            <span class="ellipsis">HTML Tutorial and Reference HTML Tutorial and Reference HTML Tutorial and Reference HTML Tutorial and Reference HTML Tutorial and Reference HTML Tutorial and Reference HTML Tutorial and Reference</span><br>
                            <span class="w3-small w3-opacity">By kaijim, September 27, 2005</span>
                        </a>
                    </div>
                    <div class="w3-bar-item w3-right">
                        <a href="user.php?">
                            <span class="">Ingolme</span>
                        </a>
                        <br>
                        <span class="w3-small w3-opacity">February 6</span>
                    </div>
                    <figure class="w3-bar-item w3-right media-left" style="margin: 0; padding-right: 0;">
                        <div class="image-cropper is-48x48">
                            <img src="../media/dp/090b9b6bb28ee515e10dc22177f6d54e.png" alt="" srcset="" class="profile-pic">
                        </div>
                    </figure>
                    <div class="w3-bar-item w3-right w3-border-right">
                        <span class="">79 replies</span><br>
                        <span class="w3-small w3-opacity">307.9k views</span>
                    </div>
                </li>
                <li class="w3-bar">
                    <div class="w3-bar-item w3-left">
                        <a href="forum.php?">
                            <span class="">HTML Tutorial and Reference</span><br>
                            <span class="w3-small w3-opacity">By kaijim, September 27, 2005</span>
                        </a>
                    </div>
                    <div class="w3-bar-item w3-right">
                        <a href="user.php?">
                            <span class="">Ingolme</span>
                        </a>
                        <br>
                        <span class="w3-small w3-opacity">February 6</span>
                    </div>
                    <figure class="w3-bar-item w3-right media-left" style="margin: 0; padding-right: 0;">
                        <div class="image-cropper is-48x48">
                            <img src="../media/dp/090b9b6bb28ee515e10dc22177f6d54e.png" alt="" srcset="" class="profile-pic">
                        </div>
                    </figure>
                    <div class="w3-bar-item w3-right w3-border-right">
                        <span class="">79 replies</span><br>
                        <span class="w3-small w3-opacity">307.9k views</span>
                    </div>
                </li>
            </ul>



            <div class="modal">
                <div class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Start New Topic</p>
                        <button class="delete" onclick="w3.toggleClass('.modal', 'is-active')" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">

                        <div class="field">
                            <label class="label">Topic</label>
                            <div class="control">
                                <textarea class="textarea" placeholder="Topic"></textarea>
                            </div>
                        </div>

                    </section>
                    <footer class="modal-card-foot">
                        <button class="button is-success">Submit</button>
                        <button class="button" onclick="w3.toggleClass('.modal', 'is-active')">Cancel</button>
                    </footer>
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
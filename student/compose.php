<?php
include_once 'header.php';
include_once 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<style>
    body {
        background-image: url("../media/wallpaper/wallpaper1.webp");
    }
</style>

<body class="w3-light-grey">

    <br><br><br>
    <div class="w3-container">
        <div class="w3-sidebar w3-white w3-bar-block w3-border" style="width:15%; height:640px;">
            <p class="w3-bar-item menu-label"><span class="hidethis">vishal.kondle@gmail.com</span></p>
            <hr>
            <a href="compose.php" class="w3-bar-item w3-button"><i class="fa fa-plus-circle"></i> <span class="hidethis">Compose</span></a>
            <a href="mail.php" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i> <span class="hidethis">Inbox</span></a>
            <a href="starred.php" class="w3-bar-item w3-button"><i class="fa fa-star"></i> <span class="hidethis">Starred</span></a>
            <a href="sent.php" class="w3-bar-item w3-button"><i class="fa fa-paper-plane"></i> <span class="hidethis">Sent</span></a>
        </div>
        <div id="compose_body" style="margin-left:15%; height:640px; overflow-y: scroll;" class="w3-white w3-border w3-container">

            <datalist id="list">
                <?php
                $already = array();
                $query = mysqli_query($conn, "SELECT DISTINCT receiver, sender FROM inbox WHERE sender='vishalkondle@gmail.com' OR receiver='vishalkondle@gmail.com'");
                while ($row = mysqli_fetch_array($query)) {
                    if (in_array($row['sender'], $already) || in_array($row['sender'], $already)) {
                        continue;
                    }

                    if ($row['sender'] == 'vishalkondle@gmail.com') {
                        array_push($already, $row['receiver']);
                ?>
                        <option value="<?php echo $row['receiver']  ?>">
                        <?php
                    } else { ?>
                        <option value="<?php echo $row['sender']  ?>">
                    <?php
                        array_push($already, $row['sender']);
                    }
                }
                    ?>
            </datalist>

            <!-- To -->
            <input type="text" id="to" list="list" class="w3-input w3-white" placeholder="To.."><br>

            <input type="text" class="w3-input w3-white" id="subject" placeholder="Subject.."><br>
            <!-- Body -->
            <div id="editor" style="height:300px">
                <br><br><br><br><br><br>Yours Sincerely <br>
                <b>Vishal Kondle</b>
            </div>
            <br>
            <button class="w3-btn w3-block w3-green">Send <i class="fa fa-paper-plane"></i></button>
        </div>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {
        $.urlParam = function(name) {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            return results[1] || 0;
        }
        $('#to').val(decodeURIComponent($.urlParam('email')));
        $('#subject').val("[Reply] " + decodeURIComponent($.urlParam('subject')));
    });
</script>
<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
</script>
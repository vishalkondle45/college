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
    <title>ChatHub</title>
</head>

<body>
    <br><br>
    <div class="w3-row w3-panel">
        <div class="w3-col w3-hide-small" style="width:20%">&emsp;</div>
        <div class="w3-col" style="width:60%">
            <input type="text" class="w3-input" placeholder="Search" oninput="w3.filterHTML('#users', 'li', this.value)">
            <br>
            <ul class="w3-ul w3-card-4" id="users">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM users WHERE `college_id`='$collegeid' ORDER BY RAND()");
                while ($row = mysqli_fetch_array($query)) {
                    $receiver = $row['id'];
                ?>
                    <li class="w3-bar">
                        <?php
                        if ($receiver != $userid) {
                            $query6 = mysqli_query($conn, "SELECT * FROM follow WHERE `follower`='$userid' AND `following`='$receiver'");
                            $row6 = mysqli_fetch_array($query6);
                            if (mysqli_num_rows($query6) == 0) { ?>
                                <button class="w3-bar-item button is-info follow w3-right w3-margin-top" id="<?php echo $receiver; ?>"> Follow </button>
                                <?php
                            } else {
                                if ($row6['status'] == 0) {
                                ?>
                                    <button class="w3-bar-item button is-info follow w3-right w3-margin-top" id="<?php echo $receiver; ?>"> Requested </button>
                                <?php
                                } else {
                                ?>
                                    <button class="w3-bar-item button is-info follow w3-right w3-margin-top" id="<?php echo $receiver; ?>"> Following </button>
                        <?php
                                }
                            }
                        }
                        ?>
                        <a href="profile.php?user=<?php echo $row['username']; ?>">
                            <img src="../media/dp/<?php echo $row['photo'] ?>" class="w3-bar-item w3-circle w3-hide-small" style="width:85px">
                            <div class="w3-bar-item">
                                <div class="tags has-addons" style="margin-bottom:0px;">
                                    <span class="tag fa fa-user is-dark"></span>
                                    <span class="tag is-danger"><?php echo $row['username'] ?></span>
                                </div>
                                <div class="control">
                                    <div class="tags has-addons">
                                        <span class="tag is-dark"><?php echo $row['education'] ?></span>
                                        <span class="tag is-success"><?php echo $row['department']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="w3-col w3-hide-small" style="width:20%">&emsp;</div>
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

    });
</script>
<?php
include_once 'header.php';
include_once 'session.php';

$query = mysqli_query($conn, "SELECT * FROM users WHERE id ='$userid'");
$row = mysqli_fetch_array($query);
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
    input {
        margin-top: 5px;
        margin-bottom: 5px;
    }
</style>

<body>
    <br><br>
    <div class="w3-row w3-panel">
        <div class="w3-col w3-hide-small" style="width:20%">&emsp;</div>
        <div class="w3-col" style="width:60%">
            <!-- <form action=""> -->
            <input type="text" class="input" name="username" value="<?php echo $row['username']; ?>">
            <input type="text" class="input" name="FirstName" value="<?php echo $row['fname']; ?>">
            <input type="text" class="input" name="MidlleName" value="<?php echo $row['mname']; ?>">
            <input type="text" class="input" name="LastName" value="<?php echo $row['lname']; ?>">
            <input type="text" class="input" name="password" value="<?php echo $row['password']; ?>">
            <input type="text" class="input" name="email" value="<?php echo $row['email']; ?>">
            <input type="text" class="input" name="mobile" value="<?php echo $row['mobile']; ?>">
            <input type="text" class="input" name="address" value="<?php echo $row['address']; ?>">
            <input type="text" class="input" name="city" value="<?php echo $row['city']; ?>">
            <input type="text" class="input" name="pincode" value="<?php echo $row['pincode']; ?>">
            <input type="text" class="input" name="address" value="<?php echo $row['address']; ?>">
            <input type="text" class="input" name="education" value="<?php echo $row['education']; ?>">
            <input type="text" class="input" name="department" value="<?php echo $row['department']; ?>">
            <center>
                <button class="button is-success">Save</button>
            </center>
            <!-- </form> -->
        </div>
        <div class="w3-col w3-hide-small" style="width:20%"></div>
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
                                    t.html('<i class="fa fa-user-plus"></i> &nbsp; Follow &emsp; <span class="tag is-info">' + followers-- + '</span>');
                                } else if (data == 1) {
                                    t.html('<i class="fa fa-user-circle"></i> &nbsp; Requested &emsp; <span class="tag is-info">' + ++followers + '</span>');
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
                                t.html('<i class="fa fa-user-plus"></i> &nbsp; Follow &emsp; <span class="tag is-info">' + followers-- + '</span>');
                            } else if (data == 1) {
                                t.html('<i class="fa fa-user-circle"></i> &nbsp; Requested &emsp; <span class="tag is-info">' + ++followers + '</span>');
                            }
                        }
                    })
                }
            });

        });

        $(".delete").click(function() {
            $(this).parent("header").parent("div").parent("div").toggleClass("is-active");
        });

    });
</script>
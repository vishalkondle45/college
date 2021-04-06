<?php
include_once 'header.php';
include_once 'session.php';
$query = mysqli_query($conn, "SELECT * FROM users WHERE id ='$userid'");
$row = mysqli_fetch_array($query);
if (isset($_POST['save'])) {
    $cusername = $_POST['username'];
    $cpassword = $_POST['password'];
    $cemail = $_POST['email'];
    $cmobile = $_POST['mobile'];
    $caddress = $_POST['address'];
    $ccity = $_POST['city'];
    $cpincode = $_POST['pincode'];
    if (mysqli_query($conn, "UPDATE `users` SET `username` = '$cusername', `password` = '$cpassword', `address` = '$caddress', `city` = '$ccity', `pincode` = '$cpincode' WHERE `users`.`id` = '$userid'")) {
        echo "<script>window.location.href='profile.php'</script>";
    } else {
        echo "UPDATE `users` SET `username` = '$cusername', `password` = '$cpassword', `address` = '$caddress', `city` = '$ccity', `pincode` = '$cpincode' WHERE `users`.`id` = '$userid'";
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
    input {
        margin-top: 5px;
        margin-bottom: 5px;
    }
</style>

<body>
    <br><br>
    <div class="w3-row w3-panel">
        <div class="w3-col w3-hide-small" style="width:20%">&emsp;</div>
        <div class="w3-col w3-padding w3-border" style="width:60%">
            <form action="" method="post">
                <label for="">Username</label>
                <input type="text" class="input" name="username" value="<?php echo $row['username']; ?>">
                <label for="">FirstName</label>
                <input type="text" class="input w3-light-grey" name="FirstName" value="<?php echo $row['fname']; ?>" readonly>
                <label for="">MidlleName</label>
                <input type="text" class="input w3-light-grey" name="MidlleName" value="<?php echo $row['mname']; ?>" readonly>
                <label for="">LastName</label>
                <input type="text" class="input w3-light-grey" name="LastName" value="<?php echo $row['lname']; ?>" readonly>
                <label for="">Password</label>
                <input type="text" class="input" name="password" value="<?php echo $row['password']; ?>">
                <label for="">Email</label>
                <input type="text" class="input w3-light-grey" name="email" value="<?php echo $row['email']; ?>" readonly>
                <label for="">Mobile</label>
                <input type="text" class="input w3-light-grey" name="mobile" value="<?php echo $row['mobile']; ?>" readonly>
                <label for="">Address</label>
                <input type="text" class="input" name="address" value="<?php echo $row['address']; ?>">
                <label for="">City</label>
                <input type="text" class="input" name="city" value="<?php echo $row['city']; ?>">
                <label for="">Pincode</label>
                <input type="text" class="input" name="pincode" value="<?php echo $row['pincode']; ?>">
                <label for="">Education</label>
                <input type="text" class="input w3-light-grey" name="education" value="<?php echo $row['education']; ?>" readonly>
                <label for="">Department</label>
                <input type="text" class="input w3-light-grey" name="department" value="<?php echo $row['department']; ?>" readonly>
                <center>
                    <br>
                    <button class="button is-success" name="save">Save</button>
                </center>
            </form>
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
                                    t.html('Follow &emsp; <span class="tag is-info">' + followers-- + '</span>');
                                } else if (data == 1) {
                                    t.html('Requested &emsp; <span class="tag is-info">' + ++followers + '</span>');
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
                                t.html('Follow &emsp; <span class="tag is-info">' + followers-- + '</span>');
                            } else if (data == 1) {
                                t.html('Requested &emsp; <span class="tag is-info">' + ++followers + '</span>');
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
<?php
include_once 'session.php';
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');
if (isset($_POST['submit'])) {
    $id = '';
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);

    //Photo
    $tempname = $_FILES["photo"]["tmp_name"];
    $filename = $_FILES["photo"]["name"];
    //Setting File Name
    $id = md5(time());
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filename =  $id . '.' . $ext;
    $folder = "../media/dp/" . $filename;
    //Uploading File
    if (move_uploaded_file($tempname, $folder)) {
    } else {
        echo "<script>alert('Error While Uploading Image!!!')</script>";
        exit();
    }

    $college = mysqli_real_escape_string($conn, $collegeid);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $doj = 'current_timestamp()';
    $uniqid = md5(time());
    $education = mysqli_real_escape_string($conn, $_POST['education']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);

    if (mysqli_query($conn, "INSERT INTO users VALUES(NULL, 'teacher', '$fname', '$mname', '$lname', '$username', '$password', '$email', '$mobile', '$address', '$city', '$pincode', '$filename', '$college', '$status', current_timestamp(), '$uniqid', '$education', '$department')")) {
        echo "<script>alert('Teacher Added Successful!!!')</script>";
    } else {
        echo "INSERT INTO users VALUES(NULL, 'teacher', '$fname', '$mname', '$lname', '$username', '$password', '$email', '$mobile', '$address', '$city', '$pincode', '$filename', '$college', '$status', current_timestamp(), '$uniqid', '$education', '$department')";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Teacher</title>
</head>

<body>
    <?php include_once 'header.php'; ?>
    <br>
    <div class="w3-col">
        <div class="w3-quarter">
            &nbsp;
        </div>
        <div class="w3-half">
            <!-- Main Content -->
            <div class="section">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Name -->
                    <div class="field">
                        <label class="label w3-left-align">First Name</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="text" name="fname" placeholder="Enter First Name">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label w3-left-align">Middle Name</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="text" name="mname" placeholder="Enter Middle Name">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label w3-left-align">Last Name</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="text" name="lname" placeholder="Enter Last Name">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">Username</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="text" id="username" name="username" placeholder="Enter Username">
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">Password</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="password" id="password" name="password" placeholder="Enter Password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">Email</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="email" id="email" name="email" placeholder="Enter Email">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">Mobile</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="number" id="mobile" name="mobile" maxlength="10" minlength="10" placeholder="Enter Mobile Number">
                            <span class="icon is-small is-left">
                                <i class="fas fa-phone-alt"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">Address</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="text" name="address" placeholder="Enter Address">
                            <span class="icon is-small is-left">
                                <i class="fas fa-address-card"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">City</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="text" name="city" placeholder="Enter City Name">
                            <span class="icon is-small is-left">
                                <i class="fas fa-city"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">Pincode</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input" type="number" name="pincode" placeholder="Enter Pincode">
                            <span class="icon is-small is-left">
                                <i class="fas fa-map-pin"></i>
                            </span>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">Photo</label>
                        <div class="controls">
                            <input type="file" name="photo" id="" accept="image/*">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">Status</label>
                        <div class="select">
                            <select name="status" id="">
                                <option value="1">Activate</option>
                                <option value="0">Deactivate</option>
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">Education</label>
                        <div class="select">
                            <select name="education" id="">
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM `education` WHERE `college_id`= 1");
                                while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                    <option value="<?php echo $row['education']; ?>"><?php echo $row['education']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label w3-left-align">Department</label>
                        <div class="select">
                            <select name="department" id="">
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM `department` WHERE `college_id`= 1");
                                while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                    <option value="<?php echo $row['department']; ?>"><?php echo $row['department']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="field is-grouped">
                        <div class="control">
                            <button class="button is-success" type="submit" name="submit">Submit</button>
                        </div>
                        <div class="control">
                            <button class="button is-danger" name="cancel" type="reset">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="w3-quarter">
                &nbsp;
            </div>
        </div>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {
        $("#username").change(function() {
            var text = $("#username").val();
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'check_username',
                    text: text
                },
                success: function(data) {
                    if (data == "1") {
                        $("#username").attr('placeholder', " Already in Use!!");
                        $("#username").addClass('is-danger');
                        $("#username").focus();
                        $("#username").val('');
                    }
                }
            });
        });

        $("#password").change(function() {
            $("#password").each(function() {
                var validated = true;
                if (this.value.length < 8)
                    validated = false;
                if (!/\d/.test(this.value))
                    validated = false;
                if (!/[a-z]/.test(this.value))
                    validated = false;
                if (!/[A-Z]/.test(this.value))
                    validated = false;
                var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
                if (format.test(this.value)) {} else {
                    validated = false;
                }

                if (!validated) {
                    $("#password").val('');
                    $("#password").attr('placeholder', "Password Must Be Strong!! Eg. 'Admin@123'");
                    $("#password").addClass('is-danger');
                    $("#password").focus();
                } else {
                    $("#password").removeClass('is-danger');
                }
            });
        });

        $("#email").change(function() {
            var text = $("#email").val();
            // alert(text);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'check_email',
                    text: text
                },
                success: function(data) {
                    if (data == "1") {
                        $("#email").attr('placeholder', " Already in Use!!");
                        $("#email").addClass('is-danger');
                        $("#email").focus();
                        $("#email").val('');
                    }
                }
            });
        });

        $("#mobile").change(function() {
            var text = $("#mobile").val();
            // alert(text);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'check_mobile',
                    text: text
                },
                success: function(data) {
                    if (data == "1") {
                        $("#mobile").val('');
                        $("#mobile").attr('placeholder', " Already in Use!!");
                        $("#mobile").addClass('is-danger');
                        $("#mobile").focus();
                    }
                }
            });
        });
    });
</script>
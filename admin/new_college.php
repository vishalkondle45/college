<?php
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');
$query = mysqli_query($conn, "SELECT help_category_id, COUNT(*) FROM help_topic GROUP BY help_category_id");

$last_college = mysqli_query($conn, "SELECT * FROM college order by id desc LIMIT 3");
$last_teacher = mysqli_query($conn, "SELECT * FROM users INNER JOIN college ON users.college_id=college.id WHERE `role`='teacher' ORDER BY users.id DESC LIMIT 3");
$last_student = mysqli_query($conn, "SELECT * FROM users INNER JOIN college ON users.college_id=college.id WHERE `role`='student' ORDER BY users.id DESC LIMIT 3");


if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);


    //Status
    $tempname = $_FILES["logo"]["tmp_name"];
    $filename = $_FILES["logo"]["name"];

    //Setting File Name
    $id = md5(time());
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filename =  $id . '.' . $ext;
    $folder = "../media/logo/" . $filename;

    //Uploading File
    if (move_uploaded_file($tempname, $folder)) {
    } else {
        echo "<script>alert('Error While Uploading Logo!!!')</script>";
        exit();
    }

    if (mysqli_query($conn, "INSERT INTO college VALUES(NULL, '$name', '$username', '$password', '$email', '$mobile', '$address', '$city', '$pincode', '$filename', current_timestamp(), '$status')")) {
        echo "<script>alert('College Added Successful!!!')</script>";
    } else {
        echo "INSERT INTO college VALUES(NULL, '$name', '$username', '$password', '$email', '$mobile', '$address', '$city', '$pincode', '$filename', current_timestamp(), '$status')";
        // echo "<script>alert('Error While Inserting into Database!!!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <?php include_once 'header.php'; ?>
    <br>
    <!-- Main Content -->
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="field">
                <label class="label">Name</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" name="name" placeholder="Enter College Name">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Username</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" name="username" placeholder="Enter Username">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="password" name="password" placeholder="Enter Password">
                    <span class="icon is-small is-left">
                        <i class="fas fa-key"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="email" name="email" placeholder="Enter Email">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Mobile</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="number" name="mobile" maxlength="10" minlength="10" placeholder="Enter Mobile Number">
                    <span class="icon is-small is-left">
                        <i class="fas fa-phone-alt"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Address</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" name="address" placeholder="Enter Address">
                    <span class="icon is-small is-left">
                        <i class="fas fa-address-card"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">City</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" name="city" placeholder="Enter City Name">
                    <span class="icon is-small is-left">
                        <i class="fas fa-city"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Pincode</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="number" name="pincode" placeholder="Enter Pincode">
                    <span class="icon is-small is-left">
                        <i class="fas fa-map-pin"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Logo</label>
                <div class="controls">
                    <input type="file" name="logo" id="" accept="image/*">
                </div>
            </div>

            <div class="field">
                <label class="label">Status</label>
                <div class="select">
                    <select name="status" id="">
                        <option value="1">Activate</option>
                        <option value="0">Deactivate</option>
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
    <br><br>

</body>

</html>
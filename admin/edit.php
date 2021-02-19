<?php
include_once 'session.php';
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');

$id = $_GET['id'];
$user = $_GET['user'];

switch ($user) {
    case 'student':
    case 'teacher':
        $query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
        break;

    case 'college':
        $query = mysqli_query($conn, "SELECT * FROM college WHERE id='$id'");
        break;
}
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colleges</title>
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
    <!-- Main Content -->
    <div class="section">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Name -->
            <div class="field">
                <label class="label">First Name</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" name="fname" placeholder="Enter First Name" value="<?php echo $row['fname'] ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                <label class="label">Middle Name</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" name="mname" placeholder="Enter Middle Name" value="<?php echo $row['mname'] ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                <label class="label">Last Name</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" name="lname" placeholder="Enter Last Name" value="<?php echo $row['lname'] ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Username</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" name="username" placeholder="Enter Username" value="<?php echo $row['username'] ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="password" name="password" placeholder="Enter Password" value="<?php echo $row['password'] ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-key"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="email" name="email" placeholder="Enter Email" value="<?php echo $row['email'] ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Mobile</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="number" name="mobile" maxlength="10" minlength="10" placeholder="Enter Mobile Number" value="<?php echo $row['mobile'] ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-phone-alt"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Address</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" name="address" placeholder="Enter Address" value="<?php echo $row['address'] ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-address-card"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">City</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" name="city" placeholder="Enter City Name" value="<?php echo $row['city'] ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-city"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Pincode</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input" type="number" name="pincode" placeholder="Enter Pincode" value="<?php echo $row['pincode'] ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-map-pin"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Photo</label>
                <div class="controls">
                    <input type="file" name="photo" id="" value="../media/dp/<?php echo $row['photo'] ?>" accept="image/*" onchange="readURL(this);">
                    <img id="blah" src="../media/dp/<?php echo $row['photo'] ?>" alt="your image" class="is-128x128" />
                </div>
            </div>

            <div class="field">
                <label class="label">College</label>
                <div class="select">
                    <select name="college" id="">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM college WHERE `status`= 1 ORDER BY id DESC");
                        while ($row1 = mysqli_fetch_assoc($query)) {
                            if ($row1['id'] == $row['college_id']) {
                        ?>
                                <option value="<?php echo $row1['id']; ?>" selected><?php echo $row1['name']; ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $row1['id']; ?>"><?php echo $row1['name']; ?></option>
                        <?php }
                        } ?>
                    </select>
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

            <div class="field">
                <label class="label">Year</label>
                <div class="select">
                    <select name="year" id="">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM `year` WHERE `college_id`= 1");
                        while ($row1 = mysqli_fetch_assoc($query)) {
                            if ($row1['year'] == $row['education']) {
                        ?>
                                <option value="<?php echo $row1['year']; ?>" selected><?php echo $row1['year']; ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $row1['year']; ?>"><?php echo $row1['year']; ?></option>
                        <?php }
                        } ?>
                    </select>
                </div>
            </div>

            <div class="field">
                <label class="label">Department</label>
                <div class="select">
                    <select name="department" id="">
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM `department` WHERE `college_id`= 1");
                        while ($row1 = mysqli_fetch_assoc($query)) {
                            if ($row1['department'] == $row['department']) {
                        ?>
                                <option value="<?php echo $row1['department']; ?>" selected><?php echo $row1['department']; ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $row1['department']; ?>"><?php echo $row1['department']; ?></option>
                        <?php }
                        } ?>
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

</body>

</html>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
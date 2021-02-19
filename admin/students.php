<?php
include_once 'session.php';
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');
$students = mysqli_query($conn, "SELECT * FROM users WHERE usertype='student'");
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
    <div class="table-container section">
        <table class="table is-striped is-narrow is-hoverable">
            <thead>
                <tr class="is-selected">
                    <th>#</th>
                    <th>C#</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>DOJ</th>
                    <th>Education</th>
                    <th>Department</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Pincode</th>
                    <th>Photo</th>
                    <th>Status</th>
                    <th colspan="2" class="w3-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($students)) {
                ?>
                    <tr class="">
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['college_id'] ?></td>
                        <td><?php echo $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname']; ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['mobile'] ?></td>
                        <td><?php echo $row['doj'] ?></td>
                        <td><?php echo $row['education'] ?></td>
                        <td><?php echo $row['department'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo $row['city'] ?></td>
                        <td><?php echo $row['pincode'] ?></td>
                        <td>
                            <div class="image-cropper">
                                <img src="../media/dp/<?php echo $row['photo'] ?>" alt="avatar" class="profile-pic">
                            </div>
                        </td>
                        <td><?php echo $row['status'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id'] ?>&user=student">
                                <button class="button is-info">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="delete.php?id=<?php echo $row['id'] ?>&user=student">
                                <button class="button is-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
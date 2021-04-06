<?php
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');
$query = mysqli_query($conn, "SELECT help_category_id, COUNT(*) FROM help_topic GROUP BY help_category_id");

$last_college = mysqli_query($conn, "SELECT * FROM college order by id desc LIMIT 3");
$last_teacher = mysqli_query($conn, "SELECT * FROM users INNER JOIN college ON users.college_id=college.id WHERE `usertype`='teacher' ORDER BY users.id DESC LIMIT 3");
$last_student = mysqli_query($conn, "SELECT * FROM users INNER JOIN college ON users.college_id=college.id WHERE `usertype`='student' ORDER BY users.id DESC LIMIT 3");
$last_admin = mysqli_query($conn, "SELECT * FROM `admin`");

$colleges = mysqli_query($conn, "SELECT * FROM college");
$students = mysqli_query($conn, "SELECT * FROM users WHERE usertype='student'");
$teachers = mysqli_query($conn, "SELECT * FROM users WHERE usertype='teacher'");
$city = mysqli_query($conn, "SELECT DISTINCT `city` FROM `users`");
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
    <br><br><br>
    <!-- Main Content -->
    <div class="container">
        <div class="columns is-multiline ">
            <div class="column">
                <div class="box notification is-primary">
                    <div class="heading">Colleges</div>
                    <div class="title"><span class="Count"><?php echo mysqli_num_rows($colleges); ?></span> <i class="fa fa-university"></i></div>
                </div>
            </div>
            <div class="column">
                <div class="box notification is-success">
                    <div class="heading">Students</div>
                    <div class="title"><span class="Count"><?php echo mysqli_num_rows($students); ?></span> <i class="fa fa-graduation-cap"></i></div>
                </div>
            </div>
            <div class="column">
                <div class="box notification is-link">
                    <div class="heading">Teachers</div>
                    <div class="title"><span class="Count"><?php echo mysqli_num_rows($teachers); ?></span> <i class="fa fa-chalkboard-teacher"></i></div>
                </div>
            </div>
            <div class="column">
                <div class="box notification is-danger">
                    <div class="heading">Cities we reached</div>
                    <div class="title"><span class="Count"><?php echo mysqli_num_rows($city); ?></span> <i class="fa fa-city"></i></div>
                </div>
            </div>
        </div>

        <div class="columns is-multiline">
            <div class="column is-6">
                <article class="message is-dark">
                    <div class="message-header">
                        <p>Latest 3 Colleges</p>
                    </div>
                    <div class="message-body">
                        <table class="table is-hoverable table is-fullwidth">
                            <tr class="is-selected">
                                <th>#</th>
                                <th>Name</th>
                                <th>City</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($last_college)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['city']; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </article>
            </div>
            <div class="column is-6">
                <article class="message is-dark">
                    <div class="message-header">
                        <p>Latest 3 Teachers</p>
                    </div>
                    <div class="message-body">
                        <table class="table is-hoverable table is-fullwidth">
                            <tr class="is-selected">
                                <th>#</th>
                                <th>Name</th>
                                <th>College</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($last_teacher)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['fname'] . ' ' . $row['lname']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </article>
            </div>
            <div class="column is-6">
                <article class="message is-dark">
                    <div class="message-header">
                        <p>Latest 3 Student</p>
                    </div>
                    <div class="message-body">
                        <table class="table is-hoverable table is-fullwidth">
                            <tr class="is-selected">
                                <th>#</th>
                                <th>Name</th>
                                <th>College</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($last_student)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['fname'] . ' ' . $row['lname']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </article>
            </div>
            <div class="column is-6">
                <article class="message is-dark">
                    <div class="message-header">
                        <p>Latest 3 Colleges</p>
                    </div>
                    <div class="message-body">
                        <table class="table is-hoverable table is-fullwidth">
                            <tr class="is-selected">
                                <th>#</th>
                                <th>Username</th>
                                <th>Password</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($last_admin)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </article>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    $('.Count').each(function() {
        var $this = $(this);
        jQuery({
            Counter: 0
        }).animate({
            Counter: $this.text()
        }, {
            duration: 5000,
            easing: 'swing',
            step: function() {
                $this.text(Math.ceil(this.Counter));
            }
        });
    });
</script>
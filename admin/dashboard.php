<?php
$conn = mysqli_connect('localhost', 'root', '', 'college');
$query = mysqli_query($conn, "SELECT help_category_id, COUNT(*) FROM help_topic GROUP BY help_category_id");

$last_college = mysqli_query($conn, "SELECT * FROM college order by id desc LIMIT 3");
$last_teacher = mysqli_query($conn, "SELECT * FROM users INNER JOIN college ON users.college_id=college.id WHERE `role`='teacher' ORDER BY users.id DESC LIMIT 3");
$last_student = mysqli_query($conn, "SELECT * FROM users INNER JOIN college ON users.college_id=college.id WHERE `role`='student' ORDER BY users.id DESC LIMIT 3");

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
        <div class="columns is-multiline ">
            <div class="column">
                <div class="box notification is-info">
                    <div class="heading">Colleges</div>
                    <div class="title"><span class="Count">231</span> <i class="fa fa-university"></i></div>
                </div>
            </div>
            <div class="column">
                <div class="box notification is-success">
                    <div class="heading">Students</div>
                    <div class="title"><span class="Count">31162</span> <i class="fa fa-graduation-cap"></i></div>
                </div>
            </div>
            <div class="column">
                <div class="box notification is-link">
                    <div class="heading">Teachers</div>
                    <div class="title"><span class="Count">3352</span> <i class="fa fa-chalkboard-teacher"></i></div>
                </div>
            </div>
            <div class="column">
                <div class="box notification is-danger">
                    <div class="heading">Cities we reached</div>
                    <div class="title"><span class="Count">52</span> <i class="fa fa-city"></i></div>
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
                        <p>Chart</p>
                    </div>
                    <div class="message-body">

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
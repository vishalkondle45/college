<?php
$conn = mysqli_connect('localhost', 'root', '', 'collegeweb');
if (isset($_POST['add_notice'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    foreach ($_POST['show'] as $show) {
        $result_explode = explode('|', $show);
        $year = $result_explode[0];
        $department = $result_explode[1];
        if (mysqli_query($conn, "INSERT INTO `noticeboard` VALUES(NULL, '1', '$title', '$description', '$year', '$department', current_timestamp())")) {
            continue;
        } else {
            echo "INSERT INTO `noticeboard` VALUES(NULL, '1', '$title', '$description', '$year', '$department', current_timestamp())";
        }
    }
    echo "<script>window.location.href='manage_notice.php'</script>";
}
if (isset($_POST['add_year'])) {
    $year = $_POST['year'];
    if (mysqli_query($conn, "INSERT INTO `year` VALUES(NULL, '1', '$year')")) {
    } else {
        echo "INSERT INTO `year` VALUES(NULL, '1', '$year')";
    }
    echo "<script>window.location.href='add.php'</script>";
}
if (isset($_POST['add_department'])) {
    $department = $_POST['department'];
    if (mysqli_query($conn, "INSERT INTO `department` VALUES(NULL, '1', '$department')")) {
    } else {
        echo "INSERT INTO `department` VALUES(NULL, '1', '$department')";
    }
    echo "<script>window.location.href='add.php'</script>";
}
if (isset($_POST['add_education'])) {
    $education = $_POST['education'];
    if (mysqli_query($conn, "INSERT INTO `education` VALUES(NULL, '1', '$education')")) {
    } else {
        echo "INSERT INTO `education` VALUES(NULL, '1', '$education')";
    }
    echo "<script>window.location.href='add.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>

<body>
    <?php include_once 'header.php'; ?>
    <br><br><br>
    <div class="w3-row">
        <!-- Year -->
        <div class="w3-col w3-container" style="width:22%">
            <article class="message is-success">
                <div class="message-header">
                    <p>Add Year</p>
                </div>
                <div class="message-body">
                    <form action="" method="post">
                        <span class="has-text-danger w3-opacity">Dont Forget to add Allumni</span>
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input" name="year" type="text" placeholder="Year" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-sort-numeric-up-alt"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <p class="control w3-center">
                                <button class="button is-success" name="add_year">
                                    Add
                                </button>
                            </p>
                        </div>
                    </form>
                </div>
            </article>
            <!-- Table -->
            <article class="message is-success">
                <div class="message-header">
                    <p>Years</p>
                </div>
                <div class="message-body">
                    <div class="table-container">
                        <table class="table is-hoverable is-fullwidth">
                            <thead>
                                <tr class="is-selected">
                                    <th>#</abbr></th>
                                    <th>Year</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM `year` WHERE `college_id`= 1");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <th><?php echo $row['id']; ?></th>
                                        <th><?php echo $row['year']; ?></th>
                                        <td>
                                            <button class="button is-danger is-small remove_year" id="<?php echo $row['id']; ?>">
                                                <span class="icon is-small">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </div>
        <div class="w3-col w3-container" style="width:30%">
            <article class="message is-danger">
                <div class="message-header">
                    <p>Add Notice</p>
                </div>
                <div class="message-body">
                    <form action="" method="post">
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input" type="text" name="title" placeholder="Notice Title" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-chalkboard"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <textarea class="textarea" placeholder="Notice Description" rows="5" name="description" required></textarea>
                        </div>
                        <div class="field">
                            <div class="select is-multiple">
                                <select multiple size="4" name="show[]" required>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT `year`, `department` FROM `year` t1 INNER JOIN department t2 ON t2.college_id = t1.college_id");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <option value="<?php echo $row['year'] . '|' . $row['department']; ?>"><?php echo $row['year'] . ' - ' . $row['department']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <p class="control w3-center">
                                <button class="button is-danger" name="add_notice">
                                    Add
                                </button>
                            </p>
                        </div>
                    </form>
                </div>
            </article>
        </div>
        <div class="w3-col w3-container" style="width:28%">
            <article class="message is-link">
                <div class="message-header">
                    <p>Add Department</p>
                </div>
                <div class="message-body">
                    <form action="" method="post">
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input" name="department" type="text" placeholder="Department" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-building"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <p class="control w3-center">
                                <button class="button is-link" name="add_department">
                                    Add
                                </button>
                            </p>
                        </div>
                    </form>
                </div>
            </article>
            <!-- Table -->
            <article class="message is-link">
                <div class="message-header">
                    <p>Departments</p>
                </div>
                <div class="message-body">
                    <div class="table-container">
                        <table class="table is-hoverable is-fullwidth">
                            <thead>
                                <tr class="is-selected">
                                    <th>#</abbr></th>
                                    <th>Department</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM `department` WHERE `college_id`= 1");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <th><?php echo $row['id']; ?></th>
                                        <th><?php echo $row['department']; ?></th>
                                        <td>
                                            <button class="button is-danger is-small remove_dept" id="<?php echo $row['id']; ?>">
                                                <span class="icon is-small">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </div>
        <div class="w3-col w3-container" style="width:20%">
            <article class="message is-warning">
                <div class="message-header">
                    <p>Add Teachers Education</p>
                </div>
                <div class="message-body">
                    <form action="" method="post">
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input class="input" name="education" type="text" placeholder="Education" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-building"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <p class="control w3-center">
                                <button class="button is-warning" name="add_education">
                                    Add
                                </button>
                            </p>
                        </div>
                    </form>
                </div>
            </article>
            <!-- Table -->
            <article class="message is-warning">
                <div class="message-header">
                    <p>Teachers Education</p>
                </div>
                <div class="message-body">
                    <div class="table-container">
                        <table class="table is-hoverable is-fullwidth">
                            <thead>
                                <tr class="is-selected">
                                    <th>#</abbr></th>
                                    <th>Education</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM `education` WHERE `college_id`= 1");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <th><?php echo $row['id']; ?></th>
                                        <th><?php echo $row['education']; ?></th>
                                        <td>
                                            <button class="button is-danger is-small remove_education" id="<?php echo $row['id']; ?>">
                                                <span class="icon is-small">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </div>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $(".remove_dept").click(function() {
            var d = $(this);
            var id = $(this).attr("id");
            // alert(id);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'delete_dept',
                    id: id
                },
                success: function(data) {
                    d.parent("td").parent("tr").hide();
                }
            });
        });

        $(".remove_year").click(function() {
            var d = $(this);
            var id = $(this).attr("id");
            // alert(id);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'delete_year',
                    id: id
                },
                success: function(data) {
                    d.parent("td").parent("tr").hide();
                }
            });
        });

        $(".remove_education").click(function() {
            var d = $(this);
            var id = $(this).attr("id");
            // alert(id);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {
                    action: 'delete_education',
                    id: id
                },
                success: function(data) {
                    d.parent("td").parent("tr").hide();
                }
            });
        });
    });
</script>
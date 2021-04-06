<?php
include_once 'session.php';
?>
<link rel="stylesheet" href="../includes/css/bulma.css">
<link rel="stylesheet" href="../includes/css/w3.css">
<script src="../includes/js/jquery.js"></script>
<script src="../includes/js/fontawesome.js"></script>
<script src="../includes/js/w3.js"></script>
<script src="../includes/js/w3data.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.22.0/apexcharts.min.js"></script>
<script defer src="../includes/js/module-chart.js"></script>

<!-- Navigation Bar Starts -->
<nav class="navbar is-info is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a role="button" class="navbar-burger" aria-label="menu" onclick="w3.toggleClass('.navbar-menu','is-active')" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="index.php">
                <i class="fa fa-dashboard"></i> &nbsp; Dashboard
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Colleges
                </a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="new_college.php">
                        <i class="fa fa-plus"></i> &nbsp; New College
                    </a>
                    <a class="navbar-item" href="colleges.php">
                        <i class="fa fa-university"></i> &nbsp; Display Colleges
                    </a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Teachers
                </a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="new_teacher.php">
                        <i class="fa fa-plus"></i> &nbsp; New Teacher
                    </a>
                    <a class="navbar-item" href="teachers.php">
                        <i class="fa fa-chalkboard-teacher"></i> &nbsp; Teachers
                    </a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <p class="navbar-link">
                    Student
                </p>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="new_student.php">
                        <i class="fa fa-plus"></i> &nbsp; New Student
                    </a>
                    <a class="navbar-item" href="students.php">
                        <i class="fa fa-users"></i> &nbsp; Students
                    </a>
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <p class="navbar-link">
                    Manage
                </p>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="posts.php">
                        <i class="fa fa-image"></i> &nbsp; Posts
                    </a>
                    <a class="navbar-item" href="forums.php">
                        <i class="fa fa-comments"></i> &nbsp; Forums
                    </a>
                    <a class="navbar-item" href="polls.php">
                        <i class="fa fa-poll"></i> &nbsp; Polls
                    </a>
                    <a class="navbar-item" href="noticeboard.php">
                        <i class="fa fa-chalkboard-teacher"></i> &nbsp; Noticeboard
                    </a>
                    <a class="navbar-item" href="years.php">
                        <i class="fa fa-address-card"></i> &nbsp; Years
                    </a>
                    <a class="navbar-item" href="departments.php">
                        <i class="fa fa-id-card"></i> &nbsp; Departments
                    </a>
                    <a class="navbar-item" href="education.php">
                        <i class="fa fa-university"></i> &nbsp; Education
                    </a>
                </div>
            </div>

        </div>

        <div class="navbar-end">
            <a class="navbar-item" href="logout.php">
                <i class="fa fa-sign-out-alt"></i> &nbsp; Logout
            </a>
        </div>
    </div>
</nav>
<!--  -->
<!-- Navigation Bar Ends -->
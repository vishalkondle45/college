<?php
include_once 'session.php';
?>
<link rel="stylesheet" href="../includes/css/bulma.css">
<link rel="stylesheet" href="../includes/css/bootstrap-icons.css">
<link rel="stylesheet" href="../includes/css/w3.css">
<!-- <link rel="stylesheet" href="../includes/css/bootstrap.css"> -->
<script src="../includes/js/jquery.js"></script>
<script src="../includes/js/fontawesome.js"></script>
<script src="../includes/js/w3.js"></script>
<script src="../includes/js/w3data.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
<!-- <link rel="stylesheet" href="../includes/css/quill.snow.css"> -->
<!-- <script defer src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.22.0/apexcharts.min.js"></script> -->
<!-- <script defer src="../includes/js/module-chart.js"></script> -->
<!-- <script src="../includes/js/bootstrap.bundle.js"></script> -->


<!-- New Files -->
<!-- Main Quill library -->
<!-- <script src="//cdn.quilljs.com/1.3.6/quill.js"></script> -->
<!-- <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script> -->

<!-- Theme included stylesheets -->
<!-- <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> -->
<!-- <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet"> -->

<!-- Core build with no theme, formatting, non-essential modules -->
<!-- <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet"> -->
<!-- <script src="//cdn.quilljs.com/1.3.6/quill.core.js"></script> -->



<style>
    html {
        overflow: scroll;
        overflow-x: hidden;
    }

    a:hover {
        text-decoration: none;
        /* text-decoration-color: white; */
    }

    ::-webkit-scrollbar {
        width: 0;
        /* Remove scrollbar space */
        background: transparent;
        /* Optional: just make scrollbar invisible */
    }

    /* Optional: show position indicator in red */
    ::-webkit-scrollbar-thumb {
        background: #FF0000;
    }

    h1 {
        font-size: 36px
    }

    h2 {
        font-size: 30px
    }

    h3 {
        font-size: 24px
    }

    h4 {
        font-size: 20px
    }

    h5 {
        font-size: 18px
    }

    h6 {
        font-size: 16px
    }
</style>

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
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="index.php">
                    <b>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cpu" viewBox="0 0 16 16">
                            <path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
                        </svg>
                        CollegeWeb
                    </b>
                </a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="index.php">
                        <b>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                            &nbsp;
                            Home
                        </b>
                    </a>
                    <a class="navbar-item" href="profile.php">
                        <b>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>

                            &nbsp;
                            Find Profile
                        </b>
                    </a>
                    <a class="navbar-item" href="search.php">
                        <b>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                            &nbsp;
                            Search
                        </b>
                    </a>
                </div>
            </div>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Add
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item" href="new_student.php">
                        Students
                    </a>
                    <a class="navbar-item" href="new_teacher.php">
                        Teachers
                    </a>
                    <a class="navbar-item" href="add.php">
                        Class
                    </a>
                    <a class="navbar-item" href="add.php">
                        Year
                    </a>
                    <a class="navbar-item" href="add.php">
                        Education
                    </a>
                    <a class="navbar-item" href="add.php">
                        Notice
                    </a>
                </div>
            </div>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Manage
                </a>
                <div class="navbar-dropdown">
                    <a class="navbar-item" href="manage_student.php">
                        Students
                    </a>
                    <a class="navbar-item" href="manage_teacher.php">
                        Teachers
                    </a>
                    <a class="navbar-item" href="manage_notice.php">
                        Noticeboard
                    </a>
                    <a class="navbar-item" href="manage_post.php">
                        Posts
                    </a>
                    <a class="navbar-item" href="manage_poll.php">
                        Polls
                    </a>
                    <a class="navbar-item" href="manage_forum.php">
                        Forums
                    </a>
                    <a class="navbar-item" href="manage_allumni.php">
                        Allumni
                    </a>
                </div>
            </div>
            <!-- <a href="promote.php" class="navbar-item">
                Promote
            </a> -->
        </div>

        <div class="navbar-end">
            <a class="navbar-item" href="logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg>
                &nbsp;
                Logout
            </a>
        </div>
    </div>
</nav>
<!--  -->
<!-- Navigation Bar Ends -->
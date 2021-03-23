<?php
include_once 'includes/conn.php';
session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'student')
        echo "<script>window.location.href='student/index.php'</script>";
    elseif ($_SESSION['role'] == 'teacher')
        echo "<script>window.location.href='teacher/index.php'</script>";
    elseif ($_SESSION['role'] == 'college')
        echo "<script>window.location.href='college/index.php'</script>";
    elseif ($_SESSION['role'] == 'admin')
        echo "<script>window.location.href='admin/index.php'</script>";
}

// Login
if (isset($_POST['login'])) {
    $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if ($usertype == 'student' || $usertype == 'teacher')
        $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password' AND `usertype`='$usertype'");
    elseif ($usertype == 'college')
        $query = mysqli_query($conn, "SELECT * FROM `college` WHERE `username`='$username' AND `password`='$password'");
    elseif ($usertype == 'admin')
        $query = mysqli_query($conn, "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'");
    else {
        echo "<script>alert('Something Wrong'); window.location.href='index.php'</script>";
    }

    if (mysqli_num_rows($query)) {

        $_SESSION['role'] = $usertype;
        $_SESSION['usertype'] = $_POST['usertype'];
        $_SESSION['username'] = $_POST['username'];

        $row = mysqli_fetch_array($query);
        $_SESSION['collegeid'] = $row['college_id'];
        $_SESSION['userid'] = $row['id'];
        $_SESSION['id'] = $id = $row['id'];

        echo "<script>window.location.href='$usertype/index.php'</script>";
    } else
        echo "<script>alert('Wrong Credentials'); window.location.href='index.php'</script>";
}

// Message us
if (isset($_POST['message'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'includes.php'; ?>
    <title>CollegeWeb</title>
</head>
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: verdana;
    }
</style>

<body class="section">
    <!-- Navigation Bar Starts -->
    <nav class="navbar is-fixed-top is-primary" role="navigation" aria-label="main navigation">

        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                Home
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" onclick="w3.toggleClass('.navbar-menu','is-active')" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">

                <a class="navbar-item" href="#collegeweb">
                    CollegeWeb
                </a>

                <a class="navbar-item" href="#about">
                    About Us
                </a>

                <a class="navbar-item" href="#contact">
                    Contact Us
                </a>
            </div>

            <div class="navbar-end">
                <a class="navbar-item" onclick="w3.toggleClass('.modal', 'is-active')">
                    Login
                </a>
            </div>
        </div>
    </nav>
    <!-- Navigation Bar Ends -->

    <!-- SlideShow Starts -->
    <div class="container" id="home">
        <br>
        <img class="nature" src="https://www.w3schools.com/w3js/img_snowtops.jpg" width="100%">
        <img class="nature" src="https://www.w3schools.com/w3js/img_mountains.jpg" width="100%">
        <img class="nature" src="https://www.w3schools.com/w3js/img_nature.jpg" width="100%">
        <br>
    </div>
    <!-- SlideShow Ends -->

    <!-- CollegeWeb Starts -->
    <div class="container" id="collegeweb">
        <br><br><br>
        <article class="message is-primary">
            <div class="message-header">
                <p>What is CollegeWeb ?</p>
            </div>
            <div class="message-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
            </div>
        </article>
        <div class="columns">
            <div class="column">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <p class="title is-6">Feature 1</p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <p class="title is-6">Feature 2</p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <p class="title is-6">Feature 3</p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <p class="title is-6">Feature 4</p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <p class="title is-6">Feature 5</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CollegeWeb Ends -->

    <!-- About US Starts -->
    <div class="container" id="about">
        <br><br><br>
        <article class="message is-primary">
            <div class="message-header">
                <p>About Us</p>
            </div>
            <div class="message-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
            </div>
        </article>
        <div class="columns">
            <div class="column">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4">John Smith</p>
                                <p class="subtitle is-6">@johnsmith</p>
                            </div>
                        </div>

                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                            <a href="#">#css</a> <a href="#">#responsive</a>
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column ">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4">John Smith</p>
                                <p class="subtitle is-6">@johnsmith</p>
                            </div>
                        </div>

                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                            <a href="#">#css</a> <a href="#">#responsive</a>
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4">John Smith</p>
                                <p class="subtitle is-6">@johnsmith</p>
                            </div>
                        </div>

                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                            <a href="#">#css</a> <a href="#">#responsive</a>
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4">John Smith</p>
                                <p class="subtitle is-6">@johnsmith</p>
                            </div>
                        </div>

                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                            <a href="#">#css</a> <a href="#">#responsive</a>
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- About US Ends -->

    <!-- Contact US Starts -->
    <div class="container" id="contact">
        <br><br><br>
        <article class="message is-primary">
            <div class="message-header">
                <p>Contact Us</p>
            </div>
            <div class="message-body w3-row">
                <div class="w3-half w3-xlarge has-text-centered">
                    <br>
                    <p><i class="fa fa-user"></i> : Vishal Kondle</p><br>
                    <p><i class="fa fa-phone-alt"></i> : +91 7276718848</p><br>
                    <p><i class="fa fa-map-marker-alt"></i> : Solapur, MH</p>
                </div>
                <div class="w3-half w3-center">
                    <form action="" method="post">
                        <input class="input" type="text" placeholder="Full Name" name="name"><br><br>
                        <input class="input" type="text" placeholder="Subject" name="subject"><br><br>
                        <textarea class="textarea" placeholder="Message" name="message"></textarea><br>
                        <button class="button is-primary" name="message">Message</button>
                    </form>
                </div>
            </div>
        </article>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!-- Contact US Ends -->

    <!-- Modal Starts -->
    <div class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <form action="" method="post">
                <header class="modal-card-head">
                    <p class="modal-card-title">Login</p>
                    <button class="delete" aria-label="close" onclick="w3.toggleClass('.modal', 'is-active')"></button>
                </header>
                <section class="modal-card-body">
                    <div class="select">
                        <select name="usertype">
                            <option selected disabled>Who Are You??</option>
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                            <option value="college">College</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div><br><br>
                    <input class="input" type="text" name="username" placeholder="Username"><br><br>
                    <input class="input" type="password" name="password" placeholder="Password">
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-success" name="login">Login</button>
                    <button class="button is-danger" onclick="w3.toggleClass('.modal', 'is-active')">Cancel</button>
                </footer>
            </form>
        </div>
    </div>
    <!-- Modal Ends -->

</body>

</html>

<script>
    w3.slideshow(".nature", 5000);
</script>
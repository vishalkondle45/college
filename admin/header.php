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
<nav class="navbar is-info" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
            <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" onclick="w3.toggleClass('.navbar-menu','is-active')" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="dashboard.php">
                <i class="fa fa-dashboard"></i> &nbsp; Dashboard
            </a>

            <a class="navbar-item">
                <i class="fa fa-plus"></i> &nbsp; New College
            </a>
            <a class="navbar-item">
                <i class="fa fa-university"></i> &nbsp; Colleges
            </a>
            <a class="navbar-item">
                <i class="fa fa-chalkboard-teacher"></i> &nbsp; Teachers
            </a>
            <a class="navbar-item">
                <i class="fa fa-users"></i> &nbsp; Students
            </a>
        </div>

        <div class="navbar-end">
            <a class="navbar-item">
                <i class="fa fa-sign-out-alt"></i> &nbsp; Logout
            </a>
        </div>
    </div>
</nav>
<!-- Navigation Bar Ends -->
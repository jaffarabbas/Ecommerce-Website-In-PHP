<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="../vendor/css/css.css" rel="stylesheet" />
    <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet" />

    <link href="../vendor/css/custom.css" rel="stylesheet" />
    <link href="../vendor/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">ADMIN</a>
            </div>
            <div class="logoutbtn">
                <form action="./backend/logout.php" method="POST">
                    <button name="logout" href="logout.php" class="btn square-btn-adjust">Logout</button>
                </form>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src='<?php echo $_SESSION['admin'][0]['image'] ?>' class='user-image img-responsive' style=' border-radius: 50%;' />
                    </li>
                    <li>
                        <a class="active-menu"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="insert_products.php"><i class="fa fa-shopping-cart fa-3x"></i>Insert Products<span class="fa arrow"></span></a>
                    </li>
                    <li>
                        <a><i class="fa fa-table fa-3x"></i>View Products<span class="fa arrow"></span></a>
                    </li>
                    <li>
                        <a><i class="fa fa-user fa-3x"></i>View Orders<span class="fa arrow"></span></a>
                    </li>
                    <li>
                        <a><i class="fa fa-inbox fa-3x"></i>View Contact<span class="fa arrow"></span></a>
                    </li>
                    <li>
                        <a><i class="fa fa-globe fa-3x"></i>Settings<span class="fa arrow"></span></a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-primary"></h2>
                        <h5></h5>
                        <!-- table show -->
                        <section class="page_for_dashboared" id="dashboared">


</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="../vendor/js/jquery-1.10.2.js"></script>
<script src="../vendor/js/jquery.metisMenu.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/js/custom.js"></script>


<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    $(document).ready(function() {
        $('#myTable2').DataTable();
    });
    $(document).ready(function() {
        $('#myTable3').DataTable();
    });
    $(document).ready(function() {
        $('#myTable4').DataTable();
    });
</script>

</html>
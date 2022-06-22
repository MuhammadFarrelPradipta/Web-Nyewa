<?php
// Connect to database
session_start();
include "../koneksi.php";
if (!isset($_SESSION['admin'])) {
    echo "<script>location='login.php'</script>";
    header('location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : <?php echo date("l/d-m-y") ?> <a href="#" class="btn btn-primary square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="index.php?halaman=home"><i class="fa fa-home fa-3x"></i> Home</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=pencari"><i class="fa fa-search fa-3x"></i> Data Pencari Kos/Kontrakan</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=pemilik"><i class="fa fa-user fa-3x"></i> Data Pemilik Kos/Kontrakan</a>
                    </li>
                    <li>
                        <a href="index.php?halaman=logout"><i class="fa fa-times fa-3x"></i> Logout</a>
                    </li>

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == "pencari") {
                        include 'pencari.php';
                    } elseif ($_GET['halaman'] == "pemilik") {
                        include 'pemilik.php';
                    } elseif ($_GET['halaman'] == "logout") {
                        include 'logout.php';
                    } elseif ($_GET['halaman'] == "hapuspencari") {
                        include 'hapuspencari.php';
                    } elseif ($_GET['halaman'] == "hapuspemilik") {
                        include 'hapuspemilik.php';
                    } else {
                        include 'home.php';
                    }
                }
                ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

</html>
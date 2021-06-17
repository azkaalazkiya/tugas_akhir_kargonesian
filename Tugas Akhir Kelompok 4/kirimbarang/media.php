<?php
    session_start();
    
    // Mengecek session sekaligus untuk validasi session
    if(empty($_SESSION['ses_username']) AND empty($_SESSION['ses_password'])){
	    echo "<center>";
            echo "<p>Untuk mengakses halaman ini anda harus login terlebih dahulu</p>";
            echo "<p><a href='index.php'>Harap Login</a></p>";
        echo "</center>";
    }
    else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>KARGONESIAN</title>

    <!-- Bootstrap core CSS -->
    <link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap theme -->
    <link href="asset/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- CSS for thame-->
    <link href="asset/dashboard.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body role="document">
    
    <!-- Bagian Nav Bar-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">DASHBOARD KARGONESIAN</a>
            </div>  
        </div>
    </nav> <!-- Tutp Tag Bagian Nav Bar-->
    

    <div class="container-fluid">
        <div class="row">
            
            <!-- Side Bar Kiri-->
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="?page=home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="?page=pengirim"><span class="glyphicon glyphicon-book"></span> Data Pengirim</a></li>
                    <li><a href="?page=distributor"><span class="glyphicon glyphicon-book"></span> Data Distributor</a></li>
                    <li><a href="?page=ekspedisi"><span class="glyphicon glyphicon-book"></span> Data Ekspedisi</a></li>
                    <li><a href="?page=keberangkatan"><span class="glyphicon glyphicon-book"></span> Data Keberangkatan</a></li>
                    <li><a href="?page=catatan"><span class="glyphicon glyphicon-book"></span> Data Catatan</a></li>
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div><!-- Side Bar Kiri-->
            
            <!-- Side Bar Kanan -->
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <?php include "content.php"; ?>
            </div> <!-- Side Bar Kanan -->

        </div><!-- /. row -->
    </div><!-- /. container-fluid -->

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="asset/bootstrap/js/jquery.min.js"></script>
	<script src="asset/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    }
?>
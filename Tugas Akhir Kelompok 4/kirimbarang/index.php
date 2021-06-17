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
</head>
    <body background="ship04.jpg">
    <div id="wrapper">
        <div class="panel-heading">
        <div class="text-white">
            <div align="center" style="margin-top: 100px;">
                <h3><span><strong>KARGONESIAN</strong></span> - Login Form</h3>
    
    <!-- Bootstrap theme -->
    <link href="asset/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- CSS for thame-->
    <link href="asset/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body role="document">
	
	<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
                <!-- /. Buka Tag Panel -->
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login.php" method="POST" name="frm_login" id="frm_login">
                            <fieldset>
                                <div class="form-group">
                                    <input type="text" name="txt_user" id="txt_user" class="form-control" placeholder="Username" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="txt_pass" id="txt_pass" class="form-control" placeholder="Password" required>
                                </div>
                                <button class="btn btn-md btn-default btn-block" type="submit">Sign in</button>
                            </fieldset>
                        </form>
                    </div>
                </div><!-- /. Tutup Tag Panel -->
                
            </div> <!-- /. col -->
        </div><!-- /. row -->
    </div> <!-- /. container -->

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="asset/bootstrap/js/jquery.min.js"></script>
	<script src="asset/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
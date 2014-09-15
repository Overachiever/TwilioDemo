<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Twilio Demo</title>

        <!-- Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <nav role="navigation" class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <?php if(!empty($username)){ ?>
                        <button data-target="#bs-example-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php } ?>
                        <a href="#" class="navbar-brand">Twilio Demo</a>
                    </div>
                    <?php if(!empty($username)){ ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Signed in as <?php echo $username ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo site_url('login/logout') ?>">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
            </nav>

            <?php foreach($messages as $type => $message){ ?>
                <?php if(!empty($message)){ ?>
                <div role="alert" class="alert alert-<?php echo $type ?>">
                    <?php foreach($message as $m){ ?>
                        <?php echo $m ?>
                    <?php } ?>
                </div>
                <?php } ?>
            <?php } ?>
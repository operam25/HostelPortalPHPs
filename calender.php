<?php

session_start();

if(empty($_SESSION['sessionid'])){
    header("Location:sign-in.php");
    exit();
}

require 'init.php';
 
error_reporting(0);

$con = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);
 
 if(!$con){
     // header("Location:adminlogin.php?invalid=true");
     // exit();
    echo "hello";
 }else{

     $sessionid = $_SESSION['sessionid'];

     $query = "SELECT * FROM admin_info WHERE sessionid = '$sessionid' ";
     $result = mysqli_query($con,$query);
     $count  = mysqli_num_rows($result);

     if($count == 1){
        //echo "hello";
     }else{
        header("Location:sign-in.php");
        exit();
     }
 }
 
?>

<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>

    

    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">

</head>
<body class=" theme-blue">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
   
  <!--<![endif]-->

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="index.php"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> Hostel Portal</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> Tarun Khandelwal
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">
                <li><a href="./">My Account</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Admin Panel</li>
                <li><a href="./">Users</a></li>
                <li><a href="./">Security</a></li>
                <li><a tabindex="-1" href="./">Payments</a></li>
                <li class="divider"></li>
                <li><a tabindex="-1" href="sign-in.php">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>
    

    <div class="sidebar-nav">
    <ul>
    <li><a href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-dashboard"></i> Dashboard<i class="fa fa-collapse"></i></a></li>
    <li><ul class="dashboard-menu nav nav-list collapse in">
            <li><a href="index.php"><span class="fa fa-caret-right"></span> Main</a></li>
            <li ><a href=""><span class="fa fa-caret-right"></span> Profile</a></li>
            <li ><a href="calendar.php"><span class="fa fa-caret-right"></span> Calendar</a></li>
    </ul></li>

        <li><a href="#" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-briefcase"></i> Account <i class="fa fa-collapse"></i></a></li>
        <li><ul class="accounts-menu nav nav-list collapse">
            <li ><a href="users.php"><span class="fa fa-caret-right"></span> Approved Accounts </a></li>
            <li ><a href="processuser.php"><span class="fa fa-caret-right"></span> Pending Accounts <span class="label label-info"> +3 </span></a></li>
            <li ><a href="rejecteduser.php"><span class="fa fa-caret-right"></span> Rejected Accounts </a></li>
    </ul></li>

    <li><a href="#" data-target=".notification-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-briefcase"></i> Notifiacations <i class="fa fa-collapse"></i></a></li>
        <li><ul class="notification-menu nav nav-list collapse">
            <li ><a href=""><span class="fa fa-caret-right"></span> Post a Nostification</a></li>
            <li ><a href=""><span class="fa fa-caret-right"></span> Previous Notifications</a></li>
    </ul></li>

    <li><a href="#" data-target=".complain-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-briefcase"></i> Complain <i class="fa fa-collapse"></i></a></li>
        <li><ul class="complain-menu nav nav-list collapse">
            <li ><a href=""><span class="fa fa-caret-right"></span> New Complains <span class="label label-info"> +3 </span></a></li>
            <li ><a href=""><span class="fa fa-caret-right"></span> In Progress <span class="label label-success"> +3 </span></a></li>
            <li ><a href=""><span class="fa fa-caret-right"></span> Completed</a></li>
            <li ><a href=""><span class="fa fa-caret-right"></span> Rejected</a></li>
    </ul></li>

        <li><a href="#" data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Legal<i class="fa fa-collapse"></i></a></li>
        <li><ul class="legal-menu nav nav-list collapse">
            <li ><a href="privacy-policy.php"><span class="fa fa-caret-right"></span> Privacy Policy</a></li>
            <li ><a href="terms-and-conditions.php"><span class="fa fa-caret-right"></span> Terms and Conditions</a></li>
    </ul></li>

        <li><a href="help.php" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Help</a></li>
            <li><a href="faq.php" class="nav-header"><i class="fa fa-fw fa-comment"></i> Faq</a></li>
            </ul>
    </div>

    <div class="content">
        <div class="header">
            <div class="stats">
    <p class="stat"><span class="label label-info">10</span> Users</p>
    <p class="stat"><span class="label label-success">19</span> Events</p>
    <p class="stat"><span class="label label-danger">12</span> Calendars</p>
</div>

            <h1 class="page-title">Calendar</h1>
                    <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Calendar</li>
        </ul>

        </div>
        <div class="main-content">
            


<link rel='stylesheet' type='text/css' href='lib/fullcalendar-1.6.4/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='lib/fullcalendar-1.6.4/fullcalendar/fullcalendar.print.css' media='print' />
<script type='text/javascript' src='lib/fullcalendar-1.6.4/fullcalendar/fullcalendar.min.js'></script>

<script type='text/javascript'>

	$(document).ready(function() {

		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		$('#calendar').fullCalendar({
            header: false,
		});
        $('#calendar').fullCalendar('next');

	});

</script>
<style type='text/css'>

	#calendar {
		width: 100%;
		margin: 0 auto;
		}

</style>



<div style="float:right; margin-bottom: 1em;">
    <a href="#" class="btn btn-primary"><span class="fa fa-plus-square-o"></span> New Event</a>
</div>
<h3>Upcoming Events</h3>
<div id='calendar'></div>


            <footer>
                <hr>

                <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                <p>© 2014 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
            </footer>
        </div>
    </div>


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  
</body></html>

<?php
  require'sessation.php';
  require_once'database.php';
  $select="SELECT COUNT(*) AS total FROM contact WHERE status=1";
  $quiry =mysqli_query($db, $select);
  $assoc =mysqli_fetch_assoc($quiry);
  
  $select1="SELECT COUNT(*) AS total FROM contact WHERE status=2";
  $quiry1 =mysqli_query($db, $select1);
  $assoc1 =mysqli_fetch_assoc($quiry1);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Admin Panel</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href=""/>
      <!-- bootstrap css -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="assets/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="assets/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="assets/css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="assets/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="assets/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="assets/css/custom.css" />
   </head>
<body class="dashboard dashboard_1">
    <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                  	<div class="sidebar_user_info">
                     	<div class="icon_setting"></div>
                     	<div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="assets/images/user_img.JPG" alt="#"></div>
                        <div class="user_info">
                           <h6>Nazmul Islam</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  	</div>
                </div>
               	<div class="sidebar_blog_2">
                  	<ul class="list-unstyled components">
                     	<li class="active">
                     		<a href="dashboard.php">
                     		<i class="fa fa-home orange_color"></i> <span>Dashboard</span></a>
                     	<li>

                        <li>
                           <a href="users.php">
                           <i class="fa fa-user orange_color"></i> <span>Users</span></a>
                        <li>

                        <li>
                           <a href="message.php">
                           <i class="fa fa-envelope orange_color"></i> <span>Message(<?php echo$assoc['total']?>)</span></a>
                        <li>

                        <li>
                           <a href="gallery.php">
                           <i class="fa fa-camera orange_color"></i> <span>Gallery</span></a>
                        <li>                           

                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Users</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="general_elements.html"> <span>General Elements</span></a></li>
                           <li><a href="media_gallery.html"> <span>Media Gallery</span></a></li>
                           <li><a href="icons.html"> <span>Icons</span></a></li>
                           <li><a href="invoice.html"> <span>Invoice</span></a></li>
                        </ul>
                    </ul>    
               	</div>
            </nav>

			<div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="right_topbar">
                           	<div class="icon_info">
                              	<ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge"><?php echo$assoc1['total']?></span></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge"><?php echo$assoc['total']?></span></a></li>
                              	</ul>
                              	<ul class="user_profile_dd">
                                <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="assets/images/user_img.JPG"/><span class="name_user">User Name</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.html">My Profile</a>
                                       <a class="dropdown-item" href="settings.html">Settings</a>
                                       <a class="dropdown-item" href="logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                </li>
                              	</ul>
                           	</div>
                        </div>
                     </div>
                  </nav>
               </div>
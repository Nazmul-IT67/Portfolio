<?php
   session_start();
   require_once'database.php';
   $id=$_GET['edit_id'];
   $select="SELECT * FROM users WHERE id=$id";
   $quiry=mysqli_query($db, $select);
   $assoc=mysqli_fetch_assoc($quiry);   
?>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Sign Up Page</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="assets/images/favicon.JPG" type="image/png" />
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
      <!-- calendar file css -->
      <link rel="stylesheet" href="assets/js/semantic.min.css" />
   </head>
   <body class="inner_page login">
      <div class="full_container">
         <div class="container mt-4">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="center mb-4 mt-4"><h2 class="text-info">User Edit</h2></div>
                  <div class="logo_login">
                     <div class="center">
                        <img width="210" src="assets/images/logo/logo.PNG"/>
                     </div>
                  </div>
                  <div class="login_form">
                     <form action="edit-post.php" method="POST">
                        <fieldset>
                           <div class="field">
                              <label class="label_field">Name:</label>
                              <input type="hidden" name="user_id" value="<?php echo $assoc['id']?>">
                              <input type="text" value="<?php echo $assoc['name']?>" name="name" placeholder="Name" value="<?php echo $_SESSION['name']??''?>" />                               
                           </div>

                           <div class="field">
                              <label class="label_field">Email Address:</label>
                              <input type="email" value="<?php echo $assoc['email']?>" name="email" placeholder="E-mail" value="<?php echo$_SESSION['email']??''?>" />                         
                           </div>

                           <div class="field">
                              <label class="label_field">Phone Number</label>
                              <input type="text" value="<?php echo $assoc['phone']?>" name="phone" placeholder="Phone" value="<?php echo$_SESSION['phone']??''?>" />                               
                           </div>                                                      

                           <div class="field margin_0">
                              <label class="label_field hidden">hidden label</label>
                              <button class="main_bt">Update</button>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/animate.js"></script>
      <script src="assets/js/bootstrap-select.js"></script>
      <script src="assets/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <script src="assets/js/custom.js"></script>
   </body>
</html>

 
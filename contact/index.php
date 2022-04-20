<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    # code...


        $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $mail = filter_var($_POST['email'],  FILTER_SANITIZE_STRING);
        $cell = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
        $msg  = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
 
           
        // creating Array of Errors
        $formErrors = array();
        if (strlen($user) <= 3){
            # code...
            $formErrors[] = 'User name Be Larger Then <strong>3</strong> Characters..';

        }
        if (strlen($msg) <= 10){
            # code...
            $formErrors[] = 'Messages Can\'t Be Less Then <strong>10</strong> Characters';

        }
        
        //If Errors send the email [mali(To, Message, Headers, Parameters)]
        $headers = 'From :' . $mail . '\r\n'; 
       


        if (empty($formErrors)) {
            # code...
            mail('yahiaalobitiry@gmail.com','contact Form', $msg, $headers);

        }

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact Us form</title>
    <link rel="stylesheet" href="css/contcat.css">
    	<!-- Bootstrap CSS -->
    <link rel="stylesheet" src="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&family=Raleway:ital,wght@1,200&family=Tajawal:wght@300&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>-->
</head>
<body>
   

            <!--Start Form --> 
         <center>
         <div class="container">
         <h1>Contact US |   اتصل ليحيى</h1>
          <form  class='contact-form' action="<?php echo $_SERVER['PHP_SELF'] ?>" method='POST' >
             <?php if (! empty($formErrors)) { ?>
             <div class="alert alert-danger alert-dismissible" role="start">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php
                            foreach($formErrors as $error) {
                                echo $error . '<br/>';
                            }
                        ?>
                </div>
                <?php } ?>
    
     
                                    
 

            <div class="form-group">
                <label for="username"> UserName:</label>
                <input
                 type="text" 
                 class="username form-control"
                 name="username" 
                 placeholder="place enter username"
                 value="<?php if (isset($user)) { echo $user; }?>">
                 <i class="fa fa-user fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                User name Be Larger Then <strong>3</strong> Characters..
                </div>
            </div>




            <div class="form-group">
                <label for="email">Email address:</label>
                <input 
                type="email" 
                class="email form-control" 
                name="email" 
                placeholder="You email Email"
                value="<?php if (isset($mail)) { echo $mail; }?>">
                <i class=" fas fa-address-book fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                Email Can't Be<strong>Empty</strong> 
                </div>
            </div>




            <div class="form-group">
                <label for="cellphone"> Tel Phone:</label>
                <input 
                type="tel" 
                class="form-control" 
                name="cellphone" 
                placeholder="Tel Phone"
                value="<?php if (isset($cell)) { echo $cell; }?>">
                <i class="fas fa-phone fa-fw "></i>

            </div>   


 

            <div class="form-group">
                <label for="messages">messages Name:</label>
                <textarea 
                name="message" 
                class="msg form-control" 
                cols="30" rows="10" 
                placeholder="messages"><?php if (isset($msg)) { echo $msg; }?></textarea> 
                <span class="asterisx1">*</span>
                <div class="alert alert-danger custom-alert">
                Messages Can\'t Be Less Then <strong>10</strong> Characters
                </div>
                

            </div>

            <input type="submit" name="success" class="btn btn-success" value="send to me " />
            

            </form>

            </div>
         </center>
         
    <!-- jQuery library -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>
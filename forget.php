<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jacquarda+Bastarda+9&family=Sofadi+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="log.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <title>Forget-Pass</title>
    
    
    
    
    
</head>
<body class="body">
<div class="div3">
<?php
   
   $showAlert=false;
   $showError=false;
   if($_SERVER["REQUEST_METHOD"]=="POST")
   {
        include 'rsub.php';
        $username=$_POST["username"];
        $password=$_POST["password"];
        $cpassword=$_POST["cpassword"];
        $existSql="SELECT * FROM `users` WHERE username='$username'";
        $result= mysqli_query($conn,$existSql);
        $numExistRows= mysqli_num_rows($result);
        if($numExistRows>0 && ($password==$cpassword))
        {
        
               $hash=password_hash($password, PASSWORD_DEFAULT);
               $sql="UPDATE `users` SET password='$hash', passupdt=current_timestamp() WHERE username='$username'";
               $result=mysqli_query($conn,$sql);
               if($result)
               {
                  $showAlert=true;
               }
        }
        elseif(!$numExistRows>0)
        {
            $showError=" Invalid username.";
        }
        else
        {
            $showError=" Passwords do not match.";
        }
        
        

    }

    ?>
<?php
     if($showAlert){

 
echo

'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> Password Updated.<a href="log.php">Login</a> again.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
 }


 if($showError){

 
    echo
    
    '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
        <strong>Error!</strong>'.$showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
     }

?>




                

    
         
        

            <h2 >Forget Password</h2>

            <form action="forget.php" method="post" class="forget" >
                
                <input type="text" required class="inp" pattern="[A-Za-z]+" title="Enter alphabets only" placeholder="username" id="user" onkeypress="uppercase()" name="username" minlength="5" maxlength="11"><i class="fa-solid fa-user" id="fn"></i><br>
            
                
                <input type="password" required class="inp" pattern="[0-9]+" title="Password should be a number" placeholder="New Password" name="password" minlength="8" maxlength="8"><i class="fa-solid fa-lock" id="fnp"></i><br>
                
                <input type="password" required class="inp" pattern="[0-9]+" title="Password should be a number" placeholder="Confirm Password" name="cpassword" minlength="8" maxlength="8"><i class="fa-solid fa-lock" id="fcp"></i><br>
                
             
                
                
                <input type="submit" value="Update" id="btn" title="Forget"><br>
                <!-- <input type="reset" value="Refresh" class="reset col-sm-6"><br> -->
                
                Go to <a href="log.php" title="Login">Login</a>
             
            </form>
            
            
          
            
            
            
            
            
        </div>
        <?php  ?>

        <script>
             function uppercase()
             {
                const x= document.getElementById("user");

                x.value= x.value.toUpperCase();
             }
        </script> 
</body>
</html>
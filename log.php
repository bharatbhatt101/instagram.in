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

        
    <title>Instagram-Login</title>
</head>
<body class="body">

<div class="div3"> 
<?php
   
   $login=false;
   $showError=false;
   if($_SERVER["REQUEST_METHOD"]=="POST")
   {
        include 'rsub.php';
        $username=$_POST["username"];
        $password=$_POST["password"];
    

        
            
               $sql="SELECT * FROM users where username='$username'";
               $result=mysqli_query($conn,$sql);
               $num=mysqli_num_rows($result);
               if($num==1)
               {
                  
                  while($row=mysqli_fetch_assoc($result))
                  {
                     if(password_verify($password,$row['password']))
                     {
                         $login=true;

                         session_start();
                         $_SESSION['loggedin']=true;
                         $_SESSION['username']=$username;
                         header("location: index1.php");

     
                    }
                    else
                    {
                        echo

                        '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
                            <strong>Error!</strong> Please enter correct password.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                    }

                }
                 

               }
        
              else
              {
                  $showError=" Invalid Username or Password / Please <a href='reg.php'>signup</a>.";
              }
    }
    

    ?>

                <?php
                    if($login){

                
                echo

                '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>Success!</strong> You are logged in.
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
    
        <!-- <img /> -->

            <h2>Login</h2>
            
        <form action="log.php" method="post" class="login" >
            
             <input type="text" required class="inp" name="username" id="user" pattern="[A-Za-z]+" title="Enter alphabets only" onkeypress="uppercase()"  placeholder="username" minlength="3" maxlength="11" ><i class="fa-solid fa-user" id="ln"></i><br>
            

           <input type="password" required class="inp" name="password" pattern="[0-9]+" title="Password should be a number"   placeholder="Password" minlength="8" maxlength="8"><i class="fa-solid fa-lock" id="lp"></i><br>
           <a href="forget.php" class="for">forget password?</a><br>
           
           <input type="submit" value="Login" id="btn" title="login"><br>
           <!-- <input type="reset" value="Refresh" class="reset col-sm-6"><br> -->
           
           New user? <a href="reg.php" title="SignUp">Signup</a>
           
        </form>
        
        

     
    </div>
    <?php ?>

    <script>
             function uppercase()
             {
                const x= document.getElementById("user");

                x.value= x.value.toUpperCase();
             }
        </script> 

</body>
</html>
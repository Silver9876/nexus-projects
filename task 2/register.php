<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="outer">
    <?php 
    
    $showAlert = false;  
    $showError = false;  
    $exists=false; 
        
    if($_SERVER["REQUEST_METHOD"] == "POST") { 
          
        // Include file which makes the 
        // Database Connection. 
        include 'dbconnect.php';    
        $firstname = $_POST["firstname"]; 
        $lastname = $_POST["lastname"];  
        $password = $_POST["password"];  
        $email = $_POST["email"]; 
                
        
        $sql = "Select * from users where username='$username'"; 
        
        $result = mysqli_query($conn, $sql); 
        
        $num = mysqli_num_rows($result);  
        
        if($num == 0) { 
            { 
        
                $hash = password_hash($password,  PASSWORD_DEFAULT); 
                     
                $sql = "INSERT INTO `users` ( `firstname`, `lastname`, `email`,  `password`) VALUES ('$firstname',  '$lastname', '$email', '$password')"; 
        
                $result = mysqli_query($conn, $sql); 
        
                if ($result) { 
                    $showAlert = true;  
                } 
            }  
        }
        
       if($num>0)  
       { 
          $exists="Username not available";  
       }  
        
    } 
    ?> 

        <div class="container">
            <div class="left">
                <img src="eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg" alt="">
            </div>
            <div class="right">
                <h1>Signup</h1>
                <form action="register.php" method="post">
                    <table>
                        <tr>
                            <td><label for="FirstName" id="firstname" name="firstname">FirstName :</label></td>
                            <td><input type="text" placeholder="FirstName"></td>
                          </tr>
                        <tr>
                          <td><label for="LastName" id="lastname" name="lastname">LastName :</label></td>
                          <td><input type="text" placeholder="LastName"></td>
                        </tr>
                        <tr>
                            <td><label for="email" id="email" name="email">Email :</label></td>
                            <td><input type="text" placeholder="Email"></td>
                          </tr>
                        <tr>
                          <td><label for="password" id="password" name="password">Password :</label></td>
                          <td><input type="text" placeholder="Password"></td>
                        </tr>
                      </table>
                      <button type="button" class="signupbtn">Signup</button>                
                    </form>
                <p>Already have an account <a href="./login.html">click here</a></p>
    
            </div>
        </div>
    </div>

    <script>
    </script>
</body>
</html>
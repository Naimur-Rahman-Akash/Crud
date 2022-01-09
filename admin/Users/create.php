  <?php           
include_once ($_SERVER['DOCUMENT_ROOT']. "/crud/config.php");
include_once ($_SERVER['DOCUMENT_ROOT']. "/");

use BITM\Register;

?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
         <form method="post" action="store.php" enctype="multipart/form-data"> 
                <div class="user-details">
                <div class="input-box">
                        
                        <input
                                    type="hidden"
                                    class="form-control"
                                    id="inputId"
                                    name="id"
                                    value="">
                                    </div>
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text"
                         placeholder="Enter your name"
                                    class="form-control"
                                    id="inputName"
                                    name="fullname"
                                    value=""
                          required>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text"
                         placeholder="Enter your username" 
                         
                                    
                                    class="form-control"
                                    id="inputUsername"
                                    name="username"
                                    value=""
                         required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email"
                         placeholder="Enter your email" 
                         
                                    
                                    class="form-control"
                                    id="inputEmail"
                                    name="email"
                                    value=""
                         required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="tel" 
                        placeholder="Enter your number" 
                      
                                  
                                    class="form-control"
                                    id="inputPhoneNumber"
                                    name="phone_number"
                                    value=""
                        required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>

                        <input type="password"
                         placeholder="Enter your password"
                         
                                   
                                    class="form-control"
                                    id="inputPassword"
                                    name="password"
                                    value=""
                          required>
                    </div>
                    
                </div>
                
                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>

</body>

</html>
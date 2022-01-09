<section>
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
         <form method="post" action="http://localhost/crud/admin/users/signup_from_store.php" enctype="multipart/form-data"> 
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

</section>
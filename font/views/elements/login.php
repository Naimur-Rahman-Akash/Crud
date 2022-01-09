<section>
    <div class="container">
        <div class="title">Log In</div>
        <div class="content">
         <form method="post" action="http://localhost/crud/admin/users/loginprocessor.php" enctype="multipart/form-data"> 
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
                    <input type="submit" value="LOGIN">
                </div>
            </form>
        </div>
    </div>

</section>
    <h2><img src="images/icons/user_32.png" alt="Login" />Login</h2>

    <div id="login">
            
        <div class="content-box">
            
            <div class="content-box-header">
                    <h3>Login</h3>
            </div>
    
            <div class="content-box-content">
        
                <form action="<?php echo MAIN_URL; ?>login.php" method="post">
                    <p>
                        <label>Username</label>
                        <input id="admin_user" name="admin_user" type="text" />
                    </p>
    
                    <p>
                        <label>Password</label>
                        <input id="admin_pass" name="admin_pass" type="password" />
                    </p>
    
                    <input type="submit" value="Login" />
                </form>
                
            </div>
            
        </div><!-- end .content-box -->
        
    </div><!-- end #login -->
    
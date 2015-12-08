<!--default form-->
<div class="form">  
    <form action="#" method="post" name="signup_form">   
        <div id="signup_popup" class="login_popup">
            <div class="form_row">
                <label>Email:</label>
                <span class="input_container">
                    <input type="text" name="email" value="<?php echo $email; ?>" />
                </span>
            </div>
            <div class="form_row">
                <label>Password:</label>
                <span class="input_container">
                    <input type="password" name="password" value="" />
                </span>
            </div>
            <div class="text_right">
                <input type="submit" name="signup" value="Submit" class="btn btn-primary" />
            </div>
        </div>
    </form>
</div>
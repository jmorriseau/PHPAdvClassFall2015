<!--default form-->
<div class="form">  
    <form action="#" method="post" name="login_form">   
        <div id="login_popup" class="login_popup">
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
                <input type="submit" name="login" value="Submit" class="btn btn-primary" />
            </div>
        </div>
    </form>
</div>
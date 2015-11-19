<?php

include('include/loginprocess.php');
?>
<html>

    
    <form action="" method="post">
        <label>Username :</label><br/>
        <input id="name" name="username" type="text"><br/>
        <label>Password :</label><br/>
        <input id="password" name="password" type="password"><br/>
        <br/>
        <input name="submit" type="submit" class="button" value=" Login ">
        <br/>
        <span style="color:red"><?php echo $error; ?></span>
    </form>
</html>

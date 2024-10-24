<h1> Login </h1>
 <form action="<?php echo URLROOT; ?>/users/login" method="post">
    Email: <input type="email" name="email"><br>
    Password:<input type="password" name="password"><br>
    <input type="submit">
</form>

<a href='<?php echo URLROOT; ?>/users/register'><button>Register</button></a>

<a href='<?php echo URLROOT; ?>'><button>Go Back</button></a>
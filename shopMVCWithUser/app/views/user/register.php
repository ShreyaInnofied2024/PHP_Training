<h1> Register </h1>
 <form action="<?php echo URLROOT; ?>/users/register" method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Password:<input type="password" name="password"><br>
    <input type="submit">
</form>

<a href='<?php echo URLROOT; ?>/users/login'><button>Login</button></a>
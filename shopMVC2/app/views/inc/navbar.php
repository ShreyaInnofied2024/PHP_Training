<nav>
  <div>
      <a href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
          <a href="<?php echo URLROOT; ?>/pages/index">Home</a>
          <a href="<?php echo URLROOT; ?>/pages/about">About</a>
          <?php if(isset($_SESSION['user_id'])) : ?>
          <a href="#">Welcome <?php echo $_SESSION['user_name']; ?></a>
          <a href="<?php echo URLROOT; ?>/users/logout">Logout</a>
          <?php else : ?>
            <a href="<?php echo URLROOT; ?>/users/register">Register</a>
            <a href="<?php echo URLROOT; ?>/users/login">Login</a>
          <?php endif; ?>
            </div>
  </nav>
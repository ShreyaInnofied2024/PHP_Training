<?php require APPROOT . '/views/inc/header.php';?>
<a href='<?php echo URLROOT; ?>/products'><button>Product</button></a>
<a href='<?php echo URLROOT; ?>/category'><button>Category</button></a>
<?php if(!isAdmin()){
    echo "<a href='" . URLROOT . "/users/changePassword/" . $_SESSION['user_email'] . "'><button>Change Password</button></a>";
}
?>

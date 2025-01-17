<?php
/* Smarty version 3.1.30, created on 2025-01-17 14:45:57
  from "D:\Instalki\XAMPP\htdocs\craftsy\app\views\layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_678a5f15625e93_07060811',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c46aefa426c7f58c4417527d36cbdb7bd33df10' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\craftsy\\app\\views\\layout.tpl',
      1 => 1737121556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678a5f15625e93_07060811 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrafstyPlace</title>
</head>
<body>
    <header>
        <h1>CrafstyPlace</h1>
        <nav>
            <ul>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/index.php">Product List</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/orderHistory">Order History</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/profile">Profile</a></li>
                
                <?php if (isset($_smarty_tpl->tpl_vars['conf']->value->roles) && count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
                    <?php if (isset($_smarty_tpl->tpl_vars['conf']->value->roles) && in_array('admin',$_smarty_tpl->tpl_vars['conf']->value->roles)) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/userList">User Management</a></li>
                    <?php }?>

                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/logout">Logout</a></li>
                <?php } else { ?>
                        <input type="submit" name="Login" value="Login" />

                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/registerShow">Register</a></li>
                <?php }?>
            </ul>
        </nav>
    </header>

    <div class="content">
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1622780599678a5f15625769_48892388', "content");
?>

    </div>
</body>
</html>
<?php }
/* {block "content"} */
class Block_1622780599678a5f15625769_48892388 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}

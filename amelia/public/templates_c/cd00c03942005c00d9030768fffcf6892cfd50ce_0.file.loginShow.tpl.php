<?php
/* Smarty version 4.3.4, created on 2025-02-01 19:38:45
  from 'D:\Instalki\XAMPP\htdocs\amelia\app\views\loginShow.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_679e6a356455e3_31824544',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd00c03942005c00d9030768fffcf6892cfd50ce' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\amelia\\app\\views\\loginShow.tpl',
      1 => 1738435020,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_679e6a356455e3_31824544 (Smarty_Internal_Template $_smarty_tpl) {
ob_start();
echo $_smarty_tpl->tpl_vars['error']->value;
$_prefixVariable1 = ob_get_clean();
if ((isset($_prefixVariable1))) {?>
    
<?php ob_start();
echo $_smarty_tpl->tpl_vars['error']->value;
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2 != '') {?>
    
    <div style="background-color: #ffffff; padding: 20px 30px; border-radius: 12px; box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1); text-align: center; max-width: 400px;">
        <h1 style="font-size: 24px; margin-bottom: 10px; color: #333;">Access Denied</h1>
        <p style="font-size: 16px; color: #666;">You must be logged in to add a product to your cart.</p>
    </div>  
    
    <?php }?>    
    
    <?php }?>

<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post" style="width: 300px; padding: 20px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; margin-bottom: 20px;">Login</h2>
        
        <div style="margin-bottom: 15px;">
            <label for="username" style="display: block; font-weight: bold; margin-bottom: 5px;">Username:</label>
            <input type="text" name="username" id="username" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px;">Password:</label>
            <input type="password" name="password" id="password" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="text-align: center;">
            <input type="submit" name="" value="Login" style="padding: 10px 20px; border: none; border-radius: 4px; background-color: #007BFF; color: white; font-weight: bold; cursor: pointer;">
        </div>
    </form>
</div>

<?php }
}

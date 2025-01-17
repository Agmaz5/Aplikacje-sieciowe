<?php
/* Smarty version 3.1.30, created on 2025-01-17 17:42:18
  from "D:\Instalki\XAMPP\htdocs\craftsy\app\views\loginShow.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_678a886a63aba6_11058969',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '433fccebf328244f3b44b168ba7eabc9db27d52e' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\craftsy\\app\\views\\loginShow.tpl',
      1 => 1737132128,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678a886a63aba6_11058969 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form action="ctrl.php?controller=LoginCtrl&method=action_login" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <input type="submit" name="zaloguj" value="zaloguj">
</form>
<?php }
}

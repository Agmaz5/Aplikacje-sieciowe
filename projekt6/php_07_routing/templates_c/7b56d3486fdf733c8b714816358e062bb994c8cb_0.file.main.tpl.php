<?php
/* Smarty version 3.1.30, created on 2024-11-28 19:28:22
  from "D:\Instalki\XAMPP\htdocs\php_07_routing\php_07_routing\app\views\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6748b646bb15e2_95254693',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b56d3486fdf733c8b714816358e062bb994c8cb' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\php_07_routing\\php_07_routing\\app\\views\\templates\\main.tpl',
      1 => 1523565760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6748b646bb15e2_95254693 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "brak tytułu" : $tmp);?>
</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css" integrity="sha384-UQiGfs9ICog+LwheBSRCt1o5cbyKIHbwjWscjemyBMT9YCUMZffs6UqUTd0hObXD" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css" />
</head>
<body>
	<div style="margin: 1em;">
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14113820736748b646bb0be1_88145719', 'content');
?>

	</div>
</body>
</html><?php }
/* {block 'content'} */
class Block_14113820736748b646bb0be1_88145719 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}

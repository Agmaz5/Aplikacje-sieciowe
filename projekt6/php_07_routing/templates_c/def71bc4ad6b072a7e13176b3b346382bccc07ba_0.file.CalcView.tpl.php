<?php
/* Smarty version 3.1.30, created on 2024-11-29 18:11:49
  from "D:\Instalki\XAMPP\htdocs\php_07_routing\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6749f5d59d5100_51842325',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'def71bc4ad6b072a7e13176b3b346382bccc07ba' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\php_07_routing\\app\\views\\CalcView.tpl',
      1 => 1732900307,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_6749f5d59d5100_51842325 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16831624336749f5d59d47e9_46878921', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_16831624336749f5d59d47e9_46878921 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</span>
</div>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_kw">Kwota: </label>
			<input id="id_kw" type="text" name="kw" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kw;?>
" />
		</div>
                
                
        <div class="pure-control-group">
			<label for="id_ok">Okres: </label>
			<input id="id_ok" type="text" name="ok" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->ok;?>
" />
		</div>
                
        <div class="pure-control-group">
			<label for="id_op">Oprocentowanie: </label>
			<input id="id_op" type="text" name="op" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->op;?>
" />
		</div>                
                
		<div class="pure-controls">
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	

<?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
<div class="messages info">
	Wynik: <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

</div>
<?php }?>

<?php
}
}
/* {/block 'content'} */
}

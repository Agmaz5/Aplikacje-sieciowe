<?php
/* Smarty version 3.1.30, created on 2024-11-12 10:46:23
  from "D:\Instalki\XAMPP\htdocs\php_06_kontroler_glowny\app\calc\CalcView.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_673323ef0b4c23_73674317',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef73f45290b25e1771f5afa6c6b723fdd12c0c81' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\php_06_kontroler_glowny\\app\\calc\\CalcView.html',
      1 => 1731404781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_673323ef0b4c23_73674317 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_947822137673323ef0a1569_69750019', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_870499246673323ef0b44e4_54956304', 'content');
?>




<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender(($_smarty_tpl->tpl_vars['conf']->value->root_path).("/templates/main.html"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, true);
}
/* {block 'footer'} */
class Block_947822137673323ef0a1569_69750019 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_870499246673323ef0b44e4_54956304 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2 class="content-head is-center">Prosty kalkulator</h2>

<div class="pure-g">
    <div class="l-box-lrg pure-u-1 pure-u-med-2-5">
        <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post">
            <fieldset>




                <label for="kw">Kwota</label>
                <input id="kw" type="text" placeholder="wartość kw" name="kw" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kw;?>
">

                <label for="ok">Okres w latach</label>
                <input id="ok" type="text" placeholder="wartość ok" name="ok" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->ok;?>
">

                <label for="op">Oprocentowanie(%)</label>
                <input id="op" type="text" placeholder="wartość op" name="op" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->op;?>
">

                <button type="submit" class="pure-button">Oblicz</button>
            </fieldset>
        </form>
    </div>

    <div class="l-box-lrg pure-u-1 pure-u-med-3-5">

        
        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
        <h4>Wystąpiły błędy: </h4>
        <ol class="err">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
            <li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </ol>
        <?php }?>

        
        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
        <h4>Informacje: </h4>
        <ol class="inf">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
            <li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </ol>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
        <h4>Wynik</h4>
        <p class="res">
            <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

        </p>
        <?php }?>

    </div>
</div>

<?php
}
}
/* {/block 'content'} */
}

<?php
/* Smarty version 4.3.4, created on 2025-01-18 23:50:53
  from 'D:\Instalki\XAMPP\htdocs\amelia\app\views\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_678c304d6254a9_84268649',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76886a9824fcb44c3eb4470a9a51b46e0b59ff1e' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\amelia\\app\\views\\layout.tpl',
      1 => 1737240653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678c304d6254a9_84268649 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo 'Twój sklep z rękodziełem i unikalnymi przedmiotami';?>
">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/grids-responsive-min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="http://localhost/amelia/css/style.css">
    </head>

    <body>
        
       
        
        
        
            <div class="pure-menu pure-menu-horizontal">
        <ul class="pure-menu-list">
        
        
    <li class="pure-menu-item">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
displayAll" method="post" style="display: inline;">
            <input type="submit" name="browseAllProducts" value="Main Page" class="pure-button pure-button-primary" />
        </form>
    </li>
    
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['idRole']->value;
$_prefixVariable1 = ob_get_clean();
if ((isset($_prefixVariable1))) {?>

        <?php ob_start();
echo $_smarty_tpl->tpl_vars['idRole']->value;
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2 == 3) {?>
    
    <li class="pure-menu-item">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
myProductList" method="post" style="display: inline;">
            <input type="submit" name="productList" value="My Products (productList)" class="pure-button pure-button-primary" />
        </form>
    </li>  
    
    
    <li class="pure-menu-item">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
showSold" method="post" style="display: inline;">
            <input type="submit" name="productList" value="My Sold Products" class="pure-button pure-button-primary" />
        </form>
    </li>      
            
        <?php }?>
    <?php }?>    
        
    <?php ob_start();
echo $_smarty_tpl->tpl_vars['idRole']->value;
$_prefixVariable3 = ob_get_clean();
if ((isset($_prefixVariable3))) {?>
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['idRole']->value;
$_prefixVariable4 = ob_get_clean();
if ($_prefixVariable4 == 4) {?>    
    
        <li class="pure-menu-item">
            <form method="post" style="display: inline;">
                <input type="submit" name="userList" value="User Management" class="pure-button pure-button-primary" />
            </form>
    </li>
        
        <?php }?>
    <?php }?> 

    <?php ob_start();
echo $_smarty_tpl->tpl_vars['idRole']->value;
$_prefixVariable5 = ob_get_clean();
if ((isset($_prefixVariable5))) {?>
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['idRole']->value;
$_prefixVariable6 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['idRole']->value;
$_prefixVariable7 = ob_get_clean();
if ($_prefixVariable6 > 1 && $_prefixVariable7 < 4) {?>

    <li class="pure-menu-item">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
showCart" method="post" style="display: inline;">
            <input type="submit" name="cartShow" value="Cart" class="pure-button pure-button-primary" />
            <input type="hidden" name="userId" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">

        </form>
    </li>    
        <?php }?>
    <?php }?>
    


     <!--                   <li class="pure-menu-item">
        <form method="post" style="display: inline;">
            <input type="submit" name="productList" value="Back to main page" class="pure-button pure-button-primary" />
        </form>
    </li>
    
-->

    <?php ob_start();
echo $_smarty_tpl->tpl_vars['idRole']->value;
$_prefixVariable8 = ob_get_clean();
if ((isset($_prefixVariable8))) {?>
        
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['idRole']->value;
$_prefixVariable9 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['idRole']->value;
$_prefixVariable10 = ob_get_clean();
if ($_prefixVariable9 < 5 && $_prefixVariable10 > 1) {?>
        
        <li class="pure-menu-item">
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" method="post" style="display: inline;">
                <input type="submit" name="logout" value="Logout" class="pure-button pure-button-primary" />
            </form>
        </li>
        
        <?php } else { ?>
            
        <li class="pure-menu-item">
                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
loginDisplay" method="post" style="display: inline;">

                <input type="submit" name="login" value="Login" class="pure-button pure-button-primary" />
            </form>
        </li>    
        
        <?php }?>
        
        
        <?php }?>
        
    </ul>
</div>


<div class="banner">
    <h1 class="banner-head">
        <?php if ((isset($_smarty_tpl->tpl_vars['us']->value)) && $_smarty_tpl->tpl_vars['us']->value) {
echo $_smarty_tpl->tpl_vars['us']->value;
}?> witaj w CraftsyPlace!
    </h1>
</div>


        <div class="content-wrapper">
            <div id="app_content" class="content">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1119054546678c304d6249f1_17234172', 'content');
?>

            </div>

            <div class="footer l-box">
                <p>
                    <a href="#">Odwiedź CraftsyPlace</a> i odkryj unikalne przedmioty ręcznie robione przez artystów z całego świata.
                </p>
            </div>
        </div>

    </body>
</html><?php }
/* {block 'content'} */
class Block_1119054546678c304d6249f1_17234172 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1119054546678c304d6249f1_17234172',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  <?php
}
}
/* {/block 'content'} */
}

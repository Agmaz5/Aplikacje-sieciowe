<?php
/* Smarty version 3.1.30, created on 2025-01-17 22:32:02
  from "D:\Instalki\XAMPP\htdocs\craftsy\app\views\layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_678acc52757047_17569940',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c46aefa426c7f58c4417527d36cbdb7bd33df10' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\craftsy\\app\\views\\layout.tpl',
      1 => 1737149522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678acc52757047_17569940 (Smarty_Internal_Template $_smarty_tpl) {
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
        
        
<?php if (isset($_smarty_tpl->tpl_vars['idRole']->value)) {?>
    <?php if ($_smarty_tpl->tpl_vars['idRole']->value == 4) {?>
    
    
        <li class="pure-menu-item">
            <form method="post" style="display: inline;">
                <input type="submit" name="userList" value="User Management" class="pure-button pure-button-primary" />
            </form>
        </li>
        
        <?php } else { ?>
                        <li class="pure-menu-item">
        <form method="post" style="display: inline;">
            <input type="submit" name="productList" value="My Products (productList)" class="pure-button pure-button-primary" />
        </form>
    </li>

    <li class="pure-menu-item">
        <form method="post" style="display: inline;">
            <input type="submit" name="browseAllProducts" value="Browse All Products" class="pure-button pure-button-primary" />
        </form>
    </li>

    <li class="pure-menu-item">
        <form method="post" style="display: inline;">
            <input type="submit" name="cartShow" value="Cart" class="pure-button pure-button-primary" />
            <input type="hidden" name="userId" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />

        </form>
    </li>    
    
    





    <li class="pure-menu-item">
        <form method="post" style="display: inline;">
            <input type="submit" name="kontakt" value="Kontakt" class="pure-button pure-button-primary" />
        </form>
    </li>
            
    <?php }?>
    
    <?php } else { ?>
                        <li class="pure-menu-item">
        <form method="post" style="display: inline;">
            <input type="submit" name="productList" value="Back to main page" class="pure-button pure-button-primary" />
        </form>
    </li>
    
<?php }?>






        
        <li class="pure-menu-item">
            <form method="post" style="display: inline;">
                <input type="submit" name="logout" value="Logout" class="pure-button pure-button-primary" />
            </form>
        </li>
        
        <li class="pure-menu-item">
            <form method="post" style="display: inline;">
                <input type="submit" name="login" value="Login" class="pure-button pure-button-primary" />
            </form>
        </li>
    </ul>
</div>


        <div class="banner">
            <h1 class="banner-head">
                <?php echo "Witaj w CraftsyPlace!";?>

            </h1>
        </div>
                

        <div class="content-wrapper">
            <div id="app_content" class="content">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_236862127678acc52756946_99216793', 'content');
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
class Block_236862127678acc52756946_99216793 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
  <?php
}
}
/* {/block 'content'} */
}

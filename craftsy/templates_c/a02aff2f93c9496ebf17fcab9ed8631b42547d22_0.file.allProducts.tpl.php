<?php
/* Smarty version 3.1.30, created on 2025-01-17 23:04:04
  from "D:\Instalki\XAMPP\htdocs\craftsy\app\views\allProducts.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_678ad3d4ea7dd3_46662498',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a02aff2f93c9496ebf17fcab9ed8631b42547d22' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\craftsy\\app\\views\\allProducts.tpl',
      1 => 1737149185,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_678ad3d4ea7dd3_46662498 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1049514603678ad3d4ea74a1_53865336', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_1049514603678ad3d4ea74a1_53865336 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
<?php if (isset($_smarty_tpl->tpl_vars['us']->value)) {?>
    <h3>You are logged in as <?php echo $_smarty_tpl->tpl_vars['us']->value;?>
</h3>
    <br>
    <?php }?>

<br>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
    <div class="product">
 
        
                <br>        <br>

        <h3><?php echo $_smarty_tpl->tpl_vars['product']->value['productName'];?>
</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</p>
        <p>Price: <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
 USD</p>
        <p>Stock: <?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
</p>

        
        
                <div style="display: inline-block; margin-right: 10px;">
                    <form method="post" style="display: inline;">
                        <input type="submit" name="addtocart" value="buy" />
                        <input type="hidden" name="productId" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['idProduct'];?>
" />
                    </form>
                </div>

    </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>





<?php
}
}
/* {/block "content"} */
}

<?php
/* Smarty version 3.1.30, created on 2025-01-17 16:04:33
  from "D:\Instalki\XAMPP\htdocs\craftsy\app\views\productList.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_678a71816fd0b1_50513264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7b9f739a599662101627a7a63e3e345d0e30a57' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\craftsy\\app\\views\\productList.tpl',
      1 => 1737126271,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_678a71816fd0b1_50513264 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_768621350678a71816fc722_54162918', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_768621350678a71816fc722_54162918 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Product List</h2>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
    <div class="product">
        
       <?php ob_start();
echo $_smarty_tpl->tpl_vars['userId']->value;
$_prefixVariable1=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['idCreator'];
$_prefixVariable2=ob_get_clean();
if ($_prefixVariable1 == $_prefixVariable2) {?>
                        

        
        <h3><?php echo $_smarty_tpl->tpl_vars['product']->value['productName'];?>
</h3>
        <p><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</p>
        <p>Price: <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
 USD</p>
        <p>Stock: <?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
</p>

        
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['role']->value;
$_prefixVariable3=ob_get_clean();
if ($_prefixVariable3 == "creator") {?>
            
        <!-- Edit button (form for POST request) -->
        <form method="post">
            <input type="submit" name="edition" value="Edit" />
            <input type="hidden" name="productId" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['idProduct'];?>
" />
        </form>

        <!-- Delete button (form for POST request) -->
        <form action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/productDelete/<?php echo $_smarty_tpl->tpl_vars['product']->value['idProduct'];?>
" method="POST" style="display:inline;">
            <button type="submit" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
        </form>
        <?php }?>
    <?php }?>

    </div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


<!-- Add New Product -->
<a href="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/productNew">Add New Product</a>

<?php
}
}
/* {/block "content"} */
}

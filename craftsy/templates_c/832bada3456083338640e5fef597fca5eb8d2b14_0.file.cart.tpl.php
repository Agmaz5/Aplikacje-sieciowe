<?php
/* Smarty version 3.1.30, created on 2025-01-17 21:54:11
  from "D:\Instalki\XAMPP\htdocs\craftsy\app\views\cart.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_678ac37307ef29_43667376',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '832bada3456083338640e5fef597fca5eb8d2b14' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\craftsy\\app\\views\\cart.tpl',
      1 => 1737147247,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_678ac37307ef29_43667376 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_465423538678ac37307e964_97662301', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_465423538678ac37307e964_97662301 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <?php if (count($_smarty_tpl->tpl_vars['orderDetails']->value) > 0) {?>
        
    
    <h2>Your Cart</h2>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orderDetails']->value, 'orderDetail');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['orderDetail']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['orderDetail']->value['productName'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['orderDetail']->value['quantity'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['orderDetail']->value['unitPrice'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['orderDetail']->value['quantity']*$_smarty_tpl->tpl_vars['orderDetail']->value['unitPrice'];?>
</td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tbody>
    </table>
<?php } else { ?>
    <p>Your cart is empty.</p>
<?php }?>


<?php
}
}
/* {/block "content"} */
}

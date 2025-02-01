<?php
/* Smarty version 4.3.4, created on 2025-01-18 21:33:07
  from 'D:\Instalki\XAMPP\htdocs\amelia\app\views\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_678c10035f4956_21024679',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28903c89ab397f91e5b4d865523bd685c6691386' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\amelia\\app\\views\\cart.tpl',
      1 => 1737232353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678c10035f4956_21024679 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_245665678c10035dca00_41245647', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_245665678c10035dca00_41245647 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_245665678c10035dca00_41245647',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\Instalki\\XAMPP\\htdocs\\amelia\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

    
    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['orderDetails']->value) > 0) {?>
        
    
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
$_smarty_tpl->tpl_vars['orderDetail']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['orderDetail']->value) {
$_smarty_tpl->tpl_vars['orderDetail']->do_else = false;
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
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
<?php } else {
}?>


<?php
}
}
/* {/block "content"} */
}

<?php
/* Smarty version 4.3.4, created on 2025-01-19 13:47:40
  from 'D:\Instalki\XAMPP\htdocs\amelia\app\views\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_678cf46c253173_08707390',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28903c89ab397f91e5b4d865523bd685c6691386' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\amelia\\app\\views\\cart.tpl',
      1 => 1737290856,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678cf46c253173_08707390 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_364114578678cf46c2353c7_58845859', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_364114578678cf46c2353c7_58845859 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_364114578678cf46c2353c7_58845859',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\Instalki\\XAMPP\\htdocs\\amelia\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

    
    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['orderDetails']->value) > 0) {?>
        <h2 style="text-align: center; margin-bottom: 20px;">Your Cart</h2>
        
        <table style="width: 100%; border-collapse: collapse; margin: 0 auto; border-radius: 8px; overflow: hidden;">
            <thead>
                <tr style="background-color: #4CAF50; color: white; text-align: left;">
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Product Name</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Quantity</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Price</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orderDetails']->value, 'orderDetail');
$_smarty_tpl->tpl_vars['orderDetail']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['orderDetail']->value) {
$_smarty_tpl->tpl_vars['orderDetail']->do_else = false;
?>
                    <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;"><?php echo $_smarty_tpl->tpl_vars['orderDetail']->value['productName'];?>
</td>
                        <td style="padding: 10px;"><?php echo $_smarty_tpl->tpl_vars['orderDetail']->value['quantity'];?>
</td>
                        <td style="padding: 10px;"><?php echo $_smarty_tpl->tpl_vars['orderDetail']->value['unitPrice'];?>
</td>
                        <td style="padding: 10px;"><?php echo $_smarty_tpl->tpl_vars['orderDetail']->value['quantity']*$_smarty_tpl->tpl_vars['orderDetail']->value['unitPrice'];?>
</td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>



    <?php } else { ?>
        <p style="text-align: center; font-size: 18px; color: #777;">Your cart is empty.</p>
    <?php }?>

<?php
}
}
/* {/block "content"} */
}

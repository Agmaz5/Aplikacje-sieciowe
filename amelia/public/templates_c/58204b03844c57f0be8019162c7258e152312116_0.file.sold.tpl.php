<?php
/* Smarty version 4.3.4, created on 2025-01-19 14:21:28
  from 'D:\Instalki\XAMPP\htdocs\amelia\app\views\sold.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_678cfc5835cef9_40730150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58204b03844c57f0be8019162c7258e152312116' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\amelia\\app\\views\\sold.tpl',
      1 => 1737290518,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678cfc5835cef9_40730150 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_556723592678cfc58312428_80052895', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_556723592678cfc58312428_80052895 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_556723592678cfc58312428_80052895',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\Instalki\\XAMPP\\htdocs\\amelia\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['soldProducts']->value) > 0) {?>
        <h2 style="text-align: center; margin-bottom: 20px;">Sold Products</h2>
        <table style="width: 100%; border-collapse: collapse; margin: 0 auto; border-radius: 8px; overflow: hidden;">
            <thead>
                <tr style="background-color: #4CAF50; color: white; text-align: left;">
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Order ID</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Product Name</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Quantity</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Unit Price</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Total</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Date Sold</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['soldProducts']->value, 'soldProduct');
$_smarty_tpl->tpl_vars['soldProduct']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['soldProduct']->value) {
$_smarty_tpl->tpl_vars['soldProduct']->do_else = false;
?>
                    <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;"><?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['idOrder'];?>
</td>
                        <td style="padding: 10px;"><?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['productName'];?>
</td>
                        <td style="padding: 10px;"><?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['quantity'];?>
</td>
                        <td style="padding: 10px;"><?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['unitPrice'];?>
</td>
                        <td style="padding: 10px;"><?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['quantity']*$_smarty_tpl->tpl_vars['soldProduct']->value['unitPrice'];?>
</td>
                        <td style="padding: 10px;"><?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['createdAt'];?>
</td>
                        <td style="padding: 10px; text-align: center;">
                            <!-- Button to delete the sold product -->
                            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
realiseOrder" method="post" style="display: inline;">
                                <input type="hidden" name="orderDetailId" value="<?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['idOrder'];?>
" />
                                <button type="submit" onclick="return confirm('Was the item sent to the user?');" style="padding: 6px 12px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                    Mark Order as Realised
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php } else { ?>
        <p style="text-align: center; font-size: 18px; color: #777;">You have not sold any products yet.</p>
    <?php }
}
}
/* {/block "content"} */
}

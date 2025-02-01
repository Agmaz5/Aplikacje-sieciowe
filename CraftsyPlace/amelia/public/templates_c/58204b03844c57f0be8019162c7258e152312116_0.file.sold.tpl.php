<?php
/* Smarty version 4.3.4, created on 2025-01-19 00:17:22
  from 'D:\Instalki\XAMPP\htdocs\amelia\app\views\sold.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_678c3682a45cb9_24978031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58204b03844c57f0be8019162c7258e152312116' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\amelia\\app\\views\\sold.tpl',
      1 => 1737241809,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678c3682a45cb9_24978031 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_950811584678c3682a3b366_47075846', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_950811584678c3682a3b366_47075846 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_950811584678c3682a3b366_47075846',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\Instalki\\XAMPP\\htdocs\\amelia\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),));
?>

    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['soldProducts']->value) > 0) {?>
        <h2>Sold Products</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                    <th>Date Sold</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['soldProducts']->value, 'soldProduct');
$_smarty_tpl->tpl_vars['soldProduct']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['soldProduct']->value) {
$_smarty_tpl->tpl_vars['soldProduct']->do_else = false;
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['idOrder'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['productName'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['quantity'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['unitPrice'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['quantity']*$_smarty_tpl->tpl_vars['soldProduct']->value['unitPrice'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['createdAt'];?>
</td>
                        <td>
                            <!-- Button to delete the sold product -->
                            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
realiseOrder" method="post" style="display: inline;">
                                <input type="hidden" name="orderDetailId" value="<?php echo $_smarty_tpl->tpl_vars['soldProduct']->value['idOrder'];?>
" />
                                <button type="submit" onclick="return confirm('Was the item been sent to the user?');">
                                    Mark order connected with this product as realised
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
        <p>You have not sold any products yet.</p>
    <?php }
}
}
/* {/block "content"} */
}

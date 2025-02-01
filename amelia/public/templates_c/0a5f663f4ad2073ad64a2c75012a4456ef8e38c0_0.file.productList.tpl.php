<?php
/* Smarty version 4.3.4, created on 2025-01-23 09:05:41
  from 'D:\Instalki\XAMPP\htdocs\amelia\app\views\productList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6791f8554cdef7_31667276',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a5f663f4ad2073ad64a2c75012a4456ef8e38c0' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\amelia\\app\\views\\productList.tpl',
      1 => 1737619538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6791f8554cdef7_31667276 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1033456526791f8554c00c7_29032627', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_1033456526791f8554c00c7_29032627 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1033456526791f8554c00c7_29032627',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
<div style="text-align: center;">
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
newShow" method="post" style="margin: 0; display: inline-block;">
        <input type="submit" name="edition" value="Add New Product" class="button-choose pure-button" />
    </form>
</div>

<br><br><br>

<div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['id']->value;
$_prefixVariable1 = ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['idCreator'];
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable1 == $_prefixVariable2) {?>
        <div class="product" style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; width: 300px; background: #f9f9f9; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <h3 style="margin: 0 0 10px; color: #333;"><?php echo $_smarty_tpl->tpl_vars['product']->value['productName'];?>
</h3>
            <p style="margin: 5px 0; color: #666;"><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</p>
            <p style="margin: 5px 0; font-weight: bold;">Price: <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
 USD</p>
            <p style="margin: 5px 0; color: #888;">Stock: <?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
</p>

            <div style="display: flex; gap: 10px; margin-top: 15px;">
                <!-- Edit Button -->
                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productEdit" method="post" style="margin: 0;">
                    <input type="hidden" name="productId" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['idProduct'];?>
" />
                    <input type="submit" name="edition" value="Edit" style="padding: 8px 15px; border: none; border-radius: 5px; background: #4CAF50; color: white; cursor: pointer;" />
                </form>
                    
                <!-- Delete Button -->                    
                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productDelete" method="post" style="margin: 0;">
                    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this product?');" style="padding: 8px 15px; border: none; border-radius: 5px; background: #f44336; color: white; cursor: pointer;">
                    <input type="hidden" name="productId" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['idProduct'];?>
" />
                </form>                    

            </div>
        </div>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>




</div>
</form

        
    


<!-- Add New Product -->

<br>
<br>
<br>
<br>




<?php
}
}
/* {/block "content"} */
}

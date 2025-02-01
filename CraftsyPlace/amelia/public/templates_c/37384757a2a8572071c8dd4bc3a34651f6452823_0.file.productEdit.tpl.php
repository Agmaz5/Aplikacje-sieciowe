<?php
/* Smarty version 4.3.4, created on 2025-01-18 18:46:47
  from 'D:\Instalki\XAMPP\htdocs\amelia\app\views\productEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_678be907c927e9_14981278',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37384757a2a8572071c8dd4bc3a34651f6452823' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\amelia\\app\\views\\productEdit.tpl',
      1 => 1737222403,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678be907c927e9_14981278 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_563830470678be907c85654_36111948', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_563830470678be907c85654_36111948 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_563830470678be907c85654_36111948',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        
        
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productSave" method="post" style="display: inline;">


    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['idProduct'];?>
">
    <label for="name">Product Name</label>
    <input type="text" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['productName'];?>
">
    <label for="price">Price</label>
    <input type="text" id="price" name="price" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
">
    <label for="stock">Stock</label>
    <input type="text" id="stock" name="stock" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
">
    <label for="description">Description</label>
    <textarea id="description" name="description"><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</textarea>
    <input type="submit" name="save" value="save" />

    
</form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    <?php
}
}
/* {/block "content"} */
}

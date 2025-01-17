<?php
/* Smarty version 3.1.30, created on 2025-01-17 15:53:59
  from "D:\Instalki\XAMPP\htdocs\craftsy\app\views\productEdit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_678a6f070267a7_76076920',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fd232183b04eb9d14243cc300875afc344750f69' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\craftsy\\app\\views\\productEdit.tpl',
      1 => 1737125495,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678a6f070267a7_76076920 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <form action="ctrl.php?controller=ProductEditCtrl&method=action_productSave" method="POST">


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
<?php }
}

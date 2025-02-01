<?php
/* Smarty version 4.3.4, created on 2025-01-23 22:01:43
  from 'D:\Instalki\XAMPP\htdocs\amelia\app\views\allProducts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6792ae372dba47_11100613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ff20d0992b5cad6991da4233ba7dba9083108d1' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\amelia\\app\\views\\allProducts.tpl',
      1 => 1737666102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6792ae372dba47_11100613 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13658974206792ae372c8498_07490724', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_13658974206792ae372c8498_07490724 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13658974206792ae372c8498_07490724',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
<h3 style="text-align: center;">All Product List</h3>


<br>

<!-- Set Max Price Form -->
<div style="display: flex; justify-content: center; align-items: center; gap: 0px; margin-bottom: 20px;">
    <!-- Set Max Price Form -->
    <div style="display: inline-block;">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
displayAll" method="post" style="display: inline;">
            <input type="submit" name="" value="Set Max Price" style="padding: 5px 10px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;" />
            <input type="text" name="price" value="" required placeholder="Enter max price" style="padding: 5px; margin-right: 5px;"/>
        </form>
    </div>

    <!-- Reset Filter Form -->
    <div style="display: inline-block;">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
displayAll" method="post" style="display: inline;">
            <input type="hidden" name="price" value="1000000" />
            <input type="submit" name="" value="Reset Filter"  style="padding: 5px 10px; background: #f44336; color: white; border: none; border-radius: 5px; cursor: pointer;" />
        </form>
    </div>
</div>


<br><br>

<!-- Products Display -->
<div style="
    display: flex; 
    flex-wrap: wrap; 
    gap: 20px; 
    justify-content: center; 
    align-items: stretch;
    max-width: 1200px;
    margin: 0 auto;
">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['stock'] > 0) {?>
            <?php if ((isset($_smarty_tpl->tpl_vars['priceP']->value)) && $_smarty_tpl->tpl_vars['priceP']->value !== null && $_smarty_tpl->tpl_vars['priceP']->value >= $_smarty_tpl->tpl_vars['product']->value['price']) {?>
                <div class="product" style="
                    border: 1px solid #ddd; 
                    border-radius: 8px; 
                    padding: 15px; 
                    width: 300px; 
                    background: #f9f9f9; 
                    box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
                    position: relative; 
                    display: flex; 
                    flex-direction: column; 
                    justify-content: space-between; 
                    min-height: 250px;
                ">
                    <h3 style="margin: 0 0 10px; color: #333;"><?php echo $_smarty_tpl->tpl_vars['product']->value['productName'];?>
</h3>
                    <p style="margin: 5px 0; color: #666;"><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</p>
                    <p style="margin: 5px 0; font-weight: bold;">Price: <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
 USD</p>
                    <p style="margin: 5px 0; color: #888;">Stock: <?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
</p>

                    <!-- Add to Cart -->
                    <div style="margin-top: auto; text-align: center;">
                        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addToCart" method="post" style="margin: 0;">
                            <input type="hidden" name="productId" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['idProduct'];?>
" />
                            <input name="quantity" value="1" style="width: 50px; text-align: center;"/>
                            <input type="submit" name="addtocart" value="Add To Cart" style="
                                padding: 8px 15px; 
                                border: none; 
                                border-radius: 5px; 
                                background: #4CAF50; 
                                color: white; 
                                cursor: pointer;
                                margin-top: 10px;
                            " />
                        </form>
                    </div>
                </div>
            <?php }?>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>


<br><br>





<?php
}
}
/* {/block "content"} */
}

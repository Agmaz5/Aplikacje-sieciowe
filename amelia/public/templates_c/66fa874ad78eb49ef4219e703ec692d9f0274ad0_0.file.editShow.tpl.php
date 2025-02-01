<?php
/* Smarty version 4.3.4, created on 2025-01-28 10:03:05
  from 'D:\Instalki\XAMPP\htdocs\amelia\app\views\editShow.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67989d49ae4d26_78756628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66fa874ad78eb49ef4219e703ec692d9f0274ad0' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\amelia\\app\\views\\editShow.tpl',
      1 => 1737666102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67989d49ae4d26_78756628 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_188981141467989d49abfc98_13219510', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_188981141467989d49abfc98_13219510 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_188981141467989d49abfc98_13219510',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; padding: 20px;">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userSave" method="post" style="width: 100%; max-width: 600px; background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            
            <!--<input type="hidden" name="id" value="">-->
            
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">User ID</label>
                <input type="text" id="userid" name="userid" value="<?php echo $_smarty_tpl->tpl_vars['userE']->value['idUser'];?>
" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="price" style="display: block; font-weight: bold; margin-bottom: 5px;">User Name</label>
                <input type="text" id="userName" name="userName" value="<?php echo $_smarty_tpl->tpl_vars['userE']->value['username'];?>
" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            
                        <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">User Password</label>
                <input type="text" id="pass" name="pass" value="<?php echo $_smarty_tpl->tpl_vars['userE']->value['password'];?>
" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="price" style="display: block; font-weight: bold; margin-bottom: 5px;">User Role ID</label>
                <input type="text" id="role" name="role" value="<?php echo $_smarty_tpl->tpl_vars['userE']->value['idRole'];?>
" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            

            <div style="text-align: center;">
                <input type="submit" name="save" value="Save" style="padding: 10px 20px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;"/>
            </div>
        </form>
    </div>
<?php
}
}
/* {/block "content"} */
}

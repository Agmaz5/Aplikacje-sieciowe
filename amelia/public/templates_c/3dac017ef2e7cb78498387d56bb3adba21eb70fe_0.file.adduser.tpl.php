<?php
/* Smarty version 4.3.4, created on 2025-01-23 21:25:16
  from 'D:\Instalki\XAMPP\htdocs\amelia\app\views\adduser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6792a5ac150f58_02724268',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3dac017ef2e7cb78498387d56bb3adba21eb70fe' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\amelia\\app\\views\\adduser.tpl',
      1 => 1737663895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6792a5ac150f58_02724268 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6710585986792a5ac14d617_85665712', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_6710585986792a5ac14d617_85665712 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_6710585986792a5ac14d617_85665712',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; padding: 20px;">
        <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addNewUser" method="post" style="width: 100%; max-width: 600px; background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            
            
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">User Name</label>
                <input type="text" id="name" name="username" value="" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="price" style="display: block; font-weight: bold; margin-bottom: 5px;">email</label>
                <input type="text" id="price" name="email" value="" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="stock" style="display: block; font-weight: bold; margin-bottom: 5px;">password</label>
                <input type="text" id="stock" name="password" value="" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="description" style="display: block; font-weight: bold; margin-bottom: 5px;">isVerified</label>
                <textarea id="description" name="isVerified" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; height: 20px;"></textarea>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="stock" style="display: block; font-weight: bold; margin-bottom: 5px;">idRole</label>
                <input type="text" id="stock" name="idRole" value="" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="description" style="display: block; font-weight: bold; margin-bottom: 5px;">deliveryAddress</label>
                <textarea id="description" name="deliveryAddress" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; height: 150px;"></textarea>
            </div>            
            
            <div style="text-align: center;">
                <input type="submit" name="create" value="Create" style="padding: 10px 20px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;"/>
            </div>
        </form>
    </div>
<?php
}
}
/* {/block "content"} */
}

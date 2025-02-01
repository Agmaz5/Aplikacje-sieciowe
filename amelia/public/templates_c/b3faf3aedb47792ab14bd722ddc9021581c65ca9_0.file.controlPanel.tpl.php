<?php
/* Smarty version 4.3.4, created on 2025-01-23 00:23:19
  from 'D:\Instalki\XAMPP\htdocs\amelia\app\views\controlPanel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67917de7ed0190_82124715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3faf3aedb47792ab14bd722ddc9021581c65ca9' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\amelia\\app\\views\\controlPanel.tpl',
      1 => 1737588186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67917de7ed0190_82124715 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5007391267917de7eb25a7_64981893', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "content"} */
class Block_5007391267917de7eb25a7_64981893 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_5007391267917de7eb25a7_64981893',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div style="max-width: 1200px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
        <h1 style="text-align: center;">Admin Control Panel</h1>

        <div style="text-align: right; margin-bottom: 20px;">
            <span>Welcome, <strong><?php echo $_smarty_tpl->tpl_vars['us']->value;?>
</strong> (ID: <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
, Role: <?php echo $_smarty_tpl->tpl_vars['idRole']->value;?>
)</span>
            <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout" style="margin-left: 20px; padding: 10px 20px; background: #ff4d4d; color: white; text-decoration: none; border-radius: 5px;">Logout</a>
        </div>

        <table style="width: 100%; border-collapse: collapse; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <thead>
                <tr style="background: #4CAF50; color: white;">
                    <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Username</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Role</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Created At</th>
                    <th style="padding: 10px; border: 1px solid #ddd;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                    <tr style="background: #f9f9f9;">
                        <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $_smarty_tpl->tpl_vars['user']->value['idUser'];?>
</td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $_smarty_tpl->tpl_vars['user']->value['idRole'];?>
</td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $_smarty_tpl->tpl_vars['user']->value['createdAt'];?>
</td>
                        <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userEdit" method="post" style="display: inline;">
                                <input type="submit" name="edit" value="Edit" style="padding: 5px 10px; background: #2196F3; color: white; text-decoration: none; border-radius: 3px;"/>
                                <input type="hidden" name="idUserE" value=<?php echo $_smarty_tpl->tpl_vars['user']->value['idUser'];?>
>
                            </form>
                            <?php ob_start();
echo $_smarty_tpl->tpl_vars['user']->value['idRole'];
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 != 4) {?>
                                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
userDelete" method="post" style="display: inline;">
                                <input type="submit" name="delete" value="Delete" style="padding: 5px 10px; background: #f44336; color: white; text-decoration: none; border-radius: 3px; margin-left: 5px;" onclick="return confirm('Are you sure?')"> 
                                <input type="hidden" name="idUserD" value=<?php echo $_smarty_tpl->tpl_vars['user']->value['idUser'];?>
>
                            </form>
                            <?php }?>
                        </td>
                    </tr>
                <?php
}
if ($_smarty_tpl->tpl_vars['user']->do_else) {
?>
                    <tr>
                        <td colspan="6" style="padding: 10px; text-align: center; color: #999;">No users found.</td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>

        <div style="margin-top: 20px; text-align: center;">
         <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
addUser" method="post" style="display: inline;">
                    <input type="submit" name="add" value="Add New User" style="padding: 15px 30px; background: #4CAF50; color: white; text-decoration: none; border-radius: 5px;"> 
            </form>            
        </div>
    </div>
<?php
}
}
/* {/block "content"} */
}

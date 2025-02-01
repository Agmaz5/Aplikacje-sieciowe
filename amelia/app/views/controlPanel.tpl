{extends file="layout.tpl"}

{block name="content"}
    <div style="max-width: 1200px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif;">
        <h1 style="text-align: center;">Admin Control Panel</h1>

        <div style="text-align: right; margin-bottom: 20px;">
            <span>Welcome, <strong>{$us}</strong> (ID: {$id}, Role: {$idRole})</span>
            <a href="{$conf->action_url}logout" style="margin-left: 20px; padding: 10px 20px; background: #ff4d4d; color: white; text-decoration: none; border-radius: 5px;">Logout</a>
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
                {foreach from=$users item=user}
                    <tr style="background: #f9f9f9;">
                        <td style="padding: 10px; border: 1px solid #ddd;">{$user.idUser}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{$user.username}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{$user.email}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{$user.idRole}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{$user.createdAt}</td>
                        <td style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                            <form action="{$conf->action_url}userEdit" method="post" style="display: inline;">
                                <input type="submit" name="edit" value="Edit" style="padding: 5px 10px; background: #2196F3; color: white; text-decoration: none; border-radius: 3px;"/>
                                <input type="hidden" name="idUserE" value={$user.idUser}>
                            </form>
                            {if {$user.idRole} != 4}
                                <form action="{$conf->action_url}userDelete" method="post" style="display: inline;">
                                <input type="submit" name="delete" value="Delete" style="padding: 5px 10px; background: #f44336; color: white; text-decoration: none; border-radius: 3px; margin-left: 5px;" onclick="return confirm('Are you sure?')"> 
                                <input type="hidden" name="idUserD" value={$user.idUser}>
                            </form>
                            {/if}
                        </td>
                    </tr>
                {foreachelse}
                    <tr>
                        <td colspan="6" style="padding: 10px; text-align: center; color: #999;">No users found.</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>

        <div style="margin-top: 20px; text-align: center;">
         <form action="{$conf->action_url}addUser" method="post" style="display: inline;">
                    <input type="submit" name="add" value="Add New User" style="padding: 15px 30px; background: #4CAF50; color: white; text-decoration: none; border-radius: 5px;"> 
            </form>            
        </div>
    </div>
{/block}

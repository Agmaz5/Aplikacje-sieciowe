{extends file="layout.tpl"}

{block name="content"}
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; padding: 20px;">
        <form action="{$conf->action_url}userSave" method="post" style="width: 100%; max-width: 600px; background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            
            <!--<input type="hidden" name="id" value="">-->
            
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">User ID</label>
                <input type="text" id="userid" name="userid" value="{$userE.idUser}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="price" style="display: block; font-weight: bold; margin-bottom: 5px;">User Name</label>
                <input type="text" id="userName" name="userName" value="{$userE.username}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            
                        <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">User Password</label>
                <input type="text" id="pass" name="pass" value="{$userE.password}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="price" style="display: block; font-weight: bold; margin-bottom: 5px;">User Role ID</label>
                <input type="text" id="role" name="role" value="{$userE.idRole}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            

            <div style="text-align: center;">
                <input type="submit" name="save" value="Save" style="padding: 10px 20px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;"/>
            </div>
        </form>
    </div>
{/block}

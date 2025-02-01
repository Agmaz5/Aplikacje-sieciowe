{extends file="layout.tpl"}

{block name="content"}
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; padding: 20px;">
        <form action="{$conf->action_url}addNewUser" method="post" style="width: 100%; max-width: 600px; background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            
            
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
{/block}

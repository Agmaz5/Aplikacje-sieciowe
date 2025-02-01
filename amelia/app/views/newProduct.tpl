{extends file="layout.tpl"}

{block name="content"}
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh; padding: 20px;">
        <form action="{$conf->action_url}addProduct" method="post" style="width: 100%; max-width: 600px; background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            
            
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Product Name</label>
                <input type="text" id="name" name="name" value="" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="price" style="display: block; font-weight: bold; margin-bottom: 5px;">Price</label>
                <input type="text" id="price" name="price" value="" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="stock" style="display: block; font-weight: bold; margin-bottom: 5px;">Stock</label>
                <input type="text" id="stock" name="stock" value="" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"/>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="description" style="display: block; font-weight: bold; margin-bottom: 5px;">Description</label>
                <textarea id="description" name="description" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; height: 150px;"></textarea>
            </div>
            
            <div style="text-align: center;">
                <input type="submit" name="save" value="Add" required style="padding: 10px 20px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;"/>
            </div>
        </form>
    </div>
{/block}

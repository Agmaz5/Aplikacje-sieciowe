{extends file="layout.tpl"}

{block name="content"}
    
{if isset($id)}
    {if {$id} == 4}
    
    <h3>Users Managment</h3>
    
    
    
    
    {/if}
{/if}

    
    



{if isset($id)}
    {if {$id} != 4}
    
    

        
    {if {$id} != 1}
    <h3>Your product List</h3>
    
    
    {/if}

    
{/if}
<br>
<div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
    {foreach $products as $product}
        {if {$id} == {$product.idCreator}}
        <div class="product" style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; width: 300px; background: #f9f9f9; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <h3 style="margin: 0 0 10px; color: #333;">{$product.productName}</h3>
            <p style="margin: 5px 0; color: #666;">{$product.description}</p>
            <p style="margin: 5px 0; font-weight: bold;">Price: {$product.price} USD</p>
            <p style="margin: 5px 0; color: #888;">Stock: {$product.stock}</p>

            <div style="display: flex; gap: 10px; margin-top: 15px;">
                <!-- Edit Button -->
                <form action="{$conf->action_url}productEdit" method="post" style="margin: 0;">
                    <input type="hidden" name="productId" value="{$product.idProduct}" />
                    <input type="submit" name="edition" value="Edit" style="padding: 8px 15px; border: none; border-radius: 5px; background: #4CAF50; color: white; cursor: pointer;" />
                </form>

                <!-- Delete Button -->
                <form action="{$app_url}/productDelete/{$product.idProduct}" method="POST" style="margin: 0;">
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this product?');" style="padding: 8px 15px; border: none; border-radius: 5px; background: #f44336; color: white; cursor: pointer;">Delete</button>
                </form>
            </div>
        </div>
        {/if}
    {/foreach}
</div>





        
<a href="#app_content" class="button-choose pure-button">Add New Product</a>
    


<!-- Add New Product -->

<br>
<br>
<br>
<br>

{/if}


{/block}

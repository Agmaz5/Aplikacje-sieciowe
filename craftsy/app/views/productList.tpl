{extends file="layout.tpl"}

{block name="content"}
    
{if isset($id)}
    {if {$id} == 4}
    
    <h3>Users Managment</h3>
    
    
    
    
    {/if}
{/if}

    
    



{if isset($id)}
    {if {$id} != 4}
    
        
        {if isset($us)}
    <h3>You are logged in as {$us}</h3>
    <br>
        
    <h3>Your product List</h3>
    
    
    
    
    {/if}
{/if}
<br>
{foreach $products as $product}
    <div class="product">
 
       {if {$id} == {$product.idCreator}}
        <h3>{$product.productName}</h3>
        <p>{$product.description}</p>
        <p>Price: {$product.price} USD</p>
        <p>Stock: {$product.stock}</p>
        {if {$role} == "creator"}

                <div style="display: inline-block; margin-right: 10px;">
                    <form method="post" style="display: inline;">
                        <input type="submit" name="edition" value="Edit" />
                        <input type="hidden" name="productId" value="{$product.idProduct}" />
                    </form>
                </div>

                <div style="display: inline-block;">
                    <!-- Delete button (form for POST request) -->
                    <form action="{$app_url}/productDelete/{$product.idProduct}" method="POST" style="display:inline;">
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                    </form>
                </div>

        {/if}
    {/if}

    </div>
{/foreach}




{if isset($id)}
    {if {$id} != 4}
    
        
<a href="#app_content" class="button-choose pure-button">Add New Product</a>
    
    
    {/if}
{/if}

<!-- Add New Product -->

<br>
<br>
<br>
<br>

{/if}


{/block}

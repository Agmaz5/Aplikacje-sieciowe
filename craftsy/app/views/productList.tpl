{extends file="layout.tpl"}

{block name="content"}
<h2>Product List</h2>
{foreach $products as $product}
    <div class="product">
        
       {if {$userId} == {$product.idCreator}}
                        

        
        <h3>{$product.productName}</h3>
        <p>{$product.description}</p>
        <p>Price: {$product.price} USD</p>
        <p>Stock: {$product.stock}</p>

        
        {if {$role} == "creator"}
            
        <!-- Edit button (form for POST request) -->
        <form method="post">
            <input type="submit" name="edition" value="Edit" />
            <input type="hidden" name="productId" value="{$product.idProduct}" />
        </form>

        <!-- Delete button (form for POST request) -->
        <form action="{$app_url}/productDelete/{$product.idProduct}" method="POST" style="display:inline;">
            <button type="submit" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
        </form>
        {/if}
    {/if}

    </div>
{/foreach}

<!-- Add New Product -->
<a href="{$app_url}/productNew">Add New Product</a>

{/block}

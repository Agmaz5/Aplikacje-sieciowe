{extends file="layout.tpl"}

{block name="content"}
    
{if isset($us)}
    <h3>You are logged in as {$us}</h3>
    <br>
    {/if}

<br>
{foreach $products as $product}
    <div class="product">
 
        
                <br>        <br>

        <h3>{$product.productName}</h3>
        <p>{$product.description}</p>
        <p>Price: {$product.price} USD</p>
        <p>Stock: {$product.stock}</p>

        
        
                <div style="display: inline-block; margin-right: 10px;">
                    <form method="post" style="display: inline;">
                        <input type="submit" name="addtocart" value="buy" />
                        <input type="hidden" name="productId" value="{$product.idProduct}" />
                    </form>
                </div>

    </div>
{/foreach}




{/block}

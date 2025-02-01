{extends file="layout.tpl"}

{block name="content"}
    
<h3 style="text-align: center;">All Product List</h3>


<br>

<!-- Set Max Price Form -->
<div style="display: flex; justify-content: center; align-items: center; gap: 0px; margin-bottom: 20px;">
    <!-- Set Max Price Form -->
    <div style="display: inline-block;">
        <form action="{$conf->action_url}displayAll" method="post" style="display: inline;">
            <input type="submit" name="" value="Set Max Price" style="padding: 5px 10px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;" />
            <input type="text" name="price" value="" placeholder="Enter max price" style="padding: 5px; margin-right: 5px;"/>
        </form>
    </div>

    <!-- Reset Filter Form -->
    <div style="display: inline-block;">
        <form action="{$conf->action_url}displayAll" method="post" style="display: inline;">
            <input type="hidden" name="price" value="1000000" />
            <input type="submit" name="" value="Reset Filter" style="padding: 5px 10px; background: #f44336; color: white; border: none; border-radius: 5px; cursor: pointer;" />
        </form>
    </div>
</div>


<br><br>

<!-- Products Display -->
<div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
    {foreach $products as $product}
        {if $product.stock > 0}
            {if isset($priceP)}
                {if $priceP != null}
                    {if $priceP >= $product.price}
                        <div class="product" style="border: 1px solid #ddd; border-radius: 8px; padding: 15px; width: 300px; background: #f9f9f9; box-shadow: 0 4px 8px rgba(0,0,0,0.1); position: relative; display: flex; flex-direction: column; justify-content: space-between; height: 200px;">
                            <h3 style="margin: 0 0 10px; color: #333;">{$product.productName}</h3>
                            <p style="margin: 5px 0; color: #666;">{$product.description}</p>
                            <p style="margin: 5px 0; font-weight: bold;">Price: {$product.price} USD</p>
                            <p style="margin: 5px 0; color: #888;">Stock: {$product.stock}</p>

                            <!-- Add to Cart -->
                            <div style="position: absolute; bottom: 15px; left: 50%; transform: translateX(-50%);">
                                <form action="{$conf->action_url}addToCart" method="post" style="margin: 0;">
                                    <input type="hidden" name="productId" value="{$product.idProduct}" />
                                    <input type="submit" name="addtocart" value="Add To Cart" style="padding: 8px 15px; border: none; border-radius: 5px; background: #4CAF50; color: white; cursor: pointer;" />
                                </form>
                            </div>
                        </div>
                    {/if}
                {/if}
            {/if}
        {/if}
    {/foreach}
</div>

<br><br>





{/block}

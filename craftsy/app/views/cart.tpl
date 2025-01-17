{extends file="layout.tpl"}

{block name="content"}
<h2>Your Shopping Cart</h2>

{if $cart|@count > 0}
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Actions</th>
        </tr>
        {foreach from=$cart item=product}
        <tr>
            <td>{$product.productName}</td>
            <td>{$product.price}</td>
            <td>
                <form action="{getConf()->app_url}/updateCart/{$product.idProduct}" method="post">
                    <input type="number" name="quantity" value="{$product.quantity}" min="1" required>
                    <input type="submit" value="Update">
                </form>
            </td>
            <td>{$product.totalPrice}</td>
            <td>
                <a href="{getConf()->app_url}/removeFromCart/{$product.idProduct}">Remove</a>
            </td>
        </tr>
        {/foreach}
    </table>

    <h3>Total: {$totalPrice}</h3>
    <a href="{getConf()->app_url}/checkout">Proceed to Checkout</a>
{else}
    <p>Your cart is empty. Add some products to start shopping!</p>
{/if}

<a href="{getConf()->app_url}/productList">Continue Shopping</a>
{/block}

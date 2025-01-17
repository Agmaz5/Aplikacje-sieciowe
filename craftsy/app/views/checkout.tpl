{extends file="layout.tpl"}

{block name="content"}
<h2>Checkout</h2>

{if $cart|@count > 0}
    <h3>Order Summary</h3>
    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        {foreach from=$cart item=product}
        <tr>
            <td>{$product.productName}</td>
            <td>{$product.price}</td>
            <td>{$product.quantity}</td>
            <td>{$product.totalPrice}</td>
        </tr>
        {/foreach}
    </table>

    <h3>Total: {$totalPrice}</h3>

    <form action="{getConf()->app_url}/orderSubmit" method="post">
        <label for="address">Delivery Address:</label>
        <textarea name="address" id="address" required>{$user.deliveryAddress|escape}</textarea>

        <input type="submit" value="Confirm Order">
    </form>
{else}
    <p>Your cart is empty. Please add products to your cart before proceeding to checkout.</p>
{/if}

<a href="{getConf()->app_url}/cart">Back to Cart</a>
{/block}

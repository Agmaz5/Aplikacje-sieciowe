{extends file="layout.tpl"}

{block name="content"}
<h2>Order History</h2>

{foreach $orders as $order}
    <div class="order">
        <h3>Order #{$order.idOrder}</h3>
        <p>Status: {$order.status}</p>
        <p>Total Price: {$order.totalPrice} USD</p>
        <p>Created At: {$order.createdAt}</p>
        <a href="{getConf()->app_url}/orderDetail/{$order.idOrder}">View Order Details</a>
    </div>
{/foreach}

<a href="{getConf()->app_url}/productList">Back to Product List</a>

{/block}

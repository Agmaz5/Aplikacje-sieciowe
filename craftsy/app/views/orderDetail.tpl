{extends file="layout.tpl"}

{block name="content"}
<h2>Order Details</h2>

{foreach $orderDetails as $detail}
    <div class="order-detail">
        <h3>{$detail.productName}</h3>
        <p>Price: {$detail.unitPrice} USD</p>
        <p>Quantity: {$detail.quantity}</p>
        <p>Total: {$detail.total} USD</p>
    </div>
{/foreach}

<a href="{getConf()->app_url}/orderHistory">Back to Order History</a>

{/block}

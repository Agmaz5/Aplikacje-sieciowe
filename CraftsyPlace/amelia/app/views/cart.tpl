{extends file="layout.tpl"}

{block name="content"}
    
    {if $orderDetails|@count > 0}
        
    
    <h2>Your Cart</h2>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$orderDetails item=orderDetail}
                <tr>
                    <td>{$orderDetail.productName}</td>
                    <td>{$orderDetail.quantity}</td>
                    <td>{$orderDetail.unitPrice}</td>
                    <td>{$orderDetail.quantity * $orderDetail.unitPrice}</td>
                </tr>
            {/foreach}
        </tbody>
    </table>
{else}
{/if}


{/block}

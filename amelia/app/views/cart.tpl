{extends file="layout.tpl"}

{block name="content"}
    
    {if $orderDetails|@count > 0}
        <h2 style="text-align: center; margin-bottom: 20px;">Your Cart</h2>
        
        <table style="width: 100%; border-collapse: collapse; margin: 0 auto; border-radius: 8px; overflow: hidden;">
            <thead>
                <tr style="background-color: #4CAF50; color: white; text-align: left;">
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Product Name</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Quantity</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Price</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Total</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$orderDetails item=orderDetail}
                    <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;">{$orderDetail.productName}</td>
                        <td style="padding: 10px;">{$orderDetail.quantity}</td>
                        <td style="padding: 10px;">{$orderDetail.unitPrice}</td>
                        <td style="padding: 10px;">{$orderDetail.quantity * $orderDetail.unitPrice}</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>



    {else}
        <p style="text-align: center; font-size: 18px; color: #777;">Your cart is empty.</p>
    {/if}

{/block}

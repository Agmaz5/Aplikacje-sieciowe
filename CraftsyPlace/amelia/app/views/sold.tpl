{extends file="layout.tpl"}

{block name="content"}
    {if $soldProducts|@count > 0}
        <h2>Sold Products</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                    <th>Date Sold</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$soldProducts item=soldProduct}
                    <tr>
                        <td>{$soldProduct.idOrder}</td>
                        <td>{$soldProduct.productName}</td>
                        <td>{$soldProduct.quantity}</td>
                        <td>{$soldProduct.unitPrice}</td>
                        <td>{$soldProduct.quantity * $soldProduct.unitPrice}</td>
                        <td>{$soldProduct.createdAt}</td>
                        <td>
                            <!-- Button to delete the sold product -->
                            <form action="{$conf->action_url}realiseOrder" method="post" style="display: inline;">
                                <input type="hidden" name="orderDetailId" value="{$soldProduct.idOrder}" />
                                <button type="submit" onclick="return confirm('Was the item been sent to the user?');">
                                    Mark order connected with this product as realised
                                </button>
                            </form>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        <p>You have not sold any products yet.</p>
    {/if}
{/block}

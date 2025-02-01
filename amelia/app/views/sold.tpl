{extends file="layout.tpl"}

{block name="content"}
    {if $soldProducts|@count > 0}
        <h2 style="text-align: center; margin-bottom: 20px;">Sold Products</h2>
        <table style="width: 100%; border-collapse: collapse; margin: 0 auto; border-radius: 8px; overflow: hidden;">
            <thead>
                <tr style="background-color: #4CAF50; color: white; text-align: left;">
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Order ID</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Product Name</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Quantity</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Unit Price</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Total</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Date Sold</th>
                    <th style="padding: 10px; border-bottom: 1px solid #ddd;">Actions</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$soldProducts item=soldProduct}
                    <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;">{$soldProduct.idOrder}</td>
                        <td style="padding: 10px;">{$soldProduct.productName}</td>
                        <td style="padding: 10px;">{$soldProduct.quantity}</td>
                        <td style="padding: 10px;">{$soldProduct.unitPrice}</td>
                        <td style="padding: 10px;">{$soldProduct.quantity * $soldProduct.unitPrice}</td>
                        <td style="padding: 10px;">{$soldProduct.createdAt}</td>
                        <td style="padding: 10px; text-align: center;">
                            <!-- Button to delete the sold product -->
                            <form action="{$conf->action_url}realiseOrder" method="post" style="display: inline;">
                                <input type="hidden" name="orderDetailId" value="{$soldProduct.idOrder}" />
                                <button type="submit" onclick="return confirm('Was the item sent to the user?');" style="padding: 6px 12px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                    Mark Order as Realised
                                </button>
                            </form>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    {else}
        <p style="text-align: center; font-size: 18px; color: #777;">You have not sold any products yet.</p>
    {/if}
{/block}

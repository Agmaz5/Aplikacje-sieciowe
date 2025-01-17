{extends file="layout.tpl"}

{block name="content"}
<h2>User Profile</h2>

<form action="{getConf()->app_url}/profileUpdate" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="{$user.username}" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{$user.email}" required>

    <label for="deliveryAddress">Delivery Address:</label>
    <textarea name="deliveryAddress" id="deliveryAddress" required>{$user.deliveryAddress}</textarea>

    <input type="submit" value="Save Changes">
</form>

<a href="{getConf()->app_url}/orderHistory">Back to Order History</a>
{/block}

{extends file="layout.tpl"}

{block name="content"}
<h2>Register</h2>

<form action="{getConf()->app_url}/register" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <label for="deliveryAddress">Delivery Address:</label>
    <textarea name="deliveryAddress" id="deliveryAddress" required></textarea>

    <input type="submit" value="Register">
</form>

<a href="{getConf()->app_url}/loginShow">Already have an account? Login here</a>

{/block}

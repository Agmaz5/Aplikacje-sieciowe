{extends file="layout.tpl"}

{block name="content"}
<h1>Login</h1>

<form action="ctrl.php?controller=LoginCtrl&method=action_login" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>

    <input type="submit" name="login" value="login">
    
    
</form>

<a href="{getConf()->app_url}/registerShow">Don't have an account? Register here</a>

{/block}



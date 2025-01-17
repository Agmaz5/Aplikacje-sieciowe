<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrafstyPlace</title>
</head>
<body>
    <header>
        <h1>CrafstyPlace</h1>
        <nav>
            <ul>
                <li><a href="{$conf->app_url}/index.php">Product List</a></li>
                <li><a href="{$conf->app_url}/orderHistory">Order History</a></li>
                <li><a href="{$conf->app_url}/profile">Profile</a></li>
                
                {if isset($conf->roles) && $conf->roles|@count > 0}
                    {if isset($conf->roles) && in_array('admin', $conf->roles)}
                        <li><a href="{$conf->app_url}/userList">User Management</a></li>
                    {/if}

                    <li><a href="{$conf->app_url}/logout">Logout</a></li>
                {else}
                        <input type="submit" name="Login" value="Login" />

                    <li><a href="{$conf->app_url}/registerShow">Register</a></li>
                {/if}
            </ul>
        </nav>
    </header>

    <div class="content">
        {block name="content"}{/block}
    </div>
</body>
</html>

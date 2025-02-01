<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="{'Twój sklep z rękodziełem i unikalnymi przedmiotami'}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/grids-responsive-min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="http://localhost/amelia/css/style.css">
    </head>

    <body>
        
       
        
        
        
            <div class="pure-menu pure-menu-horizontal">
        <ul class="pure-menu-list">
        
        
    <li class="pure-menu-item">
        <form action="{$conf->action_url}displayAll" method="post" style="display: inline;">
            <input type="submit" name="browseAllProducts" value="Main Page" class="pure-button pure-button-primary" />
        </form>
    </li>
    
    {if isset({$idRole})}

        {if {$idRole} == 3}
    
    <li class="pure-menu-item">
        <form action="{$conf->action_url}myProductList" method="post" style="display: inline;">
            <input type="submit" name="productList" value="My Products (productList)" class="pure-button pure-button-primary" />
        </form>
    </li>  
    
    
    <li class="pure-menu-item">
        <form action="{$conf->action_url}showSold" method="post" style="display: inline;">
            <input type="submit" name="productList" value="My Sold Products" class="pure-button pure-button-primary" />
        </form>
    </li>      
            
        {/if}
    {/if}    
        
    {if isset({$idRole})}
        {if {$idRole} == 4}
    
        <li class="pure-menu-item">
            <form action="{$conf->action_url}controlPanel" method="post" style="display: inline;">
                <input type="submit" name="userList" value="User Management" class="pure-button pure-button-primary" />
            </form>
    </li>
        
        {/if}
    {/if} 

    {if isset({$idRole})}
        {if {$idRole} > 1 && {$idRole} < 4}

    <li class="pure-menu-item">
        <form action="{$conf->action_url}showCart" method="post" style="display: inline;">
            <input type="submit" name="cartShow" value="Cart" class="pure-button pure-button-primary" />
            <input type="hidden" name="userId" value="{$id}">

        </form>
    </li>    
        {/if}
    {/if}
    


     <!--                   <li class="pure-menu-item">
        <form method="post" style="display: inline;">
            <input type="submit" name="productList" value="Back to main page" class="pure-button pure-button-primary" />
        </form>
    </li>
    
-->

    {if isset({$idRole})}
        
        {if {$idRole} < 5 && {$idRole} > 1}
        
        <li class="pure-menu-item">
            <form action="{$conf->action_url}logout" method="post" style="display: inline;">
                <input type="submit" name="logout" value="Logout" class="pure-button pure-button-primary" />
            </form>
        </li>
        
        {else}
            
        <li class="pure-menu-item">
                <form action="{$conf->action_url}loginDisplay" method="post" style="display: inline;">

                <input type="submit" name="login" value="Login" class="pure-button pure-button-primary" />
            </form>
        </li>    
        
        {/if}
        
        
        {/if}
        
    </ul>
</div>


<div class="banner">
    <h1 class="banner-head">
        {if isset($us) && $us}{$us}{/if} witaj w CraftsyPlace!
    </h1>
</div>


        <div class="content-wrapper">
            <div id="app_content" class="content">
                {block name=content}  {/block}
            </div>

            <div class="footer l-box">
                <p>
                    <a href="#">Odwiedź CraftsyPlace</a> i odkryj unikalne przedmioty ręcznie robione przez artystów z całego świata.
                </p>
            </div>
        </div>

    </body>
</html>
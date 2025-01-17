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
        
        
{if isset($idRole)}
    {if $idRole == 4}
    
    
        <li class="pure-menu-item">
            <form method="post" style="display: inline;">
                <input type="submit" name="userList" value="User Management" class="pure-button pure-button-primary" />
            </form>
        </li>
        
        {else}
                        <li class="pure-menu-item">
        <form method="post" style="display: inline;">
            <input type="submit" name="productList" value="My Products (productList)" class="pure-button pure-button-primary" />
        </form>
    </li>

    <li class="pure-menu-item">
        <form method="post" style="display: inline;">
            <input type="submit" name="browseAllProducts" value="Browse All Products" class="pure-button pure-button-primary" />
        </form>
    </li>

    <li class="pure-menu-item">
        <form method="post" style="display: inline;">
            <input type="submit" name="cartShow" value="Cart" class="pure-button pure-button-primary" />
            <input type="hidden" name="userId" value="{$id}" />

        </form>
    </li>    
    
    





    <li class="pure-menu-item">
        <form method="post" style="display: inline;">
            <input type="submit" name="kontakt" value="Kontakt" class="pure-button pure-button-primary" />
        </form>
    </li>
            
    {/if}
    
    {else}
                        <li class="pure-menu-item">
        <form method="post" style="display: inline;">
            <input type="submit" name="productList" value="Back to main page" class="pure-button pure-button-primary" />
        </form>
    </li>
    
{/if}






        
        <li class="pure-menu-item">
            <form method="post" style="display: inline;">
                <input type="submit" name="logout" value="Logout" class="pure-button pure-button-primary" />
            </form>
        </li>
        
        <li class="pure-menu-item">
            <form method="post" style="display: inline;">
                <input type="submit" name="login" value="Login" class="pure-button pure-button-primary" />
            </form>
        </li>
    </ul>
</div>


        <div class="banner">
            <h1 class="banner-head">
                {"Witaj w CraftsyPlace!"}
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
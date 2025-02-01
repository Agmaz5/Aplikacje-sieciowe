{extends file="layout.tpl"}

{block name="content"}
        
        
    <form action="{$conf->action_url}productSave" method="post" style="display: inline;">


    <input type="hidden" name="id" value="{$product.idProduct}">
    <label for="name">Product Name</label>
    <input type="text" id="name" name="name" value="{$product.productName}">
    <label for="price">Price</label>
    <input type="text" id="price" name="price" value="{$product.price}">
    <label for="stock">Stock</label>
    <input type="text" id="stock" name="stock" value="{$product.stock}">
    <label for="description">Description</label>
    <textarea id="description" name="description">{$product.description}</textarea>
    <input type="submit" name="save" value="save" />

    
</form>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
    {/block}

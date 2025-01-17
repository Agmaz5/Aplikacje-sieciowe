{extends file="layout.tpl"}

{block name="content"}
<h2>{if $product.idProduct}Edit Product{else}Add New Product{/if}</h2>

<form action="{$app_url}/{if $product.idProduct}productEdit/{$product.idProduct}{else}productAdd{/if}" method="post">
    {if $product.idProduct}
        <input type="hidden" name="idProduct" value="{$product.idProduct}">
    {/if}
    <label for="productName">Product Name</label>
    <input type="text" name="productName" id="productName" value="{$product.productName|escape}" required>

    <label for="description">Description</label>
    <textarea name="description" id="description" required>{$product.description|escape}</textarea>

    <label for="price">Price</label>
    <input type="number" name="price" id="price" value="{$product.price}" step="0.01" required>

    <label for="stock">Stock</label>
    <input type="number" name="stock" id="stock" value="{$product.stock}" required>

    <label for="category">Category</label>
    <input type="text" name="category" id="category" value="{$product.category|escape}" required>

    <label for="isAvailable">Available</label>
    <input type="hidden" name="isAvailable" value="0">
    <input type="checkbox" name="isAvailable" id="isAvailable" value="1" {if $product.isAvailable}checked{/if}>

    <button type="submit">{if $product.idProduct}Update Product{else}Add Product{/if}</button>
</form>

{/block}

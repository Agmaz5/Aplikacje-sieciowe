{extends file="layout.tpl"}

{block name="content"}
<h2>New Product</h2>

<form action="{getConf()->app_url}/productSave" method="post">
    <label for="productName">Product Name:</label>
    <input type="text" name="productName" id="productName" required>

    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea>

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" required>

    <label for="stock">Stock:</label>
    <input type="number" name="stock" id="stock" required>

    <label for="category">Category:</label>
    <input type="text" name="category" id="category" required>

    <label for="isAvailable">Available:</label>
    <input type="checkbox" name="isAvailable" id="isAvailable">

    <input type="submit" value="Add Product">
</form>

<a href="{getConf()->app_url}/productList">Back to Product List</a>

{/block}

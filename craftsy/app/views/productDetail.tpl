{extends file="layout.tpl"}

{block name="content"}
<h2>{$product.productName}</h2>

<p><strong>Price:</strong> {$product.price|escape} PLN</p>
<p><strong>Description:</strong> {$product.description|escape}</p>
<p><strong>Stock Available:</strong> {$product.stock|escape}</p>

{if $product.isAvailable}
    <p><strong>Status:</strong> Available</p>
{else}
    <p><strong>Status:</strong> Out of Stock</p>
{/if}

<h3>Leave a Comment</h3>

{if $loggedIn}
    <form action="{getConf()->app_url}/commentSave/{$product.idProduct}" method="post">
        <label for="rating">Rating:</label>
        <select name="rating" id="rating">
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select>

        <label for="content">Comment:</label>
        <textarea name="content" id="content" required></textarea>

        <input type="submit" value="Submit Comment">
    </form>
{else}
    <p>Please log in to leave a comment.</p>
{/if}

<h3>Comments</h3>
{foreach $comments as $comment}
    <div class="comment">
        <p><strong>{$comment.username|escape}</strong> rated this product {$comment.rating}/5</p>
        <p>{$comment.content|escape}</p>
        <p><em>Posted on {$comment.createdAt|escape}</em></p>
    </div>
{/foreach}

<a href="{getConf()->app_url}/productList">Back to Product List</a>

{/block}

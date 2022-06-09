<form action="/hq/foods" method="POST">
    {{ csrf_field()  }}

    <input type="text" name="name">
    <input type="file" name="image">
    <button type="submit" class="btn btn-success ">
        ADD FOOD ITEM
    </button>
</form>

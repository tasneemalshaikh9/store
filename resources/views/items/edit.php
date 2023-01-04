<div class="mt-5 d-flex  gap-3">
        <a href="/items" class="btn btn-primary"> <i class="fa-sharp fa-solid fa-backward"></i> Back</a>
</div>
<div id="edititem" class="mx-auto">
<h1 id="h1text" class="text-center">Edit Item</h1>
<form id="itemform" class="w-50 mx-auto"  method="POST" action="/items/update">
<input type="hidden" name="id" value="<?= $data->item->id ?>">
  <div class="mb-3">
    <label for="text" class="form-label">Item Name</label>
    <input type="text" class="form-control" id="item_name" name="item_name" value="<?= $data->item->item_name?>">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Item Cost</label>
    <input type="text" class="form-control" id="cost" name="cost" value="<?= $data->item->cost ?>">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Item Price</label>
    <input type="text" class="form-control" id="price" name="price" value="<?= $data->item->price ?>">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Stock Available Quantity</label>
    <input type="text" class="form-control" id="stock_available" name="stock_available" value="<?= $data->item->stock_available?>">
  </div>

  <button id="itemsub" type="submit" class="btn btn-warning"> <i class="fa-solid fa-pen"></i> Update</button>
  <!-- <a href="/items">
<button type="submit" class="btn btn-danger">Cancle</button>
</a> -->
</form>
</div>

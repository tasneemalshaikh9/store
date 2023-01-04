<div class="mt-5 d-flex  gap-3">
         <a href="/items" class="btn btn-primary"> <i class="fa-sharp fa-solid fa-backward"></i> Back</a></div>
<div id="createitem" class="mx-auto">
<h1 id="h1c" class="text-center">Create Item</h1>
<form id="createform" class="w-50 mx-auto"  method="POST" action="/items/store">
  <div class="mb-3">
    <label for="text" class="form-label">Item Name</label>
    <input type="text" class="form-control" id="item_name" name="item_name">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Item Cost</label>
    <input type="number" class="form-control" id="cost" name="cost"  min="0">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Item Price</label>
    <input type="number" class="form-control" id="price" name="price"  min="0">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Stock Available Quantity</label>
    <input type="number" class="form-control" id="stock_available" name="stock_available" min="0">
  </div>
<div class="d-flex gap-3">
  <button id="butcreate" type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Create</button>
  <!-- <a href="/items">
<button type="submit" class="btn btn-danger">Cancle</button>
</a></div> -->
</form>
</div>

<div class="mt-5 d-flex  gap-3">
        <a href="/transactions" class="btn btn-primary"> <i class="fa-sharp fa-solid fa-backward"></i> Back</a>
</div>
<div id="edittrans" class="mx-auto">
<h1 id="h1trans" class="text-center">Edit Transaction</h1>
<form  class="w-50 mx-auto"  method="POST" action="/transactions/update">
<input type="hidden" name="id" value="<?= $data->transaction->id ?>">

  <div class="mb-3">
    <label id="q" for="text" class="form-label">Quantity</label>
    <input type="number" min="0" class="form-control" id="quantity" name="quantity" value="<?= $data->transaction->quantity ?>">
  </div>
  <!-- <div class="mb-3">
    <label for="text" class="form-label">Total</label>
    <input type="number" min="0"  class="form-control" id="price" name="price" value="< ?= $data->transaction->total ?>">
  </div> -->


  <button id="transbut" type="submit" class="btn btn-warning"> <i class="fa-solid fa-pen"></i> Update</button>
</form>
</div>
<?php 
//use Core\Helpers\Helper;
//flex-row-reverse
?>
<div class="mt-5 d-flex  gap-3">
        <a href="/items" class="btn btn-primary"> <i class="fa-sharp fa-solid fa-backward"></i> Back</a>
        <!-- <a href="/items/edit?id=<? //= $data->item->id ?>" class="btn btn-warning">Edit</a>
        <a href="/items/delete?id=<? //= $data->item->id ?>" class="btn btn-danger">Delete</a> -->
</div>

<div class="my-5">
 
    <h1 class="text-center my-5" id="singleitem">
        <?= $data->item->item_name ?>
    </h1>
      <table class="table  text-center mx-auto" id="itemtable">
  <thead>
    <tr id="dashtable">
    <th scope="col">Cost</th>
      <th scope="col">Selling Price</th>
      <th scope="col">Stock Available</th>
      <th scope="col">Created At</th>
      <th scope="col">Updated At</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr id="dashtable">
    <td><?= $data->item->cost?></td>
      <td><?= $data->item->price?></td>
      <td><?= $data->item->stock_available?></td>
      <td><?= $data->item->created_at?></td>
      <td><?= $data->item->updated_at?></td>
      <td>  <a href="/items/edit?id=<?= $data->item->id ?>" class="btn btn-warning"> <i class="fa-solid fa-pen"></i> </a></td>
      <td><a href="/items/delete?id=<?= $data->item->id ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i> </a></td>
    </tr>
    <tr>
  </tbody>
</table>
</div>
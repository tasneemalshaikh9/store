<?php ?>
<div class=" d-flex flex-column text-center my-5 my-5" id="itemss">
  <h1> <i>Informative Dashboard</i></h1>
</div>
<!-- <table class="table table-bordered table-striped text-center mx-auto w-75 my-5 border-primary">
  <thead>
    <tr>
      <th scope="col">Total Sales </th>
      <th scope="col">Total transactions</th>
      <th scope="col">Total items number</th>
      <th scope="col">Total Users </th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td>< ?= $data->total ?></td>
      <td>< ?= $data->transactions_count ?></td>
      <td>< ?= $data->items_count ?></td>
      <td>< ?= $data->users_count ?></td>

    </tr>
    <tr>
  </tbody>
</table> -->


 <div class="card-wrapper d-flex justify-content-between w-100 gap-1 ">
<div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
  <div class="card" id="card-color">
    <div class="card-body">
      <h5 class="card-title text-center" id="card-name">
        Total Sales 
      </h5>
      <h5 class="  text-center" id="dashh5"> <?= $data->total ?></h5>
    </div>
  </div>
</div>
<div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
  <div class="card" id="card-color">
    <div class="card-body">
      <h5 class="card-title text-center" id="card-name">
      Total Transactions
      </h5>
      <h5 id="dashh5" class="text-center"><?=$data->transactions_count ?></h5>
    </div>
  </div> 
</div>

<div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
  <div class="card" id="card-color">
    <div class="card-body">
      <h5 class="card-title text-center" id="card-name">
      Total items number 
      </h5>
      <h5 id="dashh5" class=" text-center"> <?=$data->items_count ?></h5>
    </div>
  </div>
</div>

<div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
  <div class="card" id="card-color">
    <div class="card-body">
      <h5 class="card-title text-center" id="card-name">
      Total Users 
      </h5>
      <h5 id="dashh5" class="  text-center"><?= $data->users_count ?></h5>
    </div>
  </div>
</div> 

</div> 

<div class=" d-flex flex-column text-center " id="itemss">
  <h3> <i>*Top Five Expensive Items To Buy*</i></3>
</div>
<div id="top5" class="mx-auto">
<?php $i = 1; ?>
<table class="table w-75 text-center mx-auto  " id="dashtable">
  <thead >

    <tr id="dashtable">
      <th scope="col">ITEM</th>
      <th scope="col">PRICE</th>

    </tr>
  </thead>
  <tbody>

    <tr>
      <?php foreach ($data->items as $item) : ?>
        <td><?= $item->item_name ?></td>
        <td><?= $item->price ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
</div>
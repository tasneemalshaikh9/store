<div class="mt-5 d-flex flex-row-reverse ">
        <a href="/items/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Create Item</a>
        
</div>
    
    <h1 id="itemss" class="d-flex justify-content-around">All Items (<?= $data->items_count?>) </h1> 

    <div class="row my-5">


        <?php foreach ($data->items as $item) : ?>
            <div class="htu-card-wrapper mb-5 col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="card w-100" id="card-color">
                    <div class="card-body">
                        <h5 class="card-title text-center" id="card-name">
                             <?= $item->item_name     // item_name from database ?> 
                        </h5>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="./item?id=<?= $item->id ?>" id="check" class="btn btn"><i class="fa-regular fa-circle-check"></i> Check Item</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    
  
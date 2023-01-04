<div class=" d-flex flex-column  ">
<h1 class="d-flex justify-content-around" id="itemss"><i>All Transactions (<?= $data->transactions_count?>) </i> </h1> 

</div>
<hr>
<div id="itemtable" >
    <table class="table  text-center    mx-auto " id="dashtable">
        <thead>
            <tr>
                <!-- <th scope="col">User</th>  -->
                <th scope="col">Item Id </th>
                 <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
<!-- 
                <th scope="col"> </th> -->
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data->transactions as $transaction) : ?>
                <tr>
                    <!-- <td>< ?=$transaction->user_id ?></td>  -->
                   <td><?= $transaction->item_id ?></td> 
                   <td><?= $transaction->quantity ?></td>
                    <td><?= $transaction->total ?></td>
                    <td><?= $transaction->created_at ?></td>
                    <td><?= $transaction->updated_at ?></td> 
                   <td><a href="/transactions/edit?id=<?= $transaction->id?>
                                                        ?>" class="btn btn-warning"> <i class="fa-solid fa-pen"></i> </a></td> 
                   <td><a href="/transactions/delete?id=<?=$transaction->id 
                               ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i> </a></td>
                  <!-- <td> <a href="./transaction?id=< ?= $transaction->id  ?>" class="btn btn-info"> Check Transaction</a></td>
                </tr> -->
            <?php endforeach; ?>




        </tbody>
    </table>
</div>
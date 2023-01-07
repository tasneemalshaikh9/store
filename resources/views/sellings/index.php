<?php

use Core\Model\Selling;
?>
<div class="text-center" id="itemss">
    <h1><i>Point Of Sale System</i></h1>
</div>
<div id="salescss">
<li class="list-group-item list-group-item-primary w-25 text-center"><i><strong><i class="fa-solid fa-cash-register"></i> Total Sales : </strong><span id="total-sales"><b><?= $data->total ?> Jod</b></i></li>
</div>
<hr>
<div id="form-1">
    <form class="my-4 d-flex justify-content-between  gap-3 w-50 mx-auto">
        <input type="hidden" id="user_id" value="<?=$_SESSION['user']['user_id'] //session user?>"> 
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Items</span>
            <select id="items" class="form-select" name="select_items" aria-label="Default select example">
                <?php foreach ($data->items as $item) :
                    if ($item->stock_available <= 0)
                        continue;
                ?>
                    <option value="<?= $item->id ?>" data-price="<?= $item->price ?>"><?= $item->item_name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" >Quantity</span>
            <input id="stock" type="number" name="stock_available" class="form-control" min="0">
        </div>
        <button id="add-item" class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
    </form>
</div>
<div id="itemtable">
    <table class="table text-center mx-auto">
        <thead>
            <tr id="dashtable">
                <th scope="col">Item</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody id="tbody" class="text-center">

            <?php foreach ($data->transactions as $transaction) : ?>
                <tr id="dashtable">
                    <td><?= $transaction->item_name  ?> </td>
                    <td class="quantity-value"><?= $transaction->quantity ?></td>
                    <td><?= $transaction->total ?></td>
                    <td id="edit">
                        <button data-editID="<?= $transaction->id ?>" class="btn btn-warning edit-trans-button" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </td>
                    <td><a href="/sellings/delete?id=<?= $transaction->id ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i> </a></td>
                </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Update Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    Quantity :
                <input id="edit_quantity" type="number" name="stock_available" class="form-control" min="0">
                <input type="hidden" value="" id="edit_trans_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="edit-trans-send-ajax" type="button" data-bs-dismiss="modal" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>
    //create transaction
    const user_id = $('#user_id');
    console.log(user_id.val());
    let selectedEditItem;
    let edit_trans_id;
    $('#add-item').click(function(e) {
        e.preventDefault();
        let data = {
                item_id:  $('#items').find(':selected').val(),
                quantity:  $('#stock').val(),
                user_id: user_id.val(),
            }; 
         
              
        $.ajax({
            type: "post",
            url: "http://store.local/api/transaction/create",
            data: JSON.stringify(data),
           
            success: function(response) {
                $('#tbody').append(`
       
                    <tr  id="dashtable">
                      <td>${response.body.item}</td>
                      <td>${response.body.quantity}</td>
                      <td>${response.body.total}</td>
                      <td id="edit">
                        <button data-editID="${response.body.id}" class="btn btn-warning edit-trans-button" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </td>
                    <td><a href="/sellings/delete?id=${response.body.id}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> </a></td>
                      </tr>
                `);
            }
        });

    });

    //edit action

    $('.edit-trans-button').click(function(e) {
        let q = $(this).parent().parent().children('.quantity-value').text();
        $('#edit_quantity').val(q);
        edit_trans_id = $(this).attr("data-editID");
        selectedEditItem = $(this).parent().parent().children('.quantity-value');
    });

    $('#edit-trans-send-ajax').click(function(e) {
        
        $.ajax({
            type: "post",
            url: "http://store.local/api/transaction/edit",
            data: JSON.stringify({
                "quantity": $('#edit_quantity').val(),
                "transaction_id": edit_trans_id
            }),
            success: function(response) {
                selectedEditItem.text($('#edit_quantity').val());
                console.log(response)
            }
        });
    });
</script>
<!-- "item_id": $('#items').find(':selected').val(),
                "quantity": $('#stock').val(),
                "user_id": $('#user_id').val(), -->
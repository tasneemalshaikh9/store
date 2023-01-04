<div class="mt-5 d-flex  gap-3">
    <a href="/users" class="btn btn-primary"> <i class="fa-sharp fa-solid fa-backward"></i> Back </a>
    <!-- <a href="/users/edit?id=<? //= $data->user->id 
                                    ?>" class="btn btn-warning">Edit</a>
        <a href="/users/delete?id=<? //= $data->user->id 
                                    ?>" class="btn btn-danger">Delete</a> -->
</div>

<div  class="my-5 w-50 mx-auto" id="usersingle">
    <div class="informationuser">
    <h3 class="my-5 " id="dashtable">
        <?= $data->user->displayname ?>
    </h3>
    <p id="dashtable">User Name: <?= $data->user->username ?></p>
    <hr id="dashtable">
    <p id="dashtable">Email: <?= $data->user->email ?></p>
    <hr id="dashtable">
    <!-- <p>Password: <? //= $data->user->password
                        ?></p> -->
    <p id="dashtable">Created At: <?= $data->user->created_at ?></p>
    <hr id="dashtable">
    <p id="dashtable">Updated At: <?= $data->user->updated_at ?></p>
    <hr id="dashtable">
    <div class=" d-flex  gap-5 " id="dashtable">
        <a href="/users/edit?id=<?= $data->user->id ?>" class="btn btn-warning"> <i class="fa-solid fa-pen"></i> Update</a>
        <a href="/users/delete?id=<?= $data->user->id ?>" class="btn btn-danger"><i class="fa-sharp fa-solid fa-user-minus"></i> Delete</a>
    </div>
    </div>
</div>

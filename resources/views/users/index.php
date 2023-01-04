<div class="mt-5 d-flex flex-row-reverse ">
        <a href="/users/create" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> Create User</a>
        
</div>

    <h1 id="itemss" class="d-flex justify-content-around"><i>All Users (<?= $data->users_count?>) </i></h1> 
    </div> 
    <div id="top5" class="mx-auto">
     <div class="row my-5">
    <table class="table  text-center w-75   mx-auto"  id="dashtable">
  <thead>
    <tr id="dashtable">
      <th scope="col">User Name</th>
      <th scope="col"> Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($data->users as $user) : ?>
    <tr>
      <td>  <?= $user->username    // item_name from database ?> </td>
      <td>         <a href="./user?id=<?= $user->id  ?>" id="userc" class="btn btn"><i class="fa-solid fa-user"></i> Check User</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div> 
</div> 

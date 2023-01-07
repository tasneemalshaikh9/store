<div class="mt-5 d-flex ">
        <a href="/users" class="btn btn-primary"> <i class="fa-sharp fa-solid fa-backward"></i> Back</a>
</div>
<div  class="informationuser mx-auto" id="usersingle">
<h1 class="text-center" id="dashtable">Edit User</h1>
<form  class="w-50 mx-auto"  method="POST" action="/users/update">
<input type="hidden" name="id" value="<?= $data->user->id ?>">
<div class="mb-3">
        <label for="display-name" class="form-label" id="dashtable"> <i class="fa-solid fa-user"></i> Display Name</label>
        <input type="text" class="form-control" id="display-name" name="displayname" value="<?= $data->user->displayname?>">
    </div>
    <div class="mb-3">
        <label for="user-email" class="form-label"id="dashtable"><i class="fa-solid fa-envelope"></i> Email</label>
        <input type="email" class="form-control" id="user-email" name="email" value="<?= $data->user->email?>">
    </div>
    <div class="mb-3">
        <label for="user-username" class="form-label"id="dashtable"><i class="fa-regular fa-user"></i> Username</label>
        <input type="text" class="form-control" id="username-email" name="username" value=" <?= $data->user->username?>">
    </div>
    <!-- <div class="mb-3">
        <label for="user-password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password-email" name="password" value=" <?//= $data->user->password?>">
    </div> -->
    <label class="form-label"id="dashtable"><i class="fa-solid fa-square-check"></i> Role</label>
    <select class="form-select mb-3" aria-label="Default select example" name="role">
    
  <option selected>Select a role :</option>
  <option value="admin">Admin</option>
  <option value="seller">Seller</option>
  <option value="procurment">Procurment</option>
  <option value="accountant">Accountant</option>
</select>

<div class="gap-3">
  <button  type="submit" class="btn btn-warning"> <i class="fa-solid fa-pen"></i> Update</button>
  <!-- <a href="/users" class="btn btn-danger ms-3 mt-4"><i class="fa-solid fa-xmark"></i> Cancel</a> -->
</div> 
</form>
</div>
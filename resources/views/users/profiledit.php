<!-- <div class="mt-5 d-flex ">
        <a href="/profile" class="btn btn-primary"> <i class="fa-sharp fa-solid fa-backward"></i> Back</a>
</div>  -->
 <div  class="informationuser mx-auto" id="usersingle">
<h1 class="text-center" id="dashtable">Edit your profile</h1>
<form  class="w-50 mx-auto"  method="POST" action="/users/updateprofile">
<input type="hidden" name="id" value="<?=$data->user->id ?>">
<div class="mb-3">
        <label for="display-name" class="form-label" id="dashtable">Display Name</label>
        <input type="text" class="form-control" id="display-name" name="displayname" value="<?= $data->user->displayname?>">
    </div>
    <div class="mb-3">
        <label for="user-email" class="form-label"id="dashtable">Email</label>
        <input type="email" class="form-control" id="user-email" name="email" value="<?= $data->user->email?>">
    </div>
    <div class="mb-3">
        <label for="user-username" class="form-label"id="dashtable">Username</label>
        <input type="text" class="form-control" id="username-email" name="username" value=" <?= $data->user->username?>">
    </div>


<div class="gap-3">
  <button  type="submit" class="btn btn-warning"> <i class="fa-solid fa-pen"></i> Update</button>
</div> 
</form>
</div>
<i><h1 class="text-center" id="itemss">Your Profile</h1></i>
<div  class="my-5 w-50 mx-auto " id="usersingle">
    <div class="informationuser">
 <i> <h3 class="my-3" id="dashtable">
 <i class="fa-solid fa-user"></i>    <?=$data->user->displayname?></h3></i>
    <img src="">
    <p id="dashtable"><i class="fa-regular fa-user"></i> User Name: <?=$data->user->username?></p>
    <p id="dashtable"><i class="fa-solid fa-envelope"></i> Email: <?=$data->user->email?></p>
    
    <p id="dashtable">Created At: <?=$data->user->created_at?></p>
    <p id="dashtable">Updated At: <?=$data->user->updated_at?></p>
    <!-- <div class=" d-flex  gap-5 " id="dashtable">
        <a href="/users/profiledit?id=< ?= $data->user->id ?>" class="btn btn-warning"> <i class="fa-solid fa-pen"></i> Update</a>
    </div> -->
    </div>
</div>

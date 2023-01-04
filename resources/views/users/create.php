<div  class="informationuser mx-auto" id="usersingle" >
<h1 class="text-center" id="dashtable"><i>Create User</i></h1>

<form action="/users/store" method="POST" class="w-50 mx-auto" >
    <div class="mb-3 ">
        <label for="display-name" class="form-label" id="dashtable">Display Name</label>
        <input type="text" class="form-control" id="display-name" name="displayname">
    </div>
    <div class="mb-3">
        <label for="user-email" class="form-label" id="dashtable">Email</label>
        <input type="email" class="form-control" id="user-email" name="email">
    </div>
    <div class="mb-3">
        <label for="user-username" class="form-label" id="dashtable">Username</label>
        <input type="text" class="form-control" id="username-email" name="username">
    </div>
    <div class="mb-3">
        <label for="user-password" class="form-label" id="dashtable">Password</label>
        <input type="password" class="form-control" id="password-email" name="password">
    </div>
    <button type="submit" class="btn btn-success mt-4"><i class="fa-solid fa-user-plus"></i> Create</button>
    <a href="/users" class="btn btn-danger ms-3 mt-4"><i class="fa-solid fa-xmark"></i> Cancel</a>
</form>
</div>
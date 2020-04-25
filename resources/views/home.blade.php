@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
         <div class="col-3 p-5">     
         </div>
           <div class="col-9 pt-4">
               <div class="d-flex justify-content-between align-items-baseline">
                     <h1>Profile</h1>
                  <div class="profilepic">
                      <form action="upload.php" method="post" enctype="multipart/form-data">Profile Picture</form>
                      <input type="submit" value="Upload Profile Picture" name="submit">
        
                      <div class="row pt-9">
                         <div class="col-6">
                               <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTdnFwM4skUjgoo-93WraO1suNqXtt1N2PGvAGEU7yX2wNv5mMS" 
                               class="w-100" alt=""> 
                         </div>
                      </div>

                     <div class="d-flex">
                        <div class="pr-5"><strong>157</strong> tweets</div>
                        <div class="pr-5"><strong>28k</strong> followers</div>
                        <div class="pr-5"><strong>528</strong> following</div>
                     </div>  
                        <a class="col-9 pt-5" href="./tweets/create.blade.php">New Tweets</a>
                  </div> 
               </div>
        </div>
             
    </div>
</div>
@endsection

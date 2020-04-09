@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-3 p-5">
        <img src="{{ asset('images/Twitter-logo.jpg') }}" class="logo-image">
      </div>
      <div class="col-9 pt-4">
      <div class="d-flex justify-content-between align-items-baseline">

        <h1>Profile</h1>
        <div class="profilepic">
        <form action="upload.php" method="post" enctype="multipart/form-data"></form>
           Select image to upload:
          <input type="file" name="fileToUpload" id="fileToUpload">
          <input type="submit" value="Upload Profile Picture" name="submit">
        </div>

        <a href="#">New Tweets</a>
      </div>
      <div class="row pt-7">
      <div class="col-6">
         <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTehmPf8meHfhFmv6ObEtiUeBVhcwL4Jw0V4PW88biOMjqMT25d" class="w-100" alt="">
       </div>
       </div>
      <div class="d-flex">
          <div class="pr-5"><strong>157</strong> tweets</div>
          <div class="pr-5"><strong>28k</strong> followers</div>
          <div class="pr-5"><strong>528</strong> following</div>
       </div>
             <div class="pt-4 font-weight-bold"></div>
               </div>
               </div>   
          </div>
      @endsection

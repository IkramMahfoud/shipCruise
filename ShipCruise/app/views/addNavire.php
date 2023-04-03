<?php
include_once APPROOT . '/views/includes/header.php';
include_once APPROOT . '/views/includes/navbar.php';
?>

<div class="container">
  <div style="margin-top: 80px;">
<form class="container" method="POST" action="<?= URLROOT.'navireController/insertNavire'?>">

<div id="AllForm">
    <p class="fw-light  text-black text-center ">New Navire</p>
    <hr  class="border border-danger border-1 opacity-75 mb-5" >

    <div class="input-group mb-3">
      <input name="name" type="text" class="form-control" placeholder="nom du navire" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">Name</span>
    </div>

    <div class="input-group mb-3">
      <input name="number" type="text" class="form-control" placeholder="room's number" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">Room</span>
    </div>

    <div class="input-group mb-3">
      <input name="place" type="text" class="form-control" placeholder="place's number" aria-describedby="basic-addon2" required>
      <span class="input-group-text" id="basic-addon2">Places</span>
    </div>
    <div>
        <input type="submit" class="btn btn-primary" style="width: 94px;height: 34px;font-size: 13px;" value="submit">
    </div>
</form>
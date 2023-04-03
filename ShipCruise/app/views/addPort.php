<?php
include_once APPROOT . '/views/includes/header.php';
include_once APPROOT . '/views/includes/navbar.php';
?>


<div class="container">
  <div style="margin-top: 80px;">
    <form class="container" method="POST" action="<?= URLROOT .'portController/insertPort'?>">
      <div id="AllForm">
        <p class="fw-light  text-black text-center py-2">New Port</p>

    <hr  class="border border-warning border-1 opacity-75 mb-5" >
        <div class="input-group mb-3">
          <input name="nom" type="text" class="form-control" placeholder="nom du port" aria-describedby="basic-addon2" required>
          <span class="input-group-text" id="basic-addon2">Name</span>
        </div>
        <div class="input-group mb-3">
          <input name="place" type="text" class="form-control" placeholder="pays" aria-describedby="basic-addon2" required>
          <span class="input-group-text" id="basic-addon2">Pays</span>
        </div>
        <div>
          <input type="submit" class="btn btn-primary" style="width: 94px;height: 34px;font-size: 13px;" value="submit">
        </div>
      </div>
    </form>
  </div>
</div>
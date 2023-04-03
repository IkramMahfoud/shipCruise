<?php
include_once APPROOT . '/views/includes/header.php';
include_once APPROOT . '/views/includes/navbar.php';
?>



<div class="container mb-5">
  <div style="margin-top: 100px;">
    <p class="fw-light bg-warning text-black text-center py-3 rounded-3">Add </p>

    <div style="margin-left:25%; margin-right:25%;">


      <form  class="mt-5" action="<?= URLROOT . 'GalleryControl/showCruise' ?>" method="POST">

      </form>


      <a href="<?= URLROOT . '/cruisesController/cruisesDash' ?>" class="btn btn-danger" style="width: 94px;height: 34px;font-size: 13px;">
        Cancel
      </a>






    </div>
  </div>
</div>
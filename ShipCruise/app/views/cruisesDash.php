<?php
include_once APPROOT . '/views/includes/header.php';
include_once APPROOT . '/views/includes/navbar.php';
?>


<div class="container">
    <div style="margin-top: 80px;">
        <p class="fw-light text-bg-dark text-light text-center py-3 rounded-3">BackOffice</p>

        <div style="margin-top: 30px;">
            <div class="addSearch">

                <a type="button" class="btn btn-outline-dark" id="addport" style=" margin:15px; width:94px;height:34px;font-size:13px;" href="<?= URLROOT . 'portController/index' ?>">
                    Add Port
                </a>

                <a type="button" class="btn btn-outline-dark" id="addnavire" style=" margin:15px; width:94px;height:34px;font-size:13px;" href="<?= URLROOT . 'navireController/index' ?>">
                    Add Navire
                </a>

                <a type="button"class="btn btn-outline-dark" id="addcruise" style=" margin:15px; width:94px;height:34px;font-size:13px;" href="<?= URLROOT . 'cruisesController/index' ?>">
                    Add Cruise
                </a>
            </div>
            <div style="margin-top: 20px; " class="text-center">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>

                            <th scope="col">NAME</th>
                            <th scope="col">START PORT</th>
                            <th scope="col">START COUNTRY</th>
                            <th scope="col">END PORT</th>
                            <th scope="col">END COUNTRY</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($data['cruises'] as $cruise) : ?>
                            <tr>
                                <th scope="row"><?= $cruise->id_croisiere ?></th>
                                <td><?= $cruise->description_croisire ?></td>
                                <td><?= $cruise->start_port_name ?></td>
                                <td><?= $cruise->start_port_country ?></td>
                                <td><?= $cruise->end_port_name ?></td>
                                <td><?= $cruise->end_port_country ?></td>
                                <td>
                                    <!-- DELETE BY ID -->
                                    <a href="<?= URLROOT . 'cruisesController/delete/' . $cruise->id_croisiere ?>" name="dlteBtn" type="submit" class="btn btn-danger" style="width:94px;height:34px;font-size:13px;">
                                        delete
                                    </a>

                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
            </div>
            </table>

        </div>
    </div>
</div>
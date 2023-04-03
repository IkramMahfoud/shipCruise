<?php
include_once APPROOT . '/views/includes/header.php';
include_once APPROOT . '/views/includes/navbar.php';
?>

<div class="containerfluid" style="background-color: #e2eafc;">
    <div class="container" style="position: relative;" >
        <div class="row" id="paginated-list" aria-live="polite" style="position: relative !important;">
            <?php foreach ($data['galleryrow'] as $cruise) : ?>

                <div class="cruisesItem col-lg-4 mt-4">
                    <div class="card card-margin">
                        <div class="card-header no-border">

                        </div>
                        <div class="card-body pt-0">
                            <div class="widget-49">
                                <div class="widget-49-title-wrapper">
                                    <div class="widget-49-date-primary">
                                        <span class="imgDisplay"><img src="<?= URLROOT . 'img/' . $cruise->image ?>" alt=""></span>
                                    </div>
                                    <div class="widget-49-meeting-info">
                                        <span class="widget-49-pro-title">Start in- <?= $cruise->date_depart ?></span>
                                        <span class="widget-49-meeting-time"><?= $cruise->nombr_nuit . ' Days.' ?></span>
                                    </div>
                                </div>
                                <ul class="widget-49-meeting-points">
                                    <li class="widget-49-meeting-item"><span><?= $cruise->description_croisire ?>.</span></li>
                                </ul>
                                <ul class="widget-49-meeting-points">
                                    <li class="widget-49-meeting-item"><span>Price- <?= $cruise->cheapest_price ?> DH.</span></li>
                                </ul>
                                <div class="widget-49-meeting-action">

                                    <form action="<?= URLROOT . 'GalleryControl/showCruise' ?>" method="POST">
                                        <input type="hidden" name="id_cruise" value="<?= $cruise->id_croisiere ?>">
                                        <input type="hidden" name="id_navire" value="<?= $cruise->id_navire ?>">
                                        <button type="submit" class="btn btn-outline-primary btn text-primary btn-sm btn btn-border-primary">View more</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
        <nav class="pagination-container">

            <div id="pagination-numbers">

            </div>
        </nav>
    </div>
</div>


<style>
    .hidden {
        display: none;
    }

    .pagination-container {
        width: calc(100% - 2rem);
        display: flex;
        align-items: center;
        position: absolute;
        bottom: -50px;
        justify-content: center;
    }

    .pagination-number,
    .pagination-button {
        font-size: 1.1rem;
        background-color: transparent;
        border: none;
        margin: 0.25rem 0.25rem;
        cursor: pointer;
        height: 2.5rem;
        width: 2.5rem;
        border-radius: .2rem;
    }

    .pagination-number:hover,
    .pagination-button:not(.disabled):hover {
        background: #fff;
    }

    .pagination-number.active {
        color: #fff;
        background: #0085b6;
    }
</style>


<script>
    const paginationNumbers = document.getElementById("pagination-numbers");
    const paginatedList = document.getElementById("paginated-list");
    const listItems = paginatedList.querySelectorAll(".cruisesItem");

    const paginationLimit = 1;
    const pageCount = Math.ceil(listItems.length / paginationLimit);
    let currentPage = 1;

    const appendPageNumber = (index) => {
        const pageNumber = document.createElement("button");
        pageNumber.className = "pagination-number";
        pageNumber.innerHTML = index;
        pageNumber.setAttribute("page-index", index);
        pageNumber.setAttribute("aria-label", "Page " + index);

        paginationNumbers.appendChild(pageNumber);
    };

    const getPaginationNumbers = () => {
        for (let i = 1; i <= pageCount; i++) {
            appendPageNumber(i);
        }
    };

    const handleActivePageNumber = () => {
        document.querySelectorAll(".pagination-number").forEach((button) => {
            button.classList.remove("active");
            const pageIndex = Number(button.getAttribute("page-index"));
            if (pageIndex == currentPage) {
                button.classList.add("active");
            }
        });
    };

    const setCurrentPage = (pageNum) => {
        currentPage = pageNum;
        handleActivePageNumber();

        const prevRange = (pageNum - 1) * paginationLimit;
        const currRange = pageNum * paginationLimit;

        listItems.forEach((item, index) => {
            item.classList.add("hidden");
            if (index >= prevRange && index < currRange) {
                item.classList.remove("hidden");
            }
        });
    };

    window.addEventListener("load", () => {
        getPaginationNumbers();
        setCurrentPage(1);

        document.querySelectorAll(".pagination-number").forEach((button) => {
            const pageIndex = Number(button.getAttribute("page-index"));

            if (pageIndex) {
                button.addEventListener("click", () => {
                    setCurrentPage(pageIndex);
                });
            }
        });
    });

</script>


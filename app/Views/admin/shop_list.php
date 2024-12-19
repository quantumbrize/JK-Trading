<div class="page-content">
    <div class="container-fluid">

        <!-- Page Title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Shops</h4>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row g-4">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="<?= base_url() ?>shop-creation" class="btn btn-success"
                                            id="addproduct-btn">
                                            <i class="ri-add-line align-bottom me-1"></i>
                                            Add SHop
                                        </a>
                                    </div>
                                </div>
                                <!-- <div class="col-sm" style="display: none;">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="text" class="form-control" id="searchProductList"
                                                placeholder="Search Products...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm" style="display: none;">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchProductList"
                                            placeholder="Search Products...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabs -->
                    <div class="card-header">
                        <!-- <div class="row align-items-center">
                            <div class="col">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab"
                                            href="#productnav-all" role="tab">
                                            All <span id="all_banner_count"
                                                class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <div id="selection-element" class="my-n1 d-flex align-items-center text-muted">
                                    Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result 
                                    <button type="button" class="btn btn-link link-danger p-0 ms-3"
                                        data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- Table -->
                    <div class="card-body">
                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                <table id="shop_list" class="table nowrap align-middle table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Shop Name</th>
                                            <th>Owner Name</th>
                                            <th>Owner Phone</th>
                                            <th>Owner Rating</th>
                                            <th>Remarks</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="shop_list_body"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Shop</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="createproduct-form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="shopName">Shop Name</label>
                                        <input type="text" class="form-control" id="shopName" placeholder="Enter shop name" required>
                                        <div class="invalid-feedback">Please Enter Shop Name.</div>
                                        <input type="hidden" id="current_uid">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="ownerName">Owner Name</label>
                                        <input type="text" class="form-control" id="ownerName" placeholder="Enter Owner Name" required>
                                        <div class="invalid-feedback">Please Enter Owner Name.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="ownerPhone">Owner Phone Number</label>
                                        <input type="text" class="form-control" id="ownerPhone" placeholder="Enter Owner Phone Number" required>
                                        <div class="invalid-feedback">Please Enter Owner Phone Number.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="rating">Rating</label>
                                        <input type="number" class="form-control" id="rating" placeholder="Enter a Rating  between 1 and 10"
                                            min="1" max="10" step="1" required>
                                        <div class="invalid-feedback">Please enter a valid rating between 1 and 10.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="remark">Remark</label>
                                        <input type="text" class="form-control" id="remark" placeholder="Enter Remark" required>
                                        <div class="invalid-feedback">Please Enter Remark.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-start mb-3">
                    <button class="btn btn-success w-sm" onclick="shop_update()" id="shop_update_btn">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

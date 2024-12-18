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
                        <div class="row align-items-center">
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
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="card-body">
                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="productnav-all" role="tabpanel">
                                <table id="sales_person_list" class="table nowrap align-middle table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            
                                            <th>Sales Person Name</th>
                                            <th>Yearly Total Sale</th>
                                            <th>Monthly Total Sale</th>
                                            <th>Current Month Sale</th>
                                            
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sales_person_list_body"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sales Person</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="sales_person_add_form">
                    <!-- Name Input -->
                    <div class="mb-3">
                        <label class="form-label" for="sales_person_name">Name</label>
                        <input type="text" class="form-control" id="sales_person_name" placeholder="Enter Name" required>
                        <div class="invalid-feedback">Please Enter sales person name.</div>
                        <input type="hidden" class="form-control" id="current_uid">

                    </div>

                    <!-- Yearly Total Sale Input -->
                    <div class="mb-3">
                        <label class="form-label" for="yearly_total_sale">Yearly Total Sale</label>
                        <input type="number" class="form-control" id="yearly_total_sale" placeholder="Enter Yearly Total Sale" required>
                        <div class="invalid-feedback">Please Enter yearly total sale.</div>
                    </div>

                    <!-- Current Month Dropdown -->
                    <div class="mb-3">
                        <label class="form-label" for="current_month">Current Month</label>
                        <select class="form-select" id="current_month">
                            <option value="" selected disabled>Select Month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        <div class="invalid-feedback">Please select the current month.</div>
                    </div>

                    <!-- Monthly Total Sale Input -->
                    <div class="mb-3">
                        <label class="form-label" for="monthly_total_sale">Monthly Total Sale</label>
                        <input type="number" class="form-control" id="monthly_total_sale" placeholder="Enter Monthly Total Sale">
                        <div class="invalid-feedback">Please enter the total sale for the selected month.</div>
                    </div>

                    <!-- Add Monthly Sale Button -->
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" id="add_monthly_sale_button">Add Monthly Sale</button>
                    </div>

                    <!-- Monthly Sale List -->
                    <div id="monthly_sales_list" class="mb-3" style="display: none;">
                        <h5>Monthly Sales:</h5>
                        <ul id="sales_month_list" class="list-group">
                            <!-- The selected months will be shown here -->
                        </ul>
                    </div>

                    <!-- Ongoing Month Sale Input -->
                    <div class="mb-3">
                        <label class="form-label" for="ongoing_month_sale">Ongoing Month Sale</label>
                        <input type="number" class="form-control" id="ongoing_month_sale" placeholder="Enter Ongoing Month Sale" required>
                        <div class="invalid-feedback">Please Enter Ongoing Month Sale.</div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="input-group">
                                    <!-- <label for="shop">Select Shop</label> -->
                                    <select class="form-control" name="shop" id="shop">
                                        
                                    </select> &nbsp;&nbsp;&nbsp;
                                    <button id="add_shop">Add Shop</button>
                                    
                                </div>
                                <div id="addedShopList" style="margin-top: 20px;"></div>
                                <input type="hidden" id="user_id">

                                
                            </div>
                        </div>
                    </div>

                    <div class="text-start mb-3">
                        <button class="btn btn-success" id="sales_person_update">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



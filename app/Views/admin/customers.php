<style>
    /* Adjusting column widths */
/* Ensure fixed layout to force column widths */
#customerTable {
    table-layout: fixed;
    width: 100%;
}

#customerTable th:nth-child(1),
#customerTable td:nth-child(1) {
    width: 100px;
}

#customerTable th:nth-child(2),
#customerTable td:nth-child(2) {
    width: 150px;
}

#customerTable th:nth-child(3),
#customerTable td:nth-child(3) {
    width: 200px;
}

#customerTable th:nth-child(4),
#customerTable td:nth-child(4) {
    width: 150px;
}

#customerTable th:nth-child(5),
#customerTable td:nth-child(5) {
    width: 200px;
}

#customerTable th:nth-child(6),
#customerTable td:nth-child(6) {
    width: 150px;
}

#customerTable th:nth-child(7),
#customerTable td:nth-child(7) {
    width: 150px;
}

#customerTable th:nth-child(8),
#customerTable td:nth-child(8) {
    width: 150px;
}

#customerTable th:nth-child(9),
#customerTable td:nth-child(9) {
    width: 150px;
}

#customerTable th:nth-child(10),
#customerTable td:nth-child(10) {
    width: 100px;
}

#customerTable th:nth-child(11),
#customerTable td:nth-child(11) {
    width: 100px;
}

</style>
<div class="page-content">
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Sales Person</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row g-4">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="<?=base_url('/add/sales_person')?>" class="btn btn-success"
                                            id="addproduct-btn">
                                            <i class="ri-add-line align-bottom me-1"></i>
                                            Add Sales Person
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
                <div class="card" id="customerList">
                    <div class="card-header border-bottom-dashed">

                    </div>
                    <div class="card-body border-bottom-dashed border-bottom">
                        <form>
                            <div class="row g-3">
                                <!-- <div class="col-xl-6">
                                    <div class="search-box">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for customer, email, phone, status or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div> -->
                                <!--end col-->
                                <div class="col-xl-6">
                                    <div class="row g-3">
                                    <div class="col">
                                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active fw-semibold" data-bs-toggle="tab"
                                                href="#productnav-all" role="tab">
                                                All <span id="all_user_count"
                                                    class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1"></span>
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                                href="#productnav-published" role="tab">
                                                Published <span 
                                                    class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">0</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                                href="#productnav-draft" role="tab">
                                                Draft<span 
                                                    class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">0</span>
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                                        <!-- <div class="col-sm-4">
                                            <div class="">
                                                <input type="text" class="form-control" id="datepicker-range"
                                                    data-provider="flatpickr" data-date-format="d M, Y"
                                                    data-range-date="true" placeholder="Select date">
                                            </div>
                                        </div> -->
                                        <!--end col-->
                                        <!-- <div class="col-sm-4">
                                            <div>
                                                <select class="form-control" data-plugin="choices" data-choices=""
                                                    data-choices-search-false="" name="choices-single-default"
                                                    id="idStatus">
                                                    <option value="">Status</option>
                                                    <option value="all" selected="">All</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Block">Block</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <!--end col-->

                                        <!-- <div class="col-sm-4">
                                            <div>
                                                <button type="button" class="btn btn-primary w-100"
                                                    onclick="SearchData();"> <i
                                                        class="ri-equalizer-fill me-2 align-bottom"></i>Filters</button>
                                            </div>
                                        </div> -->
                                        <!--end col-->
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                    
                    <div class="card-body">
                        <div>
                            <div class="table-responsive table-card mb-1">
                                <table class="table align-middle" id="customerTable">
                                    <thead class="table-light text-muted">
                                        <tr>
                                            <th style="width: 150px;">Image</th>
                                            <th style="width: 200px;">Name</th>
                                            <th style="width: 150px;">Number</th>
                                            <th style="width: 150px;">Number 2</th>
                                            <th style="width: 200px;">Email</th>
                                            <th style="width: 150px;">Joining Date</th>
                                            <th style="width: 150px;">Yearly Total Sale(₹)</th>
                                            <th style="width: 150px;">Selected Month Sale(₹)</th>
                                            <th style="width: 150px;">Sales Chart</th>
                                            <!-- <th style="width: 150px;">Ongoing Month Sale(₹)</th> -->
                                            <th style="width: 150px;">Days and Route</th>
                                            <th style="width: 100px;">Status</th>
                                            <th style="width: 150px;">Location</th>
                                            <th style="width: 100px;">Edit</th>
                                        </tr>
                                    </thead>

                                    <tbody class="list form-check-all" id="table_data">
                                        <tr>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child"
                                                        value="option1">
                                                </div>
                                            </th>
                                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                    class="fw-medium link-primary">#VZ2101</a></td>
                                            <td class="customer_name">Mary Cousar</td>
                                            <td class="email">marycousar@velzon.com</td>
                                            <td class="phone">580-464-4694</td>
                                            <td class="date">06 Apr, 2021</td>
                                            <td class="status"><span
                                                    class="badge bg-success-subtle text-success text-uppercase">Active</span>
                                            </td>
                                            <td>
                                                <ul class="list-inline hstack gap-2 mb-0">
                                                    <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                                        data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                        <a href="#showModal" data-bs-toggle="modal"
                                                            class="text-primary d-inline-block edit-item-btn">
                                                            <i class="ri-pencil-fill fs-16"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item" data-bs-toggle="tooltip"
                                                        data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                        <a class="text-danger d-inline-block remove-item-btn"
                                                            data-bs-toggle="modal" href="#deleteRecordModal">
                                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="../../../msoeawqm-2.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a"
                                            style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ customer We did not
                                            find any customer for you search.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="#">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="#">
                                        Next
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close" id="close-modal"></button>
                                    </div>
                                    <form class="tablelist-form" autocomplete="off">
                                        <div class="modal-body">
                                            <input type="hidden" id="id-field">

                                            <div class="mb-3" id="modal-id" style="display: none;">
                                                <label for="id-field1" class="form-label">ID</label>
                                                <input type="text" id="id-field1" class="form-control" placeholder="ID"
                                                    readonly="">
                                            </div>

                                            <div class="mb-3">
                                                <label for="customername-field" class="form-label">Customer Name</label>
                                                <input type="text" id="customername-field" class="form-control"
                                                    placeholder="Enter name" required="">
                                                <div class="invalid-feedback">Please enter a customer name.</div>
                                                <input type="hidden" class="form-control" id="current_uid">
                                            </div>

                                            <div class="mb-3">
                                                <label for="email-field" class="form-label">Email</label>
                                                <input type="email" id="email-field" class="form-control"
                                                    placeholder="Enter email" required="">
                                                <div class="invalid-feedback">Please enter an email.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="phone-field" class="form-label">Phone</label>
                                                <input type="text" id="phone-field" class="form-control"
                                                    placeholder="Enter phone no." required="">
                                                <div class="invalid-feedback">Please enter a phone.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="date-field" class="form-label">Joining Date</label>
                                                <input type="date" id="date-field" class="form-control"
                                                    data-provider="flatpickr" data-date-format="d M, Y" required=""
                                                    placeholder="Select date">
                                                <div class="invalid-feedback">Please select a date.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="date-field" class="form-label">Location</label>
                                                <input type="text" id="location-field" class="form-control" required=""
                                                    placeholder="Enter Location">
                                                <div class="invalid-feedback">Please select a date.</div>
                                            </div>

                                            <!-- <div>
                                                <label for="status-field" class="form-label">Status</label>
                                                <select class="form-control" data-choices=""
                                                    data-choices-search-false="" name="status-field" id="status-field"
                                                    required="">
                                                    <option value="">Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Block">Block</option>
                                                </select>
                                            </div> -->
                                            <!-- <div class="mb-3">
                                                <label class="form-label" for="yearly_total_sale">Yearly Total Sale (₹)</label>
                                                <input type="number" class="form-control" id="yearly_total_sale" placeholder="Enter yearly total sale" required>
                                                <div class="invalid-feedback">Please Enter yearly total sale.</div>
                                                <div id="yearly_total_sale_in_words" class="mt-2 text-muted"></div> 

                                            </div> -->
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
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="monthly_total_sale">Monthly Total Sale (₹)</label>
                                                <input type="number" class="form-control" id="monthly_total_sale" placeholder="Enter Monthly Total Sale">
                                                <div id="monthly_total_sale_in_words" class="mt-2 text-muted"></div>
                                            </div>

                                            <!-- Add Monthly Sale Button -->
                                            <button type="button" class="btn btn-primary" id="add_monthly_sale_button">Add Monthly Sale</button>
                                            <br><br>

                                            <!-- Container for added month-sales display -->
                                            <div id="monthly_sales_list" class="mb-3" style="display: none;">
                                                <h5>Monthly Sales:</h5>
                                                <ul id="sales_month_list" class="list-group">
                                                    <!-- The selected months will be shown here -->
                                                </ul>
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label class="form-label" for="ongoing_month_sale">Ongoing Month Sale (₹)</label>
                                                <input type="number" class="form-control" id="ongoing_month_sale" placeholder="Enter Ongoing Month Sale" required>
                                                <div class="invalid-feedback">Please Enter Ongoing Month Sale.</div>
                                                <div id="ongoin_total_sale_in_words" class="mt-2 text-muted"></div>
                                            </div> -->
                                            <div class="mb-3">
                                                <label class="form-label" for="days">Days</label>
                                                <input type="text" class="form-control" id="days" placeholder="Enter Days" required>
                                                <label class="form-label" for="route">Route</label>
                                                <input type="text" class="form-control" id="route" placeholder="Enter Ongoing" required> <br>
                                                <div class="invalid-feedback">Please Enter Dyas and Route.</div>
                                                <button id="add_location" class="btn btn-success">Add Location</button>
                                            </div>
                                            <div id="sales_person_route_section" style="margin-top: 20px;">
                                                <h5>Sales Person Routes</h5>
                                                <div id="sales_person_route_list"></div>
                                            </div>

                                            <div id="addedRouteList" style="margin-top: 20px;"></div>
                                            <div class="mb-3">
                                                <div class="input-group">
                                                    <select class="form-control" name="shop" id="shop">
                                                    </select>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <button id="add_shop" class="btn btn-success">Add Shop</button>
                                                </div>
                                                <div id="addedShopList" style="margin-top: 20px;"></div>
                                                <input type="hidden" id="user_id">
                                            </div>
                                            <div class="mb-3">
                                                <label for="date-field" class="form-label">Password</label>
                                                <input type="text" id="password-field" class="form-control" required=""
                                                    placeholder="Enter Password">
                                                <div class="invalid-feedback">Enter Password.</div>
                                            </div>
                                        </div>

                                        
                                        
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-success" id="add-btn">Update</button>
                                                <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" id="deleteRecord-close"
                                            data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mt-2 text-center">
                                            <lord-icon src="../../../gsqxdxog-3.json" trigger="loop"
                                                colors="primary:#f7b84b,secondary:#f06548"
                                                style="width:100px;height:100px"></lord-icon>
                                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                <h4>Are you sure ?</h4>
                                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this
                                                    record ?</p>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                            <button type="button" class="btn w-sm btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn w-sm btn-danger" onclick="delet_customer()"
                                                id="delete-record">Yes, Delete It!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end modal -->
                    </div>
                </div>

            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
    <!-- container-fluid -->
</div>

<div class="modal fade" id="routeDetailsModal" tabindex="-1" aria-labelledby="routeDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="routeDetailsModalLabel">Route Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Route details will be injected here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Yearly Sales</h1>
        <button type="button" class="btn-close" onclick="close_yearly_sales_modal()"></button>
      </div>
      <div class="modal-body">
      <canvas id="myChart" style="width:100%;max-width:800px"></canvas>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalMonthly" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Monthly Sales</h1>
        <button type="button" class="btn-close" onclick="close_monthly_sales_modal()"></button>
      </div>
      <div class="modal-body">
      <canvas id="myChartMonthly" style="width:100%;max-width:800px"></canvas>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

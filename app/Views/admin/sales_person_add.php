<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Add Sales Person</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div id="sales_person_add_form">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- <div class="card">
                                <div class="card-body">
                                    <label class="form-label" for="product-image-input">Logo Image</label>
                                    <input type="file" id="file-input"  multiple>
                                    <label for="file-input" id="btn_upload" class="btn btn-success">
                                        <i class="fas fa-upload"></i> &nbsp; Select Logo Image
                                    </label>
                                    <p id="num-of-files"></p>
                                    <div id="images"></div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <!-- Sales Person Name -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="sales_person_name">Sales Person Name</label>
                                <input type="text" class="form-control" id="sales_person_name" placeholder="Enter Sales Person Name" required>
                                <div class="invalid-feedback">Please enter the Sales Person Name.</div>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="customer_email">Email</label>
                                <input type="text" class="form-control" id="customer_email" placeholder="Enter Sales Person Name" required>
                                <div class="invalid-feedback">Please enter the email</div>
                            </div>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="customer_Phone">Phone</label>
                                <input type="text" class="form-control" id="customer_Phone" placeholder="Enter Sales Person Name" required>
                                <div class="invalid-feedback">Please enter the Phone number</div>
                            </div>
                        </div>
                    </div>

                    <!-- Joining Date -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="date-field" class="form-label">Joining Date</label>
                                <input type="date" id="date-field" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" required placeholder="Select date">
                                <div class="invalid-feedback">Please select a date.</div>
                            </div>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="status-field" class="form-label">Status</label>
                                <select class="form-control" data-choices="" data-choices-search-false="" name="status-field" id="status-field" required>
                                    <option value="">Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Block">Block</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Type -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="type-field" class="form-label">Type</label>
                                <select class="form-control" data-choices="" data-choices-search-false="" name="type-field" id="type-field" required>
                                    <option value="">Type</option>
                                    <option value="staff">Staff</option>
                                    <option value="user">User</option>
                                    <option value="seller">Seller</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Yearly Total Sale -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="yearly_total_sale">Yearly Total Sale</label>
                                <input type="number" class="form-control" id="yearly_total_sale" placeholder="Enter yearly total sale" required>
                                <div class="invalid-feedback">Please Enter yearly total sale.</div>
                            </div>
                        </div>
                    </div>

                    <!-- Monthly Sales -->
                    <div class="card">
                        <div class="card-body">
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
                                <label class="form-label" for="monthly_total_sale">Monthly Total Sale</label>
                                <input type="number" class="form-control" id="monthly_total_sale" placeholder="Enter Monthly Total Sale">
                            </div>

                            <!-- Add Monthly Sale Button -->
                            <button type="button" class="btn btn-primary" onclick="add_monthly_sale()">Add Monthly Sale</button>

                            <!-- Container for added month-sales display -->
                            <div class="mt-3" id="monthly_sales_container" style="border-top: 1px solid #ccc; padding-top: 10px;">
                                <h6>Added Monthly Sales</h6>
                                <ul id="monthly_sales_list" class="list-group"></ul>
                            </div>
                        </div>
                    </div>

                    <!-- Ongoing Month Sale -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="ongoing_month_sale">Ongoing Month Sale</label>
                                <input type="number" class="form-control" id="ongoing_month_sale" placeholder="Enter Ongoing Month Sale" required>
                                <div class="invalid-feedback">Please Enter Ongoing Month Sale.</div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="days">Days</label>
                                <input type="text" class="form-control" id="days" placeholder="Enter Days" required>
                                <label class="form-label" for="route">Route</label>
                                <input type="text" class="form-control" id="route" placeholder="Enter Ongoing" required>
                                <div class="invalid-feedback">Please Enter Dyas and Route.</div>
                                <button id="add_location" class="btn btn-success">Add Location</button>
                            </div>
                            <div id="addedRouteList" style="margin-top: 20px;"></div>
                        </div>
                    </div>

                    <!-- Select Shop -->
                    <div class="card">
                        <div class="card-body">
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
                        </div>
                    </div>

                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-start mb-3">
                <button class="btn btn-success w-sm" id="sales_person_add_btn" onclick="sales_persons_add()">Submit</button>
            </div>

        </div>
        <!-- container-fluid -->
    </div>
</div>

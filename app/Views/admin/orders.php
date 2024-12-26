<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                    <h4 class="mb-sm-0">Orders</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="orderList">
                    <div class="card-header border-0">
                        <div class="row align-items-center gy-3">
                            <div class="col-sm">
                                <h5 class="card-title mb-0">All Order</h5>
                            </div>
                            <div class="col-sm-auto">
                                <!-- <div class="d-flex gap-1 flex-wrap">
                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal">
                                        <i class="ri-add-line align-bottom me-1"></i>
                                        Create Order
                                    </button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body border border-dashed border-end-0 border-start-0">
                        <table class="table" id="order_table">
                            <thead>
                                <tr>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Pay Method</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Billing</th>
                                </tr>
                            </thead>
                            <tbody id="order_table_body">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Product Details</h1>
        <button type="button" class="btn-close" onclick="close_order_modal()"></button>
      </div>
      <div class="modal-body">
      <form id="productForm">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Discount (%)</th>
                        <th>Tax</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="productDetails">
                    <!-- Product rows will be dynamically loaded here -->
                </tbody>
            </table>
            <div class="form-group">
                <label for="grandTotal">Grand Total</label>
                <input type="number" class="form-control" id="grandTotal" readonly>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="generateBill()">Update</button>
        <button type="button" class="btn btn-secondary" onclick="close_order_modal()">Close</button>
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

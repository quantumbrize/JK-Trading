<!-- Profile start -->
<div class="container">
        <div class="profile-pic" id="userImage">
            <img src="https://via.placeholder.com/50" alt="Profile Picture">
            
        </div>
        
        <div id="detailsForm">
            <!-- <div class="input-group">
                <input type="file" name="user_img[]" id="user_img_input" multiple>
            </div> -->
            <div class="input-group">
                <label for="fullName">Full name</label>
                <input class="pf-dts-input" type="text" id="fullName" placeholder="Full Name">
                <span style="color:red" id="name_val"></span>
            </div>
            <div class="input-group">
                <label for="mobileNumber">Mobile number 1</label>
                <input class="pf-dts-input" type="tel" id="mobileNumber1" placeholder="Phone" readonly>
                <span style="color:red" id="number_val"></span>
            </div>
            <div class="input-group">
                <label for="mobileNumber">Mobile number 2</label>
                <input class="pf-dts-input" type="tel" id="mobileNumber2" placeholder="Phone" readonly>
                <span style="color:red" id="number_val"></span>
            </div>
            <!-- <div class="input-group">
                
                <select class="form-control" name="shop" id="shop">
                    
                </select>
            </div> -->

<!-- <div class="input-group" style="margin-top: 10px;">
    
    <button id="add_shop" class="btn btn-primary btn-block">Add Shop</button>
</div> -->

<div class="input-group" style="margin-top: 10px;">
    <!-- View Shops Button (Full width below the Add Shop button) -->
    <button id="view_shops" class="btn btn-primary btn-block">View Shops</button>
</div>

<!-- Modal to Edit Shops and Remarks -->
<div class="modal" id="editShopsModal" tabindex="-1" role="dialog" aria-labelledby="editShopsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editShopsModalLabel">Edit Shops and Remarks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">
        <div id="modalShopsList"></div> <!-- Shops will be populated here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="user_id">


            
            <!-- <button onclick="window.location.href='<?= base_url('user/address')?>'" type="button" id="locationButton">Add your Location</button> -->
            <div class="confirm-btn-bottom-fix">
                <button type="submit" id="confirmButton">Confirm</button>
            </div>
        </div>
    </div>
    <!-- Profile end -->
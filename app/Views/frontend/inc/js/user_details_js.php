<script>
    $(document).ready(function () {
        // alert("hello")
        get_user_data();
        load_all_shop();

        // $("#confirmButton").click(function () {
        //     var user_id = $("#user_id").val()
        //     var name = $("#fullName").val()
        //     var number1 = $("#mobileNumber").val()
        //     var number2 = $("#mobileNumber").val()
        //     // var email = $("#email").val()

        //     if (name == "") {
        //         $("#name_val").text("Please enter name!")
        //     } else {
        //         $("#name_val").text("")
        //     }
        //     if (number == "") {
        //         $("#number_val").text("Please enter number!")
        //     } else {
        //         $("#number_val").text("")
        //     }
        //     // if (email == "") {
        //     //     $("#email_val").text("Please enter email!")
        //     // } else {
        //     //     $("#email_val").text("")
        //     // }

        //     if (name != "" && number != "" && email != "") {
        //         // alert("hello")
        //         var formData = new FormData();

        //         formData.append('name', name);
        //         formData.append('number1', number);
        //         formData.append('number2', number);
        //         // formData.append('email', email);
        //         formData.append('user_id', user_id);
        //         console.log(formData.get('name'));

        //         $.each($('#user_img_input')[0].files, function (index, file) {
        //             formData.append('images[]', file);
        //         });
        //         $.ajax({
        //             url: "<?= base_url('/api/user/update') ?>",
        //             type: "POST",
        //             data: formData,
        //             contentType: false,
        //             processData: false,
        //             beforeSend: function () {
        //                 $('#confirmButton').html(`<div class="spinner-border" role="status"></div>`)
        //                 $('#confirmButton').attr('disabled', true)

        //             },
        //             success: function (resp) {
        //                 console.log(resp)

        //                 if (resp.status) {
        //                     // window.location.href = "<?= base_url('/user/account') ?>";
        //                     Toastify({
        //                         text: resp.message.toUpperCase(),
        //                         duration: 3000,
        //                         position: "center",
        //                         stopOnFocus: true,
        //                         style: {
        //                             background: resp.status ? 'darkgreen' : 'darkred',
        //                         },

        //                     }).showToast();
        //                     get_user_data();
        //                 } else {
        //                     console.log(resp.status)
        //                     Toastify({
        //                         text: resp.message.toUpperCase(),
        //                         duration: 3000,
        //                         position: "center",
        //                         stopOnFocus: true,
        //                         style: {
        //                             background: resp.status ? 'darkgreen' : 'darkred',
        //                         },

        //                     }).showToast();
        //                 }


        //                 // $('#alert').html(html)
        //                 console.log(resp)
        //             },
        //             error: function (err) {
        //                 console.log(err)
        //             },
        //             complete: function () {
        //                 $('#confirmButton').html(`Confirm`)
        //                 $('#confirmButton').attr('disabled', false)
        //             }
        //         })
        //     }
        // });
        // $("#confirmButton").click(function () {
        //     var user_id = $("#user_id").val();
        //     var name = $("#fullName").val();
        //     var number1 = $("#mobileNumber1").val();
        //     var number2 = $("#mobileNumber2").val();

        //     // Validate inputs
        //     if (name === "") {
        //         $("#name_val").text("Please enter name!");
        //     } else {
        //         $("#name_val").text("");
        //     }

        //     if (number1 === "") {
        //         $("#number_val").text("Please enter number!");
        //     } else {
        //         $("#number_val").text("");
        //     }

        //     // Validate if required fields are filled
        //     if (name !== "" && number1 !== "") {
        //         var formData = new FormData();

        //         // Append basic user information
        //         formData.append("name", name);
        //         formData.append("number1", number1);
        //         formData.append("number2", number2);
        //         formData.append("user_id", user_id);

        //         // Capture shop details (UID, name, remarks)
        //         var shops = [];
        //         $(".shop-item").each(function () {
        //             var shop_uid = $(this).attr("data-shop-id"); // Retrieve UID
        //             var shop_name = $(this).find(".shop-name").text(); // Retrieve shop name
        //             var shop_remarks = $(this).find(".remarks-input").val(); // Retrieve remarks

        //             // Store shop data in the shops array
        //             shops.push({
        //                 uid: shop_uid,
        //                 name: shop_name,
        //                 remarks: shop_remarks
        //             });
        //         });

        //         // Append shops array to FormData (without converting to JSON string)
        //         formData.append("shops", JSON.stringify(shops));

        //         console.log("Form data prepared:", formData);

        //         // Append user images (if any)
                

        //         // AJAX request
        //         $.ajax({
        //             url: "<?= base_url('/api/user/update') ?>",
        //             type: "POST",
        //             data: formData,
        //             contentType: false,
        //             processData: false,
        //             beforeSend: function () {
        //                 $("#confirmButton").html(`<div class="spinner-border" role="status"></div>`);
        //                 $("#confirmButton").attr("disabled", true);
        //             },
        //             success: function (resp) {
        //                 console.log(resp);

        //                 Toastify({
        //                     text: resp.message.toUpperCase(),
        //                     duration: 3000,
        //                     position: "center",
        //                     stopOnFocus: true,
        //                     style: {
        //                         background: resp.status ? "darkgreen" : "darkred",
        //                     },
        //                 }).showToast();

        //                 if (resp.status) {
        //                     get_user_data();
        //                 }
        //             },
        //             error: function (err) {
        //                 console.log(err);
        //             },
        //             complete: function () {
        //                 $("#confirmButton").html("Confirm");
        //                 $("#confirmButton").attr("disabled", false);
        //             },
        //         });
        //     }
        // });
        

        $("#confirmButton").click(function () {
    var user_id = $("#user_id").val();
    var name = $("#fullName").val();
    var number1 = $("#mobileNumber1").val();
    var number2 = $("#mobileNumber2").val();

    // Validate inputs
    if (name === "") {
        $("#name_val").text("Please enter name!");
    } else {
        $("#name_val").text("");
    }

    if (number1 === "") {
        $("#number_val").text("Please enter number!");
    } else {
        $("#number_val").text("");
    }

    // Validate if required fields are filled
    if (name !== "" && number1 !== "") {
        var formData = new FormData();

        // Append basic user information
        formData.append("name", name);
        formData.append("number1", number1);
        formData.append("number2", number2);
        formData.append("user_id", user_id);

        // Capture shop details (UID, name, remarks)
        var shops = [];
        $(".shop-item").each(function () {
            var shop_uid = $(this).attr("data-shop-id"); // Retrieve UID
            var shop_name = $(this).find(".shop-name").text(); // Retrieve shop name
            var shop_remarks = $(this).find(".remarks-input").val(); // Retrieve remarks

            // Store shop data in the shops array
            shops.push({
                uid: shop_uid,
                name: shop_name,
                remarks: shop_remarks
            });
        });

        // Append shops array to FormData (without converting to JSON string)
        formData.append("shops", JSON.stringify(shops));

        console.log("Form data prepared:", formData);

        // AJAX request to save the data
        $.ajax({
            url: "<?= base_url('/api/user/update') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#confirmButton").html(`<div class="spinner-border" role="status"></div>`);
                $("#confirmButton").attr("disabled", true);
            },
            success: function (resp) {
                console.log(resp);

                Toastify({
                    text: resp.message.toUpperCase(),
                    duration: 3000,
                    position: "center",
                    stopOnFocus: true,
                    style: {
                        background: resp.status ? "darkgreen" : "darkred",
                    },
                }).showToast();

                if (resp.status) {
                    get_user_data();
                }
            },
            error: function (err) {
                console.log(err);
            },
            complete: function () {
                $("#confirmButton").html("Confirm");
                $("#confirmButton").attr("disabled", false);
            },
        });
    }
});

    })

    // function get_user_data() {
    //     $.ajax({
    //         url: "<?= base_url('api/user') ?>",
    //         type: "GET",
    //         success: function (resp) {
    //             // resp = JSON.parse(resp)
    //             console.log(resp.user_data)
    //             if (resp.status == true) {
    //                 console.log(resp)



    //                 $("#fullName").val(resp.user_data.user_name)
    //                 $("#mobileNumber1").val(resp.user_data.number)
    //                 $("#email").val(resp.user_data.email)
    //                 $("#user_id").val(resp.user_id)

    //                 if (resp.user_img != null) {
    //                     $("#userImage").html(`<img src="<?= base_url('public/uploads/user_images/') ?>${resp.user_img.img}" alt="Profile Picture">`);
    //                 }

    //                 var dateParts = resp.user_data.created_at.split(" ")[0].split("-");
    //                 var year = dateParts[0];
    //                 var month = dateParts[1];
    //                 var day = dateParts[2];
    //                 var formattedDate = day + "/" + month + "/" + year;
    //                 $("#customer_since_member").text(formattedDate)



    //             } else {
    //                 console.log(resp.message)
    //             }
    //         },
    //         error: function () {
    //         }
    //     })
    // }
    // function get_user_data() {
    //     $.ajax({
    //         url: "<?= base_url('api/user') ?>",
    //         type: "GET",
    //         success: function (resp) {
    //             // resp = JSON.parse(resp)
    //             console.log(resp.user_data)
    //             if (resp.status == true) {
    //                 console.log(resp);

    //                 // Populate the user data
    //                 $("#fullName").val(resp.user_data.user_name);
    //                 $("#mobileNumber1").val(resp.user_data.number);
    //                 $("#mobileNumber2").val(resp.user_data.number2);
    //                 $("#email").val(resp.user_data.email);
    //                 $("#user_id").val(resp.user_id);

    //                 // Display user image
    //                 if (resp.user_img != null) {
    //                     $("#userImage").html(`<img src="<?= base_url('public/uploads/user_images/') ?>${resp.user_img.img}" alt="Profile Picture">`);
    //                 }

    //                 // Format and display user created date
    //                 var dateParts = resp.user_data.created_at.split(" ")[0].split("-");
    //                 var year = dateParts[0];
    //                 var month = dateParts[1];
    //                 var day = dateParts[2];
    //                 var formattedDate = day + "/" + month + "/" + year;
    //                 $("#customer_since_member").text(formattedDate);

    //                 // Display shops
    //                 if (resp.shops && resp.shops.length > 0) {
    //                     let shopHtml = '';
    //                     $.each(resp.shops, function(index, shop) {
    //                         shopHtml += `
    //                             <div class="shop-item" data-shop-id="${shop.shop_uid}" style="margin-bottom: 10px;">
    //                             <div style="display: flex; align-items: flex-start; margin-top: 5px;">
    //                                 <!-- Shop label and name (on the left) -->
    //                                 <div style="flex: 1; margin-right: 20px; display: flex; flex-direction: column;">
    //                                     <label style="color:#9796a1; margin-bottom: 5px;">Shop ${index+1}</label>
    //                                     <span class="shop-name" style="margin-top: 5px;">${shop.shop_name}</span>
    //                                 </div>

    //                                 <!-- Remarks label and input (on the right) -->
    //                                 <div style="flex: 1; display: flex; flex-direction: column;">
    //                                     <label style="color:#9796a1; margin-bottom: 5px;">Remarks:</label>
    //                                     <input type="text" placeholder="Remarks" class="remarks-input form-control" style="padding: 5px;" value="${shop.shop_remarks}">
    //                                 </div>
    //                             </div>

    //                             <!-- Remove button taking the full width of the container -->
    //                             <button class="remove-shop-btn btn btn-danger btn-sm" style="width: 100%; margin-top: 10px;">Remove</button>
    //                         </div>




    // `;
    //                     });
    //                     $('#addedShopList').html(shopHtml);
    //                 }

    //             } else {
    //                 console.log(resp.message);
    //             }
    //         },
    //         error: function () {
    //             console.log("Error loading user data.");
    //         }
    //     });
    // }

    function get_user_data() {
    $.ajax({
        url: "<?= base_url('api/user') ?>",
        type: "GET",
        success: function (resp) {
            console.log(resp.user_data);
            if (resp.status == true) {
                console.log(resp);

                // Populate the user data
                $("#fullName").val(resp.user_data.user_name);
                $("#mobileNumber1").val(resp.user_data.number);
                $("#mobileNumber2").val(resp.user_data.number2);
                $("#email").val(resp.user_data.email);
                $("#user_id").val(resp.user_id);

                // Display shops
                if (resp.shops && resp.shops.length > 0) {
                    let shopHtml = '';
                    $.each(resp.shops, function(index, shop) {
                        shopHtml += `
                            <div class="shop-item" data-shop-id="${shop.shop_uid}" style="margin-bottom: 10px;">
                                <div style="display: flex; align-items: flex-start; margin-top: 5px;">
                                    <!-- Shop name on the left -->
                                    <div style="flex: 1; margin-right: 20px; display: flex; flex-direction: column;">
                                        <label style="color:#9796a1; margin-bottom: 5px;">Shop ${index+1}</label>
                                        <span class="shop-name" style="margin-top: 5px;">${shop.shop_name}</span>
                                    </div>

                                    <!-- Remarks input on the right -->
                                    <div style="flex: 1; display: flex; flex-direction: column;">
                                        <label style="color:#9796a1; margin-bottom: 5px;">Remarks:</label>
                                        <input type="text" placeholder="Remarks" class="remarks-input form-control" style="padding: 5px;" value="${shop.shop_remarks}">
                                    </div>
                                    <!-- Close button to remove shop -->
                                    <button class="close-shop-btn btn btn-danger btn-sm" style="width: 20px; margin-top: 5px;" onclick="removeShop(${shop.shop_uid})">X</button>
                                </div>
                            </div>
                        `;
                    });
                    $('#addedShopList').html(shopHtml);
                    // Populate the modal as well
                    populateModal(resp.shops);
                }

            } else {
                console.log(resp.message);
            }
        },
        error: function () {
            console.log("Error loading user data.");
        }
    });
}
    $(document).on('change', 'input[name="user_img[]"]', function (e) {
        console.log(1)
        var files = e.target.files;
        $('#userImage').html(''); // Clear existing previews

        for (var i = 0; i < files.length; i++) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#userImage').append(`<img src="${e.target.result}" alt="Profile Picture"/>`);
            };

            reader.readAsDataURL(files[i]);
        }
    });
    function load_all_shop() {
        $.ajax({
            url: "<?= base_url('/api/all/shop') ?>",
            type: "GET",
            beforeSend: function () {
                $('#shop_list_body').html(`
                    <tr>
                        <td colspan="7" style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>
                `);
            },
            success: function (resp) {
                console.log(resp);
                if (resp.status) {
                    if (resp.data.length > 0) {
                        $('#all_banner_count').html(resp.data.length);
                        let html = ``;
                        $.each(resp.data, function (index, shop) {
                            html += `<option value="${shop.uid}">${shop.shop_name}</option>`;
                        });
                        $('#shop').html(html);
                    }
                } else {
                    $('#shop').html(`
                        <option value="">DATA NOT FOUND!</option>
                    `);
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    $('#add_shop').click(function (e) {
    e.preventDefault(); // Prevent default form submission behavior

    // Get selected shop information
    const shopId = $('#shop').val();
    const shopName = $('#shop option:selected').text();

    if (shopId && shopName) {
        // Check if the shop is already added
        const existingShop = $(`#addedShopList .shop-item[data-shop-id="${shopId}"]`);
        if (existingShop.length > 0) {
            alert('This shop is already added.');
            return;
        }

        // Create shop display element for the added shop
        const shopItem = `
            <div class="shop-item" data-shop-id="${shopId}" style="margin-bottom: 10px;">
                <div style="display: flex; align-items: flex-start; margin-top: 5px;">
                    <!-- Shop label and name (on the left) -->
                    <div style="flex: 1; display: flex; flex-direction: column;">
                        <label style="color:#9796a1; margin-bottom: 5px;">Shop</label>
                        <span class="shop-name" style="margin-top: 5px;">${shopName}</span>
                    </div>

                    <!-- Remarks label and input (on the right) -->
                    <div style="flex: 1; display: flex; flex-direction: column;">
                        <label style="color:#9796a1; margin-bottom: 5px;">Remarks:</label>
                        <input type="text" placeholder="Remarks" class="remarks-input form-control" style="padding: 5px;" value="">
                    </div>
                </div>

                <!-- Remove button taking the full width of the container -->
                <button class="remove-shop-btn btn btn-danger btn-sm" style="width: 100%; margin-top: 10px;">Remove</button>
            </div>
        `;

        // Append to the added shop list
        $('#addedShopList').append(shopItem);

        // Also append to the modal shop list
        $('#modalShopsList').append(shopItem);

        // Show the modal
        $('#editShopsModal').modal('show');

        // Attach event listener for the remove button in both the list and the modal
        $('.remove-shop-btn').click(function () {
            $(this).closest('.shop-item').remove();
        });
    } else {
        alert('Please select a shop.');
    }
});



function populateModal(shops) {
    let modalHtml = '';
    $.each(shops, function(index, shop) {
        modalHtml += `
            <div class="shop-item" data-shop-id="${shop.shop_uid}" style="margin-bottom: 10px;">
    <div style="display: flex; align-items: flex-start; margin-top: 5px;">
        <!-- Shop label and name (on the left) -->
        <div style="flex: 1; display: flex; flex-direction: column;">
            <label style="color:#9796a1; margin-bottom: 5px;">Shop</label>
            <span class="shop-name" style="margin-top: 5px;">${shop.shop_name}</span>
        </div>

        <!-- Remarks label and input (on the right) -->
        <div style="flex: 1; display: flex; flex-direction: column;">
            <label style="color:#9796a1; margin-bottom: 5px;">Remarks:</label>
            <input type="text" class="remarks-input form-control" style="padding: 5px;" value="${shop.shop_remarks}">
        </div>
    </div>

    <!-- Remove button taking the full width of the container -->
    <button class="close-shop-btn btn btn-danger btn-sm" style="width: 100%; margin-top: 10px;" onclick="removeShop(${shop.shop_uid})">X</button>
</div>
        `;
    });
    $('#modalShopsList').html(modalHtml);
}
function removeShop(shopId) {
    $(`[data-shop-id=${shopId}]`).remove(); // Remove the shop item from both modal and list
}

// Open the modal when the "View Shops" button is clicked
$('#view_shops').click(function() {
    $('#editShopsModal').modal('show'); // Show the modal
});

$(document).on('click', '.close-shop-btn', function () {
    var shopId = $(this).closest('.shop-item').data('shop-id');
    removeShop(shopId);
});


// Event listener to remove a shop
function removeShop(shopId) {
    $(`[data-shop-id=${shopId}]`).remove(); // Remove the shop item from both modal and list
}
$(document).on('click', '.close', function() {
        $('#editShopsModal').modal('hide');
    });

    $(document).on('click', '.close-modal', function() {
        $('#editShopsModal').modal('hide');
    });

</script>
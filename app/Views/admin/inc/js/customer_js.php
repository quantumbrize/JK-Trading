<script>
    $(document).ready(function() {
        customers()
    });
    let shopData = [];
    let monthly_sales_data = [];
    load_all_shop()

    // function customers() {
    //     $.ajax({
    //         url: "<?= base_url('/api/customers') ?>",
    //         type: "GET",
    //         // beforeSend: function () {
    //         //     $('#table-banner-list-all-body').html(`<tr >
    //         //             <td colspan="7"  style="text-align:center;">
    //         //                 <div class="spinner-border" role="status"></div>
    //         //             </td>
    //         //         </tr>`)
    //         // },
    //         success: function (resp) {
    //             if (resp.status) {
    //                 console.log(resp)
    //                     let html = ``
    //                     $.each(resp.user_data, function (index, user) {
    //                         // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
    //                         var image = `https://usercontent.one/wp/www.vocaleurope.eu/wp-content/uploads/no-image.jpg?media=1642546813`
    //                         if(user.user_img != null){
    //                             image = `<?= base_url('public/uploads/user_images/') ?>${user.user_img.img}`
    //                         }
    //                         var joining_date = new Date(user.created_at)
    //                         var formatted_date = joining_date.toLocaleString('en-US', { weekday: 'short', month: 'short', day: '2-digit', year: 'numeric' });
    //                         var status_color = 'text-danger'
    //                         if(user.status == "active"){
    //                             status_color = 'text-success'
    //                         }
                            
    //                         console.log('users',user)
    //                         html += `<tr>
    //                                         <th scope="row">
    //                                             <div class="form-check">
    //                                                 <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
    //                                             </div>
    //                                         </th>
    //                                         <td >
    //                                             <img src="${image}" alt="" class="product-img" style="width: 80px; height: 80px;  border-radius: 50%; overflow: hidden;">
    //                                         </td>
    //                                         <td >
    //                                             ${user.user_name}
    //                                         </td>
    //                                         <td >
    //                                             ${user.number}
    //                                         </td>
    //                                         <td >
    //                                             ${user.email}
    //                                         </td>
    //                                         <td >
    //                                             ${formatted_date}
    //                                         </td>
    //                                         <td>
    //                                             ${user.yearly_total_sale}
    //                                         </td>
    //                                         <td>
    //                                             <select class="form-select form-select-sm monthly-sale-dropdown" 
    //                                                     data-sales-person-uid="${user.uid}" 
    //                                                     onchange="fetchMonthlySale(this)">
    //                                                 <option value="" disabled selected>Select Month</option>
    //                                                 <option value="January">January</option>
    //                                                 <option value="February">February</option>
    //                                                 <option value="March">March</option>
    //                                                 <option value="April">April</option>
    //                                                 <option value="May">May</option>
    //                                                 <option value="June">June</option>
    //                                                 <option value="July">July</option>
    //                                                 <option value="August">August</option>
    //                                                 <option value="September">September</option>
    //                                                 <option value="October">October</option>
    //                                                 <option value="November">November</option>
    //                                                 <option value="December">December</option>
    //                                             </select>
    //                                             <div class="monthly-sale-result" style="margin-top: 5px; font-weight: bold; font-size: 12px;">
    //                                                 <!-- Monthly Sale will be displayed here -->
    //                                             </div>
    //                                         </td>
    //                                         <td>
    //                                             ${user.yearly_total_sale}
    //                                         </td>
                                            
    //                                         <td class="status">
    //                                             <span class="badge bg-success-subtle ${status_color} text-uppercase">${user.status}</span>
    //                                         </td>
                                            
    //                                         <td>
    //                                             <ul class="list-inline hstack gap-2 mb-0">
    //                                                 <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"  title="Edit">
    //                                                     <a href="#showModal" data-bs-toggle="modal" onclick="single_customer('${user.uid}')" class="text-primary d-inline-block edit-item-btn">
    //                                                         <i class="ri-pencil-fill fs-16"></i>
    //                                                     </a>
    //                                                 </li>
    //                                                 <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
    //                                                     <a class="text-danger d-inline-block remove-item-btn" href="#" onclick="open_delete_modal('${user.uid}')">
    //                                                         <i class="ri-delete-bin-5-fill fs-16"></i>
    //                                                     </a>
    //                                                 </li>
    //                                             </ul>
    //                                         </td>

    //                                     </tr>`
    //                     })
    //                     $('#table_data').html(html)
    //                     // $('#table-banner-list-all').DataTable();
    //             }else{
    //                 $('#table-banner-list-all-body').html(`<tr >
    //                     <td>
    //                         DATA NOT FOUND!
    //                     </td>
    //                 </tr>`)
    //             }

    //         },
    //         error: function (err) {
    //             console.log(err)
    //         },
    //         // complete: function () {
               
    //         // }
    //     })
    // }
    function customers() {
        $.ajax({
            url: "<?= base_url('/api/customers') ?>",
            type: "GET",
            // beforeSend: function () {
            //     $('#table-banner-list-all-body').html(`<tr >
            //             <td colspan="7"  style="text-align:center;">
            //                 <div class="spinner-border" role="status"></div>
            //             </td>
            //         </tr>`)
            // },
            success: function (resp) {
                if (resp.status) {
                    console.log('userda',resp)
                        $('#all_user_count').html(resp.user_data.length)
                        let html = ``
                        $.each(resp.user_data, function (index, user) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            var image = `https://usercontent.one/wp/www.vocaleurope.eu/wp-content/uploads/no-image.jpg?media=1642546813`
                            if(user.user_img != null){
                                image = `<?= base_url('public/uploads/user_images/') ?>${user.user_img.img}`
                            }
                            var joining_date = new Date(user.created_at)
                            var formatted_date = joining_date.toLocaleString('en-US', { weekday: 'short', month: 'short', day: '2-digit', year: 'numeric' });
                            var status_color = 'text-danger'
                            if(user.status == "active"){
                                status_color = 'text-success'
                            }
                            
                            console.log('users',user)
                            html += `<tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                            </div>
                                        </th>
                                        <td>
                                            <img src="${image}" alt="" class="product-img" style="width: 80px; height: 80px;  border-radius: 50%; overflow: hidden;">
                                        </td>
                                        <td>
                                            ${user.user_name}
                                        </td>
                                        <td>
                                            ${user.number}
                                        </td>
                                        <td>
                                            ${user.email}
                                        </td>
                                        <td>
                                            ${formatted_date}
                                        </td>
                                        <td>
                                            ${user.yearly_total_sale}
                                        </td>
                                        <td>
                                            <select class="form-select form-select-sm monthly-sale-dropdown" 
                                                    data-sales-person-uid="${user.uid}" 
                                                    onchange="fetchMonthlySale(this)">
                                                <option value="" disabled selected>Select Month</option>
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
                                            <div class="monthly-sale-result" style="margin-top: 5px; font-weight: bold; font-size: 12px;">
                                                <!-- Monthly Sale will be displayed here -->
                                            </div>
                                        </td>
                                        <td>
                                            ${user.ongoing_month_sale}
                                        </td>
                                        <td>
                                            <button class="btn btn-info" onclick="showRouteDetails('${user.uid}')">View Days and Route</button>
                                        </td>
                                        <td class="status">
                                            <span class="badge bg-success-subtle ${status_color} text-uppercase">${user.status}</span>
                                        </td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                                <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                    <a href="#showModal" data-bs-toggle="modal" onclick="single_customer('${user.uid}')" class="text-primary d-inline-block edit-item-btn">
                                                        <i class="ri-pencil-fill fs-16"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                    <a class="text-danger d-inline-block remove-item-btn" href="#" onclick="open_delete_modal('${user.uid}')">
                                                        <i class="ri-delete-bin-5-fill fs-16"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                        
                                    </tr>`;

                        })
                        $('#table_data').html(html)
                        // $('#table-banner-list-all').DataTable();
                }else{
                    $('#table-banner-list-all-body').html(`<tr >
                        <td>
                            DATA NOT FOUND!
                        </td>
                    </tr>`)
                }

            },
            error: function (err) {
                console.log(err)
            },
            // complete: function () {
               
            // }
        })
    }

    function single_customer(uid) {
        user_id=uid
        
        $.ajax({
            url: "<?= base_url('/api/customers') ?>",
            type: "GET",
            data:{uid:user_id},
            // beforeSend: function () {
            //     $('#table-banner-list-all-body').html(`<tr >
            //             <td colspan="7"  style="text-align:center;">
            //                 <div class="spinner-border" role="status"></div>
            //             </td>
            //         </tr>`)
            // },
            success: function (resp) {
                if (resp.status) {
                    console.log('single_user',resp)
                    const monthlySales = resp.monthly_sales;
                    const shops = resp.sales_person_shop; 
                        let html = ``
                       $("#customername-field").val(resp.user_data.user_name)
                       $("#email-field").val(resp.user_data.email)
                       $("#phone-field").val(resp.user_data.number)
                       $("#date-field").val(resp.user_data.created_at)
                       $("#status-field").val(resp.user_data.status)
                       $("#yearly_total_sale").val(resp.user_data.yearly_total_sale)
                       $("#ongoing_month_sale").val(resp.user_data.ongoing_month_sale)
                       $("#current_uid").val(resp.user_data.uid)


                       const monthlySalesList = $('#sales_month_list');
                monthlySalesList.empty(); // Clear any existing data

                // Add each month and sale to the list
                if (monthlySales && monthlySales.length > 0) {
                    monthlySales.forEach(function (sale) {
                        console.log('monthly',sale)
                        const saleItem = `
                            <li class="list-group-item">
                                ${sale.month} - Sale: ${sale.sales}
                                <button type="button" class="btn btn-danger btn-sm float-end remove-sale">Remove</button>
                            </li>
                        `;
                        monthlySalesList.append(saleItem);
                    });

                    // Show the Monthly Sales section if it contains data
                    $('#monthly_sales_list').show();
                    } else {
                        $('#monthly_sales_list').hide(); // Hide if no data
                    }

                    // Populate the Shop List
                    const addedShopList = $('#addedShopList');
                    // addedShopList.empty(); // Clear any existing data

                    if (shops && shops.length > 0) {
                        shops.forEach(function (shop, index) {
                            const shopItem = `
                                <div class="shop-item" data-shop-index="${index}" data-shop-uid="${shop.shop_uid}">
                                    <div><strong>Shop Name:</strong> ${shop.shop_name || 'N/A'}</div>
                                    <div><strong>Owner Name:</strong> ${shop.owner_name || 'N/A'}</div>
                                    <div><strong>Owner Rating:</strong> ${shop.owner_rating || 'N/A'}</div>
                                    <button type="button" class="btn btn-danger btn-sm remove-shop remove-shop-btn">Remove Shop</button>
                                    <hr/>
                                </div>
                            `;
                            let shopdatalength = shopData.length;
                            shopData.push({
                                shop_uid: shop.shop_uid,
                                shop_name: shop.shop_name,
                                owner_name: shop.owner_name,
                                owner_rating: shop.owner_rating,
                                index: shopdatalength + 1
                            });
                            addedShopList.append(shopItem);
                        });

                        // Show the added shops section if shops are available
                        $('#addedShopList').show();
                    } else {
                        // If no shops are available, hide the section
                        $('#addedShopList').hide();
                    }
                        // $('#table_data').html(html)
                        // $('#table-banner-list-all').DataTable();
                }else{
                    $('#table-banner-list-all-body').html(`<tr >
                        <td>
                            DATA NOT FOUND!
                        </td>
                    </tr>`)
                }

            },
            error: function (err) {
                console.log(err)
            },
            // complete: function () {
               
            // }
        })
    }

    

    var customer_id = ""
    var flag = false
    function open_delete_modal(c_id){
        customer_id = c_id
        $('#deleteRecordModal').modal('show')
    }

    function delet_customer() {
        // alert(customer_id)
        $.ajax({
            url: "<?= base_url('/api/delete/customer') ?>",
            type: "GET",
            data:{user_id:customer_id},
            beforeSend: function () {
                    $('#delete-record').html(`<div class="spinner-border" role="status"></div>`)
                    $('#delete-record').attr('disabled', true)

                },
            success: function (resp) {
                if (resp.status) {
                    console.log(resp)
                    $('#deleteRecordModal').modal('hide')
                    customers()
                }else{
                    console.log(resp)
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
                    $('#delete-record').html(`Yes, Delete It!`)
                    $('#delete-record').attr('disabled', false)
                }
        })
    }
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
                            // Ensure we are correctly capturing the shop name, owner name, and rating
                            html += `<option value="${shop.uid}" 
                                            data-owner-name="${shop.owner_name}" 
                                            data-owner-rating="${shop.owner_rating}">
                                            ${shop.shop_name} - ${shop.owner_name} (Rating: ${shop.owner_rating})
                                    </option>`;
                        });
                        $('#shop').html(html);  // Populate the shop dropdown with the options
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
    function fetchMonthlySale(selectElement) {
        var selectedMonth = $(selectElement).val(); // Get selected month
        var salesPersonUID = $(selectElement).data('sales-person-uid'); // Get sales person UID
        var resultContainer = $(selectElement).siblings('.monthly-sale-result'); // Where to display result

        if (selectedMonth && salesPersonUID) {
            $.ajax({
                url: "<?= base_url('/api/sales_person/monthly_sale') ?>", // New API endpoint
                type: "GET",
                data: {
                    uid: salesPersonUID,
                    month: selectedMonth
                },
                beforeSend: function () {
                    resultContainer.html(`<div class="spinner-border spinner-border-sm" role="status"></div>`);
                },
                success: function (resp) {
                    console.log(resp);
                    if (resp.status) {
                        resultContainer.html(`Sales: ${resp.data.sales}`);
                    } else {
                        resultContainer.html(`No data for ${selectedMonth}`);
                    }
                },
                error: function (err) {
                    console.error(err);
                    resultContainer.html(`Error fetching data.`);
                }
            });
        }
    }
     // Initialize an array to store monthly sales data

// Add Monthly Sale Button click handler
$('#add_monthly_sale_button').on('click', function() {
    let month = $('#current_month').val();
    let sale = $('#monthly_total_sale').val();

    if (month && sale) {
        // Add the new sales data to the array
        monthly_sales_data.push({ month: month, sale: sale });

        // Update the displayed list of monthly sales
        updateMonthlySalesList();

        // Clear the input fields after adding
        $('#current_month').val('');
        $('#monthly_total_sale').val('');
    } else {
        alert('Please select a month and enter a sale amount.');
    }
});

// Remove the selected sale from the list
$(document).on('click', '.remove-sale', function() {
    $(this).closest('li').remove();

    // If no items are left in the list, hide the Monthly Sales section
    if ($('#sales_month_list li').length === 0) {
        $('#monthly_sales_list').hide();
    }
});
function updateMonthlySalesList() {
    let salesList = $('#sales_month_list');
    salesList.empty(); // Clear the existing list

    // Populate the list with monthly sales data
    monthly_sales_data.forEach(function(item) {
        salesList.append(`<li class="list-group-item">${item.month}: $${item.sale}</li>`);
    });

    // Show the list if there are any entries
    if (monthly_sales_data.length > 0) {
        $('#monthly_sales_list').show();
    } else {
        $('#monthly_sales_list').hide();
    }
}
$('#add_shop').click(function (e) {
    e.preventDefault(); // Prevent default form submission behavior

    // Get selected shop information
    const shopId = $('#shop').val();
    const fullShopName = $('#shop option:selected').text(); // This includes owner_name and rating

    // Only extract the shop name from the full name (e.g., "esdit - adas (Rating: 2)" -> "esdit")
    const shopName = fullShopName.split(" - ")[0].trim(); // Extracting only the shop name part

    // Get owner name and owner rating for display purposes (not to be saved)
    const shopOwnerName = $('#shop option:selected').data('owner-name');
    const shopOwnerRating = $('#shop option:selected').data('owner-rating');

    if (shopId && shopName) {
        // Check if the shop is already added
        const existingShop = $(`#addedShopList .shop-item[data-shop-id="${shopId}"]`);
        if (existingShop.length > 0) {
            alert('This shop is already added.');
            return;
        }

        // Push the shop data into the array
        let shopdatalength = shopData.length;
        shopData.push({
            shop_uid: shopId,
            shop_name: shopName,
            owner_name: shopOwnerName,
            owner_rating: shopOwnerRating,
            index: shopdatalength + 1
        });

        // Create shop display element with owner name, rating, and hidden UID
        const shopItem = `
            <div class="shop-item" data-shop-id="${shopId}" data-owner-name="${shopOwnerName}" data-owner-rating="${shopOwnerRating}" style="margin-bottom: 10px;">
                <span class="shop-name"><b>Shop Name:</b> ${shopName}</span> <br> <!-- Only the shop name will be displayed -->
                <span class="owner-info"><b>Owner Name:</b> ${shopOwnerName}</span><br>
                <span> <b>Owner Rating:</b> ${shopOwnerRating}</span><br>
                <input type="hidden" class="shop_uid" name="shop_uids[]" value="${shopId}">
                <input type="hidden" class="shop_name" name="shop_uids[]" value="${shopName}"> 
                <input type="hidden" class="owner_name" name="shop_uids[]" value="${shopOwnerName}">   <!-- Hidden input to hold shop UID -->
                <input type="hidden" class="owner_rating" name="shop_uids[]" value="${shopOwnerRating}">   <!-- Hidden input to hold shop UID -->
                <button class="remove-shop-btn btn btn-danger btn-sm" style="margin-left: 10px;">Remove</button>
            </div>
        `;

        // Append to the added shop list
        $('#addedShopList').append(shopItem);

        // Attach event listener for the remove button
        $('.remove-shop-btn').off('click').on('click', function () {
            const shopItem = $(this).closest('.shop-item');
            const shopId = shopItem.data('shop-id'); // Get the shop ID of the clicked item
            
            // Remove the shop item from the DOM
            shopItem.remove();

            // Find the index of the shop in the shopData array and remove it
            const shopIndex = shopData.findIndex(shop => shop.shop_uid === shopId);
            if (shopIndex !== -1) {
                shopData.splice(shopIndex, 1); // Remove the shop from the array
                console.log("Removed shop with UID:", shopId);
            }
        });
    } else {
        alert('Please select a shop.');
    }
});





// Event listener to remove a shop
$(document).on('click', '.remove-shop-btn', function () {
    const shopItem = $(this).closest('.shop-item');
    const shopUid = shopItem.data('shop-uid'); // Get the shop_uid of the clicked shop

    // Remove the shop item from the DOM
    shopItem.remove();

    // Find and remove the corresponding shop from the shopData array
    const shopIndex = shopData.findIndex(shop => shop.shop_uid === shopUid);
    if (shopIndex !== -1) {
        shopData.splice(shopIndex, 1); // Remove the shop from the array
        console.log("Removed shop with UID:", shopUid);
    }
});


$(document).ready(function() {
    // Attach event listener to the button
    $('#add-btn').on('click', function(event) {
        event.preventDefault(); // Prevent default form submission
        sales_person_update(); // Call the function
    });
});

function sales_person_update() {
    var formData = new FormData();

    // Append main sales person data
    formData.append('sales_person_name', $('#customername-field').val());
    formData.append('sales_person_email', $('#email-field').val());
    formData.append('sales_person_phone', $('#phone-field').val());
    formData.append('date-field', $('#date-field').val());
    formData.append('status-field', $('#status-field').val());
    // formData.append('status', $('#status-field').val());
    formData.append('yearly_total_sale', $('#yearly_total_sale').val());
    formData.append('ongoing_month_sale', $('#ongoing_month_sale').val());
    formData.append('sales_person_uid', $('#current_uid').val());
    formData.append('monthly_sales_data', JSON.stringify(monthly_sales_data));
    const locationData = [];
    $('#addedRouteList .added-location').each(function() {
        // Extract the days and route text while excluding the 'Remove' button or any extra text
        const locationText = $(this).children('p').text().trim(); // Only get text from the <p> tags, assuming they contain the location and route info

        // Split text by some delimiter (assuming "Location: Monday, Tuesday, Route: Route 1")
        const daysRoute = locationText.split('Route:');
        if (daysRoute.length === 2) {
            const days = daysRoute[0].replace('Location:', '').trim();  // Remove "Location:" and trim
            const route = daysRoute[1].trim();  // Trim route
            locationData.push({ days, route });
        }
    });

    if (locationData.length > 0) {
        // Append the location data (array of objects) to the form
        formData.append('location_data', JSON.stringify(locationData)); // Send as JSON string
    } else {
        alert('Please add at least one location (Days and Route).');
        return; // Stop the function if no locations are added
    }

    // alert("Location Data: " + JSON.stringify(locationData)); // Check the captured location data

    console.log("Submitting Form Data: ", Object.fromEntries(formData));

    // Collect shop data
    // Collect shop data
    
    $('#addedShopList .shop-item').each(function () {
        const shopId = $(this).data('shop-id');
        const shopName = $(this).find('.shop-name').text().trim();  // Ensure trim() works on text
        const ownerName = $(this).data('owner-name');  // Ensure owner_name is a string
        const ownerRating = $(this).data('owner-rating');  // Ensure owner_rating is a string

       
    });

   
console.log('shopData',shopData)

    // Append shop data as JSON string
    formData.append('shop_data', JSON.stringify(shopData));

    // Send the data via AJAX request
    $.ajax({
        url: "<?= base_url('/api/update/sales_person') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('#sales_person_update').html(`<div class="spinner-border" role="status"></div>`);
            $('#sales_person_update').attr('disabled', true);
        },
        success: function (resp) {
            let html = '';
            if (resp.status) {
                html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                            <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
                location.reload();
            } else {
                html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                            <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`;
            }

            $('#alert').html(html);
            console.log(resp);
            
        },
        error: function (err) {
            console.log(err);
        },
        complete: function () {
            $('#sales_person_update').html('Save Changes');
            $('#sales_person_update').attr('disabled', false);
        }
    });
}
function showRouteDetails(userId) {
    $.ajax({
        url: `<?= base_url('/api/getSalesPersonRoute/') ?>`,
        type: "GET",
        data: { uid: userId },
        success: function (resp) {
            if (resp.status) {
                // Generate the HTML for the routes and days
                let routeHtml = "<ul>";
                $.each(resp.sales_person_route, function (index, route) {
                    routeHtml += `<li> <strong>Day:</strong> ${route.days} <strong>Route:</strong> ${route.route}</li>`;
                });
                routeHtml += "</ul>";

                // Inject the content into the modal
                $('#routeDetailsModal .modal-body').html(routeHtml);
                $('#routeDetailsModal').modal('show');
            } else {
                // If no data, show a message
                $('#routeDetailsModal .modal-body').html('<p>No route data available for this user.</p>');
                $('#routeDetailsModal').modal('show');
            }
        },
        error: function (err) {
            console.error("Error fetching route details:", err);
            $('#routeDetailsModal .modal-body').html('<p>Failed to fetch route details. Please try again later.</p>');
            $('#routeDetailsModal').modal('show');
        }
    });
}
function addLocation() {
    // Get the values from the input fields for Days and Route
    const days = document.getElementById('days').value;
    const route = document.getElementById('route').value;

    // Check if both location (days) and route are provided
    if (days && route) {
        // Create a new div element to display the location and route
        const locationDiv = document.createElement('div');
        locationDiv.classList.add('added-location');
        locationDiv.style.marginBottom = '10px'; // Optional: Add margin for spacing between entries
        
        // Create a new paragraph element to display the location and route
        const locationText = document.createElement('p');
        locationText.textContent = `Location: ${days}  Route: ${route}`;
        
        // Create a button to remove the location
        const removeButton = document.createElement('button');
        removeButton.classList.add('btn', 'btn-danger');
        removeButton.textContent = 'Remove';
        
        // Add an event listener to the remove button
        removeButton.addEventListener('click', function() {
            locationDiv.remove();
        });

        // Append the location text and remove button to the location div
        locationDiv.appendChild(locationText);
        locationDiv.appendChild(removeButton);
        
        // Get the container where locations will be displayed
        const locationContainer = document.getElementById('addedRouteList');
        
        // Append the new location div to the container
        locationContainer.appendChild(locationDiv);
        
        // Clear the input fields after adding
        document.getElementById('days').value = '';
        document.getElementById('route').value = '';
    } else {
        // Optionally, you can display an alert or message if either field is empty
        alert('Please enter both Location (Days) and Route');
    }
}

// Attach event listener to the Add Location button
document.getElementById('add_location').addEventListener('click', addLocation);


</script>
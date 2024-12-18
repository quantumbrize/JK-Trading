<script>
    let shopData = [];
    load_all_sales_person()
    load_all_shop()
    function load_all_sales_person() {
        $.ajax({
            url: "<?= base_url('/api/all/sales_person') ?>",
            type: "GET",
            beforeSend: function () {
                $('#sales_person_list_body').html(`<tr >
                        <td colspan="7"  style="text-align:center;">
                            <div class="spinner-border" role="status"></div>
                        </td>
                    </tr>`)
            },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    if (resp.data.length > 0) {
                        $('#all_banner_count').html(resp.data.length)
                        let html = ``
                        console.log(resp)
                        $.each(resp.data, function (index, sales_person) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            html += `<tr>
                                            <td>
                                                ${index+1}
                                            </td>
                                            <td>
                                                ${sales_person.name}
                                            </td>
                                            <td>
                                                ${sales_person.yearly_total_sale}
                                            </td>
                                           <td>
                                                <select class="form-select form-select-sm monthly-sale-dropdown" 
                                                        data-sales-person-uid="${sales_person.uid}" 
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
                                                ${sales_person.ongoing_month_sale}
                                            </td>
                                            
                                            <td>
                                                <i class="fa fa-edit btn btn-info" id="edit_sales_person" data-bs-toggle="modal" data-bs-target="#exampleModal" data-sales-person-uid="${sales_person.uid}"></i>

                                                <input type='hidden' id="sales_person_uid" value="${sales_person.uid}">
                                                
                                                
                                            </td>
                                            <td>
                                                <i class="fa fa-trash btn btn-danger" id="delete_sales_person"></i>
                                                 <input type='hidden' id="sales_person_uid_delete" value="${sales_person.uid}">
                                            </td>
                                            

                                        </tr>`
                        })
                        $('#sales_person_list_body').html(html)
                        $('#sales_person_list').DataTable();
                    }
                }else{
                    $('#sales_person_list_body').html(`<tr >
                        <td>
                            DATA NOT FOUND!
                        </td>
                    </tr>`)
                }

            },
            error: function (err) {
                console.log(err)
            },
            complete: function () {
               
            }
        })
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
function fetchAndPopulateSalesPersonData(salesPersonUid) {
    console.log("Fetching data for UID:", salesPersonUid); // Log to confirm UID

    $.ajax({
        url: "<?= base_url()?>single_sales_person", // Your endpoint to fetch data
        type: "GET",
        data: { uid: salesPersonUid }, // Pass UID to the server
        beforeSend: function () {
            // Optional: Add a loading spinner or something similar
        },
        success: function (resp) {
            // Ensure response contains the expected keys
            if (resp.status) {
                console.log("Response from server:", resp);
                const person = resp.data.person;
                const monthlySales = resp.data.monthly; // The monthly sales data
                const shops = resp.data.shop; // Shops data containing shop_name, owner_name, owner_rating

                console.log('shops', shops);
                // Populate the modal fields with the fetched data
                $('#sales_person_name').val(person.name || '');
                $('#yearly_total_sale').val(person.yearly_total_sale || '');
                $('#ongoing_month_sale').val(person.ongoing_month_sale || '');
                $('#current_uid').val(person.uid || '');

                // Set the current month dropdown based on available data (if any)
                // $('#current_month').val(person.current_month || '').change();

                // Populate the Monthly Sales List
                const monthlySalesList = $('#sales_month_list');
                monthlySalesList.empty(); // Clear any existing data

                // Add each month and sale to the list
                if (monthlySales && monthlySales.length > 0) {
                    monthlySales.forEach(function (sale) {
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

                // Show the modal
                $('#exampleModal').modal('show');
            } else {
                // Handle the case where the response is not valid or missing the data
                console.error("Invalid data structure or missing data:", resp);
                alert('Error: Could not fetch the sales person data.');
                $('#exampleModal .modal-body').html('<p>Error fetching data.</p>');
            }
        },
        error: function (err) {
            console.error("Error fetching sales person data:", err); // Log the error
            alert('An error occurred while fetching the data.');
            $('#exampleModal .modal-body').html('<p>Error fetching data.</p>');
        },
        complete: function () {
            // Optional: Hide loading spinner or something similar
        }
    });
}





// Example of how you can trigger the fetch when clicking the edit button
$(document).on('click', '#edit_sales_person', function () {
    const salesPersonUid = $(this).data('sales-person-uid'); // Correctly fetch UID from data attribute
    console.log('Fetching data for UID:', salesPersonUid); // Log to ensure UID is correct
    fetchAndPopulateSalesPersonData(salesPersonUid);
});



let monthly_sales_data = []; // Initialize an array to store monthly sales data

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

$(document).ready(function() {
    // Attach event listener to the button
    $('#sales_person_update').on('click', function(event) {
        event.preventDefault(); // Prevent default form submission
        sales_person_update(); // Call the function
    });
});

function sales_person_update() {
    var formData = new FormData();

    // Append main sales person data
    formData.append('sales_person_name', $('#sales_person_name').val());
    formData.append('yearly_total_sale', $('#yearly_total_sale').val());
    formData.append('ongoing_month_sale', $('#ongoing_month_sale').val());
    formData.append('sales_person_uid', $('#current_uid').val());
    formData.append('monthly_sales_data', JSON.stringify(monthly_sales_data));

    // Collect shop data
    // Collect shop data
    
    $('#addedShopList .shop-item').each(function () {
        const shopId = $(this).data('shop-id');
        const shopName = $(this).find('.shop-name').text().trim();  // Ensure trim() works on text
        const ownerName = $(this).data('owner-name');  // Ensure owner_name is a string
        const ownerRating = $(this).data('owner-rating');  // Ensure owner_rating is a string

        // shopData.push({
        // // Ensure values are not empt
        //     shop_uid: shopId,
        //     shop_name: shopName || '',  // Default to empty string if missing
        //     owner_name: ownerName || '',  // Default to empty string if missing
        //     owner_rating: ownerRating || ''  // Default to empty string if missing
            
        // });
    });

    // $('.shop_uid').each(function() {
    //     if($(this).val() == ""){
    //         flag = false
    //     }else{
    //         shopData.push({
    //             shop_uid: $(this).val(),
    //         });
            
    //     }
        
    // });
    // $('.shop_name').each(function() {
        
    //         shopData.push({
    //             shop_name: $(this).val(),
    //         });
            
        
        
    // });
//     $('.owner_name').each(function() {
        
//         shopData.push({
//             owner_name: $(this).val(),
//         });
        
    
    
// });
// $('.owner_rating').each(function() {
        
//         shopData.push({
//             owner_rating: $(this).val(),
//         });
        
    
    
// });
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



$(document).on('click', '#delete_sales_person', function () {
    // Store the reference to the clicked delete button
    var deleteButton = $(this);
    
    // Get the UID of the sales person to be deleted
    var salesPersonUid = deleteButton.closest('tr').find('input#sales_person_uid_delete').val();
    console.log('Sales Person UID:', salesPersonUid);

    // Confirm the deletion action
    if (confirm('Are you sure you want to delete this sales person?')) {
        $.ajax({
            url: "<?= base_url('/api/delete/sales_person') ?>",
            type: "POST",
            data: { sales_person_uid: salesPersonUid },
            beforeSend: function () {
                // Optionally show a loading spinner or disable the button
                deleteButton.attr('disabled', true);
            },
            success: function (resp) {
                if (resp.status) {
                    // On success, remove the row from the table
                    alert(resp.message); // Optionally show a success message
                    deleteButton.closest('tr').remove(); // Remove the deleted row
                } else {
                    alert(resp.message); // Show an error message if deletion failed
                }
            },
            error: function (err) {
                console.log(err);
                alert('There was an error processing your request. Please try again later.');
            },
            complete: function () {
                // Enable the button again after the request is complete
                deleteButton.attr('disabled', false);
            }
        });
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








</script>
<script>
    load_all_shop()
    let monthly_sales_data = []; // Array to store added month-sales data

    function add_monthly_sale() {
    const month = document.getElementById('current_month').value;
    const sale = document.getElementById('monthly_total_sale').value;

    // Validate month and sale input
    if (!month) {
        alert("Please select a month.");
        return;
    }
    if (!sale || sale <= 0) {
        alert("Please enter a valid monthly sale amount.");
        return;
    }

    // Prevent adding duplicate months
    const isDuplicate = monthly_sales_data.some(entry => entry.month === month);
    if (isDuplicate) {
        alert("This month is already added. Please update it if needed.");
        return;
    }

    // Add the data to the monthly_sales_data array
    monthly_sales_data.push({ month: month, sale: sale });

    // Display the added data in the list
    update_monthly_sales_list();

    // Reset inputs
    document.getElementById('current_month').value = "";
    document.getElementById('monthly_total_sale').value = "";
}


    function update_monthly_sales_list() {
        const salesList = document.getElementById('monthly_sales_list');
        salesList.innerHTML = ""; // Clear previous list

        // Populate the updated list
        monthly_sales_data.forEach((entry, index) => {
            salesList.innerHTML += `
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>${entry.month}: ${entry.sale}</span>
                    <button class="btn btn-sm btn-danger" onclick="remove_monthly_sale(${index})">Remove</button>
                </li>
            `;
        });
    }

    function remove_monthly_sale(index) {
        // Remove the selected entry and update the display
        monthly_sales_data.splice(index, 1);
        update_monthly_sales_list();
    }

    // function sales_persons_add() {
    //     const formData = new FormData();

    //     // Append primary data
    //     formData.append('sales_person_name', document.getElementById('sales_person_name').value);
    //     formData.append('yearly_total_sale', document.getElementById('yearly_total_sale').value);
    //     formData.append('ongoing_month_sale', document.getElementById('ongoing_month_sale').value);
    //     formData.append('customer_email', document.getElementById('customer_email').value);
    //     formData.append('customer_Phone', document.getElementById('customer_Phone').value);
    //     formData.append('date-field', document.getElementById('date-field').value);
    //     formData.append('status-field', document.getElementById('status-field').value);
    //     formData.append('type-field', document.getElementById('type-field').value);

    //     // Append month-sale data as JSON string
    //     formData.append('monthly_sales_data', JSON.stringify(monthly_sales_data));

    //     // Collect all selected shop data (uid, name, owner_name, and owner_rating) from the added shop list
    //     const shopData = [];
    //     $('#addedShopList .shop-item').each(function () {
    //         const shopId = $(this).data('shop-id');
    //         const shopName = $(this).find('.shop-name').text(); // Shop name only
    //         const shopOwnerName = $(this).data('owner-name');  // Owner name
    //         const shopOwnerRating = $(this).data('owner-rating');  // Owner rating

    //         shopData.push({
    //             shop_uid: shopId,
    //             shop_name: shopName,
    //             owner_name: shopOwnerName,  // Include owner name
    //             owner_rating: shopOwnerRating  // Include owner rating
    //         });
    //     });

    //     if (shopData.length > 0) {
    //         // Append the shop data (array of objects) to the form
    //         formData.append('shop_data', JSON.stringify(shopData)); // Send as JSON string
    //     } else {
    //         alert('Please add at least one shop.');
    //         return; // Stop the function if no shops are added
    //     }

    //     console.log("Submitting Form Data: ", Object.fromEntries(formData));

    //     // Send AJAX request
    //     $.ajax({
    //         url: "<?= base_url('/api/add/sales_person') ?>",
    //         type: "POST",
    //         data: formData,
    //         contentType: false,
    //         processData: false,
    //         beforeSend: function () {
    //             $('#sales_person_add_btn').html(`<div class="spinner-border" role="status"></div>`);
    //             $('#sales_person_add_btn').attr('disabled', true);
    //         },
    //         success: function (resp) {
    //             let alertHtml = resp.status
    //                 ? `<div class="alert alert-success">${resp.message}</div>`
    //                 : `<div class="alert alert-danger">${resp.message}</div>`;

    //             $('#alert').html(alertHtml);
    //             console.log("Server Response: ", resp);

    //             if (resp.status) location.reload();
    //         },
    //         error: function (err) {
    //             console.error("Error: ", err);
    //         },
    //         complete: function () {
    //             $('#sales_person_add_btn').html(`Submit`);
    //             $('#sales_person_add_btn').attr('disabled', false);
    //         }
    //     });
    // }
    function sales_persons_add() {
        const formData = new FormData();

        // Append primary data
        formData.append('sales_person_name', document.getElementById('sales_person_name').value);
        formData.append('yearly_total_sale', document.getElementById('yearly_total_sale').value);
        formData.append('ongoing_month_sale', document.getElementById('ongoing_month_sale').value);
        formData.append('customer_email', document.getElementById('customer_email').value);
        formData.append('customer_Phone', document.getElementById('customer_Phone').value);
        formData.append('date-field', document.getElementById('date-field').value);
        formData.append('status-field', document.getElementById('status-field').value);
        formData.append('type-field', document.getElementById('type-field').value);

        // Append month-sale data as JSON string
        formData.append('monthly_sales_data', JSON.stringify(monthly_sales_data));

        // Collect all selected shop data (uid, name, owner_name, and owner_rating) from the added shop list
        const shopData = [];
        $('#addedShopList .shop-item').each(function () {
            const shopId = $(this).data('shop-id');
            const shopName = $(this).find('.shop-name').text(); // Shop name only
            const shopOwnerName = $(this).data('owner-name');  // Owner name
            const shopOwnerRating = $(this).data('owner-rating');  // Owner rating

            shopData.push({
                shop_uid: shopId,
                shop_name: shopName,
                owner_name: shopOwnerName,  // Include owner name
                owner_rating: shopOwnerRating  // Include owner rating
            });
        });

        if (shopData.length > 0) {
            // Append the shop data (array of objects) to the form
            formData.append('shop_data', JSON.stringify(shopData)); // Send as JSON string
        } else {
            alert('Please add at least one shop.');
            return; // Stop the function if no shops are added
        }

        // Collect all added locations (Days and Route pairs)
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

        // Send AJAX request
        $.ajax({
            url: "<?= base_url('/api/add/sales_person') ?>",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('#sales_person_add_btn').html(`<div class="spinner-border" role="status"></div>`);
                $('#sales_person_add_btn').attr('disabled', true);
            },
            success: function (resp) {
                let alertHtml = resp.status
                    ? `<div class="alert alert-success">${resp.message}</div>`
                    : `<div class="alert alert-danger">${resp.message}</div>`;

                $('#alert').html(alertHtml);
                console.log("Server Response: ", resp);

                if (resp.status) location.reload();
            },
            error: function (err) {
                console.error("Error: ", err);
            },
            complete: function () {
                $('#sales_person_add_btn').html(`Submit`);
                $('#sales_person_add_btn').attr('disabled', false);
            }
        });
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



$('#add_shop').click(function (e) {
    e.preventDefault(); // Prevent default form submission behavior

    // Get selected shop information
    const shopId = $('#shop').val();
    const fullShopName = $('#shop option:selected').text(); // This includes owner_name and rating

    // Only extract the shop name from the full name (e.g., "esdit - adas (Rating: 2)" -> "esdit")
    const shopName = fullShopName.split(" - ")[0]; // Extracting only the shop name part

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

        // Create shop display element with owner name, rating, and hidden UID
        const shopItem = `
            <div class="shop-item" data-shop-id="${shopId}" data-owner-name="${shopOwnerName}" data-owner-rating="${shopOwnerRating}" style="margin-bottom: 10px;">
                <span class="shop-name">${shopName}</span>  <!-- Only the shop name will be displayed -->
                <span class="owner-info">Owner: ${shopOwnerName}, Rating: ${shopOwnerRating}</span>
                <input type="hidden" name="shop_uids[]" value="${shopId}">  <!-- Hidden input to hold shop UID -->
                <button class="remove-shop-btn btn btn-danger btn-sm" style="margin-left: 10px;">Remove</button>
            </div>
        `;

        // Append to the added shop list
        $('#addedShopList').append(shopItem);

        // Attach event listener for the remove button
        $('.remove-shop-btn').click(function () {
            $(this).closest('.shop-item').remove();
        });
    } else {
        alert('Please select a shop.');
    }
});
// Event listener to remove a shop
$(document).on('click', '.remove-shop-btn', function () {
    $(this).closest('.shop-item').remove();
});

// Function to handle adding location and route
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

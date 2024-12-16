<script>

    load_all_shop()

    function load_all_shop() {
        $.ajax({
            url: "<?= base_url('/api/all/shop') ?>",
            type: "GET",
            beforeSend: function () {
                $('#shop_list_body').html(`<tr >
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
                        $.each(resp.data, function (index, shop) {
                            // let product_img = banner.img.length > 0 ? banner.img[0]['src'] : ''
                            html += `<tr>
                                            <td>
                                                ${index+1}
                                            </td>
                                            <td>
                                                ${shop.shop_name}
                                            </td>
                                            <td>
                                                ${shop.owner_name}
                                            </td>
                                            <td>
                                                ${shop.owner_phone}
                                            </td>
                                            <td>
                                                ${shop.owner_rating}
                                            </td>
                                            <td>
                                                ${shop.remarks}
                                            </td>
                                            <td>
                                                <i class="fa fa-edit btn btn-info" id="edit_service" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                                                <input type='hidden' id="shop_uid" value="${shop.uid}">
                                                
                                                
                                            </td>
                                            <td>
                                                <i class="fa fa-trash btn btn-danger" id="delete_service"></i>
                                                 <input type='hidden' id="shop_uid_delete" value="${shop.uid}">
                                            </td>
                                            

                                        </tr>`
                        })
                        $('#shop_list_body').html(html)
                        $('#shop_list').DataTable();
                    }
                }else{
                    $('#shop_list_body').html(`<tr >
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
    // Function to handle edit button click
function load_shop_details(shop_uid) {
    $.ajax({
        url: "<?= base_url('/api/get/shop') ?>",
        type: "GET",
        data: { shop_uid: shop_uid },
        beforeSend: function () {
            // Optional: Add loading spinner or disable modal inputs
        },
        success: function (resp) {
            console.log(resp);
            if (resp.status) {
                const shop = resp.data;

                // Populate modal input fields with shop data
                $('#shopName').val(shop.shop_name);
                $('#ownerName').val(shop.owner_name);
                $('#ownerPhone').val(shop.owner_phone);
                $('#rating').val(shop.owner_rating);
                $('#remark').val(shop.remarks);
                $('#current_uid').val(shop.uid);

                // Store the shop_uid for submission
                $('#shop_update_btn').data('shop-uid', shop_uid);

                // Show the modal
                $('#exampleModal').modal('show');
            } else {
                alert("Failed to load shop details. Please try again.");
            }
        },
        error: function (err) {
            console.error("Error fetching shop details:", err);
            alert("An error occurred while fetching the shop details.");
        },
        complete: function () {
            // Optional: Remove loading spinner or re-enable modal inputs
        }
    });
}

// Event listener for edit button
$(document).on('click', '#edit_service', function () {
    const shop_uid = $(this).siblings('#shop_uid').val();
    if (shop_uid) {
        load_shop_details(shop_uid);
    } else {
        alert("Invalid shop identifier.");
    }
});

    function shop_update () {
            var formData = new FormData();

            formData.append('shopName', $('#shopName').val());
            formData.append('ownerName', $('#ownerName').val());
            formData.append('ownerPhone', $('#ownerPhone').val());
            formData.append('rating', $('#rating').val());
            formData.append('remark', $('#remark').val());
            formData.append('shop_uid', $('#current_uid').val());
           
            

            // $.each($('#file-input')[0].files, function (index, file) {
            //     formData.append('images[]', file);
            
            // formData.forEach(function(value, key){
            //     console.log(key + ": " + value);
            // });
            $.ajax({
                url: "<?= base_url('/api/update/shop') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#shop_update_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#shop_update_btn').attr('disabled', true)

                },
                success: function (resp) {
                    let html = ''

                    if (resp.status) {
                        html += `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i>${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                            // get_banner()
                    } else {
                        html += `<div class="alert alert-warning alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-alert-line label-icon"></i><strong>Warning</strong> - ${resp.message}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
                    }


                    $('#alert').html(html)
                    console.log(resp)
                    location.reload()
                },
                error: function (err) {
                    console.log(err)
                },
                complete: function () {
                    $('#shop_update_btn').html(`submit`)
                    $('#shop_update_btn').attr('disabled', false)
                    // location.reload()
                }
            })
        }
        $(document).on('click', '.fa-trash', function () {
    // Get the service row (tr) and extract the service UID
        var shopRow = $(this).closest('tr');
        var shop_uid = shopRow.find('#shop_uid').val(); // Get the service UID from the hidden input
        // Confirm the deletion with the user
        if (confirm("Are you sure you want to delete this Shop?")) {
            // Perform the AJAX request to delete the service
            $.ajax({
                url: "<?= base_url('/api/delete/shop') ?>",  // The endpoint for deletion
                type: "POST",
                data: { shop_uid: shop_uid },  // Send the UID of the service to be deleted
                success: function (resp) {
                    if (resp.status) {
                        // Successfully deleted, remove the row from the table
                        // serviceRow.remove();

                        // Optionally, show a success message
                        alert('Shop deleted successfully.');
                        location.reload();
                    } else {
                        // Show error message if something goes wrong
                        alert('Error: ' + resp.message);
                    }
                },
                error: function (err) {
                    console.log(err);
                    alert('Error deleting the shop. Please try again.');
                }
            });
        }
    });

</script>
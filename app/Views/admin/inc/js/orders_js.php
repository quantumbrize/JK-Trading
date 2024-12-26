<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    load_orders()

    function load_orders() {
        $.ajax({
            url: '<?= base_url('/api/orders') ?>',
            type: 'GET',
            beforeSend: function () {
                $('#order_table_body').html(`<tr><td colspan="6" align="center"><div  class="spinner-border" role="status"></div></td><tr>`)
            },
            success: function (resp) {
                if (resp.status) {



                    let html = ``
                    $.each(resp.data, function (index, item) {
                        // Input date string
                        var dateString = item.created_at;


                        // Parse the date string into a Date object
                        var date = new Date(dateString);

                        // Define months array for formatting
                        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

                        // Get hours and minutes
                        var hours = date.getHours();
                        var minutes = date.getMinutes();

                        // Determine AM/PM indicator and convert to 12-hour format
                        var ampm = hours >= 12 ? 'PM' : 'AM';
                        hours = hours % 12;
                        hours = hours ? hours : 12; // Handle midnight (0 hours)

                        // Format the date
                        var formattedDate =
                            ('0' + date.getDate()).slice(-2) + ' ' +  // Day with leading zero
                            months[date.getMonth()] + ', ' +          // Month abbreviation
                            date.getFullYear() + ', ' +               // Year
                            ('0' + hours).slice(-2) + ':' +           // Hours with leading zero
                            ('0' + minutes).slice(-2) + ' ' +         // Minutes with leading zero
                            ampm;                                     // AM/PM indicator
                            
                        html += `<tr onClick="open_order('${item.order_id}')" class="order_tr">
                                    <td>${item.order_id}</td>
                                    <td>${item.user_name}</td>
                                    <td>${formattedDate}</td>
                                    <td>${item.total}</td>
                                    <td>${item.payment_type}</td>
                                    <td>
                                        <span class="badge bg-warning-subtle text-warning text-uppercase">${item.order_status}</span>
                                    </td>
                                    <td>
                                        <button type="button" onclick="lode_single_order('${item.order_id}'); event.stopPropagation();" class="btn btn-primary">
                                            View Bill
                                        </button>
                                    </td>
                                </tr>`
                    })
                    $('#order_table_body').html(html)
                    $('#order_table').DataTable({
                        columnDefs: [
                            { type: 'date', targets: 2 },
                        ],
                        "order": [[2, "desc"]],
                        language: {
                            search: "Search" // Custom placeholder text for the search field
                        }
                    });
                }else{
                    $('#order_table_body').html('<tr><td colspan="6" align="center"><h4>No Orders Found</h4></td><tr>')
                }

            },
            error: function (err) {
                console.error(err)
            }

        })

    }

    function open_order(order_id) {
        window.location.href = `<?= base_url('/admin/user/order?o_id=') ?>${order_id}`;
    }

    function lode_single_order(order_id) {
        // alert(order_id)
        $.ajax({
            url: '<?= base_url('/api/order') ?>',
            type: 'GET',
            data: {
                o_id: order_id
            },
            beforeSend: function () { },
            success: function (resp) {
                console.log(resp)
                if (resp.status) {
                    let order = resp.data
                    
                    let html = ``
                    let total_discount = 0
                    let delivery_charge = 0
                    let grand_total = 0
                    $.each(order.products, function (index, item) {
                         let img_link = item.product_config_id ? '/public/uploads/variant_images/' : '/public/uploads/product_images/'
                         let product_image = '<?=base_url()?>public/assets/ztImages/demo_img.jpg'
                        if(item.product_details.product_img != ""){
                            product_image = `<?=base_url()?>${img_link + item.product_details.product_img[0].src}`
                        }
                        let qty = item.qty; // Quantity of the product
                        let base_discount = parseInt(item.product_details.base_discount); // Discount percentage
                        let tax = parseInt(item.product_details.tax); // Tax percentage
                        let discounted_price = item.price * qty - ((item.price * qty) * base_discount / 100);
                        let tax_amount = discounted_price * tax / 100;
                        let final_price = discounted_price + tax_amount;
                        delivery_charge += parseInt(item.product_details.delivery_charge)
                        grand_total += final_price
                        // html += `    <tr>
                        //                 <td>
                        //                     <div class="d-flex">
                        //                         <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                        //                             <img
                        //                                 style="height: 100%; width: 100%; object-fit: contain; background: white;"
                        //                                 src="${product_image}" 
                        //                                 alt="" 
                        //                                 class="img-fluid d-block">
                        //                         </div>
                        //                         <div class="flex-grow-1 ms-3">
                        //                             <h5 class="fs-15">
                        //                                 <a href="" class="link-primary">${item.product_details.name.substring(0, 25) + "..."}</a>
                        //                             </h5>
                        //                         </div>
                        //                     </div>
                        //                 </td>
                        //                 <td>₹ ${item.price}</td>
                        //                 <td>${item.qty}</td>
                        //                 <td>${item.size}</td>
                        //                 <td>${item.product_details.base_discount}%</td>
                        //                 <td>${item.product_details.tax}%</td>
                                        
                        //                 <td class="fw-medium text-end">
                        //                     ₹${final_price.toFixed(2)}
                        //                 </td>
                        //             </tr>`

                                    total_discount += parseInt(item.product_details.base_discount, 10);
                                    // delivary_charges += parseInt(item.product_details.delivery_charge, 10);



                    productDetails += `
                                    <tr>
                                        <td><img src="${product_image}" alt="${item.product_details.name}" width="50"></td>
                                        <td><span>${item.product_details.name}</span></td>
                                        <td><input type="number" class="form-control" value="${item.price}" onkeyup="updateTotal(this)" data-index="${index}" data-field="price"></td>
                                        <td><input type="number" class="form-control" value="${item.product_details.base_discount}" onkeyup="updateTotal(this)" data-index="${index}" data-field="discount"></td>
                                        <td>
                                            <select class="form-control product-tax-list" id="product-tax-${item.product_details.product_id}" onchange="updateTotal(this)">
                                                <option value="0">00.00% IGST - (00.00% CGST & 00.00% SGST)</option>
                                                <option value="0.1">00.10% IGST - (00.05% CGST & 00.05% SGST)</option>
                                                <option value="0.25">00.25% IGST - (00.125% CGST & 00.125% SGST)</option>
                                                <option value="1">01.00% IGST - (00.50% CGST & 00.50% SGST)</option>
                                                <option value="1.5">01.50% IGST - (00.75% CGST & 00.75% SGST)</option>
                                                <option value="3">03.00% IGST - (01.50% CGST & 01.50% SGST)</option>
                                                <option value="5">05.00% IGST - (02.50% CGST & 02.50% SGST)</option>
                                                <option value="6">06.00% IGST - (03.00% CGST & 03.00% SGST)</option>
                                                <option value="7.5">07.50% IGST - (03.75% CGST & 03.75% SGST)</option>
                                                <option value="12">12.00% IGST - (06.00% CGST & 06.00% SGST)</option>
                                                <option value="18">18.00% IGST - (09.00% CGST & 09.00% SGST)</option>
                                                <option value="28">28.00% IGST - (14.00% CGST & 14.00% SGST)</option>
                                            </select>
                                        </td>
                                        <td><input type="number" class="form-control" value="${item.qty}" onkeyup="updateTotal(this)" data-index="${index}" data-field="quantity"></td>
                                        <td><input type="number" class="form-control total" value="${final_price}" readonly></td>
                                    </tr>`;
                                })

                    
                                $('#productModal').modal('show')
                                $('#productDetails').html(productDetails)
                                $('#grandTotal').val(grand_total)
                                

                }

            },
            error: function (err) {
                console.error(err)
            }

        })

    }

    function close_order_modal() {
        $('#productModal').modal('hide');
    }


    
    function calculateTotal(price, discount, tax, quantity) {
        let discountedPrice = price - (price * (discount / 100));
        let totalPrice = discountedPrice + (discountedPrice * (tax / 100));
        return totalPrice * quantity;
    }

    function updateTotal(element) {
        let row = element.closest('tr');
        let price = parseFloat(row.cells[2].children[0].value) || 0;
        let discount = parseFloat(row.cells[3].children[0].value) || 0;
        let tax = parseFloat(row.cells[4].children[0].value) || 0;
        let quantity = parseFloat(row.cells[5].children[0].value) || 1;

        let total = calculateTotal(price, discount, tax, quantity);
        row.cells[6].children[0].value = total.toFixed(2);

        updateGrandTotal();
    }

    function updateGrandTotal() {
        let totals = document.querySelectorAll('.total');
        let grandTotal = 0;
        totals.forEach(total => {
            grandTotal += parseFloat(total.value) || 0;
        });
        document.getElementById('grandTotal').value = grandTotal.toFixed(2);
    }

    function generateBill() {

        let html = `<div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                                <i class="ri-checkbox-circle-fill label-icon"></i> Order Updated Successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>`
        $('#alert').html(html)

        $('#productDetails').html('');
        // Close the modal
        $('#productModal').modal('hide');
    }


</script>

























































<!-- -------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- <script>
    let orderData = {
        1: [
            {
                image: 'product1.jpg',
                name: 'Product 1',
                price: 10.00,
                discount: 5,
                tax: 12,
                quantity: 2
            },
            {
                image: 'product2.jpg',
                name: 'Product 2',
                price: 20.00,
                discount: 10,
                tax: 18,
                quantity: 1
            }
        ]
    };

    function loadOrderDetails(orderId) {
        console.log('Loading details for order:', orderId); // Debug statement
        let products = orderData[orderId];
        let productDetails = '';

        products.forEach((product, index) => {
            let total = calculateTotal(product.price, product.discount, product.tax, product.quantity);
            productDetails += `
                <tr>
                    <td><img src="${product.image}" alt="${product.name}" width="50"></td>
                    <td><span>${product.name}</span></td>
                    <td><input type="number" class="form-control" value="${product.price}" onchange="updateTotal(this)" data-index="${index}" data-field="price"></td>
                    <td><input type="number" class="form-control" value="${product.discount}" onchange="updateTotal(this)" data-index="${index}" data-field="discount"></td>
                    <td>
                        <select class="form-control" onchange="updateTotal(this)" data-index="${index}" data-field="tax">
                            <option value="0" ${product.tax === 0 ? 'selected' : ''}>0%</option>
                            <option value="5" ${product.tax === 5 ? 'selected' : ''}>5%</option>
                            <option value="12" ${product.tax === 12 ? 'selected' : ''}>12%</option>
                            <option value="18" ${product.tax === 18 ? 'selected' : ''}>18%</option>
                            <option value="28" ${product.tax === 28 ? 'selected' : ''}>28%</option>
                        </select>
                    </td>
                    <td><input type="number" class="form-control" value="${product.quantity}" onchange="updateTotal(this)" data-index="${index}" data-field="quantity"></td>
                    <td><input type="number" class="form-control total" value="${total}" readonly></td>
                </tr>
            `;
        });

        document.getElementById('productDetails').innerHTML = productDetails;
        updateGrandTotal();
    }

    function calculateTotal(price, discount, tax, quantity) {
        let discountedPrice = price - (price * (discount / 100));
        let totalPrice = discountedPrice + (discountedPrice * (tax / 100));
        return totalPrice * quantity;
    }

    function updateTotal(element) {
        let row = element.closest('tr');
        let price = parseFloat(row.cells[2].children[0].value) || 0;
        let discount = parseFloat(row.cells[3].children[0].value) || 0;
        let tax = parseFloat(row.cells[4].children[0].value) || 0;
        let quantity = parseFloat(row.cells[5].children[0].value) || 1;

        let total = calculateTotal(price, discount, tax, quantity);
        row.cells[6].children[0].value = total.toFixed(2);

        updateGrandTotal();
    }

    function updateGrandTotal() {
        let totals = document.querySelectorAll('.total');
        let grandTotal = 0;
        totals.forEach(total => {
            grandTotal += parseFloat(total.value) || 0;
        });
        document.getElementById('grandTotal').value = grandTotal.toFixed(2);
    }

    function saveChanges(orderId) {
        let products = orderData[orderId];
        document.querySelectorAll('#productDetails tr').forEach((row, index) => {
            let cells = row.children;
            products[index].price = parseFloat(cells[2].children[0].value) || 0;
            products[index].discount = parseFloat(cells[3].children[0].value) || 0;
            products[index].tax = parseFloat(cells[4].children[0].value) || 0;
            products[index].quantity = parseFloat(cells[5].children[0].value) || 1;
        });
    }

    function generateBill() {
        // Save changes before closing the modal
        saveChanges(1); // Assuming 1 is the current orderId

        // Close the modal
        $('#productModal').modal('hide');
    }

</script> -->
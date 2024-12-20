<script>
    // $('#shop_add_btn').on('click', function () {
    function shop_add(){
            var formData = new FormData();

            formData.append('shopName', $('#shopName').val());
            formData.append('ownerName', $('#ownerName').val());
            // formData.append('bannerDescription', editor.getData());
            formData.append('ownerPhone', $('#ownerPhone').val());
            formData.append('rating', $('#rating').val());
            formData.append('remark', $('#remark').val());
            formData.append('address', $('#address').val());
            // formData.append('email', $('#email').val());
            // formData.append('mission', editor1.getData());
            // formData.append('vision', editor2.getData());
            // formData.append('about_id', about_id);
            // formData.append('frontend-meta-description', $('#frontend-meta-description').val());
            // formData.append('frontend-meta-author', $('#frontend-meta-author').val());
            // formData.append('frontend-copyright', $('#frontend-copyright').val());
            // formData.append('admin-meta-description', $('#admin-meta-description').val());
            // formData.append('admin-meta-author', $('#admin-meta-author').val());
            // formData.append('admin-copyright', $('#admin-copyright').val());
            

            // $.each($('#file-input')[0].files, function (index, file) {
            //     formData.append('images[]', file);
            
            // formData.forEach(function(value, key){
            //     console.log(key + ": " + value);
            // });
            $.ajax({
                url: "<?= base_url('/api/add/shop') ?>",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#shop_add_btn').html(`<div class="spinner-border" role="status"></div>`)
                    $('#shop_add_btn').attr('disabled', true)

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
                    $('#shop_add_btn').html(`submit`)
                    $('#shop_add_btn').attr('disabled', false)
                }
            })
    }
    document.getElementById('rating').addEventListener('input', function (e) {
    const value = e.target.value;

    // Remove non-numeric characters
    e.target.value = value.replace(/[^0-9]/g, '');

    // Ensure the value is within 1 and 10
    if (e.target.value !== '') {
        const numericValue = parseInt(e.target.value, 10);

        if (numericValue < 1) {
            e.target.value = 1;
        } else if (numericValue > 10) {
            e.target.value = 10;
        }
    }
});

</script>
(function () {
    let profilePhotoUpload = document.querySelector('#profile-photo-upload');
    let image1 = document.querySelector('#account-upload-img');
    let image2 = document.querySelector('#topNavbarPP');
    let ppForm = $('#ppForm');
    profilePhotoUpload.addEventListener('change', function () {
        let data = new FormData(document.getElementById('ppForm'));
        $.ajax({
            url: url + 'api/my-account-pp-update',
            data: data,
            method: 'POST',
            processData: false,
            contentType: false,
            responseType: 'json',
            success: function (response) {
                if (response.error) {
                    toastr.error(response.error.message, response.error.title, {
                        closeButton: true,
                        tapToDismiss: false,
                        rtl: false
                    });

                    image1.src = url + response.error.image;
                    image2.src = url + response.error.image;
                } else {
                    toastr.success(response.success.message, response.success.title, {
                        closeButton: true,
                        tapToDismiss: false,
                        rtl: false
                    });

                    setTimeout(e => {
                        location.reload();
                    }, 300)

                    image1.src = url + response.success.image;
                    image2.src = url + response.success.image;
                }
            }
        });
    })
})();
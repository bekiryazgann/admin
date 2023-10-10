let dropdown = document.querySelector('#dropdown');
let dropdownButtons = dropdown.querySelectorAll('a');
let removeButtons = document.querySelectorAll('[data-role="remove-payment"]');

let modals = document.querySelectorAll('[data-role="add-payment-modal"]');

modals.forEach(element => {
    element.querySelector('form').addEventListener('submit', event => {
        event.preventDefault()

        const data = {};

        event.target.querySelectorAll('input').forEach(input => {
            let name = input.getAttribute('name');
            data[name] = input.value;
        })

        let form = '';
        let i = 0;

        Object.entries(data).forEach((value, key) => {
            i++
            if (Object.entries(data).length === key + 1) {
                form = form + value[0] + '=' + value[1];
            } else {
                form = form + value[0] + '=' + value[1] + '&';
            }
        });
        console.log(form);
        element.querySelector('button').setAttribute('disabled', true);
        $.ajax({
            method: 'POST',
            data,
            url: url + 'api/add-payment-method',
            success: function (result) {
                console.log(result);
                window.location = window.location;
            }
        })
    })
})

dropdownButtons.forEach(element => {
    element.addEventListener('click', (e) => {
        let selector = '#add-payment-method-' + element.getAttribute('href').replace('#', '');
        let modal = $(selector);

        modal.modal('show');
        e.preventDefault()
    });
});


removeButtons.forEach(button => {
    button.addEventListener('click', e => {
        let id = button.dataset.id;
        Swal.fire({
            title: "Emin misiniz?",
            text: "Bunu geri alamazsınız",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Sil",
            cancelButtonText: "Vazgeç",
            showClass: {popup: "animate__animated animate__fadeIn"},
            customClass: {
                confirmButton: "btn btn-outline-primary",
                cancelButton: "btn btn-outline-danger ms-1"
            },
            buttonsStyling: !1
        }).then((status) => {
            if (status.value){
                $.post(url + "api/payment-delete", {id}, function (result) {
                    if(result.error){
                        toastr.error(result.error.message, result.error.title, {
                            closeButton: !0,
                            tapToDismiss: !1,
                            rtl: !1
                        })
                    } else {
                        toastr.success(result.success.message, result.success.title, {
                            closeButton: !0,
                            tapToDismiss: !1,
                            rtl: !1
                        })
                        document.querySelector('.table [data-removeid="' + id + '"]').remove();
                        document.location = document.location;
                    }
                }, "json")
            }
        })
    });
})
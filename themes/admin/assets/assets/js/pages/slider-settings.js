let productTable = $("#slider-datatable").DataTable({
    ajax: {
        url: url + "api/sliders"
    },
    columns: [
        {
            data: "id",
            orderable: false,
            render: function (t, e, a, n) {
                return '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' + a.id + '" /><label class="form-check-label" for="checkbox' + a.id + '"></label></div>';
            },
            checkboxes: {
                selectAllRender: '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
            }
        },
        {data: "id"},
        {data: "title"},
        {
            data: "id",
            width: "12%",
            orderable: false,
            render: function (t, e, a) {
                return `<div class="d-flex justify-content-between align-items-center mx-auto" style="padding-bottom: 0;padding-right: 0; padding-left: 0;">
                            <div>
                                <a href="${url + "design-settings/slider-settings/edit-slider/" + a.realId}" class="btn btn-flat-primary btn-sm" id="brandEdit" data-key="${a.realId}">
                                    <i class="far fa-edit" style="font-size: 18px"></i>
                                </a>
                            </div>
                            <div>
                                <button type="button" class="btn btn-flat-primary btn-sm" id="sliderDelete" data-key="${a.realId}">
                                    <i class="far fa-trash" style="font-size: 18px"></i>
                                </button>
                            </div>
                        </div>`;
            }
        }
    ],
    ...datatableOptions
});

$(document).on("click", "#sliderDelete", function () {
    let e = $(this).data("key");
    Swal.fire({
        title: "Emin misiniz?",
        text: "Bunu geri alamazsınız!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sil",
        cancelButtonText: "Vazgeç",
        showClass: {
            popup: "animate__animated animate__fadeIn"
        },
        customClass: {
            confirmButton: "btn btn-outline-primary",
            cancelButton: "btn btn-outline-danger ms-1"
        },
        buttonsStyling: false
    }).then(function (t) {
        if (t.value) {
            $.post(url + "api/slider-delete", {id: e}, function (t) {
                if (t.error) {
                    toastr.error(t.error.message, t.error.title, {
                        closeButton: true,
                        tapToDismiss: false,
                        rtl: false
                    });
                } else {
                    toastr.success(t.success.message, t.success.title, {
                        closeButton: true,
                        tapToDismiss: false,
                        rtl: false
                    });
                }
                productTable.draw();
            }, "json");
        }
    });
});
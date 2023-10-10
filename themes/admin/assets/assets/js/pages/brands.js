let brandDatatable = $("#markalar").DataTable({
    ajax: {
        url: url + "api/brands"
    }, columns: [{
        data: "id",
        orderable: !1,
        render: function (a, t, e, n) {
            return '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' + e.id + '" /><label class="form-check-label" for="checkbox' + e.id + '"></label></div>'
        },
        checkboxes: {selectAllRender: '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'}
    }, {
        data: "id"
    }, {
        data: "image", render: function (a, t, e) {
            return `<img class='img-fluid' src='${e.image}' alt='${e.name}' style="width: 200px;"/>`
        }
    }, {data: "name"}, {
        data: "status", orderable: !1, render: function (a, t, e) {
            let n = "", s = "";
            return 1 === Number(a) ? (n = "Aktif", s = "success") : 0 === Number(a) && (n = "Pasif", s = "danger"), `<div><span class="badge badge-light-${s} text-center">${n}</span></div>`
        }
    }, {
        data: "id", width: "12%", orderable: !1, render: function (a, t, e) {
            return `<div class="d-flex justify-content-between align-items-center mx-auto" style="padding-bottom: 0;padding-right: 0; padding-left: 0;">
                            <div>
                                <button type="button" class="btn btn-flat-primary btn-sm" id="brandEdit" data-key="${e.realId}">
                                    <i class="far fa-edit" style="font-size: 18px"></i>
                                </button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-flat-primary btn-sm" id="brandDelete" data-key="${e.realId}">
                                    <i class="far fa-trash" style="font-size: 18px"></i>
                                </button>
                            </div>
                        </div>`
        }
    }], ...datatableOptions
}), canvas = $("#canvas"), bsCanvas = new bootstrap.Offcanvas(canvas), newBrandButton = $("#newBrand");
newBrandButton.on("click", function (a) {
    $.post(url + "api/getModal", {modal: "new-brand"}, function (a) {
        canvas.html(a.html), bsCanvas.show(), canvas.on("submit", "form", function (a) {
            bsCanvas.hide(), brandDatatable.draw(), a.preventDefault()
        }), canvas.on("hidden.bs.offcanvas", function () {
            canvas.html("")
        })
    }), a.preventDefault()
}), $(document).on("click", "#brandDelete", function (a) {
    let t = $(this).data("key");
    Swal.fire({
        title: "Emin misiniz?",
        text: "Bunu geri alamazsınız!",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: "Sil",
        cancelButtonText: "Vazgeç",
        showClass: {popup: "animate__animated animate__fadeIn"},
        customClass: {confirmButton: "btn btn-outline-primary", cancelButton: "btn btn-outline-danger ms-1"},
        buttonsStyling: !1
    }).then(function (a) {
        a.value && $.post(url + "api/deleteBrand", {id: t}, function (a) {
            a.error ? toastr.error(a.error.message, a.error.title, {
                closeButton: !0, tapToDismiss: !1, rtl: !1
            }) : toastr.success(a.success.message, a.success.title, {
                closeButton: !0, tapToDismiss: !1, rtl: !1
            }), brandDatatable.draw()
        }, "json")
    }), a.preventDefault()
}), $(document).on("click", "#brandEdit", function (a) {
    var t = $(this).data("key");
    $.post(url + "api/brandDetail", {id: t}, function (a) {
        $.post(url + "api/getModal", {modal: "edit-brand", data: a}, function (a) {
            canvas.html(a.html), bsCanvas.show(), canvas.on("submit", "form", function (a) {
                bsCanvas.hide(), brandDatatable.draw(), a.preventDefault()
            }), canvas.on("hidden.bs.offcanvas", function () {
                canvas.html("")
            })
        })
    }), a.preventDefault()
});
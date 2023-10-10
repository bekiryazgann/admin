let productTable = $("#urun-tablosu").DataTable({
    ajax: {url: url + "api/products"}, columns: [{
        data: "id",
        orderable: !1,
        render: function (t, e, a, n) {
            return '<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' + a.id + '" /><label class="form-check-label" for="checkbox' + a.id + '"></label></div>'
        },
        checkboxes: {selectAllRender: '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'}
    }, {data: "id"}, {
        data: "image", render: function (t, e, a) {
            return `<img class='img-fluid' src='${a.image}' alt='${a.name}' style="width: 80px"/>`
        }
    }, {data: "code"}, {data: "name"}, {data: "category"}, {data: "stock"}, {
        data: "fee", render: function (t, e, a) {
            return t + "₺"
        }
    }, {
        data: "status", orderable: !1, render: function (t, e, a) {
            let n = "";
            return "1" === t ? n = "@trans(Aktif)" : "2" === t ? n = "@trans(Pasif)" : "3" === t && (n = "@trans(Stokta Yok)"), `<div class="text-end"><span class="badge badge-light-success text-center">${n}</span></div>`
        }
    }, {
        data: "id", width: "12%", orderable: !1, render: function (t, e, a) {
            return `<div class="d-flex justify-content-between align-items-center mx-auto" style="padding-bottom: 0;padding-right: 0; padding-left: 0;">
                            <div>
                                <a href="${url + "catalog/products/edit/" + a.realId}" class="btn btn-flat-primary btn-sm" id="brandEdit" data-key="${a.realId}">
                                    <i class="far fa-edit" style="font-size: 18px"></i>
                                </a>
                            </div>
                            <div>
                                <button type="button" class="btn btn-flat-primary btn-sm" id="productDelete" data-key="${a.realId}">
                                    <i class="far fa-trash" style="font-size: 18px"></i>
                                </button>
                            </div>
                        </div>`
        }
    }], ...datatableOptions
});
$(document).on("click", "#productDelete", function () {
    let e = $(this).data("key");
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
    }).then(function (t) {
        t.value && $.post(url + "api/productDelete", {id: e}, function (t) {
            t.error ? toastr.error(t.error.message, t.error.title, {
                closeButton: !0,
                tapToDismiss: !1,
                rtl: !1
            }) : toastr.success(t.success.message, t.success.title, {
                closeButton: !0,
                tapToDismiss: !1,
                rtl: !1
            }), productTable.draw()
        }, "json")
    })
});
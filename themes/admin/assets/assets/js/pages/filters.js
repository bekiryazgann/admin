let newFilterButton = $("#newFilter")
let canvas = $("#canvas")
let bsCanvas = new bootstrap.Offcanvas(canvas)

let filtersTable = $("#filtre-tablosu").DataTable({
    ajax: {
        url: url + "api/filters"
    },
    columns: [
        {
            data: "id",
            orderable: !1,
            render: function (t, e, a, n) {
                return '<div class="form-check"><input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' + a.id + '" />' +
                    '<label class="form-check-label" for="checkbox' + a.id + '"></label></div>'
            },
            checkboxes: {
                selectAllRender: '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
            }
        },
        {data: "id"},
        {data: "name"},
        {data: "option"},
        {
            data: "status",
            orderable: !1,
            render: function (t, e, a) {
                let n = ""
                let l;
                return 1 === Number(t) ? (
                    n = "Aktif", l = "success"
                ) : 0 === Number(t) && (n = "Pasif", l = "danger")
                    `<div><span class="badge badge-light-${l} text-center">${n}</span></div>`
            }
        },
        {
            data: "id",
            width: "12%",
            orderable: !1,
            render: function (t, e, a) {
                return `<div class="d-flex justify-content-between align-items-center mx-auto" style="padding-bottom: 0;padding-right: 0; padding-left: 0;">
                            <div>
                                <button class="btn btn-flat-primary btn-sm" id="filterEdit" data-key="${a.realId}">
                                    <i class="far fa-edit" style="font-size: 18px"></i>
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-flat-primary btn-sm" id="filterDelete" data-key="${a.realId}">
                                    <i class="far fa-trash" style="font-size: 18px"></i>
                                </button>
                            </div>
                        </div>`
            }
        }
    ],
    ...datatableOptions
})
let categoryMultiSelect = $("select.cateogry-multi-select");
categoryMultiSelect.select2({
    dropdownAutoWidth: !1,
    width: "100%",
    dropdownParent: categoryMultiSelect.parent()
})
newFilterButton.on("click",
    function (t) {
        $.post(url + "api/getModal", {modal: "new-filter"}, function (t) {
            canvas.html(t.html)
            bsCanvas.show()
            canvas.on("submit", "form", function (t) {
                bsCanvas.hide()
                filtersTable.draw()
                t.preventDefault()
            })
            canvas.on("hidden.bs.offcanvas", function () {
                canvas.html("")
            })
        }, "json")
        t.preventDefault()
    })
$(document).on("click", "#filterDelete", function () {
    let e = $(this).data("key");
    Swal.fire({
        title: "Emin misiniz?",
        text: "Bunu geri alamazsınız!",
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
    }).then(function (t) {
        t.value && $.post(url + "api/deleteFilter", {id: e}, function (t) {
            t.error ? toastr.error(t.error.message, t.error.title, {
                closeButton: !0,
                tapToDismiss: !1,
                rtl: !1
            }) : toastr.success(t.success.message, t.success.title, {
                closeButton: !0,
                tapToDismiss: !1,
                rtl: !1
            })
            filtersTable.draw()
        }, "json")
    })
})

$(document).on("click", "#filterEdit", function () {
    var t = $(this).data("key");
    $.post(url + "api/filterDetail", {key: t}, function (t) {
        $.post(url + "api/getModal", {modal: "edit-filter", data: t}, function (t) {
            canvas.html(t.html)
            bsCanvas.show()
            canvas.on("submit", "form", function (t) {
                bsCanvas.hide()
                filtersTable.draw()
                t.preventDefault()
            })
            canvas.on("hidden.bs.offcanvas", function () {
                canvas.html("")
            })
        })
    })
});


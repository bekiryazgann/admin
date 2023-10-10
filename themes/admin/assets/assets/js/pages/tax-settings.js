let canvas = $('#canvas');
new bootstrap.Offcanvas(canvas);


$('#table').dataTable({
    ajax: {
        url: url + "api/taxes"
    },
    columns: [
        {
            data: "id",
            orderable: !1,
            render: function (t, e, a) {
                return '<div class="form-check"><input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' + a.id + '" />' +
                    '<label class="form-check-label" for="checkbox' + a.id + '"></label></div>'
            },
            checkboxes: {
                selectAllRender: '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
            }
        },
        {data: "id"},
        {
            data: 'area',
            orderable: !1,
            render: function (t, e, a) {
                return `
                    <span class="badge badge-light-primary">
                        <i class="flag-icon flag-icon-${a.area?.code}"></i>
                        <span>${a.area?.name}</span>
                    </span>
                `;
            }
        },
        {
            data: "taxes",
            render(t, e, a) {
                let html = '';

                a.taxes.forEach((val, key) => {
                    html = html + `
                        <span class="badge badge-light-primary">${val}</span>
                    `;
                })

                return html;
            }
        }
        /*{
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
        }*/
    ],
    ...datatableOptions
})


canvas.on('show.bs.offcanvas', function () {
    let data = {modal: 'edit-tax-settings'};
    $.post(url + 'api/getModal',)
});
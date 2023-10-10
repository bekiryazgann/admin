(function () {

    let userTable = $('#user-datatable').DataTable({
        ajax: {
            url: url + 'api/users'
        },
        columns: [
            {
                data: "realId",
                orderable: !1,
                render: function (t, e, a, n) {
                    return '<div class="form-check"><input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox' + a.id + '" />' +
                        '<label class="form-check-label" for="checkbox' + a.id + '"></label></div>'
                },
                checkboxes: {
                    selectAllRender: '<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'
                }
            },
            {data: 'id'},
            {
                data: "profile_photo",
                orderable: !1,
                render: function (t, e, a, n) {
                    return `
                        <img src="${url + t}" alt="" class="img-fluid rounded" style="width: 5rem">
                    `;
                }
            },
            {data: "name"},
            {data: "email"},
            {data: "rank"},
            {
                data: "status",
                orderable: !1,
                render: function (t, e, a) {
                    let clas = ""
                    let message = "";

                    if (Number(t) === 1) {
                        clas = "success";
                        message = "Online";
                    } else {
                        clas = "danger";
                        message = "Offline";
                    }
                    return `<div><span class="badge badge-light-${clas} text-center">${message}</span></div>`
                }
            },
            {
                data: "id",
                width: "12%",
                orderable: !1,
                render: function (t, e, a) {
                    return `<div class="d-flex justify-content-between align-items-center mx-auto" style="padding-bottom: 0;padding-right: 0; padding-left: 0;">
                            <div>
                                <button class="btn btn-flat-primary btn-sm" id="userEdit" data-key="${a.realId}">
                                    <i class="far fa-edit" style="font-size: 18px"></i>
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-flat-primary btn-sm" id="userDelete" data-key="${a.realId}">
                                    <i class="far fa-trash" style="font-size: 18px"></i>
                                </button>
                            </div>
                        </div>`
                }
            }
        ], ...datatableOptions
    });

    let canvas = $("#canvas");
    let bsCanvas = new bootstrap.Offcanvas(canvas);
    let newFilterButton = $("#newUserButton");

    newFilterButton.on('click', function (e) {
        $.post(url + "api/getModal", {modal: "new-user"}, function(response){
            canvas.html(response.html);
            bsCanvas.show();

            canvas.on("submit", "form", function (e){
                bsCanvas.hide();
                userTable.draw();
                e.preventDefault();
            });

            canvas.on("hidden.bs.offcanvas", function (){
                canvas.html("");
            })
        });
        e.preventDefault();
    });

})()
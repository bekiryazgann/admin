let faqDatatable=$("#faq").DataTable({ajax:{url:url+"api/faq"},columns:[{data:"realId",orderable:!1,render:function(t,a,e,n){return'<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox'+e.id+'" /><label class="form-check-label" for="checkbox'+e.id+'"></label></div>'},checkboxes:{selectAllRender:'<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'}},{data:"id"},{data:"question"},{data:"answer"},{data:"status",orderable:!1,render:function(t,a,e){let n="",s="";return 1===Number(t)?(n="Aktif",s="success"):0===Number(t)&&(n="Pasif",s="danger"),`<div><span class="badge badge-light-${s} text-center">${n}</span></div>`}},{data:"id",width:"12%",orderable:!1,render:function(t,a,e){return`<div class="d-flex justify-content-between align-items-center mx-auto" style="padding-bottom: 0;padding-right: 0; padding-left: 0;">
                            <div>
                                <button type="button" class="btn btn-flat-primary btn-sm" id="brandEdit" data-key="${e.realId}">
                                    <i class="far fa-edit" style="font-size: 18px"></i>
                                </button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-flat-primary btn-sm" id="faqDelete" data-key="${e.realId}">
                                    <i class="far fa-trash" style="font-size: 18px"></i>
                                </button>
                            </div>
                        </div>`}}],...datatableOptions}),canvas=$("#canvas"),bsCanvas=new bootstrap.Offcanvas(canvas);$("#newQuestion").on("click",function(t){$.post(url+"api/getModal",{modal:"new-question"},function(t){canvas.html(t.html),bsCanvas.show(),canvas.on("submit","form",function(t){bsCanvas.hide(),faqDatatable.draw(),t.preventDefault()}),canvas.on("hidden.bs.offcanvas",function(){canvas.html("")})},"json"),t.preventDefault()}),$(document).on("click","#faqDelete",function(t){let a=$(this).data("key");Swal.fire({title:"Emin misiniz?",text:"Bunu geri alamazsınız!",icon:"warning",showCancelButton:!0,confirmButtonText:"Sil",cancelButtonText:"Vazgeç",showClass:{popup:"animate__animated animate__fadeIn"},customClass:{confirmButton:"btn btn-outline-primary",cancelButton:"btn btn-outline-danger ms-1"},buttonsStyling:!1}).then(function(t){t.value&&$.post(url+"api/deleteFaq",{id:a},function(t){t.error?toastr.error(t.error.message,t.error.title,{closeButton:!0,tapToDismiss:!1,rtl:!1}):toastr.success(t.success.message,t.success.title,{closeButton:!0,tapToDismiss:!1,rtl:!1}),faqDatatable.draw()},"json")}),t.preventDefault()}),$(document).on("click","#brandEdit",function(t){var a=$(this).data("key");$.post(url+"api/faqDetail",{id:a},function(t){$.post(url+"api/getModal",{modal:"edit-question",data:t},function(t){canvas.html(t.html),bsCanvas.show(),canvas.on("submit","form",function(t){bsCanvas.hide(),faqDatatable.draw(),t.preventDefault()}),canvas.on("hidden.bs.offcanvas",function(){canvas.html("")})},"json")},"json"),t.preventDefault()});
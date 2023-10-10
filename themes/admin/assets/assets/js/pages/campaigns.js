let couponDatatable=$("#couponTable").DataTable({ajax:{url:url+"api/campaigns"},columns:[{data:"id",orderable:!1,render:function(a,t,n,e){return'<div class="form-check"> <input class="form-check-input dt-checkboxes" type="checkbox" value="" id="checkbox'+n.id+'" /><label class="form-check-label" for="checkbox'+n.id+'"></label></div>'},checkboxes:{selectAllRender:'<div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>'}},{data:"id"},{data:"name"},{data:"type"},{data:"amount"},{data:"status",orderable:!1,render:function(a,t,n){let e="",s="";return 1===a?(e="Aktif",s="success"):2===a&&(e="Pasif",s="danger"),`<div><span class="badge badge-light-${s} text-center">${e}</span></div>`}},{data:"id",width:"12%",orderable:!1,render:function(a,t,n){return`<div class="d-flex justify-content-between align-items-center mx-auto" style="padding-bottom: 0;padding-right: 0; padding-left: 0;">
                            <button class="btn btn-flat-primary btn-sm campaignEdit" data-key="${n.realId}">
                                <i class="far fa-edit" style="font-size: 18px"></i>
                            </button>
                            <button class="btn btn-flat-primary btn-sm campaignDelete" type="button" onclick="void(0);" data-key="${n.realId}">
                                <i class="far fa-trash" style="font-size: 18px"></i>
                            </button>
                        </div>`}}],...datatableOptions}),newCampaign=$("#newCampaign"),canvas=$("#canvas"),bsCanvas=new bootstrap.Offcanvas(canvas);newCampaign.on("click",function(a){$.post(url+"api/getModal",{modal:"new-campaign"},function(a){canvas.html(a.html),bsCanvas.show(),canvas.on("submit","form",function(a){couponDatatable.draw(),bsCanvas.hide(),canvas.html(""),a.preventDefault()}),canvas.on("hidden.bs.offcanvas",function(){canvas.html("")})},"json"),a.preventDefault()}),$(document).on("click",".campaignDelete",function(a){let t=$(this).data("key");Swal.fire({title:"Emin misiniz?",text:"Bunu geri alamazsınız!",icon:"warning",showCancelButton:!0,confirmButtonText:"Sil",cancelButtonText:"Vazgeç",showClass:{popup:"animate__animated animate__fadeIn"},customClass:{confirmButton:"btn btn-outline-primary",cancelButton:"btn btn-outline-danger ms-1"},buttonsStyling:!1}).then(function(a){a.value&&($.post(url+"api/deleteCampaign",{id:t},function(a){a.error?toastr.error(a.error.message,a.error.title,{closeButton:!0,tapToDismiss:!1,rtl:!1}):toastr.success(a.success.message,a.success.title,{closeButton:!0,tapToDismiss:!1,rtl:!1})}),couponDatatable.draw())}),a.preventDefault()}),$(document).on("click",".campaignEdit",function(a){var t=$(this).data("key");$.post(url+"api/campaignDetail",{id:t},function(a){$.post(url+"api/getModal",{data:a,modal:"edit-campaign"},function(a){canvas.html(a.html),bsCanvas.show(),canvas.on("submit","form",function(a){couponDatatable.draw(),bsCanvas.hide(),canvas.html(""),a.preventDefault()}),canvas.on("hidden.bs.offcanvas",function(){canvas.html("")})},"json")},"json"),a.preventDefault()});
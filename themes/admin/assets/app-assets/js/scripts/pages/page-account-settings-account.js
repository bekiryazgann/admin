$(function(){var t,e=$(".validate-form"),n=$("#account-upload-img"),c=$("#account-upload"),o=$(".uploadedAvatar"),a=$("#account-reset"),i=$(".account-number-mask"),u=$(".account-zip-code"),r=$(".select2"),l=document.querySelector("#formAccountDeactivation"),s=l.querySelector(".deactivate-account");o&&(t=o.attr("src"),c.on("change",function(t){var e=new FileReader,t=t.target.files;e.onload=function(){n&&n.attr("src",e.result)},e.readAsDataURL(t[0])}),a.on("click",function(){o.attr("src",t)})),e.length&&e.each(function(){var t=$(this);t.validate({rules:{firstName:{required:!0},lastName:{required:!0},accountActivation:{required:!0}}}),t.on("submit",function(t){t.preventDefault()})}),l&&$(document).on("click","#accountActivation",function(){1==d.checked?s.removeAttribute("disabled"):s.setAttribute("disabled","disabled")});const d=document.querySelector("#accountActivation");s&&(s.onclick=function(){1==d.checked&&Swal.fire({text:"Are you sure you would like to deactivate your account?",icon:"warning",showCancelButton:!0,confirmButtonText:"Yes",customClass:{confirmButton:"btn btn-primary",cancelButton:"btn btn-outline-danger ms-2"},buttonsStyling:!1}).then(function(t){t.value?Swal.fire({icon:"success",title:"Deleted!",text:"Your file has been deleted.",customClass:{confirmButton:"btn btn-success"}}):t.dismiss===Swal.DismissReason.cancel&&Swal.fire({title:"Cancelled",text:"Deactivation Cancelled!!",icon:"error",customClass:{confirmButton:"btn btn-success"}})})}),i.length&&i.each(function(){new Cleave($(this),{phone:!0,phoneRegionCode:"US"})}),u.length&&u.each(function(){new Cleave($(this),{delimiter:"",numeral:!0})}),r.length&&r.each(function(){var t=$(this);t.wrap('<div class="position-relative"></div>'),t.select2({dropdownParent:t.parent()})})});
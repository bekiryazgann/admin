!function(a){"function"==typeof define&&define.amd?define(["jquery","datatables.net-bs5","datatables.net-responsive"],function(e){return a(e,window,document)}):"object"==typeof exports?module.exports=function(e,d){return e=e||window,(d=d&&d.fn.dataTable?d:require("datatables.net-bs5")(e,d).$).fn.dataTable.Responsive||require("datatables.net-responsive")(e,d),a(d,0,e.document)}:a(jQuery,window,document)}(function(s,e,d,a){"use strict";var i,o=s.fn.dataTable,t=o.Responsive.display,l=t.modal,r=s('<div class="modal fade dtr-bs-modal" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"/></div></div></div>');return s(function(){i=new bootstrap.Modal(r[0])}),t.modal=function(n){return function(e,d,a){var o,t;s.fn.modal?d||(n&&n.header&&(t=(o=r.find("div.modal-header")).find("button").detach(),o.empty().append('<h4 class="modal-title">'+n.header(e)+"</h4>").append(t)),r.find("div.modal-body").empty().append(a()),r.appendTo("body").modal(),i.show()):l(e,d,a)}},o.Responsive});
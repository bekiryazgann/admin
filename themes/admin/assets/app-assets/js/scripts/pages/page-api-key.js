$(function(){"use strict";var e=$(".select2"),t=$("#createApiForm");e.each(function(){var e=$(this);e.wrap('<div class="position-relative"></div>'),e.select2({dropdownAutoWidth:!0,width:"100%",dropdownParent:e.parent()})}),t.length&&t.validate({rules:{apiKeyName:{required:!0}}})});
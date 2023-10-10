<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">Kupon Düzenle</h5>
    <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form class="form form-vertical d-flex flex-column justify-content-between h-100" id="newCouponForm">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="coupon-name">@trans(Kupon Adı)</label>
                    <input type="text"
                           id="coupon-name"
                           class="form-control"
                           name="coupon_name"
                           value="{{$data['name']}}"
                           placeholder="@trans(Kupon Adı)">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="coupon-code">@trans(Kupon Kodu)</label>
                    <input type="text"
                           id="coupon-code"
                           class="form-control"
                           name="coupon_code"
                           value="{{$data['code']}}"
                           placeholder="@trans(Kupon Kodu)">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="coupon-code">@trans(Mimimum Geçerlilik Tutarı)</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">₺</span>
                        <input type="text"
                               id="coupon-code"
                               class="form-control"
                               name="coupon_min"
                               value="{{$data['min']}}"
                               placeholder="@trans(Mimimum Geçerlilik Tutarı)">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label" for="coupon-type">@trans(Kupon Türü)</label>
                    <select name="coupon_type" id="coupon-type" class="form-select">
                        <option value="1" {{($data['type'] == 1) ? 'selected' : ''}}>@trans(Yüzde Bazlı)</option>
                        <option value="2" {{($data['type'] == 2) ? 'selected' : ''}}>@trans(Birim Bazlı)</option>
                    </select>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label"
                           for="coupon-sale">@trans(Kupon İndirim Oranı)</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="coupon-type-content">%</span>
                        <input type="text"
                               id="coupon-sale"
                               class="form-control"
                               value="{{$data['sale']}}"
                               name="coupon_sale"
                               placeholder="@trans(Kupon İndirim Oranı)">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button type="submit"
                        class="btn btn-primary me-1 waves-effect waves-float waves-light w-100">
                    @trans(Kaydet)
                </button>
            </div>
            <div class="col-6">
                <button type="reset"
                        class="btn btn-outline-primary me-1 waves-effect waves-float waves-light w-100"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close">
                    @trans(Vazgeç)
                </button>
            </div>
        </div>
    </form>
</div>
<script>
    $('#coupon-type').on('change', function(){
        if(Number($(this).val()) === 1){
            $('#coupon-type-content').html('%');
        } else {
            $('#coupon-type-content').html('₺');
        }
    });

    $('#newCouponForm').on('submit', function (e) {
        $.post(url + 'api/editCoupon', $(this).serialize() + '&id={{$data['id']}}', function (response) {
            if (response.error) {
                toastr.error(response.error.message, response.error.title, {
                    closeButton: true,
                    tapToDismiss: false,
                    rtl: false
                });
            } else {
                toastr.success(response.success.message, response.success.title, {
                    closeButton: true,
                    tapToDismiss: false,
                    rtl: false
                });
            }
        }, 'json')

        e.preventDefault();
    })
</script>
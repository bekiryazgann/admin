<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">@trans( Mobil Header )</h5>
    <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form class="form form-vertical d-flex flex-column justify-content-between h-100"
          id="canvas_form"
          autocomplete="off">
        @csrf
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-1">
                        <label for="bottom_bar" class="form-label"> Uygulama Barı </label>
                        <select type="text" name="bottom_bar" id="bottom_bar" class="form-select">
                            <option value="1" {{ ((string)$data['bottom_bar'] === '1') ? 'selected' : '' }}> Açık </option>
                            <option value="0" {{ ((string)$data['bottom_bar'] === '0') ? 'selected' : '' }}> Kapalı </option>
                        </select>
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
    element = document.querySelector(`[data-role='{{$role}}'][data-id='{{$id}}'][data-key='{{$key}}']`);

    data = JSON.parse(element.getAttribute('data-json'));

    try {
        document.querySelectorAll('form#canvas_form input, form#canvas_form select').forEach(elem => {
            elem.addEventListener('change', (e) => {
                data.values[elem.name] = e.target.value;
                element.dataset.json = JSON.stringify(data);
            })
        })
    } catch (e){
        console.error(e);
    }
</script>
<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">Ürün Listesi</h5>
    <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form class="form form-vertical d-flex flex-column justify-content-between h-100"
          id="form-detail"
          autocomplete="off">
        @csrf
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary p-1">Listelenmesi gereken ürünleri önceden kategorize etmeniz önemlidir.</div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                        <label class="form-label"
                               for="title">Liste Başlığı</label>
                        <input type="text"
                               id="title"
                               class="form-control"
                               name="title"
                               value="{{($data['title']) ?? ''}}"
                               placeholder="Liste Başlığı">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit"
                        class="btn btn-primary me-1 waves-effect waves-float waves-light w-100">
                    @trans(Kaydet)
                </button>
            </div>
        </div>
    </form>
</div>
<script>
    element = document.querySelector(`[data-role='{{$role}}'][data-id='{{$id}}'][data-key='{{$key}}']`);

    data = JSON.parse(element.getAttribute('data-json'));

    try {
        document.querySelectorAll('form#form-detail input').forEach(elem => {
            elem.addEventListener('input', (e) => {
                data.values[elem.name] = e.target.value;
                element.dataset.json = JSON.stringify(data);
            })
        })
    } catch (e) {
        console.error(e);
    }
</script>
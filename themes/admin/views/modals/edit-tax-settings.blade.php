<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">@trans(Soruyu Düzenle)</h5>
    <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form class="form form-vertical d-flex flex-column justify-content-between h-100"
          id="edit-tax-form"
          autocomplete="off">
        @csrf
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-1">
                        <label class="form-label"
                               for="faq-question">@trans(Soru)</label>
                        <input type="text"
                               id="faq-question"
                               class="form-control"
                               name="faq_question"
                               placeholder="@trans(Soru)">
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
    $('#edit-tax-form').on('submit', function(e){

    });
</script>
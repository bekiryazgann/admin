<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">Slider - Tam Genişlik</h5>
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
                    <div class="alert alert-primary p-1">Slider ile ilgili içerik ayarlarını Slider'lar sayfasından yönetebilirsiniz.</div>
                </div>
                <pre>
                    <?php
                    print_r($data);
                    ?>
                </pre>
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
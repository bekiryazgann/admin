<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">@trans(Yeni Filtre)</h5>
    <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form class="form form-vertical d-flex flex-column justify-content-between h-100"
          id="editContentForm"
          autocomplete="off">
        @csrf
        <div>
            <div class="row">
                <div class="col-12">
                    <div class="mb-1">
                        <label class="form-label"
                               for="category-name">@trans(Filtre Adı)</label>
                        <input type="text"
                               id="category-name"
                               class="form-control"
                               name="filter_name"
                               placeholder="@trans(Filtre Adı)">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                        <label for="status"
                               class="form-label">@trans(Filtre Durum)</label>
                        <select name="status" id="status" class="form-select">
                            <option value="1">@trans(Aktif)</option>
                            <option value="0">@trans(Pasif)</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-between mt-2">
                    <h4 class="mb-1 fs-6 fw-bolder"
                        style="color: #b4b7bd">@trans(FİLTRE SEÇENEKLERİ)</h4>
                    <div class="mb-1">
                        <button type="button"
                                id="addOption"
                                class="btn btn-outline-primary float-end">
                            <i class="far fa-plus me-50"></i>
                            Seçenek kaldır
                        </button>
                    </div>
                </div>
            </div>
            <div class="row" id="filterInputsArea">
                <div class="col-12">
                    <div class="mb-1">
                        <div class="input-group">
                            <input type="text"
                                   class="form-control"
                                   placeholder="@trans(Seçenek)"
                                   name="options[]"/>
                            <button class="btn btn-primary" id="deleteOption" type="button">
                                <i class="far fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button type="submit"
                        class="btn btn-primary me-1 waves-effect waves-float waves-light w-100">
                    @trans(Ekle)
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
    console.log(JSON.parse(document.querySelector(`[data-role='{{$role}}'][data-id='{{$id}}'][data-key='{{$key}}']`).getAttribute('data-json')))
</script>
<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">@trans(Filtre Düzenle)</h5>
    <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form class="form form-vertical d-flex flex-column justify-content-between h-100"
          id="editFilterForm"
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
                               value="{{$data['name']}}"
                               placeholder="@trans(Filtre Adı)">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                        <label for="status"
                               class="form-label">@trans(Filtre Durum)</label>
                        <select name="status" id="status" class="form-select">
                            <option value="1" {{($data['status'] == 1) ? 'selected' : ''}}>@trans(Aktif)</option>
                            <option value="0" {{($data['status'] == 0) ? 'selected' : ''}}>@trans(Pasif)</option>
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
                            Seçenek Ekle
                        </button>
                    </div>
                </div>
            </div>
            <div class="row" id="filterInputsArea">
                @foreach(json_decode($data['options'], true) as $option)
                    <div class="col-12">
                        <div class="mb-1">
                            <div class="input-group">
                                <input type="text"
                                       class="form-control"
                                       value="{{$option}}"
                                       placeholder="@trans(Seçenek)"
                                       name="options[]"/>
                                <button class="btn btn-primary" id="deleteOption" type="button">
                                    <i class="far fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
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

    $('#addOption').on('click', function (e) {
        $('#filterInputsArea').prepend(`
            <div class="col-12">
                <div class="mb-1">
                    <div class="input-group">
                        <input type="text"
                               class="form-control"
                               placeholder="Seçenek"
                               name="options[]"/>
                        <button class="btn btn-primary" id="deleteOption" type="button">
                            <i class="far fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>`);
        e.preventDefault();
    })

    $(document).on('click', '#deleteOption', function () {
        $(this).parent().parent().parent().remove();
    });

    $('#editFilterForm').on('submit', function(e){
        $.post(url + 'api/filterEdit', $(this).serialize() + '&id={{$data['id']}}', function(response){
            if(response.error){
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
        });
        e.preventDefault();
    });
</script>
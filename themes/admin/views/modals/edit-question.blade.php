<div class="offcanvas-header">
    <h5 id="offcanvasEndLabel" class="offcanvas-title">@trans(Soruyu Düzenle)</h5>
    <button type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form class="form form-vertical d-flex flex-column justify-content-between h-100"
          id="newFilterForm"
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
                               value="{{$data['question']}}"
                               placeholder="@trans(Soru)">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                        <label class="form-label"
                               for="faq_answer">@trans(Cevap)</label>
                        <textarea name="faq_answer"
                                  class="form-control"
                                  id="faq_answer"
                                  placeholder="@trans(Cevap)">{{$data['answer']}}</textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-1">
                        <label for="faq-status"
                               class="form-label">@trans(Soru Durum)</label>
                        <select name="faq_status" id="faq-status" class="form-select">
                            <option value="1" {{((int)$data['status'] == 1) ? 'selected' : ''}}>@trans(Aktif)</option>
                            <option value="0" {{((int)$data['status'] == 0) ? 'selected' : ''}}>@trans(Pasif)</option>
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
    $('#newFilterForm').on('submit', function(e){
        $.post(url + 'api/editFaq', $(this).serialize() + '&id={{$data['id']}}', function(response){
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
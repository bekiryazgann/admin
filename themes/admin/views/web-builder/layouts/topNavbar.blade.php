<!-- : "container-xxl" class : -->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow mx-auto px-25"
     style="margin-right: calc(auto + var(--bs-gutter-x, 1rem)); margin-left: calc(auto + var(--bs-gutter-x, 1rem));box-sizing: border-box">
    <div class="mx-1 d-flex">
        <div class="me-50" style="display: flex; align-items: center; justify-content: center;">
            <label for="pages" style="margin-right: 10px; font-size: 16px"> Sayfa: </label>
            <select class="tag-multi-select form-select" id="pages" style="width: auto; text-align: center; background-image: none">
                @foreach($pages as $key => $value)
                    @if($key == '/')
                        <option value="{{$key}}" selected> {{$value}}</option>
                    @else
                        <option value="{{$key}}"> {{$value}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary btn-icon waves-effect waves-light" data-role="refresh" style="width: 40px; height: 40px; transition: 250ms all">
            <i class="fas fa-redo-alt"></i>
        </button>
    </div>
    <div class="flex-grow-1 d-flex align-items-center justify-content-center mx-1">

        <button class="btn btn-secondary btn-icon waves-effect waves-light mx-25 toDesktopBtn"
                style="width: 40px; height: 40px;">
            <i class="fas fa-desktop"></i>
        </button>
        <button class="btn btn-secondary btn-icon waves-effect waves-light mx-25 toTabletBtn"
                style="width: 40px; height: 40px;">
            <i class="fas fa-tablet"></i>
        </button>
        <button class="btn btn-secondary btn-icon waves-effect waves-light mx-25 toMobileBtn"
                style="width: 40px; height: 40px;">
            <i class="fas fa-mobile"></i>
        </button>

    </div>
    <div class="mx-1" style="display: flex; align-items: center; gap: 8px">
        <form method="POST">
            <textarea name="save_content" id="save_content" style="display: none; visibility: hidden; opacity: 0;"></textarea>
            <button class="btn btn-primary me-50" data-role="save" type="submit"> Kaydet</button>
        </form>
        <button class="btn btn-secondary"> Kapat</button>
    </div>
</nav>
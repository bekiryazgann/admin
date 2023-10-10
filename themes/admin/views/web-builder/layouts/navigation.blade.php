<div class="main-menu-content d-flex flex-column">
    <ul class="navigation navigation-main flex-grow-1" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item disable-drag">
            <button class="btn btn-primary box-shadow-0" style="margin: 0 15px; width: calc(100% - 30px)"> Seo</button>
        </li>
        <li class="navigation-header web-builder-page-name disable-drag">
            <span data-role="page-title"> Anasayfa </span>
        </li>
        <div class="dragger-container">
            <ul class="dragger draggable">
                @foreach($navigation as $navigate)
                    <li class="nav-item active">
                        <a class="d-flex align-items-center justify-content-between"
                           data-key="{{md5($navigate['title'])}}"
                           data-name="{{$navigate['title']}}">
                            <div>
                            <span class="menu-title text-truncate">
                                {{$navigate['title']}}
                            </span>
                            </div>
                            <i class="fas fa-grip-lines me-0 drag-handler"></i>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </ul>
    <ul class="navigation navigation-main"
        id="main-menu-navigation"
        data-menu="menu-navigation">
        <li class="nav-item">
            <a>
                <button class="btn btn-primary w-100 box-shadow-0" data-role="addNewComponent">
                    Yeni Bileşen Ekle
                </button>
            </a>
            <a>
                <button class="btn btn-primary w-100 box-shadow-0">
                    Genel Ayarlar
                </button>
            </a>
        </li>
    </ul>
</div>
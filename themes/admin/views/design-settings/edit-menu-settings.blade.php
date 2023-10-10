@extends('layouts.layout')
@section('title', trans('Menü Düzenle'))
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">@trans(Menü Düzenle)</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl()}}">@trans(Yönetim Paneli)</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{siteUrl('design-settings/menu-settings')}}">
                                    @trans(Menü Ayarları)
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                @trans(Menü Düzenle)
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 text-end">
            <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#add-menu-canvas"
                    aria-controls="add-menu-canvas">Menü Ekle
            </button>
        </div>
    </div>
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Menü </h3>
            </div>
            <div class="card-body">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="dd nestable" id="nestable">
                                <ol class="dd-list">
                                    @isset($data->json)
                                        @foreach(json_decode($data->json) as $value)
                                            @if($value->deleted !== '1')
                                                <li class="dd-item"
                                                    data-id="{{$value->id}}"
                                                    data-name="{{$value->name}}"
                                                    data-slug="{{$value->slug}}"
                                                    data-new="{{$value->new}}"
                                                    data-deleted="{{$value->deleted}}">
                                                    <div class="dd-handle">{{$value->name}}</div>
                                                    <span class="button-delete btn btn-danger btn-xs pull-right"
                                                          data-owner-id="{{$value->id}}">
                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                            </span>
                                                    <span class="button-edit btn btn-primary btn-xs pull-right"
                                                          data-owner-id="{{$value->id}}">
                                                <i class="fas fa-pencil" aria-hidden="true"></i>
                                            </span>
                                                    @isset($value->children)
                                                        <ol class="dd-list">
                                                            @foreach($value->children as $value1)
                                                                @if($value1->deleted !== '1')
                                                                    <li class="dd-item"
                                                                        data-id="{{$value1->id}}"
                                                                        data-name="{{$value1->name}}"
                                                                        data-slug="{{$value1->slug}}"
                                                                        data-new="{{$value1->new}}"
                                                                        data-deleted="{{$value1->deleted}}">
                                                                        <div class="dd-handle">{{$value1->name}}</div>
                                                                        <span class="button-delete btn btn-danger btn-xs pull-right"
                                                                              data-owner-id="{{$value1->id}}">
                                                                        <i class="fas fa-trash" aria-hidden="true"></i>
                                                                    </span>
                                                                        <span class="button-edit btn btn-primary btn-xs pull-right"
                                                                              data-owner-id="{{$value1->id}}">
                                                                        <i class="fas fa-pencil" aria-hidden="true"></i>
                                                                    </span>
                                                                        @isset($value1->children)
                                                                            <ol class="dd-list">

                                                                                @foreach($value1->children as $value2)
                                                                                    @if($value2->deleted !== '1')
                                                                                        <li class="dd-item"
                                                                                            data-id="{{$value2->id}}"
                                                                                            data-name="{{$value2->name}}"
                                                                                            data-slug="{{$value2->slug}}"
                                                                                            data-new="0"
                                                                                            data-deleted="0">
                                                                                            <div class="dd-handle">{{$value2->name}}</div>
                                                                                            <span class="button-delete btn btn-danger btn-xs pull-right"
                                                                                                  data-owner-id="{{$value2->id}}">
                                                                                            <i class="fas fa-trash" aria-hidden="true"></i>
                                                                                        </span>
                                                                                            <span class="button-edit btn btn-primary btn-xs pull-right"
                                                                                                  data-owner-id="{{$value2->id}}">
                                                                                            <i class="fas fa-pencil" aria-hidden="true"></i>
                                                                                        </span>
                                                                                            @isset($value2->children)
                                                                                                <ol class="dd-list">

                                                                                                    @foreach($value2->children as $value3)
                                                                                                        @if($value3->deleted !== '1')
                                                                                                            <li class="dd-item"
                                                                                                                data-id="{{$value3->id}}"
                                                                                                                data-name="{{$value3->name}}"
                                                                                                                data-slug="{{$value3->slug}}"
                                                                                                                data-new="0"
                                                                                                                data-deleted="0">
                                                                                                                <div class="dd-handle">{{$value3->name}}</div>
                                                                                                                <span class="button-delete btn btn-danger btn-xs pull-right"
                                                                                                                      data-owner-id="{{$value3->id}}">
                                                                                                                <i class="fas fa-trash" aria-hidden="true"></i>
                                                                                                            </span>
                                                                                                                <span class="button-edit btn btn-primary btn-xs pull-right"
                                                                                                                      data-owner-id="{{$value3->id  }}">
                                                                                                                <i class="fas fa-pencil" aria-hidden="true"></i>
                                                                                                            </span>
                                                                                                                <ol class="dd-list">
                                                                                                                    @isset($value3->children)
                                                                                                                        <ol class="dd-list">

                                                                                                                            @foreach($value3->children as $value4)
                                                                                                                                @if($value4->deleted !== '1')
                                                                                                                                    <li class="dd-item"
                                                                                                                                        data-id="{{$value4->id}}"
                                                                                                                                        data-name="{{$value4->name}}"
                                                                                                                                        data-slug="{{$value4->slug}}"
                                                                                                                                        data-new="0"
                                                                                                                                        data-deleted="0">
                                                                                                                                        <div class="dd-handle">{{$value4->name}}</div>
                                                                                                                                        <span class="button-delete btn btn-danger btn-xs pull-right"
                                                                                                                                              data-owner-id="{{$value4->id}}">
                                                                                                                                        <i class="fas fa-trash" aria-hidden="true"></i>
                                                                                                                                    </span>
                                                                                                                                        <span class="button-edit btn btn-primary btn-xs pull-right"
                                                                                                                                              data-owner-id="{{$value4->id}}">
                                                                                                                                        <i class="fas fa-pencil" aria-hidden="true"></i>
                                                                                                                                    </span>
                                                                                                                                    </li>
                                                                                                                                @endif
                                                                                                                            @endforeach

                                                                                                                        </ol>
                                                                                                                    @endisset
                                                                                                                </ol>
                                                                                                            </li>
                                                                                                        @endif
                                                                                                    @endforeach

                                                                                                </ol>
                                                                                            @endisset
                                                                                        </li>
                                                                                    @endif
                                                                                @endforeach

                                                                            </ol>
                                                                        @endisset
                                                                    </li>
                                                                @endif
                                                            @endforeach

                                                        </ol>
                                                    @endisset
                                                </li>
                                            @endif
                                        @endforeach
                                    @endisset
                                </ol>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="card bg-transparent box-shadow-0">
            <div class="card-header">
                <div></div>
                <div>
                    <form method="POST">
                        @csrf
                        <textarea class="form-control" id="json-output" rows="5" style="display: none;"
                                  name="json"></textarea>
                        <button class="btn btn-primary waves-effect waves-float waves-light" type="submit">Kaydet
                        </button>
                        <button class="btn btn-outline-primary waves-effect" type="reset">Vazgeç</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-end"
             tabindex="-1" id="add-menu-canvas"
             aria-labelledby="add-menu-canvas"
             style="visibility: hidden;"
             aria-hidden="true">
            <div class="offcanvas-header">
                <h5 id="offcanvasEndLabel" class="offcanvas-title"> Menü Ekle </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form class="form-inline" id="menu-add">
                    <h3>Menü Ekle </h3>
                    <div class="form-group">
                        <label for="addInputName"> İsim </label>
                        <input type="text"
                               class="form-control"
                               id="addInputName"
                               placeholder="Hakkımızda"
                               required>
                    </div>
                    <div>&nbsp;</div>
                    <div class="form-group">
                        <label for="addInputSlug">Slug &nbsp;</label>
                        <input type="text"
                               class="form-control"
                               id="addInputSlug"
                               placeholder="hakkimizda"
                               required>
                    </div>
                    <button type="submit"
                            class="btn btn-primary mb-1 d-grid w-100 waves-effect waves-float waves-light mt-2"
                            id="addButton">Ekle
                    </button>
                    <button type="button" class="btn btn-outline-secondary d-grid w-100 waves-effect"
                            data-bs-dismiss="offcanvas">
                        Cancel
                    </button>
                </form>
            </div>
        </div>

        <div class="offcanvas offcanvas-end"
             tabindex="-1" id="edit-menu-canvas"
             aria-labelledby="edit-menu-canvas"
             style="visibility: hidden;"
             aria-hidden="true">
            <div class="offcanvas-header">
                <h5 id="offcanvasEndLabel" class="offcanvas-title"> Menü Düzenle </h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form class="form-inline" id="menu-editor" style="display: none">
                    <h3 style="display: none">Editing <span id="currentEditName"></span></h3>
                    <div class="form-group">
                        <label for="addInputName">İsim</label>
                        <input type="text" class="form-control" id="editInputName" placeholder="Item name"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="addInputSlug">Slug</label>
                        <input type="text" class="form-control" id="editInputSlug" placeholder="item-slug">
                    </div>

                    <button type="submit"
                            class="btn btn-primary mb-1 d-grid w-100 waves-effect waves-float waves-light mt-2"
                            id="editButton"> Kaydet
                    </button>
                    <button type="button" class="btn btn-outline-secondary d-grid w-100 waves-effect"
                            data-bs-dismiss="offcanvas">
                        Cancel
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{themeAssets('assets/css/menu-style.css')}}">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Nestable/2012-10-15/jquery.nestable.js"></script>
    <script src="{{themeAssets('assets/js/menu-script.js')}}"></script>
@endsection
@extends('theme-editor.components.layout')
@section('title', 'Tema Editörü')
@section('content')
    <div class="w-100 d-flex justify-content-center align-items-center" style="height: calc(100vh - 139px);">
        <iframe src="https://editor-47fe7f5a-6ece-448b-8780-05bd754584ae.myikas.com/" class="rounded box-shadow-1 w-100 h-100 iframe" style="transition: 350ms all"></iframe>
    </div>
@endsection
@section('scripts')
    <script>
        (function (){
            let responsiveBtn = $('.responsive-btn');
            let iframe = $('.iframe');
            let idoc = document.querySelector('.iframe');
            console.log(idoc);

            responsiveBtn.on('click', function (){
                responsiveBtn.removeClass('active');
                $(this).addClass('active');
                let width = $(this).data('width');
                iframe.attr("style", "width: " + width + "px !important; transition: 350ms all;");
            })
        })();
    </script>
@endsection
<?php

	namespace themes\admin\controller;

	use Core\Controller;
    use GuzzleHttp\Psr7\Request;
    use Illuminate\Database\Capsule\Manager;
    use Symfony\Component\HttpFoundation\Response;

    class JavaScript extends Controller
	{
        /**
         * @param Response $request
         * @return string
         */
		public function firstDataLoad(Response $response): string
		{


            $content = "                \"use strict\"
            
            
                function live(eventType, elementId, cb) {
                    document.addEventListener(eventType, function (event) {
                        if (event.target.id === elementId) {
                            cb.call(event.target, event);
                        }
                    });
                }
                let url = \"".siteUrl()."\";
                let assetUrl = \"" . themeAssets('') . "\";
                let tinymceConfig = {
                    menubar: false,
                    skin: 'oxide-dark',
                    content_css: assetUrl + \"assets/css/tinymce.css\",
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    height: 450,
                    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | fullscreen | code |',
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px; color: #fff;}'
                }
                let datatableOptions = {
                    language: {url: '". siteUrl('../lang/datatables/tr.json') ."'},
                    pageLength: 15,
                    lengthMenu: [
                        [10, 15, 20, 50, 100, 200, 300, 500],
                        [
                            '10 " .  trans('Adet') . "',
                            '15 " .  trans('Adet') . "',
                            '20 " .  trans('Adet') . "',
                            '50 " .  trans('Adet') . "',
                            '100 " .  trans('Adet') . "',
                            '200 " .  trans('Adet') . "',
                            '300 " .  trans('Adet') . "',
                            '500 " .  trans('Adet') . "',
                        ]
                    ],
                    processing: true,
                    serverSide: true,
                    dom: \"<\\\"d-flex justify-content-between align-items-center px-2\\\"<\\\"d-flex align-items-center tools-container\\\"l<\\\"tools\\\"><\\\"tools-export-btn\\\"B>>f><tr><\\\"d-flex justify-content-between align-items-center p-2\\\"ip>\",
                    buttons: [
                        {
                            extend: 'collection',
                            className: 'btn btn-outline-secondary dropdown-toggle waves-effect waves-float waves-light',
                            text: '". trans('Dışa Aktar') ."',
                            buttons: [
                                {
                                    extend: 'print',
                                    text: '<i class=\"far fa-print me-50 font-small-4\"></i> " .  trans('Yazdır') . "',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [1, 2, 3, 4, 5]}
                                },
                                {
                                    extend: 'csv',
                                    text: '<i class=\"far fa-file-csv me-50 font-small-4\"></i> " .  trans('Csv') . "',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [1, 2, 3, 4, 5]}
                                },
                                {
                                    extend: 'excel',
                                    text: '<i class=\"far fa-file-excel me-50 font-small-4\"></i> " .  trans('Excel') . "',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [1, 2, 3, 4, 5]}
                                },
                                {
                                    extend: 'pdf',
                                    text: '<i class=\"far fa-file-pdf me-50 font-small-4\"></i> " .  trans('Pdf') . "',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [1, 2, 3, 4, 5]}
                                },
                                {
                                    extend: 'copy',
                                    text: '<i class=\"far fa-copy me-50 font-small-4\"></i> " .  trans('Kopyala') . "',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [1, 2, 3, 4, 5]}
                                }
                            ],
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                                $(node).parent().removeClass('btn-group');
                                setTimeout(function () {
                                    $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
                                }, 50);
                            }
                        }
                    ]
                }
                document.querySelector('.nav-link-style').addEventListener('click', e => {
                    let other = '';
                    if(document.querySelector('html').dataset.layout === 'light-layout'){
                        other = 'dark-layout'

                    } else {
                        other = 'light-layout'
                    } 
                    document.querySelector('html').dataset.layout = other
                    console.log(other)
                    
                    $.post(url + 'api/change-layout', {
                        data: other
                    })
                })
                
                function sku() {
                  var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                  var code = '';
                
                  for (var i = 0; i < 11; i++) {
                    var randomIndex = Math.floor(Math.random() * characters.length);
                    code += characters[randomIndex];
                  }
                
                  return code;
                }
            ";

            $response->headers->set('Content-Type', 'application/javascript');
			return $content;
		}

        public function changeLayout(Response $response, \Symfony\Component\HttpFoundation\Request $request)
        {
            $response->headers->set('Content-Type', 'application/json');

            $status = Manager::table('user')
                ->where('user_key', auth()->get('login'))
                ->update([
                    "layout" => post('data'),
                ]);

            $response->setContent(json_encode([
                'data' => post('data')
            ]));
            return $response->getContent();
        }

        public function lastDataLoad(Response $response): Response
        {
            $content =
                "$('#selectMedia').on('hidden.bs.modal', function (e) {
                    $('#selectMedia input.media-select').each(function (key, elem) {
                        elem.checked = false;
                    });
                });
            
                $('#selectMedia').on('show.bs.modal', function (e){
                     $.post(url + 'api/getModal' , {modal: 'media-content'}, function(response){
                        $('#selectMedia').html(response.html);
                     }, 'json');
                });
            
                $(window).on('load', function () {
                    if (feather) {
                        feather.replace({width: 14, height: 14})
                    }
                });
            
                /*
                setInterval(function (){
                    $.get(url + 'api/getToken', {}, function (response){
                        console.log(response);
                    })
                }, 1000)
                */";

            if (cookie('msg')){
                $content .= '  ' . " toastr['info'](\"".cookie('msg')."\", \"". trans('Bilgi') ."\", {
                        closeButton: true,
                        tapToDismiss: false,
                        rtl: false
                    });";
            }
            $response->headers->set('Content-Type', 'application/javascript');
            return $response->setContent($content);
        }
	}
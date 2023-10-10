class iframe {
    constructor(iframeContainer) {
        this.iframeContainer = iframeContainer;
        this.html = '';
        this.css = '';
        this.js = '';
        this.iframeElement = null;
        this.number = 0;
    }

    addCode(html, css, js) {
        this.html += '\n' + html;
        this.css +=  '\n' + css;
        this.js +=  '\n' + js;

        console.log(this.html);
    }

    reset() {
        this.html = '';
        this.css = '';
        this.js = '';
    }

    iframeBas() {
        this.number ++;
        this.iframeElement ? this.iframeElement.remove() : null;
        this.iframeElement = document.createElement('iframe');
        this.iframeElement.classList.add('web-builder-iframe');
        this.iframeElement.classList.add('w-100')
        this.iframeElement.setAttribute('srcdoc', "<body style='height: 100vh; width: 100%;background: #fff;'><h1 style='text-align: center; font-family: \"Helvetica Neue\", \"Helvetica\", \"Arial\", sans-serif'> Yükleniyor </h1></body>");
        this.iframeElement.setAttribute('srcdoc', `
            <!doctype html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
                 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                 <meta http-equiv="X-UA-Compatible" content="ie=edge">
                 <title>Document</title>
                 <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
                 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.2/css/all.css">
                 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
                 <style>*,::before,::after{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::before,::after{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,[type='button'],[type='reset'],[type='submit']{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type='search']{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dl,dd,h1,h2,h3,h4,h5,h6,hr,figure,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}ol,ul,menu{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}button,[role="button"]{cursor:pointer}:disabled{cursor:default}img,svg,video,canvas,audio,iframe,embed,object{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*,::before,::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x:;--tw-pan-y:;--tw-pinch-zoom:;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position:;--tw-gradient-via-position:;--tw-gradient-to-position:;--tw-ordinal:;--tw-slashed-zero:;--tw-numeric-figure:;--tw-numeric-spacing:;--tw-numeric-fraction:;--tw-ring-inset:;--tw-ring-offset-width:0;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246/0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur:;--tw-brightness:;--tw-contrast:;--tw-grayscale:;--tw-hue-rotate:;--tw-invert:;--tw-saturate:;--tw-sepia:;--tw-drop-shadow:;--tw-backdrop-blur:;--tw-backdrop-brightness:;--tw-backdrop-contrast:;--tw-backdrop-grayscale:;--tw-backdrop-hue-rotate:;--tw-backdrop-invert:;--tw-backdrop-opacity:;--tw-backdrop-saturate:;--tw-backdrop-sepia:}::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x:;--tw-pan-y:;--tw-pinch-zoom:;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position:;--tw-gradient-via-position:;--tw-gradient-to-position:;--tw-ordinal:;--tw-slashed-zero:;--tw-numeric-figure:;--tw-numeric-spacing:;--tw-numeric-fraction:;--tw-ring-inset:;--tw-ring-offset-width:0;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246/0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur:;--tw-brightness:;--tw-contrast:;--tw-grayscale:;--tw-hue-rotate:;--tw-invert:;--tw-saturate:;--tw-sepia:;--tw-drop-shadow:;--tw-backdrop-blur:;--tw-backdrop-brightness:;--tw-backdrop-contrast:;--tw-backdrop-grayscale:;--tw-backdrop-hue-rotate:;--tw-backdrop-invert:;--tw-backdrop-opacity:;--tw-backdrop-saturate:;--tw-backdrop-sepia:} #root{position:relative;width:100vw;overflow-x:hidden}html, body, #root {height: 100%;} body{background: #fff;} img{position: relative; z-index: 0;}</style>
                 <style>${this.css}</style>
                 <style>
                    @media (min-width: 640px) {
                      .container {
                        max-width: 1253px!important;
                      }
                    }
                    
                    @media (min-width: 768px) {
                      .container {
                        max-width: 1253px!important;
                      }
                    }
                    
                    @media (min-width: 1024px) {
                      .container {
                        max-width: 1253px!important;
                      }
                    }
                    
                    @media (min-width: 1280px) {
                      .container {
                        max-width: 1253px!important;
                      }
                    }
                    
                    @media (min-width: 1536px) {
                      .container {
                        max-width: 1253px!important;
                      }
                    }  
                 </style>
            </head>
            <body>
                <div id="root">
                    ${this.html}
                </div>
                <script>
                  const links = document.querySelectorAll('a');
                  const forms = document.querySelectorAll('form');
                
                  links.forEach(function(link) {
                    link.addEventListener('click', function(event) {
                      event.preventDefault();
                    });
                  });
                
                  forms.forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                      event.preventDefault();
                    });
                  });
                </script>
                <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
                <script>${this.js}</script>
            </body>
            </html>
        `)
        this.iframeContainer.appendChild(this.iframeElement);

        this.reset();
    }
}

class iframe2 {
    constructor(iframe) {
        this.html = ''
        this.css = ''
        this.js = ''

        this.iframe = iframe;
    }


    writeSrcDoc(content = '', style = '', script = '') {


        script = (script !== '') ? `<script>${this.js}</script>` : '';
        style = (style !== '') ? `<style>${this.css}</style>` : '';

        this.iframe.srcdoc = `
            <!doctype html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
                 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                 <meta http-equiv="X-UA-Compatible" content="ie=edge">
                 <title>Document</title>
                 <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
                 <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.2/css/all.css">
                 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
                 <style>*,::before,::after{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::before,::after{--tw-content:''}html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,[type='button'],[type='reset'],[type='submit']{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type='search']{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dl,dd,h1,h2,h3,h4,h5,h6,hr,figure,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}ol,ul,menu{list-style:none;margin:0;padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}button,[role="button"]{cursor:pointer}:disabled{cursor:default}img,svg,video,canvas,audio,iframe,embed,object{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*,::before,::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x:;--tw-pan-y:;--tw-pinch-zoom:;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position:;--tw-gradient-via-position:;--tw-gradient-to-position:;--tw-ordinal:;--tw-slashed-zero:;--tw-numeric-figure:;--tw-numeric-spacing:;--tw-numeric-fraction:;--tw-ring-inset:;--tw-ring-offset-width:0;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246/0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur:;--tw-brightness:;--tw-contrast:;--tw-grayscale:;--tw-hue-rotate:;--tw-invert:;--tw-saturate:;--tw-sepia:;--tw-drop-shadow:;--tw-backdrop-blur:;--tw-backdrop-brightness:;--tw-backdrop-contrast:;--tw-backdrop-grayscale:;--tw-backdrop-hue-rotate:;--tw-backdrop-invert:;--tw-backdrop-opacity:;--tw-backdrop-saturate:;--tw-backdrop-sepia:}::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x:;--tw-pan-y:;--tw-pinch-zoom:;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position:;--tw-gradient-via-position:;--tw-gradient-to-position:;--tw-ordinal:;--tw-slashed-zero:;--tw-numeric-figure:;--tw-numeric-spacing:;--tw-numeric-fraction:;--tw-ring-inset:;--tw-ring-offset-width:0;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246/0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur:;--tw-brightness:;--tw-contrast:;--tw-grayscale:;--tw-hue-rotate:;--tw-invert:;--tw-saturate:;--tw-sepia:;--tw-drop-shadow:;--tw-backdrop-blur:;--tw-backdrop-brightness:;--tw-backdrop-contrast:;--tw-backdrop-grayscale:;--tw-backdrop-hue-rotate:;--tw-backdrop-invert:;--tw-backdrop-opacity:;--tw-backdrop-saturate:;--tw-backdrop-sepia:} #root{position:relative;width:100vw;overflow-x:hidden}html, body, #root {height: 100%;} body{background: #fff;}</style>
                 <style>${style}</style>
            </head>
            <body>
                <div id="root">
                    ${this.html}
                </div>
                <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
                ${script}
            </body>
            </html>`;
        this.dataHolderReset();

    }

    dataHolderSet(html, css, js) {
        this.html += html;
        this.css += css;
        this.js += js;
    }

    dataHolderReset() {
        this.html = '';
        this.css = '';
        this.js = '';
    }

    dataHolderGet() {
        this.writeSrcDoc(this.html, this.css, this.js)
        /*
        return {
            html: this.html,
            css: this.css,
            js: this.js,
        }
        */
    }
}

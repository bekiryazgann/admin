let builder = new class Builder {
    constructor() {
        this.iframeContainer = document.querySelector('.iframe-container');
        this.iframe = document.createElement('iframe');
        this.iframe.classList.add('w-100', 'web-builder-iframe')
        this.iframeContainer.appendChild(this.iframe);
        this.refreshButton = document.querySelector('[data-role="refresh"]');
        this.sortableContainer = document.querySelector('.draggable');
        this.apiUrl = window.location.origin + '/admin/api';
        this.activePage = '/';
        this.canvas = $('#canvas');
        this.bsCanvas = new bootstrap.Offcanvas(canvas);
        this.saveButton = document.querySelector('[data-role="save"]');
        this.pageTitle = document.querySelector('[data-role="page-title"]');
        this.contentsBackup;

        this.init().then(r => r)


        this.codes = [[], [], []]

        this.activePopup = '';
        this.scrollPos = 0;
        this.addNewComponentButton = document.querySelector('[data-role="addNewComponent"]')
        this.addNewComponentModal = $('#newComponentModal.newComponentModal');

    }

    /**
     * Initial
     * @returns {Promise<void>}
     */
    async init() {
        // Load are Interface Data
        await fetch(this.apiUrl + '/interfaces')
            .then(response => response.json())
            .then(response => {
                this.contents = response
                this.contentsBackup = response
                console.log(response);
            })
            .catch(error => {
                this.contents = {"/": {"seo": {}, "components": {}}}
                console.error(error);
            }).finally(() => {
                console.log(this.contentsBackup);
            })

        await this.render(true);
        await this.controls();
        await this.mutationControl();
    }

    /**
     * Render
     * @param status
     * @returns {Promise<void>}
     */
    async render(status = false) {
        const components = Object.entries(this.contents[this.activePage].components);

        document.querySelector('#save_content').value = JSON.stringify(this.contents);

        if (status) {
            while (this.sortableContainer.firstChild) {
                this.sortableContainer.removeChild(this.sortableContainer.firstChild);
            }

            for (const [key, val] of components) {
                let key1 = val.role + '-' + val.id + '-' + key;
                const newLi = document.createElement('li');
                newLi.classList.add('nav-item', 'active');
                const newLink = document.createElement('a');
                newLink.classList.add('d-flex', 'align-items-center', 'justify-content-between');
                newLink.setAttribute('data-id', val.id);
                newLink.setAttribute('data-role', val.role);
                newLink.setAttribute('data-key', key1);
                newLink.setAttribute('data-json', JSON.stringify(val))
                const newDiv = document.createElement('div');
                const newSpan = document.createElement('span');
                newSpan.classList.add('menu-title', 'text-truncate');
                newSpan.textContent = val.name;
                const newI = document.createElement('i');
                newI.classList.add('fas', 'fa-grip-lines', 'me-0', 'drag-handler');
                newDiv.appendChild(newSpan);
                newLink.appendChild(newDiv);
                newLink.appendChild(newI);
                newLi.appendChild(newLink);
                this.sortableContainer.appendChild(newLi);

                let method = e => {
                    fetch(window.location.origin + '/admin/web-builder/canvas/' + val.role + '/' + val.id + '/' + key1 + '?data=' + encodeURIComponent(JSON.stringify(val.values)))
                        .then(response => response.text())
                        .then(response => {
                            this.canvas.html(response);
                            this.bsCanvas.show();
                            this.mutationControl();

                            this.canvas.on('submit', "form", e => {
                                this.bsCanvas.hide();
                                e.preventDefault();
                            });
                            this.canvas.on('hidden.bs.offcanvas', hiddenBsOffCanvas)
                        }).catch(error => {
                        console.log(error)
                    });

                }

                let hiddenBsOffCanvas = async e => {
                    let newContents = {
                        seo: this.contents[this.activePage].seo,
                        components: []
                    };

                    // :not(:first-child):not(:last-child)
                    await this.sortableContainer.querySelectorAll('li.nav-item.active').forEach(elem => {
                        newContents.components.push(JSON.parse(elem.querySelector('a').dataset.json))
                    })

                    let set = async (contents) => {
                        await (this.contents[this.activePage] = contents)
                    }

                    // console.log(this.contents[this.activePage].components)
                    await set(newContents);
                    setTimeout(async e => {
                        await this.render(true).then()
                    }, 300)
                    await newLi.removeEventListener('click', method)
                    await this.canvas.off('hidden.bs.offcanvas', hiddenBsOffCanvas);
                    this.canvas.innerHTML = '';
                }
                newLi.addEventListener('click', method);
            }
        }

        for (const [key, val] of components) {

            try {
                const response = await fetch(`${this.apiUrl}/component/${val.role}/${val.id}?data=${encodeURIComponent(JSON.stringify(val.values))}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(val)
                })
                    .then(response => response.json())
                    .then(response => {


                        this.codes[0].push(String(response.html))
                        this.codes[1].push(String(response.css))
                        this.codes[2].push(String(response.js))
                    })
                    .catch(error => console.error(error))
            } catch (error) {
                await console.error(error);
            }
        }
        this.iframe.src = 'data:text/html;base64,' + await this.schema();

        setTimeout(e => {
            this.iframe.contentWindow.postMessage({scrollPos: this.scrollPos}, '*');
            window.addEventListener('message', event => {
                if (typeof event.data.data !== "undefined") {
                    this.scrollPos = event.data.data
                }
            })
        }, 500)
    }

    /**
     * Schema
     * @returns {Promise<string>}
     */
    async schema() {
        let html = '';
        let css = '';
        let js = '';


        await this.codes[0].forEach((val) => html += ('\n' + val))
        await this.codes[1].forEach((val) => css += ('\n' + val))
        await this.codes[2].forEach((val) => js += ('\n' + val))


        let schema = `<!doctype html>
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
                 <style>${css}</style>
                 <style>@media (min-width:640px){.container{max-width:1253px!important}}@media (min-width:768px){.container{max-width:1253px!important}}@media (min-width:1024px){.container{max-width:1253px!important}}@media (min-width:1280px){.container{max-width:1253px!important}}@media (min-width:1536px){.container{max-width:1253px!important}} *{scroll-behavior: smooth;}</style>
            </head>
            <body>
                <div id="root">
                    ${html}
                </div>
                <script>document.querySelectorAll("a").forEach(e=>e.addEventListener("click",e=>e.preventDefault()));document.querySelectorAll("form").forEach(e=>e.addEventListener("submit",e=>e.preventDefault()));</script>
                <script>
                    window.addEventListener('message', function(event) {
                        if(typeof event.data.scrollPos !== "undefined") {
                            document.querySelector('#root').scrollTo(0, event.data.scrollPos)
                            console.log(event.data.scrollPos)
                            setInterval(e => {
                                event.source.postMessage({data: document.querySelector('#root').scrollTop}, '*');
                            }, 500)
                        }
                    });
                    
                    document.querySelector('#root').scrollTo(0, ${this.scrollPos})
                    
                    
                    
                </script>
                <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
                <script>${js}</script>
            </body>
            </html>`

        this.codes = [[], [], []]
        return btoa(unescape(encodeURIComponent(schema)))
    }

    controls() {
        this.refreshButton.addEventListener('click', e => {
            this.render().then()
            this.refreshButton.disabled = true;
            setTimeout(() => {
                this.refreshButton.disabled = false;
            }, 2500)
        });

        const sortable = new Sortable.default(this.sortableContainer, {
            draggable: '.nav-item.active',
            handle: ".drag-handler",
        });

        const addButton = document.querySelector('.click');

        sortable.on('sortable:stop', () => {
            setTimeout(async () => {
                let newContents = {
                    seo: this.contents[this.activePage].seo,
                    components: []
                };

                // :not(:first-child):not(:last-child)
                await this.sortableContainer.querySelectorAll('li.nav-item.active').forEach(elem => {
                    newContents.components.push(JSON.parse(elem.querySelector('a').dataset.json))
                })

                let set = async (contents) => {
                    await (this.contents[this.activePage] = contents)
                }

                // console.log(this.contents[this.activePage].components)
                await set(newContents);
                await this.render(true).then()
            }, 500)
        });

        document.querySelector('.toDesktopBtn').addEventListener('click', e => {
            this.iframeContainer.style.width = '100%';
        })
        document.querySelector('.toTabletBtn').addEventListener('click', e => {
            this.iframeContainer.style.width = '834px';
        })
        document.querySelector('.toMobileBtn').addEventListener('click', e => {
            this.iframeContainer.style.width = '380px';
        })

        document.querySelector('#pages').addEventListener('change', e => {
            this.activePage = e.target.value;
            this.pageTitle.innerText = e.target.querySelector(`[value="${e.target.value}"]`).innerText
            this.render(true).then();
            this.mutationControl()
        })

        this.saveButton.addEventListener('click', e => {
            console.log(this.contents);
        })

        this.addNewComponentButton.addEventListener('click', e => {
            this.addNewComponentModal.modal('toggle');
        });
    }

    mutationControl() {
        const ulElement = this.sortableContainer;

        const liElements = ulElement.querySelectorAll('li');

        let timer;
        let changed = false;

        liElements.forEach((li) => {
            const aElement = li.querySelector('a');

            let initialDataJson = aElement.getAttribute('data-json');

            const observer = new MutationObserver(() => {
                clearTimeout(timer);
                changed = true;

                console.log(initialDataJson);

                timer = setTimeout(async () => {
                    if (changed) {
                        let newContents = {
                            seo: this.contents[this.activePage].seo,
                            components: []
                        };

                        // :not(:first-child):not(:last-child)
                        await this.sortableContainer.querySelectorAll('li.nav-item.active').forEach(elem => {
                            newContents.components.push(JSON.parse(elem.querySelector('a').dataset.json))
                        })

                        let set = async (contents) => {
                            await (this.contents[this.activePage] = contents)
                        }

                        await set(newContents);
                        setTimeout(() => {
                            this.render().then()
                            setTimeout(() => this.refreshButton.click(), 300)
                        }, 300)
                        changed = false;
                    }
                }, 300);

            });

            observer.observe(aElement, {attributes: true, attributeOldValue: true});
        });
    }

    /**
     * UniqId
     * @returns {string}
     */
    uniqID() {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const length = 10;
        let uniqId = '';

        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * characters.length);
            uniqId += characters[randomIndex];
        }

        return uniqId;
    }
}
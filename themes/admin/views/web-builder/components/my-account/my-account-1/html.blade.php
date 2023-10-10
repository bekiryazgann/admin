<section class="my-10 lg:px-0 px-4">
    <div class="max-w-4xl mx-auto grid lg:gap-4 gap-10 lg:grid-cols-7 grid-cols-1" data-role="my-account-tab">
        <div class="lg:col-span-2 col-span-1">
            <nav>
                <ul class="flex gap-2 flex-col">
                    <li>
                        <button data-navName="user-info" class="tab-button active"> Kullanıcı Bilgilerim </button>
                    </li>
                    <li>
                        <button data-navName="address" class="tab-button"> Adresim </button>
                    </li>
                    <li>
                        <button data-navName="favorite-products" class="tab-button"> Beğendiğim Ürünler </button>
                    </li>
                    <li>
                        <button data-navName="orders" class="tab-button"> Siparişlerim </button>
                    </li>
                    <li>
                        <button data-navName="comments" class="tab-button"> Yorumlarım </button>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="lg:col-span-5 col-span-1">
            <!--# User Info #-->
            <div data-content-name="user-info" class="block">
                <h3 class="text-lg lg:mb-8 mb-2"> Kullanıcı Bilgilerim </h3>
                <form action="" class="flex flex-col gap-2">
                    <input type="text"
                           placeholder="Ad"
                           class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                    <input type="text"
                           placeholder="Soyad"
                           class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                    <input type="text"
                           placeholder="Telefon Numarası"
                           class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                    <input type="text"
                           placeholder="E-posta"
                           class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                    <div class="flex items-center justify-end">
                        <button class="py-2 px-4 rounded-md text-white text-left transition bg-blue-500 hover:bg-blue-700"> Kaydet </button>
                    </div>
                </form>
            </div>
            <!--# /User Info #-->

            <!--# Adress #-->
            <div data-content-name="address" class="hidden">
                <h3 class="text-lg lg:mb-8 mb-2"> Adresim </h3>

                <form action="" class="flex flex-col gap-2">
                    <input type="text"
                           placeholder="Ülke"
                           class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                    <div class="flex gap-2 lg:flex-row flex-col">
                        <input type="text"
                               placeholder="Ad"
                               class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                        <input type="text"
                               placeholder="Soyad"
                               class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                    </div>
                    <textarea type="text"
                              placeholder="Adres"
                              class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400 resize-none h-24"></textarea>
                    <input type="text"
                           placeholder="Apartman, daire, vb."
                           class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                    <div class="flex gap-2 lg:flex-row flex-col">
                        <input type="text"
                               placeholder="İl"
                               class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                        <input type="text"
                               placeholder="Posta Kodu"
                               class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                    </div>
                    <input type="text"
                           placeholder="Telefon"
                           class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                    <input type="text"
                           placeholder="E-posta"
                           class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                    <div class="flex items-center justify-end">
                        <button class="py-2 px-4 rounded-md text-white text-left transition bg-blue-500 hover:bg-blue-700">
                            Kaydet
                        </button>
                    </div>
                </form>
            </div>
            <!--# /Adress #-->

            <!--# Favorite Products #-->
            <div data-content-name="favorite-products" class="hidden">
                <h3 class="text-lg lg:mb-8 mb-2"> Beğendiğim Ürünler </h3>
                <div class="grid lg:grid-cols-3 grid-cols-2 gap-4">
                    <div class="border border-gray-200 rounded-md p-4">
                        <div class="rounded-md">
                            <img src="https://productimages.hepsiburada.net/s/50/222-222/11031113236530.jpg/format:webp" class="w-full" alt="">
                        </div>
                        <h3 class="lg:text-sm text-xs font-bold mt-2.5"> Xbox Series S 512 GB </h3>
                        <span class="text-xs text-gray-400 mt-1 font-bold"> Microsoft </span>
                        <div class="flex justify-between items-center lg:mt-3 mt-1">
                            <span class="font-bold lg:text-sm text-xs text-black"> 8.899₺ </span>
                            <button class="text-blue-500 transition hover:text-blue-300">
                                <i class="fas fa-heart text-lg"></i>
                            </button>
                        </div>
                        <button class="w-full lg:mt-6 mt-3 border border-gray-300 rounded-full lg:py-2 py-1 lg:px-4 px-2 text-blue-500 transition hover:border-blue-500 hover:text-white hover:bg-blue-500"> Sepete Ekle </button>
                    </div>
                    <div class="border border-gray-200 rounded-md p-4">
                        <div class="rounded-md">
                            <img src="https://productimages.hepsiburada.net/s/50/222-222/11031113236530.jpg/format:webp" class="w-full" alt="">
                        </div>
                        <h3 class="lg:text-sm text-xs font-bold mt-2.5"> Xbox Series S 512 GB </h3>
                        <span class="text-xs text-gray-400 mt-1 font-bold"> Microsoft </span>
                        <div class="flex justify-between items-center lg:mt-3 mt-1">
                            <span class="font-bold lg:text-sm text-xs text-black"> 8.899₺ </span>
                            <button class="text-blue-500 transition hover:text-blue-300">
                                <i class="fas fa-heart text-lg"></i>
                            </button>
                        </div>
                        <button class="w-full lg:mt-6 mt-3 border border-gray-300 rounded-full lg:py-2 py-1 lg:px-4 px-2 text-blue-500 transition hover:border-blue-500 hover:text-white hover:bg-blue-500"> Sepete Ekle </button>
                    </div>
                    <div class="border border-gray-200 rounded-md p-4">
                        <div class="rounded-md">
                            <img src="https://productimages.hepsiburada.net/s/50/222-222/11031113236530.jpg/format:webp" class="w-full" alt="">
                        </div>
                        <h3 class="lg:text-sm text-xs font-bold mt-2.5"> Xbox Series S 512 GB </h3>
                        <span class="text-xs text-gray-400 mt-1 font-bold"> Microsoft </span>
                        <div class="flex justify-between items-center lg:mt-3 mt-1">
                            <span class="font-bold lg:text-sm text-xs text-black"> 8.899₺ </span>
                            <button class="text-blue-500 transition hover:text-blue-300">
                                <i class="fas fa-heart text-lg"></i>
                            </button>
                        </div>
                        <button class="w-full lg:mt-6 mt-3 border border-gray-300 rounded-full lg:py-2 py-1 lg:px-4 px-2 text-blue-500 transition hover:border-blue-500 hover:text-white hover:bg-blue-500"> Sepete Ekle </button>
                    </div>
                    <div class="border border-gray-200 rounded-md p-4">
                        <div class="rounded-md">
                            <img src="https://productimages.hepsiburada.net/s/50/222-222/11031113236530.jpg/format:webp" class="w-full" alt="">
                        </div>
                        <h3 class="lg:text-sm text-xs font-bold mt-2.5"> Xbox Series S 512 GB </h3>
                        <span class="text-xs text-gray-400 mt-1 font-bold"> Microsoft </span>
                        <div class="flex justify-between items-center lg:mt-3 mt-1">
                            <span class="font-bold lg:text-sm text-xs text-black"> 8.899₺ </span>
                            <button class="text-blue-500 transition hover:text-blue-300">
                                <i class="fas fa-heart text-lg"></i>
                            </button>
                        </div>
                        <button class="w-full lg:mt-6 mt-3 border border-gray-300 rounded-full lg:py-2 py-1 lg:px-4 px-2 text-blue-500 transition hover:border-blue-500 hover:text-white hover:bg-blue-500"> Sepete Ekle </button>
                    </div>
                    <div class="border border-gray-200 rounded-md p-4">
                        <div class="rounded-md">
                            <img src="https://productimages.hepsiburada.net/s/50/222-222/11031113236530.jpg/format:webp" class="w-full" alt="">
                        </div>
                        <h3 class="lg:text-sm text-xs font-bold mt-2.5"> Xbox Series S 512 GB </h3>
                        <span class="text-xs text-gray-400 mt-1 font-bold"> Microsoft </span>
                        <div class="flex justify-between items-center lg:mt-3 mt-1">
                            <span class="font-bold lg:text-sm text-xs text-black"> 8.899₺ </span>
                            <button class="text-blue-500 transition hover:text-blue-300">
                                <i class="fas fa-heart text-lg"></i>
                            </button>
                        </div>
                        <button class="w-full lg:mt-6 mt-3 border border-gray-300 rounded-full lg:py-2 py-1 lg:px-4 px-2 text-blue-500 transition hover:border-blue-500 hover:text-white hover:bg-blue-500"> Sepete Ekle </button>
                    </div>
                    <div class="border border-gray-200 rounded-md p-4">
                        <div class="rounded-md">
                            <img src="https://productimages.hepsiburada.net/s/50/222-222/11031113236530.jpg/format:webp" class="w-full" alt="">
                        </div>
                        <h3 class="lg:text-sm text-xs font-bold mt-2.5"> Xbox Series S 512 GB </h3>
                        <span class="text-xs text-gray-400 mt-1 font-bold"> Microsoft </span>
                        <div class="flex justify-between items-center lg:mt-3 mt-1">
                            <span class="font-bold lg:text-sm text-xs text-black"> 8.899₺ </span>
                            <button class="text-blue-500 transition hover:text-blue-300">
                                <i class="fas fa-heart text-lg"></i>
                            </button>
                        </div>
                        <button class="w-full lg:mt-6 mt-3 border border-gray-300 rounded-full lg:py-2 py-1 lg:px-4 px-2 text-blue-500 transition hover:border-blue-500 hover:text-white hover:bg-blue-500"> Sepete Ekle </button>
                    </div>
                    <div class="border border-gray-200 rounded-md p-4">
                        <div class="rounded-md">
                            <img src="https://productimages.hepsiburada.net/s/50/222-222/11031113236530.jpg/format:webp" class="w-full" alt="">
                        </div>
                        <h3 class="lg:text-sm text-xs font-bold mt-2.5"> Xbox Series S 512 GB </h3>
                        <span class="text-xs text-gray-400 mt-1 font-bold"> Microsoft </span>
                        <div class="flex justify-between items-center lg:mt-3 mt-1">
                            <span class="font-bold lg:text-sm text-xs text-black"> 8.899₺ </span>
                            <button class="text-blue-500 transition hover:text-blue-300">
                                <i class="fas fa-heart text-lg"></i>
                            </button>
                        </div>
                        <button class="w-full lg:mt-6 mt-3 border border-gray-300 rounded-full lg:py-2 py-1 lg:px-4 px-2 text-blue-500 transition hover:border-blue-500 hover:text-white hover:bg-blue-500 disabled:text-gray-300" disabled> Sepete Ekle </button>
                    </div>
                </div>
            </div>
            <!--# /Favorite Products #-->

            <!--# Orders #-->
            <div data-content-name="orders" class="hidden">
                <h3 class="text-lg lg:mb-8 mb-2"> Siparişlerim </h3>
                <div class="grid grid-cols-1 gap-4">
                    <a class="block bg-gray-100 p-3 rounded-md grid grid-cols-12 gap-3 cursor-pointer" href="javascript: void(0);">
                        <div class="rounded-md col-span-2 relative lg:pb-4 px-0">
                            <img src="https://productimages.hepsiburada.net/s/50/222-222/11031113236530.jpg/format:webp" class="lg:w-[50px] lg:h-[50px] w-full rounded" alt="">
                            <img src="https://productimages.hepsiburada.net/s/44/222-222/10822851854386.jpg/format:webp" class="w-[50px] h-[50px] absolute top-[17px] left-[17px] lg:block hidden rounded" alt="">
                        </div>
                        <div class="col-span-10 flex justify-between items-center">
                            <div>
                                <h3 class="text-sm flex items-center"><span class="text-xs text-gray-500 lg:block hidden">Sipariş No: </span> <span class="font-bold ml-0.5 whitespace-nowrap">809 279 945 </span></h3>
                                <span class="text-xs text-gray-500">27 Ocak 2023<span class="lg:block hidden">, 13:20</span></span>
                            </div>
                            <h3 class="text-xs text-gray-500 lg:text-left text-center">Sipariş Tamamlandı</h3>
                            <h3 class="lg:text-sm text-xs font-bold">134.998,00₺</h3>
                        </div>
                    </a>
                </div>
            </div>
            <!--# /Orders #-->

            <!--# Comments #-->
            <div data-content-name="comments" class="hidden">
                <h3 class="text-lg lg:mb-8 mb-2"> Yorumlarım </h3>
                <div class="grid grid-cols-1 gap-4">
                    <div class="bg-gray-100 p-3 rounded-md grid grid-cols-12 gap-3">
                        <div class="rounded-md overflow-hidden col-span-2 flex items-center justify-center">
                            <img src="https://productimages.hepsiburada.net/s/50/222-222/11031113236530.jpg/format:webp" class="w-full" alt="">
                        </div>
                        <div class="col-span-10 flex flex-col justify-between">
                            <div class="flex items-start justify-between">
                                <div class="mb-2">
                                    <h3 class="mb-1 p-0 font-bold lg:text-sm text-xs"> Xbox Series S 512 GB - 8.899₺ </h3>
                                    <span class="text-xs block text-gray-500 lg:block hidden"> Microsoft </span>
                                </div>
                                <div class="flex items-center">
                                    <button class="text-rose-500 transition flex items-center hover:text-rose-700">
                                        <i class="fas fa-trash text-xs mr-1"></i>
                                        <span class="lg:block hidden">Yorumu Sil</span>
                                    </button>
                                    <span class="block ml-3"><span class="lg:block hidden">27 Kasım</span> 2019</span>
                                </div>
                            </div>
                            <p class="text-gray-400 truncate lg:text-base text-sm">Ön sipariş ile almıştım HepsiJet teslimat noktası ile sorunsuz
                                hızlıca geldi çok güzel bir sistemmiş. Ürün kutusu ek bir dayanıklı sert bir kutunun içine
                                konuşmuş şekilde geldi. Aynı anda sadece kaliteli yapımlardan en fazla 3-4 oyunu oynamak ve
                                bunlara yüklü bedel ödemeden GamePass (Ultimate) servisi ile ulaşmak...</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--# /Comments #-->
        </div>
    </div>
</section>
<header class="bg-blue-500 py-4 lg:hidden block">
    <!--# Mobile Header #-->
    <div class="container mx-auto flex justify-between items-center block px-4 relative bg-blue-500">
        <div class="flex items-center gap-4">
            <a class="text-white text-xl" data-role="menu-button">
                <i class="far fa-bars"></i>
            </a>
            <a class="text-white text-xl" data-role="search-button" data-search="header-1-search">
                <i class="far fa-search"></i>
            </a>
        </div>
        <div>
            <img class="invert" src="https://www.samsung.com/etc.clientlibs/samsung/clientlibs/consumer/global/clientlib-common/resources/images/gnb-desktop-120x32.png" alt="">
        </div>
        <div class="flex items-center gap-4">
            <a class="text-white text-xl" data-role="off-canvas-button">
                <i class="far fa-user"></i>
            </a>
            <a class="text-white text-xl" data-cart-button="true">
                <i class="far fa-shopping-cart"></i>
            </a>
        </div>

        <!--# Search Bar #-->
        <div class="transition-all duration-500 absolute inset-x-0 bg-gray-300 py-4 pb-2 px-5 -z-10" id="header-1-search">
            <label class='relative rounded-md overflow-hidden flex-1 lg:mx-80 md:mx-40 sm:mx-10 xs:mx-5 h-12'>
                <input type='text' class='py-2 px-3 pr-8 w-full h-full rounded-md shadow border border-gray-300'
                       placeholder='Ürün, kategori veya marka ara'>
                <span class='absolute inset-y-0 right-0 flex items-center justify-center px-2 pr-3'>
                        <i class="far fa-search text-xl"></i>
                    </span>
            </label>
        </div>
        <!--# Search Bar #-->
    </div>
    <!--# /Mobile Header #-->


    <!--# Mobile Bottom Bar #-->
    <?php if($data['bottom_bar']): ?>
        <style>
            @media (min-width: 1024px) {
                #root{
                    padding-bottom: 0!important;
                }
            }
            #root{
                padding-bottom: 56px;
            }
        </style>
        <div class="lg:hidden block fixed bottom-0 left-0 right-0 bg-gray-200 px-0 pt-3 pb-2 grid grid-cols-4 h-14 rounded-t-xl z-40">
            <a class="flex items-center flex-col justify-center text-xl text-blue-500">
                <i class="far fa-home"></i>
                <span class="text-center text-xs mt-1"> Anasayfa </span>
            </a>
            <a class="flex items-center flex-col justify-center text-xl text-blue-500" data-cart-button="true">
                <i class="far fa-shopping-cart"></i>
                <span class="text-center text-xs mt-1"> Sepetim </span>
            </a>
            <a class="flex items-center flex-col justify-center text-xl text-blue-500" data-role="off-canvas-button">
                <i class="far fa-user"></i>
                <span class="text-center text-xs mt-1"> Hesabım </span>
            </a>
            <a class="flex items-center flex-col justify-center text-xl text-blue-500" data-role="menu-button">
                <i class="far fa-bars"></i>
                <span class="text-center text-xs mt-1"> Menü </span>
            </a>
        </div>
    <?php endif; ?>
    <!--# /Mobile Bottom Bar #-->

    <!--# Mobile Menu #-->
    <div data-role="menu-content" class="transition duration-500 -translate-x-full z-20 fixed top-0 h-screen left-0 lg:w-[450px]  w-full flex flex-col h-full max-h-full gap-6">
        <div class="w-full h-full bg-black/10 fixed z-10" data-role="backdrop"></div>
        <div class="w-9/12 bg-white h-screen relative z-40">
            <div class="flex items-center p-6 pb-0">
                <button class="text-blue-500 mr-3" data-role="exit-button">
                    <i class="far fa-times text-xl mt-0.5"></i>
                </button>
            </div>
            <div class="flex-1 overflow-scroll px-6 flex flex-col gap-8">
                <nav>
                    <ul>
                        <li>
                            <a href=""> Elektronik </a>
                        </li>
                        <li>
                            <a href=""> Moda </a>
                        </li>
                        <li>
                            <a href=""> Ev Yaşam Kırtasiye </a>
                        </li>
                        <li>
                            <a href=""> Oto, Bahçe, Yapı Market </a>
                        </li>
                        <li>
                            <a href=""> Bilgisayar Tablet </a>
                        </li>
                        <li>
                            <a href=""> Bilgisayar Tablet </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--# /Mobile Menu #-->
</header><?php /**PATH /Users/bekir/Desktop/admin/themes/admin/views/web-builder/components/mobile-header/mobile-header-1/html.blade.php ENDPATH**/ ?>
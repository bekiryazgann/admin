<div class="transition duration-500" data-role="off-canvas-container">
    <div data-role="off-canvas-backdrop" class="transition duration-500 absolute z-10 w-full h-screen top-0 left-0 right-0 bottom-0 bg-black/10 translate-x-full"></div>
    <div data-role="off-canvas-content"  class="transition duration-500 absolute z-20 lg:w-[464px] w-full h-screen right-0 top-0 translate-x-full">
        <div class="flex flex-col h-full lg:p-[50px] p-5 bg-white drop-shadow-[-3_22px_4px_rgba(0,0,0,0.25)]">
            <div class="flex items-center lg:mb-11 mb-5">
                <button data-role="off-canvas-exit" class="text-blue-500">
                    <i class="far fa-times text-lg"></i>
                </button>
                <h3 class="text-blue-500 text-2xl font-bold ml-3"> {{$data['title']}} </h3>
            </div>
            <div class="flex flex-col flex-1">
                <label class="relative rounded-md w-full mb-7">
                    <input type="text" class="py-2 rounded-md px-3 w-full h-full" placeholder="E-posta adresi ve Telefon numarası">
                </label>
                <label class="relative rounded-md w-full mb-7">
                    <input type="password" class="py-2 rounded-md px-3 w-full h-full" placeholder="Şifre">
                </label>
                <div class="flex items-center justify-between mb-10">
                    <a href="#" class="block text-blue-500 hover:text-blue-700 transition"> Şifremi unuttum! </a>
                    <button class="lg:py-2 lg:px-3 py-1 px-2  bg-blue-500 rounded text-white hover:bg-blue-700 transition"> {{$data['continue_button']}} </button>
                </div>
                <p class="lg:text-left text-center lg:text-base text-sm">Hesabınız yok mu? <a href="#" class="text-blue-500 hover:text-blue-700 transition">Kayıt olun!</a></p>
            </div>
        </div>
    </div>
</div>

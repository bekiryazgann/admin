<div data-role="off-canvas-container">
    <div data-role="off-canvas-backdrop" class="transition duration-500 translate-x-full overlay absolute z-10 w-full h-full top-0 left-0 right-0 bottom-0 bg-black/10"></div>
    <div data-role="off-canvas-content" class="transition duration-500 translate-x-full absolute inset-1/2 z-20 -translate-x-2/4 -translate-y-2/4 w-screen h-screen flex items-center justify-center pointer-events-none">
        <div class="flex flex-col lg:p-[50px] p-8 rounded-lg bg-white drop-shadow-[0_93px_50px_rgba(0,0,0,0.30)] lg:w-[464px] w-full lg:mx-0 mx-5 lg:h-[430px] h-auto pointer-events-auto">
            <div class="flex items-center mb-5">
                <button data-role="off-canvas-exit" class="text-xl text-neutral-600">
                    <i class="far fa-times"></i>
                </button>
                <h3 class="text-neutral-600 text-2xl text-center ml-3"> {{$data['title']}} </h3>
            </div>
            <label class="relative rounded-md lg:w-[364px] w-[300px] mb-7">
                <input type="text" class="rounded-md py-2 px-3 w-full h-full" placeholder="E-posta adresi ve Telefon numarası">
            </label>
            <label class="relative rounded-md lg:w-[364px] w-[300px] mb-7">
                <input type="password" class="rounded-md py-2 px-3 w-full h-full" placeholder="Şifre">
            </label>
            <div class="flex items-center justify-between mb-10">
                <a href="#" class="lg:text-base text-sm block text-blue-500 hover:text-blue-700 transition"> Şifremi unuttum! </a>
                <button class="lg:py-2 lg:px-3 py-1 px-2 bg-blue-500 rounded text-white hover:bg-blue-700 transition"> {{$data['continue_button']}} </button>
            </div>
            <p class="lg:text-base text-sm lg:text-left text-center">Hesabınız yok mu? <a href="#" class="text-blue-500 hover:text-blue-700 transition">Kayıt olun!</a></p>
        </div>
    </div>
</div>
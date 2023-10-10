<div class="container mx-auto h-full">
    <div class="flex flex-col items-center justify-between h-full py-6">
        <div class="flex-1 inline-flex">
            <p class="mt-auto mb-[100px]">
                <img class="h-10" src="{{$data['logo']}}" alt="">
            </p>
        </div>
        <div class="flex-1">
            <div class="flex flex-col lg:p-[50px] p-5 rounded-md border border-1 border-neutral-600">
                <h3 class="text-neutral-600 text-2xl text-center mb-11"> {{$data['title']}} </h3>
                <label class='relative rounded-md lg:w-[364px] w-[300px] mb-7'>
                    <input type='text' class='py-2 px-3 w-full h-full rounded-md'
                           placeholder='E-posta adresi ve Telefon numarası'>
                </label>
                <label class='relative rounded-md lg:w-[364px] w-[300px] mb-7'>
                    <input type='password' class='py-2 px-3 w-full h-full rounded-md'
                           placeholder='Şifre'>
                </label>
                <div class="flex items-center justify-between mb-10">
                    <a href="#" class="block text-blue-500 hover:text-blue-700 transition lg:text-base text-sm"> Şifremi unuttum! </a>
                    <button class="lg:py-2 lg:px-3 py-1 px-2 bg-blue-500 rounded text-white hover:bg-blue-700 transition lg:text-base text-sm"> {{$data['continue_button']}} </button>
                </div>
                <p class="lg:text-left text-center">Hesabınız yok mu? <a href="#" class="text-blue-500 hover:text-blue-700 transition">Kayıt olun!</a></p>
            </div>
        </div>

        <div class="flex-1 inline-flex">
            <p class="mt-auto mb-0 text-blue-500 lg:text-base text-sm">{{$data['copyright']}}</p>
        </div>
    </div>
</div>
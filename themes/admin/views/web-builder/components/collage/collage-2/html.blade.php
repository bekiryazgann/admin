<section class="my-20">
    <div class="container mx-auto grid grid-cols-2 gap-3 grid-rows-1 lg:px-0 px-4">
        <div class="bg-[#F7F7F8] text-gray-700 rounded-md w-full flex items-center justify-center flex-col overflow-hidden">
            <img src="{{$data['image_1']}}" class="h-min-content drop-shadow-2xl" alt="">
        </div>
        <div class="bg-[#F7F7F8] text-gray-700 rounded-md w-full flex items-center justify-center flex-col overflow-hidden relative">

            <h3 class="relative z-30 lg:text-5xl text-2xl text-center lg:font-bold font-medium leading-tight text-white tracking-tight">{{$data['title']}}</h3>
            <a href="{{$data['button_url']}}" class="lg:text-lg text-sm relative z-30 mt-3 border border-1 lg:border-blue-500 border-white py-2 px-3 transition rounded text-white lg:hover:text-white hover:text-blue-500 lg:hover:bg-blue-500 hover:bg-white">
                {{$data['button_text']}}
            </a>
            <div class="w-full h-full absolute top-0 left-0 bg-blue-600/40 z-20"></div>
            <img src="{{$data['image_2']}}"
                 class="w-full h-min-content drop-shadow-2xl blur-sm absolute top-0 left-0 z-10" alt="">
        </div>
    </div>
</section>
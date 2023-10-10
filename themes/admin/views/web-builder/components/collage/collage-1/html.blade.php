<section class="my-20">
    <div class="container mx-auto grid grid-cols-2 gap-3 grid-rows-1 lg:px-0 px-4">
        <div class="bg-[#F7F7F8] text-gray-700 rounded-md w-full flex items-center justify-center flex-col overflow-hidden">
            <img src="{{$data['image_1']}}" class="h-min-content drop-shadow-2xl" alt="">
        </div>
        <div class="bg-[#F7F7F8] text-gray-700 rounded-md w-full flex items-center justify-center flex-col overflow-hidden">
            <img src="{{$data['image_2']}}" class="h-min-content drop-shadow-2xl" alt="">
        </div>
        <div class="col-span-2 bg-gray-100 text-gray-700 rounded-md w-full lg:p-14 p-8 flex items-center justify-center flex-col">
            <h3 class="lg:font-extrabold font-semibold text-gray-700 text-center lg:text-5xl text-2xl">{{$data['title']}}</h3>
            <a href="{{$data['button_url']}}" class="border border-1 border-blue-500 rounded py-2 px-6 lg:text-lg text-sm mt-5 transition text-blue-500  hover:bg-blue-500 hover:text-white">{{$data['button_text']}}</a>
        </div>
    </div>
</section>
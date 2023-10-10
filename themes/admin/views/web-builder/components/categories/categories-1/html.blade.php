<section class="my-10">
    <div class="max-w-6xl mx-auto">
        <h1 class="lg:text-4xl text-2xl lg:font-bold font-semibold text-center lg:mb-10 mb-4">{{$data['title']}}</h1>
        <div class="grid grid-cols-5 grid-rows-1 gap-2 lg:gap-6 md:px-0 px-4">
            @foreach($data['categories'] as $category)
                <div class="flex flex-col items-center justify-center transition cursor-pointer">
                    <div class="rounded w-full overflow-hidden mb-3">
                        <img class="w-full" src="{{$category['image']}}" alt="">
                    </div>
                    <h3 class="text-center text-blue-500 md:text-lg text-sm text-ellipsis max-w-full whitespace-nowrap overflow-hidden"> {{$category['name']}} </h3>
                </div>
            @endforeach
        </div>
    </div>
</section>
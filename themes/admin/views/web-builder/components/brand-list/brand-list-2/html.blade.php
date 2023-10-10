<section class="my-10">
    <div class="container mx-auto">
        <h3 class="text-blue-500 lg:text-5xl xl:text-3xl xl:text-left text-2xl text-center"> {{$data['title']}} </h3>
    </div>
    <div class="bg-blue-500 lg:mt-8 mt-4 lg:p-20 p-5">
        <ul class="flex items-center justify-between gap-4 sm:gap-0">
            @foreach($data['logos'] as $logo)
            <li>
                <img src="{{$logo}}" alt="">
            </li>
            @endforeach
        </ul>
    </div>
</section>
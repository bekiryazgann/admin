<section class="py-20 pt-0">
    <div class="lg:bg-gray-50 bg-gray-100 lg:px-0 px-4">
        <div class="max-w-4xl mx-auto lg:py-24 py-10">
            <h1 class="lg:text-7xl text-4xl font-bold lg:mb-4 mb-2 text-gray-800 text-center"> {{$data['title']}} </h1>
            @isset($data['description'])
                @if($data['description'] !== '')
                    <p class="text-gray-500 lg:text-normal text-sm text-center">{{$data['description']}}</p>
                @endif
            @endisset
        </div>
    </div>
</section>
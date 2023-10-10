<section class="py-20">
    <div class="max-w-5xl mx-auto">
        <div>
            <h1 class="text-2xl text-center mb-3"> {{$data['title']}} </h1>
            <p class="text-sm text-gray-600 text-center"> {{$data['description']}} </p>
        </div>
        <div class="lg:mt-14 mt-10 flex flex-col gap-y-4 lg:px-0 px-4" data-accordion="true">
            @foreach($data['faqs'] as $faq)
                <div class="rounded-md  bg-gray-100" data-container="true">
                    <div class="flex items-center justify-between cursor-pointer p-5" data-title="true">
                        <h3 class="lg:text-lg text-sm"> {{$faq['title']}} </h3>
                        <i class="fas fa-chevron-down transition duration-300 ml-2"></i>
                    </div>
                    <p class="lg:text-sm text-xs hidden px-5 pb-5 text-gray-500" data-content="true">{{$faq['content']}}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
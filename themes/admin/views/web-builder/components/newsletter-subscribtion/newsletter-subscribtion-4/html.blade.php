<section>
    <div class="container mx-auto lg:my-20 mt-10">
        <div class="lg:rounded-md rounded-none bg-blue-100 lg:p-20 py-20 px-5">
            <div class="max-w-5xl mx-auto grid gap-4 grid-cols-2 content-center">
                <div class="lg:col-span-1 col-span-2">
                    <h3 class="text-xl mb-2 text-black lg:text-left text-center"> {{$data['title']}} </h3>
                    <p class="text-sm text-gray-600 lg:text-left text-center">{{$data['description']}}</p>
                </div>
                <div class="flex items-center justify-center lg:col-span-1 col-span-2">
                    <input type="text"
                           placeholder="E-posta"
                           class="rounded-md px-3 py-2 bg-white w-80 border border-1 border-gray-200 focus:border-blue-500 focus:outline-none transition duration-300"/>
                    <button class="px-3 rounded-md py-2 transition duration-300 ml-4 bg-blue-500 text-white hover:bg-blue-700">
                        {{$data['button_text']}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
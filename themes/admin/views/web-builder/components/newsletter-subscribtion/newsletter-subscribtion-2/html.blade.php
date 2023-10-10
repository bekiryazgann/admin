<section>
    <div class="bg-blue-100 lg:my-20 mt-20">
        <div class="lg:p-20 py-10 px-5">
            <div class="max-w-5xl mx-auto grid gap-4 grid-cols-2 content-center">
                <div class="lg:col-span-1 col-span-2">
                    <h3 class="text-xl mb-2 text-black lg:text-left text-center"> {{$data['title']}} </h3>
                    <p class="text-sm text-gray-600 lg:text-left text-center">{{$data['description']}}</p>
                </div>
                <div class="lg:col-span-1 col-span-2 flex items-center justify-center">
                    <input type="text"
                           placeholder="E-posta"
                           class="rounded-md px-3 py-2 bg-white w-80 border border-1 border-gray-200 focus:border-blue-500 focus:outline-none transition"/>
                    <button class="px-3 rounded-md py-2 transition ml-4 bg-blue-500 text-white hover:bg-blue-700">
                        {{$data['button_text']}}
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
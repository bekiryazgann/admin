<section>
    <div class="container mx-auto lg:my-20 mt-20">
        <div class="lg:rounded-md rounded-none bg-blue-500 lg:p-10 py-10 px-5">
            <h3 class="text-xl text-center mb-2 text-white"> {{$data['title']}} </h3>
            <p class="text-center text-sm text-gray-200 mb-6">{{$data['description']}}</p>
            <div class="flex items-center justify-center">
                <input type="text"
                       placeholder="E-posta"
                       class="rounded-md border border-1 border-white bg-blue-500 px-3 py-2 focus:outline-none focus:border-blue-400 focus:bg-white focus:text-blue-500 focus:placeholder:text-blue-500 placeholder:text-white placeholder:focus:text-blue-900 w-80 text-white"/>
                <button class="px-3 rounded-md py-2 bg-transparent border border-1 border-gray-white hover:bg-white transition duration-300 ml-4 text-white hover:text-blue-500">
                    {{$data['button_text']}}
                </button>
            </div>
        </div>
    </div>
</section>
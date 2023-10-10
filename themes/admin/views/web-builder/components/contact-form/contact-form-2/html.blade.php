<section>
    <div class="container mx-auto py-20 px-5 sm:px-0 max-w-6xl">
        <!--# Title #-->
        <div>
            <h1 class="text-center text-4xl mb-3 text-black"> {{$data['title']}} </h1>
            <p class="text-center text-zinc-600"> {{$data['description']}} </p>
        </div>
        <!--# /Title #-->
        <!--# Form #-->
        <div class="lg:my-20 my-10 grid gap-4 lg:grid-cols-2 grid-cols-1">
            <form action="" class="grid gap-4 grid-cols-1 min-h-min h-auto">
                <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 grid-rows-2">
                    <label>
                        <input type="text" placeholder="{{$data['form']['name_surname_text']}}"
                               class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                    </label>
                    <label>
                        <input type="text" placeholder="{{$data['form']['email_text']}}"
                               class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                    </label>
                    <label>
                        <input type="text" placeholder="{{$data['form']['phone_text']}}"
                               class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500  placeholder:text-gray-400"/>
                    </label>
                    <label>
                        <input type="text" placeholder="{{$data['form']['subject_text']}}"
                               class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 placeholder:text-gray-400"/>
                    </label>
                </div>
                <label>
                    <textarea type="text" placeholder="{{$data['form']['message_text']}}" class="rounded-md w-full border border-1 border-gray-300 bg-gray-100 px-3 py-2 focus:outline-none focus:border-blue-500 resize-none h-40  placeholder:text-gray-400"></textarea>
                </label>
                <div class="grid gap-4 lg:grid-cols-2 grid-cols-3 h-11 max-w-full">
                    <div class="flex items-start lg:col-span-1 col-span-2">
                        <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:outline-none focus:ring-0 focus:ring-transparent">
                        <label for="link-checkbox" class="ml-2 text-xs font-medium text-gray-900 dark:text-gray-300">
                            {{$data['form']['confirmation_box']}}
                        </label>
                    </div>
                    <div class="flex justify-between items-center col-span-1">
                        <i class="block"></i>
                        <button class="px-4 rounded-md text-white py-2.5 bg-blue-500 hover:bg-blue-700 transition duration-300">
                            {{$data['form']['button_text']}}
                        </button>
                    </div>
                </div>
            </form>
            <div class="overflow-hidden rounded-md h-[403px]">
                <iframe class="h-full" src="{{$data['map']}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <!--# /Form #-->
        <!--# Address #-->
        <div class="grid lg:gap-5 lg:grid-cols-2 grid-cols-1 gap-7 grid-row-1 my-10 max-w-4xl mx-auto">
            @foreach($data['addresses'] as $address)
            <div>
                <h3 class="text-center text-blue-500 text-2xl mb-2">{{$address['name']}}</h3>
                <p class="text-gray-600"><b>Adres:</b> {{$address['address']}}</p>
                <p class="text-gray-600"><b>Telefon:</b> {{$address['phone']}}</p>
                <p class="text-gray-600"><b>E-posta:</b> {{$address['email']}}</p>
            </div>
            @endforeach
        </div>
        <!--# /Address #-->
        <!--# Google Map #-->

        <!--# /Google Map #-->
    </div>

</section>
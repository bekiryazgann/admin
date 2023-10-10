<header class="lg:block hidden">
    <div class="bg-white">
        <div class="mx-auto py-4 px-2 max-w-7xl">
            <div class="flex justify-between items-center">
                <label class="relative rounded-full overflow-hidden h-12 w-96">
                    <input type="text" class="py-2 px-4 pr-11 w-full h-full rounded-full border border-2 border-blue-500"
                           placeholder="{{$data['search_bar_text']}}">
                    <span class="absolute inset-y-0 right-0 flex items-center justify-center px-4">
                        <i class="far fa-search text-lg"></i>
                    </span>
                </label>
                <div class="flex-1 flex justify-center items-center">
                    <img src="{{$data['logo']}}">
                </div>
                <div class="flex justify-end items-center relative h-full">
                    <a href="#" class="flex bg-indigo-600 mx-1 p-3 rounded-full text-white">
                        <i class="far fa-shopping-cart text-lg"></i>
                    </a>
                    <a href="#"
                       class="peer mx-1 hover:bg-indigo-600 text-indigo-600 border border-1 border-indigo-600 py-3 px-6 rounded-full transition-colors hover:text-white static z-20">
                        <span> {{$data['sign_in_text']}} </span>
                    </a>
                    <a href="#"
                       class="peer mx-1 hover:bg-indigo-600 py-3 px-6 rounded-full border border-1 border-indigo-600 transition-colors hover:text-white text-indigo-600 static z-20">
                        <span> {{$data['sign_up_text']}} </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-blue-500">
        <div class="mx-auto py-4 px-2 max-w-7xl">
            <nav>
                <ul class="flex items-center justify-between text-white">
                    @foreach($data['menu'] as $menu)
                        <li>
                            <a href="{{$menu['url']}}" class="py-2 block hover:bg-blue-400/25 px-3 rounded-lg transition duration-200">{{$menu['text']}}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</header>
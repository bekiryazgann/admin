<header class="bg-blue-500 lg:block hidden">
    <div class="mx-auto py-4 max-w-7xl px-2">
        <div class="flex justify-between items-center">
            <div class="mr-3.5">
                <img src="{{$data['logo']}}" alt="">
            </div>
            <label class="relative rounded-md overflow-hidden h-12 w-96">
                <input type="text" class="py-2 px-4 pr-7 w-full h-full focus:border-indigo-600 rounded-md border border-2 border-transparent transition-border duration-300"
                       placeholder="{{$data['search_bar_text']}}">
                <span class="absolute inset-y-0 right-0 flex items-center justify-center px-2">
                    <i class="far fa-search text-lg"></i>
                </span>
            </label>
            <nav class="ml-12 flex-1 flex justify-center items-center mr-12">
                <ul class="flex justify-between w-full">
                    @foreach($data['menu'] as $menu)
                        <li class="">
                            <a href="{{$menu['url']}}" class="text-white hover:text-zinc-900/75 transition"> {{$menu['text']}} </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <div class="flex justify-end items-center relative h-full">
                <a href="#" class="flex bg-indigo-600 p-3 rounded-full text-white">
                    <i class="far fa-shopping-cart text-lg"></i>
                </a>
                <a href="#" class="peer ml-5 hover:bg-indigo-600 p-3 rounded-full transition-colors text-white hover:text-white static z-20">
                    <span> {{$data['my_account_text']}} </span>
                </a>
                <div class="opacity-0 invisible absolute top-0 peer-hover:opacity-100 z-10 hover:opacity-100 peer-hover:visible hover:visible transition-all duration-300">
                    <div class="bg-white rounded top-0 mt-20">
                        <ul class="py-3 border rounded">
                            <li class="px-3 py-1">
                                <a href="javascript: void(0);">Siparişlerim</a>
                            </li>
                            <li class="px-3 py-1">
                                <a href="javascript: void(0);">Değerlendirmelerim</a>
                            </li>
                            <li class="px-3 py-1">
                                <a href="javascript: void(0);">Favorilerim</a>
                            </li>
                            <li class="px-3 py-1">
                                <a href="javascript: void(0);">Kuponlarım</a>
                            </li>
                            <li class="px-3 py-1 border-t">
                                <a href="javascript: void(0);">Kullanıcı Bilgilerim</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
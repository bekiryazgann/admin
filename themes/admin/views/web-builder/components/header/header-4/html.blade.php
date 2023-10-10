<header class='relative lg:block hidden'>
    <div class='bg-blue-500'>
        <div class='mx-auto py-4 max-w-7xl px-2'>
            <div class='flex justify-between items-center'>
                <div class='mr-3.5'>
                    <img src="{{$data['logo']}}" alt="">
                </div>
                <nav class='ml-12 flex-1 flex justify-center items-center mr-12 mx-auto min-w-fit'>
                    <ul class='flex mx-auto'>
                        @foreach($data['menu'] as $menu)
                            <li class='mx-2.5'>
                                <a href="{{$menu['url']}}" class='text-white hover:text-zinc-900/75 transition'> {{$menu['text']}} </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
                <div class='flex justify-end items-center relative h-full'>
                    <label for='search-box' class='flex mx-1 p-3 rounded-full text-white cursor-pointer'>
                        <i class="far fa-search text-lg"></i>
                    </label>
                    <a href='#' class='flex bg-indigo-600 mx-1 p-3 rounded-full text-white'>
                        <i class="far fa-shopping-cart text-lg"></i>
                    </a>
                    <a href='#'
                       class='peer mx-1 hover:bg-indigo-600 p-3 rounded-full transition-colors text-white hover:text-white static z-20'>
                        <span> {{$data['my_account_text']}} </span>
                    </a>
                    <div class='opacity-0 invisible absolute top-0 peer-hover:opacity-100 z-10 hover:opacity-100 peer-hover:visible hover:visible transition-all duration-150'>
                        <div class='bg-white rounded top-0 mt-20'>
                            <ul class='py-3 rounded border'>
                                <li class='px-3 py-1'>
                                    <a href='javascript: void(0);'>Siparişlerim</a>
                                </li>
                                <li class='px-3 py-1'>
                                    <a href='javascript: void(0);'>Değerlendirmelerim</a>
                                </li>
                                <li class='px-3 py-1'>
                                    <a href='javascript: void(0);'>Favorilerim</a>
                                </li>
                                <li class='px-3 py-1'>
                                    <a href='javascript: void(0);'>Kuponlarım</a>
                                </li>
                                <li class='px-3 py-1 border-t'>
                                    <a href='javascript: void(0);'>Kullanıcı Bilgilerim</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type='checkbox' class='hidden peer' id='search-box'>
    <div class='absolute opacity-0 invisible w-full top-0 -z-20 bg-gray-200 py-2 peer-checked:top-[80px] peer-checked:opacity-100 peer-checked:visible transition-all duration-300 peer-checked:z-40'>
        <div class='mx-auto py-4 max-w-7xl px-2'>
            <label class='relative rounded-md overflow-hidden h-12 w-96'>
                <input type='text' class='py-2 px-4 pr-7 w-full h-full rounded-md'
                       placeholder="{{$data['search_bar_text']}}">
                <span class='absolute inset-y-0 right-0 flex items-center justify-center px-3'>
                    <i class="far fa-search text-lg"></i>
                </span>
            </label>
        </div>
    </div>
</header>
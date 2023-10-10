<header class="bg-blue-500 border-b-4 border-b-blue-500 lg:block hidden">
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center">
            <div>
                <img src="{{$data['logo']}}" alt="">
            </div>
            <label class="relative rounded-md overflow-hidden flex-1 lg:mx-80 md:mx-40 sm:mx-10 xs:mx-5 h-12">
                <input type="text" class="py-2 px-4 pr-7 w-full h-full rounded-md"
                       placeholder="{{$data['search_bar_text']}}">
                <span class="absolute inset-y-0 right-0 flex items-center justify-center px-2">
                <i class="far fa-search text-lg"></i>
            </span>
            </label>
            <div class="flex justify-end items-center">
                <a href="#" class="flex bg-indigo-600 py-3 px-5 rounded-full text-white flex items-center">
                    <i class="far fa-shopping-cart"></i>
                    @isset($data['cart_text'])
                        <span class="ml-1">{{$data['cart_text']}}</span>
                    @endisset
                </a>
                <a href="#" class="flex bg-indigo-600 py-3 px-5 rounded-full text-white flex items-center ml-5">
                    <i class="far fa-user"></i>
                    @isset($data['my_account_text'])
                        <span class="ml-1">{{$data['my_account_text']}}</span>
                    @endisset
                </a>
            </div>
        </div>
    </div>
    <div class="bg-gray-200">
        <div class="container mx-auto py-4">
            <ul class="flex justify-between">
                @foreach($data['menu'] as $menu1)
                    @isset($menu1['menu'])
                        <li class="relative">
                            <a href="javascript: void(0);" class="peer text-gray-600 relative before:absolute before:w-full before:h-1 before:bg-blue-500 before:rounded before:-bottom-2 before:opacity-0 hover:before:opacity-100 before:transition-all"> {{$menu1['text']}} </a>
                            <div class="peer-hover:opacity-100 hover:opacity-100 opacity-0 invisible hover:visible peer-hover:visible transition-all duration-300">
                                <ul class="flex flex-col absolute top-12 bg-white rounded p-3 pt-2w w-56 border">
                                    @foreach($menu1['menu'] as $menu2)
                                        <li class="mb-2 text-gray-700">
                                            <a href="{{$menu2['url']}}"> {{$menu2['text']}} </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{$menu1['url']}}" class="text-gray-600 relative before:absolute before:w-full before:h-1 before:bg-blue-500 before:rounded before:-bottom-2 before:opacity-0 hover:before:opacity-100 before:transition-all"> {{$menu1['text']}} </a>
                        </li>
                    @endisset
                @endforeach
            </ul>
        </div>
    </div>
</header>
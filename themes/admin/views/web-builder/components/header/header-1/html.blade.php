<header class='bg-blue-500 py-4 lg:block hidden'>
    <div class='container flex mx-auto justify-between items-center flex-row'>
        <div>
            <img src="{{$data['logo']}}" alt="">
        </div>
        <label class='relative rounded-md overflow-hidden flex-1 lg:mx-80 md:mx-40 sm:mx-10 xs:mx-5 h-12'>
            <input type='text' class='py-2 px-4 pr-7 w-full h-full rounded-md'
                   placeholder="{{$data['search_bar_text']}}">
            <i class="absolute inset-y-0 right-0 flex items-center justify-center px-2 far fa-search text-lg"></i>
        </label>
        <div class='flex justify-end items-center'>
            <a href='#' class='flex bg-indigo-600 py-3 px-5 rounded-full text-white flex items-center' data-cart-button="true">
                <i class="far fa-shopping-cart"></i>
                @isset($data['cart_text'])
                    <span class='ml-1'>{{$data['cart_text']}}</span>
                @endisset
            </a>
            <button class='flex bg-indigo-600 py-3 px-5 rounded-full text-white ml-3 flex items-center' data-role="off-canvas-button">
                <i class="far fa-user"></i>
                @isset($data['my_account_text'])
                    <span class='ml-1'>{{$data['my_account_text']}}</span>
                @endisset
            </button>
        </div>
    </div>
</header>
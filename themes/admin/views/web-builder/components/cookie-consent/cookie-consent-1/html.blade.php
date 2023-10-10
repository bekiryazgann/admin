<section class="fixed bottom-0 right-0 m-4 rounded-md drop-shadow-2xl lg:w-96 w-[calc(100vw - 18rem)] z-40">
    <div class="bg-[#E4C048] lg:p-4 p-3 rounded-md">
        <div class="flex items-end justify-end">
            <button class="text-[#1D263B] transition hover:bg-[#1D263B] hover:text-[#E4C048] rounded w-6 h-6 flex items-center justify-center">
                <i class="far fa-times text-lg text-inherit"></i>
            </button>
        </div>
        <div class="lg:my-4 my-2">
            <p class="lg:text-sm text-xs leading-4 font-light">{{$data['text']}}</p>
        </div>
        <div class="flex items-end justify-end">
            <button class="border lg:text-lg text-sm border-1 border-[#1D263B] py-1.5 px-4 rounded-md text-[#1D263B] transition hover:bg-[#1D263B] hover:text-[#E4C048]">{{$data['rejectButton']}}</button>
            <button class="border lg:text-lg text-sm border-1 border-[#1D263B] py-1.5 px-4 ml-3 rounded-md transition bg-[#1D263B] text-[#E4C048] hover:bg-transparent hover:text-[#1D263B]">{{$data['confirmButton']}}</button>
        </div>
    </div>
</section>
<section class="fixed bottom-0 left-0 drop-shadow-2xl w-full">
    <div class="lg:sticky relative p-4 bg-[#E4C048] rounded-t-lg flex items-center lg:flex-row flex-col lg:pt-4 pt-5 z-40">
        <div class="mt-3 mb-4">
            <p class="lg:text-sm text-xs leading-4 font-light">{{$data['text']}}</p>
        </div>
        <div class="flex items-center lg:justify-end justify-between lg:w-[840px] w-full">
            <i class="lg:hidden block"></i>
            <div>
                <button class="border lg:text-lg text-sm border-1 border-[#1D263B] py-1.5 px-4 rounded-md text-[#1D263B] transition hover:bg-[#1D263B] hover:text-[#E4C048]">{{$data['rejectButton']}}</button>
                <button class="border lg:text-lg text-sm border-1 border-[#1D263B] py-1.5 px-4 ml-3 rounded-md transition bg-[#1D263B] text-[#E4C048] hover:bg-transparent hover:text-[#1D263B]">{{$data['confirmButton']}}</button>
            </div>
            <button class="text-[#1D263B] transition hover:bg-[#1D263B] hover:text-[#E4C048] rounded w-6 h-6 ml-3 lg:sticky absolute top-2 right-2 lg:p-0 flex items-center justify-center">
                <i class="far fa-times text-lg text-inherit"></i>
            </button>
        </div>
    </div>
</section>
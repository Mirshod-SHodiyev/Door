<x-layouts.main>

    <!-- Hero Start -->
    <section class="relative mt-20">
        <div class="container-fluid md:mx-4 mx-2">
            <div class="relative pt-40 pb-52 table w-full rounded-2xl shadow-md overflow-hidden" id="home">
                <div class="absolute inset-0 bg-black/60"></div>

                <div class="container relative">
                    <div class="grid grid-cols-1">
                        <div class="md:text-start text-center">
                            <h1 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-5xl mb-6">
                                Biz sizga ajoyib eshikni topishda <br> your <span class="text-green-600"> yordam</span>  beramiz
                            </h1>
                            <p class="text-white/70 text-xl max-w-xl">Eshik sotib olish uchun ajoyib platforma</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative md:pb-24 pb-16">
        <div class="container relative">
            <div class="grid grid-cols-1 justify-center">
                <div class="relative -mt-32">
                    <div class="grid grid-cols-1">
                        <div id="StarterContent" class="p-6 bg-white dark:bg-slate-900 rounded-ss-none rounded-se-none md:rounded-se-xl rounded-xl shadow-md dark:shadow-gray-700">
                            <div id="buy-home" role="tabpanel" aria-labelledby="buy-home-tab">
                                <form action="/search" method="get">
                                    <div class="registration-form text-dark text-center">
                                        <div class="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-6 items-center">
                                            <div>
                                                <label class="form-label font-medium text-slate-900 dark:text-white">
                                                    Qidiruv: <span class="text-red-600"></span>
                                                </label>
                                                <div class="filter-search-form relative filter-border mt-2">
                                                    <i class="uil uil-search icons"></i>
                                                    <input name="search_phrase" type="text" id="job-keyword" class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0 text-center" placeholder="Qidiruv">
                                                </div>
                                            </div>
        
                                            <div>
                                                <label for="buy-properties" class="form-label font-medium text-slate-900 dark:text-white">
                                                    Eshik turini ytanlang:
                                                </label>
                                                <div class="filter-search-form relative filter-border mt-2">
                                                    <i class="uil uil-estate icons"></i>
                                                    <select class="form-select z-2 text-center" data-trigger name="door_types_id" id="choices-catagory-buy" aria-label="Default select example">
                                                        <option value="">Eshik turini tanlang</option>
                                                        @foreach ($doorTypes as $doorType)
                                                            <option value="{{ $doorType->id }}">{{ $doorType->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="mt-6">
                                            <input type="submit" id="search-buy" name="search" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-12 rounded" value="Qidirish">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container relative mt-12">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
                @foreach ($ads as $ad)
                    <div class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                        <div class="relative">
                            <img src="{{ asset($ad->doorType->image_url) }}" alt="Eshik  rasmi" width="300">                          <div class="absolute top-4 end-4">
                                <form action="{{ route('ads.edit', $ad->id) }}" method="get">
                                    @csrf
                                    <button type="submit" class="btn btn-icon bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-full text-slate-100 dark:text-slate-100 focus:text-red-600 dark:focus:text-red-600 hover:text-red-600 dark:hover:text-red-600">
                                        <i data-feather="edit" class="text-[20px]"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="pb-6">
                                <a href="/ads/{{ $ad->id }}" class="text-lg hover:text-green-600 font-medium ease-in-out duration-500">
                                    <i class="uil uil-user icons text-2xl me-2 text-green-600"></i>
                                    {{ $ad->customers_info}}
                                </a>
                            </div>

                            <ul class="py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                                <li class="flex items-center me-4">
                                    <svg class="w-[20px] h-[20px] fill-current text-green-600" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5V448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H96 288h32V480 32zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128h96V480c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H512V128c0-35.3-28.7-64-64-64H352v64z"></path>
                                    </svg>
                                    <span class="ml-2">{{ $doorType->name }}</span>
                                </li>
                            </ul>

                            <ul class="py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                                <li class="flex items-center me-4">
                                    <i class="uil uil-phone icons text-2xl me-2 text-green-600"></i>
                                    <span>{{ $ad->phone_number }}</span>
                                </li>
                            </ul>

                            <ul class="pt-6 flex justify-between items-center list-none">
                                <li>
                                    <span class="text-slate-400">
                                        <i class="uil uil-usd-circle icons text-green-600"></i> 
                                        <span>{{ number_format($ad->price->price, 0, ',', ' ') }} so'm</span>
                                    </span>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.main>

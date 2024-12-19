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
                                We will help you find <br> your <span class="text-green-600">Wonderful</span> door</h1>
                            <p class="text-white/70 text-xl max-w-xl">A great plateform to buy door
                                </p>
                        </div>
                    </div><!--end grid-->
                </div><!--end container-->
            </div>
        </div><!--end Container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Start -->
    <section class="relative md:pb-24 pb-16">
        <div class="container relative">
            <div class="grid grid-cols-1 justify-center">
                <div class="relative -mt-32">
                    <div class="grid grid-cols-1">

                        <div id="StarterContent"
                             class="p-6 bg-white dark:bg-slate-900 rounded-ss-none rounded-se-none md:rounded-se-xl rounded-xl shadow-md dark:shadow-gray-700">
                            <div class="" id="buy-home" role="tabpanel" aria-labelledby="buy-home-tab">
                                <form action="/search" method="get">
                                    <div class="registration-form text-dark text-start">
                                        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 lg:gap-0 gap-6">

                                            <div>

                                                <label class="form-label font-medium text-slate-900 dark:text-white">Search
                                                    : <span class="text-red-600">*</span></label>
                                                <div class="filter-search-form relative filter-border mt-2">
                                                    <i class="uil uil-search icons"></i>
                                                    <input name="search_phrase" type="text" id="job-keyword"
                                                           class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0"
                                                           placeholder="Search your keaywords">
                                                </div>
                                            </div>

                                            <div>
                                                <label for="buy-properties"
                                                       class="form-label font-medium text-slate-900 dark:text-white">Select
                                                    Categories:</label>
                                                <div class="filter-search-form relative filter-border mt-2">
                                                    <i class="uil uil-estate icons"></i>
                                                    <select class="form-select z-2" data-trigger name="branch_id"
                                                            id="choices-catagory-buy"
                                                            aria-label="Default select example">
                                                        <option value="">Select color </option>
                                                        @foreach ($colors as $colors)
                                                            :
                                                            <option value={{$colors->id}}>{{ $colors->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="buy-min-price"
                                                       class="form-label font-medium text-slate-900 dark:text-white">Min
                                                    Price :</label>
                                                <div class="filter-search-form relative filter-border mt-2">
                                                    <i class="uil uil-usd-circle icons"></i>
                                                    <input name="min_price" type="text" id="job-keyword"
                                                           class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0"
                                                           placeholder="Min Price">

                                                </div>
                                            </div>

                                            <div>
                                                <label for="buy-max-price"
                                                       class="form-label font-medium text-slate-900 dark:text-white">Max
                                                    Price :</label>
                                                <div class="filter-search-form relative mt-2">
                                                    <i class="uil uil-usd-circle icons"></i>
                                                    <input type="text" name="max_price" id="job-keyword"
                                                           class="form-input filter-input-box bg-gray-50 dark:bg-slate-800 border-0"
                                                           placeholder="Max Price">

                                                </div>
                                            </div>

                                            <div class="lg:mt-6">
                                                <input type="submit" id="search-buy" name="search"
                                                       class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white searchbtn submit-btn w-full !h-12 rounded"
                                                       value="Search">
                                            </div>
                                        </div><!--end grid-->
                                    </div><!--end container-->
                                </form>
                            </div>


                        </div>
                    </div><!--end grid-->
                </div>
            </div><!--end grid-->
        </div><!--end container-->
        <div class="container relative mt-12">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">


                @foreach ($ads as $ad)
                
                    <div
                        class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
                        <div class="relative">
                            {{-- <img src="{{(new \App\Actions\DisplayAdImage())($ad)}}" alt="rasm"> --}}
                           <img src="data:image/jpeg;base64,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" alt="">

                            <div class="absolute top-4 end-4">
                                <form action="/ads/{{$ad->id}}/bookmark" method="post">
                                    @csrf
                                    <button type="submit"
                                            class="btn btn-icon bg-white dark:bg-slate-900 shadow dark:shadow-gray-700 rounded-full {{$ad->bookmarked ? 'text-red-600 dark:text-red-600' : 'text-slate-100 dark:text-slate-100'}} focus:text-red-600 dark:focus:text-red-600 hover:text-red-600 dark:hover:text-red-600">

                                        <i data-feather="bookmark" class="text-[20px]]"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="pb-6">
                                <a href="/ads/{{ $ad->id }}"
                                   class="text-lg hover:text-green-600 font-medium ease-in-out duration-500">
                                    <i class="uil uil-estate icons text-2xl me-2 text-green-600"></i>
                                    {{ $ad->title }}</a>
                            </div>

                            <ul class="py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                                <li class="flex items-center me-4">
                                    <i class="uil uil-map icons text-2xl me-2 text-green-600"></i>
                                    <span>{{ $ad->customers_info }} </span>
                                </li>


                            </ul>

                           
                            <ul class="pt-6 flex justify-between items-center list-none">
                                <li>
                                    <span class="text-slate-400">  <i
                                            class="uil uil-usd-circle icons text-green-600 "></i> Price</span>
                                    <p class="text-lg font-medium">

                                        {{ $ad->price  }}</p>
                                </li>
                            </ul>
                        </div>
                    </div><!--end property content-->

                @endforeach

            </div><!--end container-->
        </div>
    </section><!--end section-->
</x-layouts.main>


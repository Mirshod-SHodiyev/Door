<x-layouts.main>
    <section class="relative md:py-24 pt-24 pb-16">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                <!-- Main content -->
                <div class="lg:col-span-8 md:col-span-7">
                    <div class="grid grid-cols-1 relative">
                        <div class="tiny-one-item">
                            <div class="tiny-slide">
                                @if ($ad->images->first())
                                    <img src="{{ asset('/storage/'.$ad->images->first()->name) }}" alt="rasm" class="rounded-md shadow dark:shadow-gray-700">
                                @else
                                    <img src="default-ad.jpg" alt="" class="rounded-md shadow dark:shadow-gray-700">
                                @endif
                            </div>
                        </div>
                    </div>
                    <h4 class="text-3xl font-medium mt-6 mb-3 flex flex-col space-y-2">
                        <span class="text-3xl">{{ $ad->title }}</span> 
                        <span class="text-xl text-slate-400 flex items-center">
                            <i data-feather="map-pin" class="size-5 me-2"></i>{{ $ad->description }}
                        </span> 
                        <span class="lg:text-lg">{{ $ad->customers_info }}</span> 
                    </h4>
                    

                    <p class="text-slate-400"></p>

                    <div class="w-full leading-[0] border-0 mt-6"></div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-4 md:col-span-5">
                    <div class="sticky top-20">
                        <div class="rounded-md bg-slate-50 dark:bg-slate-800 shadow dark:shadow-gray-700">
                            <div class="p-6">
                                <a href="{{ route('generate.pdf', ['id' => $ad->id]) }}" class="btn bg-green-600 text-white">
                                    PDF yuklab olish
                                </a>
                                
                                <h5 class="text-2xl font-medium">
                                    <i class="uil uil-usd-circle icons me-2 text-green-600"></i>{{ $ad->price->price }} uzs
                                </h5>

                                <ul class="list-none mt-4">
                                    <li class="flex justify-between items-center">
                                        <svg class="h-5 w-5 text-green-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"/>
                                            <line x1="11" y1="7" x2="17" y2="13" />
                                            <path d="M5 19v-4l9.7 -9.7a1 1 0 0 1 1.4 0l2.6 2.6a1 1 0 0 1 0 1.4l-9.7 9.7h-4" />
                                        </svg>
                                        <span class="text-slate-400 text-sm mr-40"><strong>color:</strong></span>
                                        <span class="font-medium text-sm text-8xl font-bold">{{ $ad->color->name }}</span>
                                    </li>

                                    <li class="flex justify-between items-center mt-2">
                                        <svg class="h-4 w-4 text-green-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"/>
                                            <path d="M5 4h14a1 1 0 0 1 1 1v5a1 1 0 0 1 -1 1h-7a1 1 0 0 0 -1 1v7a1 1 0 0 1 -1 1h-5a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1" />
                                            <line x1="4" y1="8" x2="6" y2="8" />
                                            <line x1="4" y1="12" x2="7" y2="12" />
                                            <line x1="4" y1="16" x2="6" y2="16" />
                                            <line x1="8" y1="4" x2="8" y2="6" />
                                            <polyline points="12 4 12 7" />
                                            <polyline points="16 4 16 6" />
                                        </svg>
                                        <span class="text-slate-400 text-sm mr-40">Width:</span>
                                        <span class="font-medium text-sm">{{ $ad->width }}</span>
                                    </li>

                                    <li class="flex justify-between items-center mt-2">
                                        <svg class="h-4 w-4 text-green-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"/>
                                            <path d="M5 4h14a1 1 0 0 1 1 1v5a1 1 0 0 1 -1 1h-7a1 1 0 0 0 -1 1v7a1 1 0 0 1 -1 1h-5a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1" />
                                            <line x1="4" y1="8" x2="6" y2="8" />
                                            <line x1="4" y1="12" x2="7" y2="12" />
                                            <line x1="4" y1="16" x2="6" y2="16" />
                                            <line x1="8" y1="4" x2="8" y2="6" />
                                            <polyline points="12 4 12 7" />
                                            <polyline points="16 4 16 6" />
                                        </svg>
                                        <span class="text-slate-400 text-sm mr-40">Height:</span>
                                        <span class="font-medium text-sm">{{ $ad->height }}</span>
                                    </li>

                                  

                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm">
                                            <i class="uil uil-arrow-right icons text-2xl me-2 text-green-600"></i>Opening Side:
                                        </span>
                                        <span class="font-medium text-sm">{{ $ad->doorDimension->opening_side }}</span>
                                    </li>

                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm">
                                            <i class="uil uil-layer-group icons text-2xl me-2 text-green-600"></i>Has Top Section:
                                        </span>
                                        <span class="font-medium text-sm">{{ $ad->doorDimension->has_top_section }}</span>
                                    </li>

                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm">
                                            <i class="uil uil-money-bill icons text-2xl me-2 text-green-600"></i>Service Fee:
                                        </span>
                                        <span class="font-medium text-sm">{{ $ad->doorDimension->service_free }}</span>
                                    </li>

                                    <!-- Check if user is available -->
                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm flex items-center">
                                            <svg class="w-[20px] h-[20px] fill-current text-green-600 me-2" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5V448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H96 288h32V480 32zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128h96V480c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H512V128c0-35.3-28.7-64-64-64H352v64z"></path>
                                            </svg>
                                            Doortype:
                                        </span>
                                        <span class="font-medium text-sm">{{ $ad->doorType->name }}</span>
                                    </li>
                                    

                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm">
                                            <i class="uil uil-layer-group icons text-2xl me-2 text-green-600"></i>Door Frame:
                                        </span>
                                        <span class="font-medium text-sm">{{ $ad->doorDimension->door_frame }}</span>
                                    </li>

                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm">
                                            <i class="uil uil-calendar-alt text-2xl me-2 text-green-600"></i> Date:
                                        </span>
                                        <span class="font-medium text-sm">{{ $ad->created_at }}</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="flex">
                                <div class="p-1 w-1/2">
                                    <!-- Add any additional button or link if needed -->
                                </div>
                                <div class="p-1 w-1/2">
                                    <!-- Add any additional button or link if needed -->
                                </div>
                            </div>
                        </div>

                        <div class="mt-12 text-center">
                            <div class="mt-6">
                                <!-- Additional content can go here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>

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
                                <a href="{{ route('generate.pdf', ['id' => $ad->id]) }}" class="btn btn-primary">
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
                                        <span class="font-medium text-sm text-8xl font-bold">{{ $ad->colors->name }}</span>
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
                                            <i class="uil uil-box icons text-2xl me-2 text-green-600"></i>Material:
                                        </span>
                                        <span class="font-medium text-sm">{{ $ad->doorDimensions->material }}</span>
                                    </li>

                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm">
                                            <i class="uil uil-arrow-right icons text-2xl me-2 text-green-600"></i>Opening Side:
                                        </span>
                                        <span class="font-medium text-sm">{{ $ad->doorDimensions->opening_side }}</span>
                                    </li>

                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm">
                                            <i class="uil uil-layer-group icons text-2xl me-2 text-green-600"></i>Has Top Section:
                                        </span>
                                        <span class="font-medium text-sm">{{ $ad->doorDimensions->has_top_section }}</span>
                                    </li>

                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm">
                                            <i class="uil uil-money-bill icons text-2xl me-2 text-green-600"></i>Service Fee:
                                        </span>
                                        <span class="font-medium text-sm">{{ $ad->doorDimensions->service_fee }}</span>
                                    </li>

                                    <!-- Check if user is available -->
                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm">
                                            <i class="uil-home icons text-2xl me-2 text-green-600"></i>Doortype:
                                        </span>
                                        <span class="font-medium text-sm">{{ $ad->doorTypes->name }}</span>
                                    </li>

                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm">
                                            <i class="uil uil-layer-group icons text-2xl me-2 text-green-600"></i>Door Frame:
                                        </span>
                                        <span class="font-medium text-sm">{{ $ad->doorDimensions->door_frame }}</span>
                                    </li>

                                    <li class="flex justify-between items-center mt-2">
                                        <span class="text-slate-400 text-sm">
                                            <i class="uil uil-calendar icons text-2xl me-2 text-green-600"></i>Date:
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

<x-layouts.main>
    <section class="relative md:py-24 pt-24 pb-16">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                <div class="lg:col-span-8 md:col-span-7">
                    <div class="grid grid-cols-1 relative">
                        <div class="tiny-one-item">
                            <div class="tiny-slide">
                                @if ($ad && $ad->doorType)
                                <img src="{{ asset($ad->doorType->image_url) }}" alt="Eshik  rasmi" width="300">
                            @else
                                <img src="{{ asset('default-ad.jpg') }}" alt="Standart rasm" class="rounded-md shadow dark:shadow-gray-700">
                            @endif
                            </div>
                        </div>
                    </div>
                  
                

                   
                </div>

                <div class="lg:col-span-10 md:col-span-1">
                    <div class="sticky top-30">
                        <div class="rounded-md bg-slate-100 dark:bg-slate-800 shadow dark:shadow-gray-700">
                            <div class="p-6">
                               
                                <ul class="list-none mt-6 space-y-4">

                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-user text-green-600 mr-2"></i>
                                            <strong>Mijoz ismi:</strong>
                                        </div>
                                        <strong>{{ $ad->customers_info }}</strong>
                                    </li>
                                       <!-- Door Type -->
                                       <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <svg class="w-[20px] h-[20px] fill-current text-green-600 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                <path d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5V448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H96 288h32V480 32zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128h96V480c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3-32-32H512V128c0-35.3-28.7-64-64-64H352v64z"/>
                                            </svg>
                                            <strong>Eshik turi:</strong>
                                        </div>
                                        <strong>{{ $ad->doorType->name }}</strong>
                                    </li>
                
                                  
                                    <!-- Color -->
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"/>
                                                <line x1="11" y1="7" x2="17" y2="13"/>
                                                <path d="M5 19v-4l9.7 -9.7a1 1 0 0 1 1.4 0l2.6 2.6a1 1 0 0 1 0 1.4l-9.7 9.7h-4"/>
                                            </svg>
                                            <strong>Eshik rangi:</strong>
                                        </div>
                                        <strong> {{ $ad->color->name }}</strong> 
                                    </li>
                
                                    <!-- Width -->
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"/>
                                                <path d="M5 4h14a1 1 0 0 1 1 1v5a1 1 0 0 1 -1 1h-7a1 1 0 0 0 -1 1v7a1 1 0 0 1 -1 1h-5a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1"/>
                                                <line x1="4" y1="8" x2="6" y2="8"/>
                                                <line x1="4" y1="12" x2="7" y2="12"/>
                                                <line x1="4" y1="16" x2="6" y2="16"/>
                                                <line x1="8" y1="4" x2="8" y2="6"/>
                                                <polyline points="12 4 12 7"/>
                                                <polyline points="16 4 16 6"/>
                                            </svg>
                                            <strong>Eshik kengligi:</strong>
                                        </div>
                                     <strong>{{ $ad->width }}</strong>
                                    </li>
                
                                    <!-- Height -->
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z"/>
                                                <path d="M5 4h14a1 1 0 0 1 1 1v5a1 1 0 0 1 -1 1h-7a1 1 0 0 0 -1 1v7a1 1 0 0 1 -1 1h-5a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1"/>
                                                <line x1="4" y1="8" x2="6" y2="8"/>
                                                <line x1="4" y1="12" x2="7" y2="12"/>
                                                <line x1="4" y1="16" x2="6" y2="16"/>
                                                <line x1="8" y1="4" x2="8" y2="6"/>
                                                <polyline points="12 4 12 7"/>
                                                <polyline points="16 4 16 6"/>
                                            </svg>
                                            <strong>Eshik bo'yi:</strong>
                                        </div>
                                        <strong>{{ $ad->height }}</strong>
                                    </li>
                
                                    <!-- Other Details -->
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-arrow-right text-green-600 mr-2"></i>
                                            <strong>Eshik ochilish tomoni:</strong>
                                        </div>
                                        <strong>{{ $ad->doorDimension->opening_side }}</strong>
                                    </li>
                
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-layer-group text-green-600 mr-2"></i>
                                            <strong>Eshik yuqori qismi:</strong>
                                        </div>
                                        <strong>{{ $ad->hasTopSection->name }}</strong>
                                    </li>
                
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-money-bill text-green-600 mr-2"></i>
                                            <strong>Eshik xizmat haqqi:</strong>
                                        </div>
                                        <strong>{{ $ad->doorDimension->service_free }}</strong>
                                    </li>
                
                                 
                
                                    <!-- Door Frame -->
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-layer-group text-green-600 mr-2"></i>
                                            <strong>Eshik ramkai:</strong>
                                        </div>
                                        <strong>{{ $ad->doorFrame->name }}</strong>
                                    </li>
                                        <!-- Door Frame -->
                                        <li class="flex justify-between items-center">
                                            <div class="flex items-center">
                                                <i class="uil uil-layer-group text-green-600 mr-2"></i>
                                                <strong>Eshik framogasi:</strong>
                                            </div>
                                            <strong>{{ $ad->frame->name }}</strong>
                                        </li>
                                    <!-- Door Frame -->
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-layer-group text-green-600 mr-2"></i>
                                            <strong>Eshik materiali:</strong>
                                        </div>
                                        <strong>{{ $ad->material->name }}</strong>
                                    </li>
                                    <!-- Door Frame -->
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-layer-group text-green-600 mr-2"></i>
                                            <strong>Eshik qalinligi:</strong>
                                        </div>
                                        <strong>{{ $ad->thickness }}</strong>
                                    </li>
                                   
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-lock text-green-600 mr-2"></i>
                                            <strong>Eshik zamoki:</strong>
                                        </div>
                                        <strong>{{ $ad->knob->name }}</strong>
                                    </li>
                
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-layer-group text-green-600 mr-2"></i>
                                            <strong>Kubik sapajok:</strong>
                                        </div>
                                        <strong>{{ $ad->doorExtra->name }}</strong>
                                    </li>

                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-tag-alt text-green-600 mr-2"></i>



                                            <strong>chegirma:</strong>
                                        </div>
                                        <strong>{{ $ad->discount}}</strong>
                                    </li>
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-phone text-green-600 mr-2"></i>
                                            <strong>Mijoz telefon raqami:</strong>
                                        </div>
                                        <strong>{{ $ad->phone_number }}</strong>
                                    </li>
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-exclamation-circle text-green-600 mr-2"></i>
                                            <strong>Qo'shimcha ma'lumot:</strong>
                                        </div>
                                        <strong>{{ $ad->extra_info }}</strong>
                                    </li>
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-usd-circle text-green-600 mr-2"></i>
                                            <strong>Narxi:</strong>
                                        </div>
                                        <strong>{{ number_format($ad->price->price, 0, ',', ' ') }} so'm</strong>
                                    </li>
                                    
                                    <!-- Date -->
                                    <li class="flex justify-between items-center">
                                        <div class="flex items-center">
                                            <i class="uil uil-calendar-alt text-green-600 mr-2"></i>
                                            <strong>Yaratilgan vaqti:</strong>
                                        </div>
                                        <strong>{{ $ad->created_at }}</strong>
                                    </li>

                                </ul>
                
                                <div class="flex justify-center items-center mt-6">
                                    <a href="{{ route('generate.pdf', ['id' => $ad->id]) }}" class="btn bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">
                                        shartnomani olish 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
          
            </div>
        </div>
    </section>
</x-layouts.main>

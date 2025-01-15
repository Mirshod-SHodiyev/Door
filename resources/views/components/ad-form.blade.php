<x-layouts.main>
    <br>
 
    <div class="container relative w-full min-h-screen px-6 py-8">
        <div class="grid md:grid-cols-1 grid-cols-1 gap-6 mt-6">

            <!-- Ad Form Section -->
            <div class="rounded-md shadow dark:shadow-gray-700 p-6 bg-white dark:bg-slate-900 w-full h-full max-w-none mx-auto">
                <form id="ads-create" action="{{ $action }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (request()->route()->getName() === 'ads.update')
                        <input type="hidden" name="_method" value="patch">
                    @endif

                    <div class="grid grid-cols-12 gap-5">

                        <div class="col-span-12 flex justify-end">
                            <a href="{{ route('hisob') }}" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-5">
                                <i class="mdi mdi-calculator me-2"></i>Hisoblash
                            </a>
                        </div>
                        
                        
                        <!-- Title Field -->
                        <div class="col-span-6">
                            <label for="doortype" class="font-medium">Eshik turlari:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doortype" name="door_types_id" required>
                                    @if(!isset($ad))
                                    <option value="0">Eshik turlarini tanlang</option>
                                    @endif
                                    @foreach ($doorTypes as $doorType)
                                        <option value="{{$doorType->id}}" {{ isset($ad) && $doorType->id === $ad->door_types_id ? 'selected' : '' }}>
                                            {{$doorType->name}} <span class="text-gray-500" style="margin-left: 3em;">→</span> 
                                            {{$doorType->thickness}} lik <span class="text-gray-500" style="margin-left: 3em;">→</span> 
                                            {{$doorType->price}} so'm
                                                                </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="materials_id" class="font-medium">Eshik materiali:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="materials_id" name="materials_id" required>
                                    @if(!isset($ad))
                                    <option value="0">Eshik materialini tanlang</option>
                                    @endif
                                    @foreach ($materials as $material)
                                        <option value="{{$material->id}}" {{ isset($ad) && $material->id === $ad->materials_id ? 'selected' : '' }}>{{$material->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="width" class="font-medium">uzunligi eni sm:</label>
                            <div class="form-icon relative mt-2">
                                <input name="width" id="width" type="number" class="form-input ps-11" placeholder="eni sm:" value="{{ $ad?->width }}" required>
                            </div>
                        </div>

                        <!-- Height Field -->
                        <div class="col-span-6">
                            <label for="height" class="font-medium">uzunligi bo'yi sm:</label>
                            <div class="form-icon relative mt-2">
                                <input name="height" id="height" type="number" class="form-input ps-11" placeholder="bo'yi sm:" value="{{ $ad?->height }}" required>
                            </div>
                        </div>
    
                        <!-- Branch Field -->
                        <div class="col-span-6">
                            <label for="colors_id" class="font-medium">Ranglar:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="colors_id" name="colors_id" required>
                                    <option value="" disabled {{ !isset($ad) ? 'selected' : '' }}>Ranglarni tanlang</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}" {{ isset($ad) && $color->id === $ad->colors_id ? 'selected' : '' }}>{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Door Type Field -->
                        <!-- Door Frame Field -->
                        <div class="col-span-6">
                            <label for="door_frames_id" class="font-medium">atrofida ramka:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorFrames_id" name="door_frames_id" required>
                                    @if(!isset($ad))
                                    <option value="0">Eshik atofini tanglang</option>
                                    @endif
                                    @foreach ($doorFrames as $doorFrame)
                                        <option value="{{$doorFrame->id}}" {{ isset($ad) && $doorFrame->id === $ad->door_frames_id ? 'selected' : '' }}>{{$doorFrame->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Width Field -->
                      
                              <!-- Description Field -->
                    
                        <!-- Door Dimensions Field -->
                        <div class="col-span-6">
                            <label for="has_top_sections_id" class="font-medium">yuqori qoshi:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="hasTopSections_id" name="has_top_sections_id" required>
                                    @if(!isset($ad))
                                    <option value="">eshikni qoshini tanlang</option>
                                    @endif
                                    @foreach ($hasTopSections as $hasTopSection)
                                        <option value="{{$hasTopSection->id}}" {{ isset($ad) && $hasTopSection->id === $ad->has_top_sections_id ? 'selected' : '' }}>{{$hasTopSection->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        

                        <!-- Service Field -->
                        <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">Eshik xizmati:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorDimensions_id" name="door_dimensions_id" required>
                                    @if(!isset($ad))
                                        <option value="0">Eshik xizmati tanlang</option>
                                    @endif
                                    @foreach ($doorDimensions as $doorDimension)
                                        <option value="{{$doorDimension->id}}" 
                                                {{ isset($ad) && $doorDimension->id === $ad->door_dimensions_id ? 'selected' : '' }}>
                                            {{ $doorDimension->service_free == 'ha' ? 'Eshik xizmati (Ha)' : 'Eshik xizmati (Yo\'q)' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Door Comfort Field -->
                        <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">Eshik qulayligi:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorDimensions_id" name="door_dimensions_id" required>
                                    @if(!isset($ad))
                                    <option value="0">Eshik qulayligi:</option>
                                    @endif
                                    @foreach ($doorDimensions as $doorDimension)
                                        <option value="{{$doorDimension->id}}" {{ isset($ad) && $doorDimension->id === $ad->door_dimensions_id ? 'selected' : '' }}>{{$doorDimension->opening_side}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="thickness" class="font-medium">Eshik qalinligi:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" 
                                        id="thickness" name="thickness" required>
                                        <option value="8">8</option>
                                        <option value="12">12</option>
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="col-span-6">
                            <label for="frames_id" class="font-medium">Eshik framogasi:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="frames_id" name="frames_id" required>
                                    @if(!isset($ad))
                                 
                                    @endif
                                    @foreach ($frames as $frame)
                                        <option value="{{$frame->id}}" {{ isset($ad) && $frame->id === $ad->frames_id ? 'selected' : '' }}>{{$frame->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="door_extras_id" class="font-medium">Kubik sapajok:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorExtras_id" name="door_extras_id" required>
                                    @if(!isset($ad))
                                    <option value="0">Kubik sapajokni tanlang </option>
                                    @endif
                                    @foreach ($doorExtras as $doorExtra)
                                        <option value="{{$doorExtra->id}}" {{ isset($ad) && $doorExtra->id === $door_extras_id ? 'selected' : '' }}>{{$doorExtra->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <label for="knobs_id" class="font-medium">Eshik zamoklari:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="knobs_id" name="knobs_id" required>
                                    @if(!isset($ad))
                                    <option value="0">Eshik zamoklarini  </option>
                                    @endif
                                    @foreach ($knobs as $knob)
                                        <option value="{{$knob->id}}" {{ isset($ad) && $knob->id === $knobs_id ? 'selected' : '' }}>{{$knob->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-span-6">
                            <label for="extra_info" class="font-medium">Qo'shimcha malumot :</label>
                            <input name="extra_info" id="extra_info" type="text" class="form-input mt-2" placeholder="qo'shimcha malumot" value="{{ $ad?->extra_info}}" >
                        </div>
                             
                        <div class="col-span-6">
                            <label for="phone_number" class="font-medium">Mijoz telefon raqami :</label>
                            <input name="phone_number" id="phone_number" type="number" class="form-input mt-2" placeholder="+998 77 777 77 77" value="{{ $ad?->phone_number}}" required>
                        </div>
                        <!-- Address Field -->

                        <div class="col-span-6">
                            <label for="customers_info" class="font-medium">Mijoz Ismi:</label>
                            <div class="form-icon relative mt-2">
                                <input name="customers_info" id="customers_info" type="text" class="form-input ps-11" placeholder="mijoz ismi:" value="{{ $ad?->customers_info }}" required>
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label for="discountCheckbox" class="font-medium">chegirma qo'shish:</label>
                            <div class="form-icon relative mt-2 flex items-center">
                                <input type="checkbox" id="discountCheckbox" name="discountCheckbox" class="mr-2" {{ $ad?->discount ? 'checked' : '' }}>
                                <label for="discountCheckbox"></label>
                            </div>
                        </div>
                        
                        <div class="col-span-6" id="discountInputDiv" style="{{ $ad?->discount ? '' : 'visibility: hidden; height: 0;' }}">
                            <label for="discount" class="font-medium">Chegirma:</label>
                            <div class="form-icon relative mt-2">
                                <input name="discount" id="discount" type="number" class="form-input ps-11" placeholder="Chegirma" value="{{ $ad?->discount }}">
                            </div>
                        </div>
                        
                        
                        
                    </div>
                    

                    <!-- Submit Button -->
                    <button type="submit" id="submit" name="send" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-5 ml-auto">
                        <i class="mdi mdi-content-save me-2"></i>Saqlash
                    </button>

                   
                
                </form>
            </div>

        </div>
    </div>

</x-layouts.main>

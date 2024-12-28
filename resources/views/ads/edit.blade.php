<x-layouts.main>
    <br>
  
    <div class="container relative w-full min-h-screen px-6 py-8">
        <div class="grid md:grid-cols-1 grid-cols-1 gap-6 mt-6">

            <!-- Ad Form Section -->
            <div class="rounded-md shadow dark:shadow-gray-700 p-6 bg-white dark:bg-slate-900 w-full h-full max-w-none mx-auto">
                <form id="ads-edit" action="{{ route('ads.update', $ad->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH') 
                    <div class="grid grid-cols-12 gap-5">

                        <!-- Door Type Field -->
                        <div class="col-span-6">
                            <label for="doortype" class="font-medium">Eshik turlari:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doortype" name="door_types_id">
                                    @if(!isset($ad))
                                        <option value="0">Eshik turlarini tanlang</option>
                                    @endif
                                    @foreach ($doorTypes as $doorType)
                                        <option value="{{$doorType->id}}" {{ isset($ad) && $doorType->id === $ad->door_types_id ? 'selected' : '' }}>{{$doorType->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">Eshik materiali:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorDimensions_id" name="door_dimensions_id">
                                    @if(!isset($ad))
                                        <option value="0">Eshik materialini tanlang</option>
                                    @endif
                                    @foreach ($doorDimensions as $doorDimension)
                                        <option value="{{$doorDimension->id}}" {{ isset($ad) && $doorDimension->id === $ad->door_dimensions_id ? 'selected' : '' }}>{{$doorDimension->material}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Width Field -->
                        <div class="col-span-6">
                            <label for="width" class="font-medium">Uzunligi eni sm:</label>
                            <div class="form-icon relative mt-2">
                                <input name="width" id="width" type="number" class="form-input ps-11" placeholder="Eni sm:" value="{{ $ad?->width }}">
                            </div>
                        </div>

                        <!-- Height Field -->
                        <div class="col-span-6">
                            <label for="height" class="font-medium">Uzunligi bo'yi sm:</label>
                            <div class="form-icon relative mt-2">
                                <input name="height" id="height" type="number" class="form-input ps-11" placeholder="Bo'yi sm:" value="{{ $ad?->height }}">
                            </div>
                        </div>

                        <!-- Color Field -->
                        <div class="col-span-6">
                            <label for="colors_id" class="font-medium">Ranglar:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="colors_id" name="colors_id">
                                    <option value="" disabled {{ !isset($ad) ? 'selected' : '' }}>Ranglarni tanlang</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}" {{ isset($ad) && $color->id === $ad->colors_id ? 'selected' : '' }}>{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Door Frame Field -->
                        <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">Atrofida ramka:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorDimensions_id" name="door_dimensions_id">
                                    @if(!isset($ad))
                                        <option value="0">Eshik atofini tanlang</option>
                                    @endif
                                    @foreach ($doorDimensions as $doorDimension)
                                        <option value="{{$doorDimension->id}}" {{ isset($ad) && $doorDimension->id === $ad->door_dimensions_id ? 'selected' : '' }}>{{$doorDimension->door_frame}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Top Section Field -->
                        <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">Yuqori qoshi:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorDimensions_id" name="door_dimensions_id">
                                    @if(!isset($ad))
                                        <option value="0">Eshik materialini tanlang</option>
                                    @endif
                                    @foreach ($doorDimensions as $doorDimension)
                                        <option value="{{$doorDimension->id}}" {{ isset($ad) && $doorDimension->id === $ad->door_dimensions_id ? 'selected' : '' }}>{{$doorDimension->has_top_section}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                          <!-- Top Section Field -->
                          <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">Eshik qalinligi:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorDimensions_id" name="door_dimensions_id">
                                    @if(!isset($ad))
                                        <option value="0">Eshik qalinligini tanlang</option>
                                    @endif
                                    @foreach ($doorDimensions as $doorDimension)
                                        <option value="{{$doorDimension->id}}" {{ isset($ad) && $doorDimension->id === $ad->door_dimensions_id ? 'selected' : '' }}>{{$doorDimension->thickness}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-span-6">
                        <label for="door_extras_id" class="font-medium">Eshik Qo\'shimcha narsalari:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorExtras_id" name="door_extras_id">
                                    @if(!isset($ad))
                                        <option value="0">Eshik qo\'shlanganligini tanlang</option>
                                    @endif
                                    @foreach ($doorExtras as $doorExtra)
                                        <option value="{{$doorExtra->id}}" {{ isset($ad) && $doorExtra->id === $ad->door_extras_id ? 'selected' : '' }}>{{$doorExtra->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                         <!-- Top Section Field -->
                         <div class="col-span-6">
                            <label for="door_additions_id" class="font-medium">Eshik Fragagasi:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorAdditions_id" name="door_additions_id">
                                    @if(!isset($ad))
                                        <option value="0">Eshik fragagasinini tanlang</option>
                                    @endif
                                    @foreach ($doorAdditions as $doorAddition)
                                        <option value="{{$doorAddition->id}}" {{ isset($ad) && $doorAddition->id === $ad->door_additions_id ? 'selected' : '' }}>{{$doorAddition->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            <!-- Top Section Field -->
                           
                            <div class="col-span-6">
                                <label for="knobs_id" class="font-medium">Eshik Zamogi:</label>
                                <div class="form-icon relative mt-2">
                                    <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="knobs_id" name="knobs_id">
                                        @if(!isset($ad))
                                            <option value="0">Eshik zamogini tanlang</option>
                                        @endif
                                        @foreach ($knobs as $knob)
                                            <option value="{{$knob->id}}" {{ isset($ad) && $knob->id === $ad->knobs_id ? 'selected' : '' }}>{{$knob->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                                    <!-- Service Field -->
                        <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">Eshik xizmati:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorDimensions_id" name="door_dimensions_id">
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

                        <!-- Comfort Field -->
                        <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">Eshik qulayligi:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorDimensions_id" name="door_dimensions_id">
                                    @if(!isset($ad))
                                        <option value="0">Eshik qulayligi tanlang</option>
                                    @endif
                                    @foreach ($doorDimensions as $doorDimension)
                                        <option value="{{$doorDimension->id}}" {{ isset($ad) && $doorDimension->id === $ad->door_dimensions_id ? 'selected' : '' }}>{{$doorDimension->opening_side}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Extra Info Field -->
                        <div class="col-span-6">
                            <label for="extra_info" class="font-medium">Qo'shimcha ma'lumot:</label>
                            <input name="extra_info" id="extra_info" type="text" class="form-input mt-2" placeholder="Qo'shimcha ma'lumot" value="{{ $ad?->extra_info }}">
                        </div>

                        <!-- Phone Number Field -->
                        <div class="col-span-6">
                            <label for="phone_number" class="font-medium">Mijoz telefon raqami:</label>
                            <input name="phone_number" id="phone_number" type="number" class="form-input mt-2" placeholder="+998 77 777 77 77" value="{{ $ad?->phone_number }}">
                        </div>

                        <!-- Customer Name Field -->
                        <div class="col-span-6">
                            <label for="customers_info" class="font-medium">Mijoz ismi:</label>
                            <div class="form-icon relative mt-2">
                                <input name="customers_info" id="customers_info" type="text" class="form-input ps-11" placeholder="Mijoz ismi:" value="{{ $ad?->customers_info }}">
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

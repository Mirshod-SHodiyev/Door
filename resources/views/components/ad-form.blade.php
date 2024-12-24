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

                        <!-- Title Field -->
                        <div class="col-span-12">
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

                        
                        
                        <div class="col-span-12">
                            <label for="images" class="font-medium">Rasm turlari:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="images" name="images">
                                    @foreach ($images as $image)
                                        <option value="{{$image->id}}">
                                            {{$image->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-span-6">
                            <label for="width" class="font-medium">uzunligi eni sm:</label>
                            <div class="form-icon relative mt-2">
                                <input name="width" id="width" type="number" class="form-input ps-11" placeholder="eni sm:" value="{{ $ad?->width }}">
                            </div>
                        </div>

                        <!-- Height Field -->
                        <div class="col-span-6">
                            <label for="height" class="font-medium">uzunligi bo'yi sm:</label>
                            <div class="form-icon relative mt-2">
                                <input name="height" id="height" type="number" class="form-input ps-11" placeholder="bo'yi sm:" value="{{ $ad?->height }}">
                            </div>
                        </div>
                       

                        <!-- Branch Field -->
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

                        <!-- Door Type Field -->
                        <!-- Door Frame Field -->
                        <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">atrofida ramka:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorDimensions_id" name="door_dimensions_id">
                                    @if(!isset($ad))
                                    <option value="0">Eshik atofini tanglang</option>
                                    @endif
                                    @foreach ($doorDimensions as $doorDimension)
                                        <option value="{{$doorDimension->id}}" {{ isset($ad) && $doorDimension->id === $ad->door_dimensions_id ? 'selected' : '' }}>{{$doorDimension->door_frame}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Width Field -->
                      
                              <!-- Description Field -->
                    
                        <!-- Door Dimensions Field -->
                        <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">yuqori qoshi:</label>
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

                        <!-- Door Comfort Field -->
                        <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">Eshik qulayligi:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorDimensions_id" name="door_dimensions_id">
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
                            <label for="extra_info" class="font-medium">Qo'shimcha malumot :</label>
                            <input name="extra_info" id="extra_info" type="text" class="form-input mt-2" placeholder="qo'shimcha malumot" value="{{ $ad?->phone_number}}">
                        </div>
                             
                        <div class="col-span-6">
                            <label for="phone_number" class="font-medium">Mijoz telefon raqami :</label>
                            <input name="phone_number" id="phone_number" type="number" class="form-input mt-2" placeholder="+998 77 777 77 77" value="{{ $ad?->phone_number}}">
                        </div>

                        <!-- Address Field -->
                        <div class="col-span-6">
                            <label for="customers_info" class="font-medium">Mijoz Ismi:</label>
                            <div class="form-icon relative mt-2">
                                <input name="customers_info" id="customers_info" type="text" class="form-input ps-11" placeholder="mijoz ismi:" value="{{ $ad?->customers_info }}">
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

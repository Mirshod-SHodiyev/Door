<x-layouts.main>
    <br>
  
    <div class="container relative">
        <div class="grid md:grid-cols-2 grid-cols-1 gap-6 mt-6">

            <!-- Image Upload Section -->
            <div class="rounded-md shadow dark:shadow-gray-700 p-6 bg-white dark:bg-slate-900 h-fit">
                <p class="font-medium mb-4">Rasmni shu yerga olib keling yoki "Rasm yuklash" tugmasini bosing</p>
                <div class="preview-box flex justify-center rounded-md shadow dark:shadow-gray-800 overflow-hidden bg-gray-50 dark:bg-slate-800 text-slate-400 p-2 text-center small w-auto max-h-60">
                    Qabul qilinadigan kengaytmalar: JPG, PNG<br> Hajm bo'yicha cheklov: 10MB
                </div>
                <input form="ads-create" type="file" id="input-file" name="image" accept="image/*" onchange="handleChange()" hidden>
                <label class="btn-upload btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-6 cursor-pointer" for="input-file">
                    <i class="mdi mdi-upload me-2"></i>Rasm yuklash
                </label>
            </div>

            <!-- Ad Form Section -->
            <div class="rounded-md shadow dark:shadow-gray-700 p-6 bg-white dark:bg-slate-900 h-fit">
                <form id="ads-create" action="{{ $action }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (request()->route()->getName() === 'ads.update')
                        <input type="hidden" name="_method" value="patch">
                    @endif

                    <div class="grid grid-cols-12 gap-5">

                        <!-- Title Field -->
                        <div class="col-span-12">
                            <label for="title" class="font-medium">Sarlavha:</label>
                            <input name="title" id="title" type="text" class="form-input mt-2" placeholder="Sarlavha" value="{{ $ad?->title }}">
                        </div>

                        <!-- Description Field -->
                        <div class="col-span-12">
                            <label for="description" class="font-medium">Ta'rif:</label>
                                <textarea name="description" id="description" class="form-input ps-11" placeholder="E'lon bo'yicha ta'rif...">{{ $ad?->description }}</textarea>
                        </div>

                        <!-- Address Field -->
                        <div class="col-span-12">
                            <label for="customers_info" class="font-medium">Mijoz malumotlari:</label>
                            <div class="form-icon relative mt-2">
                                <input name="customers_info" id="customers_info" type="text" class="form-input ps-11" placeholder="Mijoz malumotlari:" value="{{ $ad?->customers_info }}">
                            </div>
                        </div>

                        <!-- Branch Field -->
                                                    <!-- Branch Field -->
                            <div class="col-span-6">
                                <label for="colors_id" class="font-medium">Ranglar:</label>
                                <div class="form-icon relative mt-2">
                                    <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="colors_id" name="colors_id">
                                        <option value="" disabled {{ !isset($ad) ? 'selected' : '' }}>Ranglarni tanlang</option> <!-- Bo'sh tanlov -->
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}" {{ isset($ad) && $color->id === $ad->colors_id ? 'selected' : '' }}>{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                                                    <!-- Branch Field -->
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

                        <!-- Price Field -->
                        <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">uzunligi eni sm:</label>
                            <div class="form-icon relative mt-2">
                                <input name="door_dimensions_id" id="door_dimensions_id" type="number" class="form-input ps-11" placeholder="eni sm:" value="{{ $doorDimension?->width }}">
                            </div>
                        </div>
                        <!-- Rooms Field -->
                         <!-- Price Field -->
                         <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">uzunligi bo'yi sm:</label>
                            <div class="form-icon relative mt-2">
                                <input name="door_dimensions_id" id="door_dimensions_id" type="number" class="form-input ps-11" placeholder="bo'yi sm:" value="{{ $doorDimension?->width }}">
                            </div>
                        </div>
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
                        <!-- Gender Field -->
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
                        <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">Eshik turlari:</label>
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
                           
                    <!-- Submit Button -->
                    <button type="submit" id="submit" name="send" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-5 ml-auto">
                        <i class="mdi mdi-content-save me-2"></i>Saqlash
                    </button>
                    
                </form>
            </div>

        </div>
    </div>

    <script>
        const handleChange = () => {
            const fileUploader = document.querySelector('#input-file');
            const getFile = fileUploader.files;

            if (getFile.length !== 0) {
                const uploadedFile = getFile[0];
                readFile(uploadedFile);
            }
        };

        const readFile = (uploadedFile) => {
            if (uploadedFile) {
                const reader = new FileReader();
                reader.onload = () => {
                    const parent = document.querySelector('.preview-box');
                    parent.innerHTML = `<img class="preview-content" src="${reader.result}" />`;
                };
                reader.readAsDataURL(uploadedFile);
            }
        };
    </script>
</x-layouts.main>

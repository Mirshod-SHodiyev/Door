<x-layouts.main>
    <br>
    <div class="container relative">
        <div class="grid md:grid-cols-2 grid-cols-1 gap-6 mt-6">
            <div class="rounded-md shadow dark:shadow-gray-700 p-6 bg-white dark:bg-slate-900 h-fit">
                <div>
                    <p class="font-medium mb-4">Rasmni shu yerga olib keling yoki "Rasm yuklash" tugmasini bosing</p>
                    <div class="preview-box flex justify-center rounded-md shadow dark:shadow-gray-800 overflow-hidden bg-gray-50 dark:bg-slate-800 text-slate-400 p-2 text-center small w-auto max-h-60">
                        Qabul qilinadigan kengaytmalar: JPG, PNG
                        <br> Hajm bo'yicha cheklov: 10MB
                    </div>
                    <input form="ads-create" type="file" id="input-file" name="image" accept="image/*" onchange={handleChange()} hidden>
                    <label class="btn-upload btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-6 cursor-pointer" for="input-file">
                        <i class="mdi mdi-upload me-2"></i>Rasm yuklash
                    </label>
                </div>
            </div>

            <div class="rounded-md shadow dark:shadow-gray-700 p-6 bg-white dark:bg-slate-900 h-fit">
                <form id="ads-create" action="{{ $action }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (request()->route()->getName() === 'ads.update')
                        <input type="hidden" name="_method" value="patch">
                    @endif
                    <div class="grid grid-cols-12 gap-5">
                        <div class="col-span-12">
                            <label for="title" class="font-medium">Sarlavha:</label>
                            <input name="title" id="title" type="text" class="form-input mt-2" placeholder="Sarlavha" value="{{ $ad?->title }}">
                        </div>

                        <div class="md:col-span-12 col-span-12">
                            <label for="description" class="font-medium">Ta'rif:</label>
                            <div class="form-icon relative mt-2">
                                <i class="mdi mdi-text-box-outline absolute top-2 start-4 text-green-600"></i>
                                <textarea name="description" id="description" class="form-input ps-11" placeholder="E'lon bo'yicha ta'rif...">{{ $ad?->description }}</textarea>
                            </div>
                        </div>

                        <div class="md:col-span-12 col-span-12">
                            <label for="branch" class="font-medium">Ranglar:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="branch" name="branch_id">
                                    {{ isset($ad) ? '' : "<option value='0'>Filialni tanlang</option>" }}
                                    @foreach ($colors as $color)
                                        @if (isset($ad) && $color->id === $ad->color_id)
                                            <option value='{{$color->id}}' selected>{{$color->name}}</option>
                                        @else
                                            <option value='{{$->id}}'>{{$color->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="md:col-span-12 col-span-12">
                            <label for="door-side" class="font-medium">Eshik qoshi:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="branch" name="branch_id">
                                    <option value="left">kerak </option>
                                    <option value="right">kerak emas</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-span-12">
                            <!-- Eni va bo'yi qismlari -->
                            <div class="col-span-6">
                                <label for="width" class="font-medium">Eni (sm):</label>
                                <div class="form-icon relative mt-2">
                                    <input name="width" id="width" type="number" class="form-input ps-11" placeholder="Eni (sm)" value="{{ $ad?->width }}">
                                </div>
                            </div>

                            <div class="col-span-6">
                                <label for="height" class="font-medium">Bo'yi (sm):</label>
                                <div class="form-icon relative mt-2">
                                    <input name="height" id="height" type="number" class="form-input ps-11" placeholder="Bo'yi (sm)" value="{{ $ad?->height }}">
                                </div>
                            </div>
                        </div>

                        <div class="md:col-span-6 col-span-12">
                            <label for="door-side" class="font-medium">Eshik tomonini tanlang:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="door-side" name="door_side">
                                    <option value="left">Chap</option>
                                    <option value="right">O'ng</option>
                                </select>
                            </div>
                        </div>

                        <div class="md:col-span-6 col-span-12">
                            <label for="build-type" class="font-medium">O'zingiz quradigan eshik:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="build-type" name="build_type">
                                    <option value="self-built">O'zim quraman</option>
                                    <option value="pre-built">Biz qurib beramiz</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" id="submit" name="send" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-5">
                        <i class="mdi mdi-content-save me-2"></i>
                        Saqlash
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.main>

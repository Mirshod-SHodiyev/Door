<x-layouts.main>
    <div class="page-wrapper toggled">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Start Page Content -->
        <main class="page-content bg-gray-50 dark:bg-slate-800">
            <div class="container-fluid relative px-3">
                <div class="layout-specing">
                    <!-- Start Content -->
                    <div class="md:flex justify-between items-center">
                        <h5 class="text-lg font-semibold">E'lon qo'shish</h5>
                        <ul class="tracking-[0.5px] inline-block sm:mt-0 mt-3">
                            <li class="inline-block capitalize text-[16px] font-medium duration-500 dark:text-white/70 hover:text-green-600 dark:hover:text-white">
                                <a href="/admin">Dashboard</a></li>
                            <li class="inline-block text-base text-slate-950 dark:text-white/70 mx-0.5 ltr:rotate-0 rtl:rotate-180">
                                <i class="mdi mdi-chevron-right"></i></li>
                            <li class="inline-block capitalize text-[16px] font-medium text-green-600 dark:text-white"
                                aria-current="page">E'lon qo'shish</li>
                        </ul>
                    </div>

                    <x-ad-form :action="$action" />

                    <br>
                    <!-- File upload & Form Section -->
                    <div class="grid md:grid-cols-2 grid-cols-1 gap-6 mt-6">
                        <!-- File Upload -->
                        <div class="rounded-md shadow dark:shadow-gray-700 p-6 bg-white dark:bg-slate-900 h-fit">
                            <p class="font-medium mb-4">Rasmni shu yerga olib keling yoki "Rasm yuklash" tugmasini bosing</p>
                            <div class="preview-box flex justify-center rounded-md shadow dark:shadow-gray-800 overflow-hidden bg-gray-50 dark:bg-slate-800 text-slate-400 p-2 text-center small w-auto max-h-60">
                                Qabul qilinadigan kengaytmalar: JPG, PNG<br> Hajm bo'yicha cheklov: 10MB
                            </div>
                            <input form="ads-create" type="file" id="input-file" name="image" accept="image/*" hidden>
                            <label class="btn-upload btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-6 cursor-pointer" for="input-file">
                                <i class="mdi mdi-upload me-2"></i>Rasm yuklash
                            </label>
                        </div>

                        <!-- Form Section -->
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
                                        <textarea name="description" id="description" class="form-input ps-11" placeholder="E'lon bo'yicha ta'rif...">{{ $ad?->description }}</textarea>
                                    </div>
                                    <div class="md:col-span-12 col-span-12">
                                        <label for="branch" class="font-medium">Ranglar:</label>
                                        <select class="form-select form-input" id="branch" name="branch_id">
                                            <option value="0">Filialni tanlang</option>
                                            @foreach ($colors as $color)
                                                <option value="{{$color->id}}" {{ isset($ad) && $color->id === $ad->color_id ? 'selected' : '' }}>{{$color->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" id="submit" class="btn bg-green-600 text-white mt-5">Saqlash</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-layouts.main>

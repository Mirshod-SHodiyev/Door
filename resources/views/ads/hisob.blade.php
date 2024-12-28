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
                        <div class="col-span-12">
                            <label for="doortype" class="font-medium">Eshik turlari:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doortype" name="door_types_id">
                                    @foreach ($doorTypes as $doorType)
                                        <option value="{{ $doorType->id }}" {{ old('door_types_id') == $doorType->id ? 'selected' : '' }}>
                                            {{ $doorType->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label for="door_dimensions_id" class="font-medium">Eshik materiali:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorDimensions_id" name="door_dimensions_id">
                                    @foreach ($doorDimensions as $doorDimension)
                                        <option value="{{ $doorDimension->id }}" {{ old('door_dimensions_id') == $doorDimension->id ? 'selected' : '' }}>
                                            {{ $doorDimension->material }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label for="width" class="font-medium">Uzunligi eni sm:</label>
                            <div class="form-icon relative mt-2">
                                <input name="width" id="width" type="number" class="form-input ps-11" placeholder="Eni sm:" value="{{ old('width') }}">
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label for="height" class="font-medium">Uzunligi bo'yi sm:</label>
                            <div class="form-icon relative mt-2">
                                <input name="height" id="height" type="number" class="form-input ps-11" placeholder="Bo'yi sm:" value="{{ old('height') }}">
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label for="door_leaf" class="font-medium">Eshik palasi:</label>
                            <div class="form-icon relative mt-2">
                                <input name="door_leaf" id="door_leaf" type="number" class="form-input ps-11" placeholder="Eshik palasi:" value="{{ old('door_leaf') }}">
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label for="door_frames_id" class="font-medium">Atrafida ramka:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorFrames_id" name="door_frames_id">
                                    @foreach ($doorFrames as $doorFrame)
                                        <option value="{{ $doorFrame->id }}" {{ old('door_frames_id') == $doorFrame->id ? 'selected' : '' }}>
                                            {{ $doorFrame->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label for="door_extras_id" class="font-medium">Eshik qo'shimcha narsalari:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorExtras_id" name="door_extras_id">
                                    @foreach ($doorExtras as $doorExtra)
                                        <option value="{{ $doorExtra->id }}" {{ old('door_extras_id') == $doorExtra->id ? 'selected' : '' }}>
                                            {{ $doorExtra->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label for="door_additions_id" class="font-medium">Eshik fragalari:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="doorAdditions_id" name="door_additions_id">
                                    @foreach ($doorAdditions as $doorAddition)
                                        <option value="{{ $doorAddition->id }}" {{ old('door_additions_id') == $doorAddition->id ? 'selected' : '' }}>
                                            {{ $doorAddition->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-span-6">
                            <label for="knobs_id" class="font-medium">Eshik zamoklari:</label>
                            <div class="form-icon relative mt-2">
                                <select class="form-select form-input w-full py-2 h-10 bg-white dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-100 focus:border-gray-200 dark:border-gray-800 dark:focus:border-gray-700 focus:ring-0" id="knobs_id" name="knobs_id">
                                    @foreach ($knobs as $knob)
                                        <option value="{{ $knob->id }}" {{ old('knobs_id') == $knob->id ? 'selected' : '' }}>
                                            {{ $knob->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                  
                    @isset($price)
                    <div class="mt-6 bg-green-100 p-6 rounded-xl shadow-lg text-center">
                        <p class="text-2xl font-semibold text-green-700">
                            Hisoblangan narx:
                        </p>
                        <p class="text-3xl font-bold text-green-800 mt-2">
                            {{ number_format($price) }} so'm
                        </p>
                    </div>
                @endisset
                

                    <button type="submit" id="submit" name="send" class="btn bg-green-600 hover:bg-green-700 border-green-600 hover:border-green-700 text-white rounded-md mt-5 ml-auto">
                        <i class="mdi mdi-content-save me-2"></i>Hisoblash
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.main>

<x-layouts.main>
    <br>
    <div class="container relative w-full min-h-screen px-6 py-8">
        <div class="grid md:grid-cols-1 grid-cols-1 gap-6 mt-6">
            <div class="rounded-md shadow dark:shadow-gray-700 p-6 bg-white dark:bg-slate-900 w-full h-full max-w-none mx-auto">
                <form id="ads-create" action="{{ route('hisob.post') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- Eshik turi -->
                    <div class="col-span-12">
                        <label for="doortype" class="font-medium">Eshik turlari:</label>
                        <div class="form-icon relative mt-2">
                            <select class="form-select form-input" id="doortype" name="door_types_id">
                                <option value="yo'q">Oddiy eshik</option>
                                <option value="ha">Maxsus eshik</option>
                            </select>
                        </div>
                    </div>

                    <!-- O‘lchamlar -->
                    <div class="col-span-6">
                        <label for="width" class="font-medium">Eni (sm):</label>
                        <input name="width" id="width" type="number" class="form-input" placeholder="Eni sm" required>
                    </div>
                    <div class="col-span-6">
                        <label for="height" class="font-medium">Bo‘yi (sm):</label>
                        <input name="height" id="height" type="number" class="form-input" placeholder="Bo‘yi sm" required>
                    </div>

                    <div class="col-span-6">
                        <label for="frame" class="font-medium">Ramka:</label>
                        <select class="form-select form-input" id="frame" name="frame">
                            <option value="ha">Ha</option>
                            <option value="yo'q">Yo‘q</option>
                        </select>
                    </div>
                    
                    <!-- Yuqori qosh -->
                    <div class="col-span-6">
                        <label for="topSection" class="font-medium">Yuqori qosh:</label>
                        <select class="form-select form-input" id="topSection" name="topSection">
                            <option value="ha">Ha</option>
                            <option value="yo'q">Yo‘q</option>
                        </select>
                    </div>
                    
                    <!-- Xizmat -->
                    <div class="col-span-12">
                        <label for="service" class="font-medium">Xizmat:</label>
                        <select class="form-select form-input" id="service" name="service">
                            <option value="ha">Ha</option>
                            <option value="yo'q">Yo‘q</option>
                        </select>
                    </div>
                    
                
                    <!-- Hisoblash tugmasi -->
                    <button type="submit" class="btn bg-green-600 text-white rounded-md mt-5">
                        Hisoblash
                    </button>
                </form>

                <!-- Natija -->
                @if(isset($price))
                    <h2 class="mt-5 text-xl font-bold text-green-600">
                        Hisoblangan narx: {{ number_format($price, 0, '.', ' ') }} so'm
                    </h2>
                @endif
            </div>
        </div>
    </div>
    <br>
    <br>


</x-layouts.main>

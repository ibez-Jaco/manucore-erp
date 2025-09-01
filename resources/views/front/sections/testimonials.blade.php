<section class="py-20 bg-white">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-16 text-center">
            <h2 class="mb-4 text-4xl font-bold">Trusted by Leading Manufacturers</h2>
            <p class="text-xl text-gray-600">See what our customers have to say</p>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            {{-- Card 1 --}}
            <div class="p-8 bg-gray-50 rounded-xl">
                <div class="flex mb-4">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    @endfor
                </div>
                <p class="mb-4 text-gray-700">"ManuCore transformed our inventory management. We reduced stock-outs by 60% and improved delivery times significantly."</p>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 mr-3 font-semibold text-white bg-purple-600 rounded-full">JM</div>
                    <div>
                        <div class="font-semibold">John Mbatha</div>
                        <div class="text-sm text-gray-600">CEO, TechParts SA</div>
                    </div>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="p-8 bg-gray-50 rounded-xl">
                <div class="flex mb-4">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="mb-4 text-gray-700">"The production planning module helped us increase efficiency by 40%. Best investment we've made."</p>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 mr-3 font-semibold text-white bg-purple-600 rounded-full">SN</div>
                    <div>
                        <div class="font-semibold">Sarah Naidoo</div>
                        <div class="text-sm text-gray-600">Operations Manager, AutoParts JHB</div>
                    </div>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="p-8 bg-gray-50 rounded-xl">
                <div class="flex mb-4">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
                <p class="mb-4 text-gray-700">"Excellent support team and intuitive interface. Our team adopted it within days with minimal training."</p>
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-10 h-10 mr-3 font-semibold text-white bg-purple-600 rounded-full">PV</div>
                    <div>
                        <div class="font-semibold">Peter Van Der Merwe</div>
                        <div class="text-sm text-gray-600">Director, Precision Manufacturing</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="home" class="relative flex items-center min-h-screen overflow-hidden hero-gradient">
    {{-- Animated background shapes --}}
    <div class="absolute inset-0">
        <div class="absolute bg-purple-300 rounded-full top-20 left-10 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-float"></div>
        <div class="absolute bg-yellow-300 rounded-full top-40 right-10 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute bg-pink-300 rounded-full bottom-20 left-1/2 w-72 h-72 mix-blend-multiply filter blur-xl opacity-70 animate-float" style="animation-delay: 4s;"></div>
    </div>

    <div class="relative px-4 py-32 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid items-center gap-12 md:grid-cols-2">
            <div class="text-white animate-slide-left">
                <h1 class="mb-6 text-5xl font-bold md:text-6xl">
                    Transform Your Manufacturing with
                    <span class="text-yellow-300">ManuCore ERP</span>
                </h1>
                <p class="mb-8 text-xl text-gray-100">
                    Streamline operations, optimize inventory, and scale your manufacturing business with our intelligent ERP solution designed for modern manufacturers.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('register') }}" class="px-8 py-4 font-semibold text-purple-600 transition-all transform bg-white rounded-full hover:bg-gray-100 hover:shadow-2xl hover:scale-105">
                        Start Free Trial
                    </a>
                    <a href="#demo" class="px-8 py-4 font-semibold text-white transition-all rounded-full glass-effect hover:bg-white hover:bg-opacity-20">
                        Watch Demo
                    </a>
                </div>
                <div class="flex items-center mt-8 space-x-8 text-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        No credit card required
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        14-day free trial
                    </div>
                </div>
            </div>

            <div class="relative animate-slide-right">
                <img src="{{ asset('brand/front/ManucoreIcon.png') }}" alt="ManuCore Dashboard" class="shadow-2xl rounded-2xl animate-float">
                <div class="absolute inset-0 bg-gradient-to-t from-purple-900 to-transparent opacity-20 rounded-2xl"></div>
            </div>
        </div>
    </div>
</section>

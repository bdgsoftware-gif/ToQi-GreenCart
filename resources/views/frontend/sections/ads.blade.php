<section class="py-12">
    <div class="max-w-8xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Ad 1 -->
            <div class="relative overflow-hidden rounded-2xl group">
                <img src="https://images.unsplash.com/photo-1607083206968-13611e3d76db?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                    alt="Seasonal Sale"
                    class="w-full h-64 md:h-80 object-cover rounded-2xl group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent rounded-2xl">
                    <div class="absolute left-8 bottom-8 text-white">
                        <span class="text-sm font-semibold bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">Limited
                            Time</span>
                        <h3 class="text-2xl md:text-3xl font-bold mt-3">Winter Collection</h3>
                        <p class="mt-2 text-white/90">Up to 60% off on selected items</p>
                        <a href="{{ url('/products?season=winter') }}"
                            class="inline-block mt-4 bg-white text-gray-900 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Ad 2 -->
            <div class="relative overflow-hidden rounded-2xl group">
                <img src="https://images.unsplash.com/photo-1526178613552-2b45c6c302f0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                    alt="New Arrivals"
                    class="w-full h-64 md:h-80 object-cover rounded-2xl group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-l from-black/60 to-transparent rounded-2xl">
                    <div class="absolute right-8 bottom-8 text-white text-right">
                        <span class="text-sm font-semibold bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full">Just
                            In</span>
                        <h3 class="text-2xl md:text-3xl font-bold mt-3">New Arrivals</h3>
                        <p class="mt-2 text-white/90">Fresh styles for the season</p>
                        <a href="{{ url('/products?new=true') }}"
                            class="inline-block mt-4 bg-white text-gray-900 px-6 py-2 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                            Explore
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

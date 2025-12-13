<section class="py-8 md:py-12 bg-gradient-to-r from-blue-50 to-indigo-50">
    <div class="max-w-8xl mx-auto px-4">
        <!-- Swiper Hero Slider -->
        <div class="relative hero-swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div class="text-center lg:text-left">
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                                Summer Sale <span class="text-blue-600">50% Off</span>
                            </h1>
                            <p class="text-lg md:text-xl text-gray-600 mb-8">
                                Discover amazing products at unbeatable prices. Limited time offer!
                            </p>
                            <a href="{{ url('/products?discount=true') }}"
                                class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                                Shop Now <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                        <div class="flex justify-center lg:justify-end">
                            <img src="https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Summer Sale" class="rounded-2xl shadow-2xl max-h-[500px] object-cover">
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div class="order-2 lg:order-1">
                            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="New Collection" class="rounded-2xl shadow-2xl max-h-[500px] object-cover">
                        </div>
                        <div class="order-1 lg:order-2 text-center lg:text-left">
                            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                                New <span class="text-blue-600">Collection</span> 2024
                            </h2>
                            <p class="text-lg md:text-xl text-gray-600 mb-8">
                                Explore our latest collection with trending products and styles.
                            </p>
                            <a href="{{ url('/products?new=true') }}"
                                class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                                View Collection <i class="fas fa-eye ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                        <div class="text-center lg:text-left">
                            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                                Free <span class="text-blue-600">Shipping</span> Worldwide
                            </h2>
                            <p class="text-lg md:text-xl text-gray-600 mb-8">
                                Enjoy free shipping on all orders over $50. No hidden fees!
                            </p>
                            <a href="{{ url('/products') }}"
                                class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                                Start Shopping <i class="fas fa-shopping-bag ml-2"></i>
                            </a>
                        </div>
                        <div class="flex justify-center lg:justify-end">
                            <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                                alt="Free Shipping" class="rounded-2xl shadow-2xl max-h-[500px] object-cover">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="swiper-button-next hidden md:flex bg-white/80 hover:bg-white p-4 rounded-full shadow-lg"></div>
            <div class="swiper-button-prev hidden md:flex bg-white/80 hover:bg-white p-4 rounded-full shadow-lg"></div>

            <!-- Pagination -->
            <div class="swiper-pagination mt-8"></div>
        </div>
    </div>
</section>

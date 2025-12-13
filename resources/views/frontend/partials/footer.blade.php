<footer class="bg-gray-900 text-white pt-12 pb-8">
    <div class="max-w-8xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div>
                <h3 class="text-2xl font-bold mb-4">{{ config('app.name', 'E-Shop') }}</h3>
                <p class="text-gray-400 mb-6">
                    Your one-stop shop for all your needs. Quality products at affordable prices.
                </p>
                <div class="flex space-x-4">
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 hover:bg-blue-600 rounded-full flex items-center justify-center transition-colors duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 hover:bg-blue-400 rounded-full flex items-center justify-center transition-colors duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 hover:bg-pink-600 rounded-full flex items-center justify-center transition-colors duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-gray-800 hover:bg-red-600 rounded-full flex items-center justify-center transition-colors duration-300">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-semibold mb-6">Quick Links</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="{{ url('/') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2"></i> Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/products') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2"></i> All Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/about') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2"></i> About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}"
                            class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs mr-2"></i> Contact
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h4 class="text-lg font-semibold mb-6">Categories</h4>
                <ul class="space-y-3">
                    @foreach ($categories->take(5) as $category)
                        <li>
                            <a href="{{ url('/category/' . $category->id) }}"
                                class="text-gray-400 hover:text-white transition-colors duration-300 flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2"></i> {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                    @if ($categories->count() > 5)
                        <li>
                            <a href="{{ url('/categories') }}"
                                class="text-blue-400 hover:text-blue-300 transition-colors duration-300">
                                View all categories →
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="text-lg font-semibold mb-6">Contact Us</h4>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt text-blue-400 mt-1 mr-3"></i>
                        <span class="text-gray-400">123 Street, City, Country</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone text-blue-400 mr-3"></i>
                        <span class="text-gray-400">+1 234 567 8900</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope text-blue-400 mr-3"></i>
                        <span class="text-gray-400">support@{{ strtolower(config('app.name', 'eshop')) }}.com</span>
                    </li>
                </ul>

                <!-- Newsletter -->
                <div class="mt-6">
                    <h5 class="text-sm font-semibold mb-3">Subscribe to Newsletter</h5>
                    <div class="flex">
                        <input type="email" placeholder="Your email"
                            class="flex-1 px-4 py-2 bg-gray-800 border border-gray-700 rounded-l-lg focus:outline-none focus:border-blue-500">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-r-lg transition-colors duration-300">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'E-Shop') }}. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="{{ url('/privacy') }}" class="hover:text-white transition-colors duration-300">Privacy
                        Policy</a>
                    <a href="{{ url('/terms') }}" class="hover:text-white transition-colors duration-300">Terms of
                        Service</a>
                    <a href="{{ url('/sitemap') }}" class="hover:text-white transition-colors duration-300">Sitemap</a>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="flex justify-center space-x-4 mt-6">
                <i class="fab fa-cc-visa text-2xl text-gray-500"></i>
                <i class="fab fa-cc-mastercard text-2xl text-gray-500"></i>
                <i class="fab fa-cc-paypal text-2xl text-gray-500"></i>
                <i class="fab fa-cc-apple-pay text-2xl text-gray-500"></i>
                <i class="fab fa-cc-amazon-pay text-2xl text-gray-500"></i>
            </div>
        </div>
    </div>
</footer>

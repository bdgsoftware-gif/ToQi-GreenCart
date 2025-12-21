<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Featured Products</h2>
                <p class="text-gray-600">Best selling products this week</p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="flex space-x-2">
                    <button
                        class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                        All
                    </button>
                    <button
                        class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                        New Arrivals
                    </button>
                    <button
                        class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                        Best Sellers
                    </button>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach ($products as $product)
                <div
                    class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">
                    <!-- Product Image -->
                    <div class="relative overflow-hidden aspect-square">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                        <!-- Quick Actions -->
                        <div
                            class="absolute top-4 right-4 flex flex-col space-y-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <!-- Wishlist Button -->
                            <button onclick="toggleWishlist({{ $product->id }})"
                                class="w-10 h-10 bg-white rounded-full shadow flex items-center justify-center hover:bg-primary-600 hover:text-white transition-colors duration-200">
                                <i class="fas fa-heart {{ $product->is_in_wishlist ? 'text-red-500' : '' }}"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="p-6">
                        <h3 class="font-semibold text-gray-900 mb-2">{{ $product->name }}</h3>

                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-900">
                                <span class="font-bengali">৳</span>{{ number_format($product->price, 2) }}
                            </span>

                            <!-- Add to Cart Button -->
                            <button type="button" onclick="addToCart({{ $product->id }})"
                                class="add-to-cart flex items-center justify-center w-10 h-10 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors duration-200"
                                {{ $product->stock_quantity == 0 ? 'disabled' : '' }}>
                                <i class="fas fa-shopping-cart"></i>
                            </button>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- View All Products Button -->
        <div class="text-center mt-12">
            <a href="#"
                class="inline-flex items-center px-8 py-3 bg-primary-600 text-white font-medium rounded-lg hover:bg-primary-700 transition-colors duration-200 shadow-lg hover:shadow-xl">
                <span>View All Products</span>
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        // Add to Cart Function
        function addToCart(productId) {
            if (event) event.preventDefault();

            fetch(`/cart/add/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        quantity: 1
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.querySelectorAll('.cart-count').forEach(el => {
                            el.textContent = data.cart_count;
                            el.classList.remove('hidden');
                        });
                        showNotification('Product added to cart!', 'success');
                    } else {
                        showNotification(data.message, 'error');
                    }
                });
        }


        // Toggle Wishlist Function
        function toggleWishlist(productId) {
            fetch(`/wishlist/toggle/${productId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const heartIcon = event.target.closest('button').querySelector('i');
                        if (data.is_in_wishlist) {
                            heartIcon.classList.add('text-red-500');
                            showNotification('Added to wishlist!', 'success');
                        } else {
                            heartIcon.classList.remove('text-red-500');
                            showNotification('Removed from wishlist!', 'info');
                        }
                    }
                });
        }

        // Notification function
        function showNotification(message, type = 'success') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg text-white z-50 transform transition-transform duration-300 ${
        type === 'success' ? 'bg-green-500' : 
        type === 'error' ? 'bg-red-500' : 'bg-blue-500'
    }`;
            notification.textContent = message;

            document.body.appendChild(notification);

            // Remove after 3 seconds
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    </script>
@endpush

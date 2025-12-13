<section class="py-12 bg-gray-50">
    <div class="max-w-8xl mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Featured Products</h2>
                <p class="text-gray-600 mt-2">Handpicked products just for you</p>
            </div>
            <a href="{{ url('/products') }}" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center">
                View All <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach ($products as $product)
                <div class="product-card bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                    <!-- Product Image -->
                    <div class="relative overflow-hidden">
                        @php
                            $primaryImage =
                                $product->images->where('is_primary', true)->first() ?? $product->images->first();
                        @endphp
                        <img src="{{ $primaryImage ? $primaryImage->image_url : 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80' }}"
                            alt="{{ $product->name }}"
                            class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">

                        <!-- Badges -->
                        <div class="absolute top-3 left-3">
                            @if ($product->stock_quantity > 0)
                                <span class="bg-green-500 text-white text-xs px-2 py-1 rounded">In Stock</span>
                            @else
                                <span class="bg-red-500 text-white text-xs px-2 py-1 rounded">Out of Stock</span>
                            @endif
                        </div>

                        <!-- Wishlist Button -->
                        <button
                            class="absolute top-3 right-3 w-10 h-10 bg-white/90 hover:bg-white rounded-full flex items-center justify-center transition-colors duration-300">
                            <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                        </button>
                    </div>

                    <!-- Product Details -->
                    <div class="p-4">
                        <!-- Category -->
                        @if ($product->category)
                            <span class="text-xs text-blue-600 font-medium">
                                {{ $product->category->name }}
                            </span>
                        @endif

                        <!-- Product Name -->
                        <h3
                            class="text-lg font-semibold text-gray-900 mt-1 mb-2 hover:text-blue-600 transition-colors duration-300">
                            <a href="{{ url('/product/' . $product->id) }}">
                                {{ Str::limit($product->name, 40) }}
                            </a>
                        </h3>

                        <!-- Description -->
                        @if ($product->description)
                            <p class="text-sm text-gray-600 mb-3">
                                {{ Str::limit($product->description, 60) }}
                            </p>
                        @endif

                        <!-- Price -->
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <span
                                    class="text-xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                                @if ($product->price > 100)
                                    <span
                                        class="text-sm text-gray-500 line-through ml-2">${{ number_format($product->price * 1.2, 2) }}</span>
                                @endif
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400"></i>
                                <span class="text-sm text-gray-600 ml-1">4.5</span>
                            </div>
                        </div>

                        <!-- Add to Cart Button -->
                        <button
                            class="add-to-cart w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 rounded-lg transition-all duration-300 flex items-center justify-center"
                            data-product-id="{{ $product->id }}"
                            {{ $product->stock_quantity <= 0 ? 'disabled' : '' }}>
                            @if ($product->stock_quantity > 0)
                                <i class="fas fa-shopping-cart mr-2"></i>
                                Add to Cart
                            @else
                                Out of Stock
                            @endif
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($products->isEmpty())
            <div class="text-center py-12">
                <i class="fas fa-shopping-bag text-4xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">No Products Available</h3>
                <p class="text-gray-500">Check back later for new arrivals</p>
            </div>
        @endif

        <!-- Pagination -->
        @if (method_exists($products, 'hasPages') && $products->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $products->links() }}
            </div>
        @endif

    </div>
</section>

@extends('layouts.guest')

@section('title', 'GreenCart - Local Organic Marketplace')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-green-50 to-white">
        <!-- Hero Section -->
        <section class="relative py-20 px-4">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h1 class="text-5xl font-bold text-gray-900 mb-6">
                            Fresh Organic Products
                            <span class="text-green-600">From Local Sellers</span>
                        </h1>
                        <p class="text-lg text-gray-600 mb-8">
                            Discover the best organic products from local farmers and sellers in your community.
                            Shop fresh, eat healthy, and support local businesses.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('register', ['role' => 'customer']) }}"
                                class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition text-center">
                                Start Shopping
                            </a>
                            <a href="{{ route('register', ['role' => 'seller']) }}"
                                class="border-2 border-green-600 text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-green-50 transition text-center">
                                Become a Seller
                            </a>
                        </div>
                    </div>
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=800"
                            alt="Fresh Organic Vegetables" class="rounded-2xl shadow-2xl">
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-20 px-4 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Choose GreenCart?</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        We connect you directly with local organic sellers for the freshest products
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-leaf text-2xl text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">100% Organic</h3>
                        <p class="text-gray-600">All products are certified organic and sourced from trusted local sellers.
                        </p>
                    </div>
                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-truck text-2xl text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Fast Delivery</h3>
                        <p class="text-gray-600">Get your fresh products delivered to your doorstep within hours.</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-hand-holding-usd text-2xl text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Support Local</h3>
                        <p class="text-gray-600">Every purchase supports local farmers and small businesses in your
                            community.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories Preview -->
        <section class="py-20 px-4 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Shop by Category</h2>
                    <p class="text-gray-600">Discover products from various organic categories</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    @foreach ([['Fruits', 'fas fa-apple-alt'], ['Vegetables', 'fas fa-carrot'], ['Dairy', 'fas fa-cheese'], ['Grains', 'fas fa-seedling'], ['Bakery', 'fas fa-bread-slice'], ['Beverages', 'fas fa-wine-bottle']] as $category)
                        <a href="{{ route('products.index') }}"
                            class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition text-center">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="{{ $category[1] }} text-green-600"></i>
                            </div>
                            <p class="font-medium text-gray-900">{{ $category[0] }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 px-4 bg-gradient-to-r from-green-600 to-green-700 text-white">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-6">Ready to Join GreenCart?</h2>
                <p class="text-lg mb-8 opacity-90">
                    Whether you want to shop organic products or sell your own, we have a place for you.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register', ['role' => 'customer']) }}"
                        class="bg-white text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        Sign Up as Customer
                    </a>
                    <a href="{{ route('register', ['role' => 'seller']) }}"
                        class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white/10 transition">
                        Sign Up as Seller
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection

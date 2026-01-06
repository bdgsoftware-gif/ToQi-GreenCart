<aside class="lg:w-1/4">
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6 overflow-hidden">
        <!-- User Info -->
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <span class="text-blue-600 font-semibold text-lg">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </span>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-900">{{ auth()->user()->name }}</h3>
                    <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="p-4">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('customer.dashboard') }}"
                        class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('customer.dashboard') ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50 text-gray-700' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer.orders.index') }}"
                        class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('customer.orders.*') ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50 text-gray-700' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        My Orders
                        <span class="ml-auto bg-blue-100 text-blue-600 text-xs px-2 py-1 rounded-full">
                            {{ auth()->user()->orders()->count() }}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('wishlist.index') }}"
                        class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('wishlist.*') ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50 text-gray-700' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                        Wishlist
                        <span class="ml-auto bg-blue-100 text-blue-600 text-xs px-2 py-1 rounded-full">
                            {{ auth()->user()->defaultWishlist?->products()->count() ?? 0 }}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cart.index') }}"
                        class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('cart.*') ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50 text-gray-700' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        Shopping Cart
                        <span class="ml-auto bg-blue-100 text-blue-600 text-xs px-2 py-1 rounded-full">
                            {{ auth()->user()->cart?->items()->sum('quantity') ?? 0 }}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer.profile.edit') }}"
                        class="flex items-center px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('customer.profile.*') ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50 text-gray-700' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile Settings
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer.addresses.index') }}"
                        class="flex items-center px-4 py-3 rounded-lg transition-colors hover:bg-gray-50 text-gray-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Addresses
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center px-4 py-3 rounded-lg transition-colors hover:bg-gray-50 text-gray-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                        Support
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Logout -->
        <div class="p-4 border-t border-gray-200">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center w-full px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h4 class="font-semibold text-gray-900 mb-4">Account Overview</h4>
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <span class="text-gray-600">Total Orders</span>
                <span class="font-medium">{{ auth()->user()->orders()->count() }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-600">Pending Orders</span>
                <span class="font-medium">{{ auth()->user()->orders()->where('status', 'pending')->count() }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-600">Wishlist Items</span>
                <span class="font-medium">{{ auth()->user()->defaultWishlist?->products()->count() ?? 0 }}</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-600">Cart Items</span>
                <span class="font-medium">{{ auth()->user()->cart?->items()->sum('quantity') ?? 0 }}</span>
            </div>
        </div>
    </div>
</aside>

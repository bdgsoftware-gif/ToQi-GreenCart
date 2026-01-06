<aside id="sidebar" class="hidden lg:block w-64 bg-green-900 text-white h-screen overflow-y-auto">
    <div class="p-6">
        <!-- Logo -->
        <a href="{{ route('seller.dashboard') }}" class="flex items-center space-x-2 mb-8">
            <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                <span class="text-white font-bold">S</span>
            </div>
            <span class="text-xl font-bold">Seller Panel</span>
        </a>

        <!-- Seller Info -->
        <div class="mb-8 p-4 bg-green-800/50 rounded-lg">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center">
                    <span class="font-semibold">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-medium truncate">{{ auth()->user()->business_name ?? auth()->user()->name }}</p>
                    <p class="text-sm text-green-200 truncate">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('seller.dashboard') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('seller.dashboard') ? 'bg-green-600 text-white' : 'hover:bg-green-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span>Dashboard</span>
            </a>

            <!-- Products -->
            <a href="{{ route('seller.products.index') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('seller.products.*') ? 'bg-green-600 text-white' : 'hover:bg-green-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                    </path>
                </svg>
                <span>Products</span>
                <span class="ml-auto bg-green-500 text-white text-xs px-2 py-1 rounded-full">
                    {{ auth()->user()->products()->count() }}
                </span>
            </a>

            <!-- Orders -->
            <a href="{{ route('seller.orders.index') }}"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('seller.orders.*') ? 'bg-green-600 text-white' : 'hover:bg-green-800' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                <span>Orders</span>
            </a>

            <!-- Analytics -->
            <a href="#"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors hover:bg-green-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                    </path>
                </svg>
                <span>Analytics</span>
            </a>

            <!-- Settings -->
            <a href="#"
                class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors hover:bg-green-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span>Settings</span>
            </a>
        </nav>

        <!-- Quick Stats -->
        <div class="mt-12 pt-6 border-t border-green-800">
            <h4 class="text-sm font-medium text-green-200 mb-3">Quick Stats</h4>
            <div class="space-y-2">
                <div class="flex justify-between text-sm">
                    <span class="text-green-300">Active Products</span>
                    <span
                        class="font-medium">{{ auth()->user()->products()->where('is_active', true)->count() }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-green-300">Pending Orders</span>
                    <span
                        class="font-medium">{{ auth()->user()->sellerOrders()->whereHas('order', function ($q) {
                                $q->where('status', 'pending');
                            })->count() }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-green-300">Total Sales</span>
                    <span
                        class="font-medium">TK{{ number_format(auth()->user()->sellerOrders()->sum('total_price'), 2) }}</span>
                </div>
            </div>
        </div>
    </div>
</aside>

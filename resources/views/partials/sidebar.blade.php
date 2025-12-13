        <!-- resources/views/partials/sidebar.blade.php -->
        <aside class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-white border-r border-gray-200">
                <!-- Logo -->
                <div class="h-16 flex items-center px-6 border-b border-gray-200">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                        <div
                            class="w-8 h-8 rounded-lg bg-gradient-to-r from-green-500 to-green-700 flex items-center justify-center">
                            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Application Logo') }}"
                                class="h-6 w-auto object-contain" loading="lazy">
                        </div>
                        <span class="text-xl font-bold text-gray-900">GreenCart</span>
                    </a>
                </div>

                <!-- Navigation -->
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <nav class="flex-1 px-4 space-y-1">
                        @if (auth()->user()->isAdmin())
                            <!-- Admin Navigation -->
                            <a href="{{ route('admin.dashboard') }}"
                                class="{{ request()->routeIs('admin.dashboard') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-tachometer-alt mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('admin.dashboard') ? 'text-green-500' : '' }}"></i>
                                Dashboard
                            </a>

                            <div class="pt-4">
                                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Management
                                </p>
                            </div>

                            <a href="{{ route('admin.users.index') }}"
                                class="{{ request()->routeIs('admin.users.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-users mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('admin.users.*') ? 'text-green-500' : '' }}"></i>
                                Users
                            </a>

                            <a href="{{ route('admin.products.index') }}"
                                class="{{ request()->routeIs('admin.products.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-box mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('admin.products.*') ? 'text-green-500' : '' }}"></i>
                                Products
                            </a>

                            <a href="{{ route('admin.orders.index') }}"
                                class="{{ request()->routeIs('admin.orders.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-shopping-cart mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('admin.orders.*') ? 'text-green-500' : '' }}"></i>
                                Orders
                            </a>

                            <a href="{{ route('admin.categories.index') }}"
                                class="{{ request()->routeIs('admin.categories.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-tags mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('admin.categories.*') ? 'text-green-500' : '' }}"></i>
                                Categories
                            </a>

                            <div class="pt-4">
                                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Analytics
                                </p>
                            </div>

                            <a href="{{ route('admin.analytics.sales') }}"
                                class="{{ request()->routeIs('admin.analytics.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-chart-line mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('admin.analytics.*') ? 'text-green-500' : '' }}"></i>
                                Sales Analytics
                            </a>
                        @elseif(auth()->user()->isSeller())
                            <!-- Seller Navigation -->
                            <a href="{{ route('seller.dashboard') }}"
                                class="{{ request()->routeIs('seller.dashboard') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-tachometer-alt mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('seller.dashboard') ? 'text-green-500' : '' }}"></i>
                                Dashboard
                            </a>

                            <div class="pt-4">
                                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Products
                                </p>
                            </div>

                            <a href="{{ route('seller.products.index') }}"
                                class="{{ request()->routeIs('seller.products.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-box mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('seller.products.*') ? 'text-green-500' : '' }}"></i>
                                My Products
                                @if ($pendingProducts = auth()->user()->products()->where('is_active', false)->count())
                                    <span
                                        class="ml-auto bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-0.5 rounded-full">
                                        {{ $pendingProducts }}
                                    </span>
                                @endif
                            </a>

                            <a href="{{ route('seller.products.create') }}"
                                class="{{ request()->routeIs('seller.products.create') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-plus-circle mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('seller.products.create') ? 'text-green-500' : '' }}"></i>
                                Add Product
                            </a>

                            <div class="pt-4">
                                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Orders</p>
                            </div>

                            <a href="{{ route('seller.orders.index') }}"
                                class="{{ request()->routeIs('seller.orders.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-shopping-cart mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('seller.orders.*') ? 'text-green-500' : '' }}"></i>
                                Orders
                                @if (
                                    $pendingOrders = auth()->user()->sellerOrders()->whereHas('order', function ($q) {
                                            $q->where('status', 'pending');
                                        })->count())
                                    <span
                                        class="ml-auto bg-red-100 text-red-800 text-xs font-medium px-2 py-0.5 rounded-full">
                                        {{ $pendingOrders }}
                                    </span>
                                @endif
                            </a>

                            <div class="pt-4">
                                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Analytics
                                </p>
                            </div>

                            <a href="{{ route('seller.analytics.sales') }}"
                                class="{{ request()->routeIs('seller.analytics.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-chart-bar mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('seller.analytics.*') ? 'text-green-500' : '' }}"></i>
                                Sales Report
                            </a>
                        @else
                            <!-- Customer Navigation -->
                            <a href="{{ route('customer.dashboard') }}"
                                class="{{ request()->routeIs('customer.dashboard') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-home mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('customer.dashboard') ? 'text-green-500' : '' }}"></i>
                                Home
                            </a>

                            <a href="{{ route('customer.products.index') }}"
                                class="{{ request()->routeIs('customer.products.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-store mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('customer.products.*') ? 'text-green-500' : '' }}"></i>
                                Browse Products
                            </a>

                            <a href="{{ route('customer.cart.index') }}"
                                class="{{ request()->routeIs('customer.cart.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-shopping-cart mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('customer.cart.*') ? 'text-green-500' : '' }}"></i>
                                Shopping Cart
                                @if ($cartCount = auth()->user()->cart?->items()->count())
                                    <span
                                        class="ml-auto bg-green-100 text-green-800 text-xs font-medium px-2 py-0.5 rounded-full">
                                        {{ $cartCount }}
                                    </span>
                                @endif
                            </a>

                            <div class="pt-4">
                                <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">My Account
                                </p>
                            </div>

                            <a href="{{ route('customer.orders.index') }}"
                                class="{{ request()->routeIs('customer.orders.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-clipboard-list mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('customer.orders.*') ? 'text-green-500' : '' }}"></i>
                                My Orders
                                @if ($pendingOrders = auth()->user()->orders()->where('status', 'pending')->count())
                                    <span
                                        class="ml-auto bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-0.5 rounded-full">
                                        {{ $pendingOrders }}
                                    </span>
                                @endif
                            </a>

                            <a href="{{ route('customer.wishlist.index') }}"
                                class="{{ request()->routeIs('customer.wishlist.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                                <i
                                    class="fas fa-heart mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('customer.wishlist.*') ? 'text-green-500' : '' }}"></i>
                                Wishlist
                            </a>
                        @endif

                        <!-- Common Links -->
                        <div class="pt-4">
                            <p class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Account</p>
                        </div>

                        <a href="{{ route('profile.edit') }}"
                            class="{{ request()->routeIs('profile.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                            <i
                                class="fas fa-user-circle mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('profile.*') ? 'text-green-500' : '' }}"></i>
                            Profile
                        </a>

                        <a href="{{ route('settings.index') }}"
                            class="{{ request()->routeIs('settings.*') ? 'bg-green-50 text-green-700 border-green-500' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} group flex items-center px-3 py-2 text-sm font-medium rounded-lg border-l-4 border-transparent transition">
                            <i
                                class="fas fa-cog mr-3 text-gray-500 group-hover:text-gray-600 {{ request()->routeIs('settings.*') ? 'text-green-500' : '' }}"></i>
                            Settings
                        </a>
                    </nav>

                    <!-- Bottom Section -->
                    <div class="mt-auto px-4 py-4">
                        <div class="p-3 bg-gray-50 rounded-lg">
                            <p class="text-xs text-gray-600 mb-1">Need help?</p>
                            <a href="/contact" class="text-sm text-green-600 hover:text-green-700 font-medium">
                                Contact Support
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-8xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-blue-600">
                    {{ config('app.name', 'E-Shop') }}
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ url('/') }}"
                    class="text-gray-700 hover:text-blue-600 font-medium {{ request()->is('/') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                    Home
                </a>

                <!-- Category Links -->
                @foreach ($categories as $category)
                    <a href="{{ url('/category/' . $category->id) }}"
                        class="text-gray-700 hover:text-blue-600 font-medium {{ request()->is('category/' . $category->id) ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach

                <a href="{{ url('/products') }}"
                    class="text-gray-700 hover:text-blue-600 font-medium {{ request()->is('products') ? 'text-blue-600 border-b-2 border-blue-600' : '' }}">
                    All Products
                </a>
            </div>

            <!-- Right Side Icons -->
            <div class="flex items-center space-x-6">
                <!-- Search -->
                <div class="relative hidden md:block">
                    <input type="text" placeholder="Search products..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>

                <!-- Cart -->
                <a href="{{ url('/cart') }}" class="relative">
                    <i class="fas fa-shopping-cart text-gray-700 text-xl hover:text-blue-600"></i>
                    <span
                        class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center cart-count">
                        {{ session('cart_count', 0) }}
                    </span>
                </a>

                <!-- User -->
                @auth
                    <div class="relative group">
                        <button class="flex items-center space-x-2">
                            <i class="fas fa-user-circle text-gray-700 text-xl"></i>
                            <span class="hidden md:inline">{{ auth()->user()->name }}</span>
                        </button>
                        <div
                            class="absolute right-0 w-48 mt-2 py-2 bg-white rounded-lg shadow-xl border hidden group-hover:block">
                            <a href="{{ url('/profile') }}"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="{{ url('/orders') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My
                                Orders</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ url('/login') }}" class="text-gray-700 hover:text-blue-600">
                        <i class="fas fa-sign-in-alt text-xl"></i>
                        <span class="hidden md:inline ml-2">Login</span>
                    </a>
                @endauth

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden">
                    <i class="fas fa-bars text-gray-700 text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden py-4 border-t">
            <div class="flex flex-col space-y-4">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600 font-medium">Home</a>

                @foreach ($categories as $category)
                    <a href="{{ url('/category/' . $category->id) }}"
                        class="text-gray-700 hover:text-blue-600 font-medium">
                        {{ $category->name }}
                    </a>
                @endforeach

                <a href="{{ url('/products') }}" class="text-gray-700 hover:text-blue-600 font-medium">All Products</a>

                <div class="relative">
                    <input type="text" placeholder="Search..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>

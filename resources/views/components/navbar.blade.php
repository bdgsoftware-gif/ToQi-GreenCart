<nav class="bg-white border-b">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="{{ route('home') }}" class="font-bold">
            {{ config('app.name') }}
        </a>

        <div class="flex items-center gap-4">
            <a href="{{ route('products.index') }}">Products</a>

            <a href="{{ route('cart.index') }}" class="relative">
                Cart
                <span id="cart-count"
                    class="cart-count hidden absolute -top-2 -right-3 text-xs bg-red-500 text-white rounded-full px-2">
                    0
                </span>
            </a>

            @auth
                <a href="{{ route('customer.dashboard') }}">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </div>
</nav>

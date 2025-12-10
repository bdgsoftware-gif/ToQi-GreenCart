@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <div class="space-y-6">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-900">Join GreenCart</h2>
            <p class="mt-2 text-sm text-gray-600">Your local organic marketplace</p>
        </div>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                    <div>
                        @foreach ($errors->all() as $error)
                            <p class="text-red-800">{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Role Selection -->
            <input type="hidden" name="role" value="{{ request('role', 'customer') }}">

            @if (request('role'))
                <div class="p-3 bg-green-50 border border-green-200 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-info-circle text-green-500 mr-3"></i>
                        <span class="text-green-800">
                            Registering as <span class="font-semibold">{{ ucfirst(request('role')) }}</span>
                        </span>
                    </div>
                </div>
            @else
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">I want to join as:</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="relative flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 transition has-[:checked]:border-green-500 has-[:checked]:bg-green-50">
                            <input type="radio" name="role" value="customer" class="sr-only" checked>
                            <div class="flex items-center">
                                <i class="fas fa-user text-green-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Customer</p>
                                    <p class="text-xs text-gray-500">Browse & buy products</p>
                                </div>
                            </div>
                        </label>
                        <label
                            class="relative flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50 transition has-[:checked]:border-green-500 has-[:checked]:bg-green-50">
                            <input type="radio" name="role" value="seller" class="sr-only">
                            <div class="flex items-center">
                                <i class="fas fa-store text-green-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Seller</p>
                                    <p class="text-xs text-gray-500">Sell your products</p>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            @endif

            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" name="full_name" id="full_name" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                    placeholder="Enter your full name" value="{{ old('full_name') }}">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" id="email" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                    placeholder="Enter your email" value="{{ old('email') }}">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                        placeholder="Create password">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                        placeholder="Confirm password">
                </div>
            </div>

            <!-- Additional fields for sellers -->
            <div id="seller_fields" class="space-y-4 hidden">
                <div>
                    <label for="business_name" class="block text-sm font-medium text-gray-700 mb-1">Business Name</label>
                    <input type="text" name="business_name" id="business_name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                        placeholder="Your business name" value="{{ old('business_name') }}">
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <input type="tel" name="phone" id="phone"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                        placeholder="Business phone number" value="{{ old('phone') }}">
                </div>
            </div>

            <div class="flex items-start">
                <input type="checkbox" name="terms" id="terms" required
                    class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded mt-1">
                <label for="terms" class="ml-2 block text-sm text-gray-700">
                    I agree to the <a href="/terms" class="text-green-600 hover:text-green-500">Terms of Service</a> and <a
                        href="/privacy" class="text-green-600 hover:text-green-500">Privacy Policy</a>
                </label>
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white py-2.5 px-4 rounded-lg font-medium hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition">
                Create Account
            </button>
        </form>

        <div class="text-center">
            <p class="text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="font-medium text-green-600 hover:text-green-500">
                    Sign in
                </a>
            </p>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const roleRadios = document.querySelectorAll('input[name="role"]');
                const sellerFields = document.getElementById('seller_fields');

                function toggleSellerFields() {
                    const selectedRole = document.querySelector('input[name="role"]:checked').value;
                    if (selectedRole === 'seller') {
                        sellerFields.classList.remove('hidden');
                    } else {
                        sellerFields.classList.add('hidden');
                    }
                }

                roleRadios.forEach(radio => {
                    radio.addEventListener('change', toggleSellerFields);
                });

                // Initial check
                toggleSellerFields();
            });
        </script>
    @endpush
@endsection

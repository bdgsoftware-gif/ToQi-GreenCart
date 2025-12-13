<section class="py-12 bg-white">
    <div class="max-w-8xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Shop By Category</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Browse our wide range of categories and find exactly what you're looking for
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @foreach ($categories as $category)
                <a href="{{ url('/category/' . $category->id) }}"
                    class="category-card group block p-6 bg-gray-50 rounded-xl hover:bg-blue-50 border border-gray-200 hover:border-blue-300 transition-all duration-300 transform hover:-translate-y-1">
                    <div
                        class="w-16 h-16 mx-auto mb-4 bg-white rounded-full flex items-center justify-center group-hover:bg-blue-100 transition-colors duration-300">
                        <i class="fas fa-box text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 text-center group-hover:text-blue-700 mb-2">
                        {{ $category->name }}
                    </h3>
                    @if ($category->description)
                        <p class="text-sm text-gray-500 text-center">
                            {{ Str::limit($category->description, 50) }}
                        </p>
                    @endif
                    <div class="text-center mt-4">
                        <span class="text-sm text-blue-600 font-medium group-hover:text-blue-800">
                            {{ $category->products_count ?? 0 }} products
                        </span>
                    </div>
                </a>
            @endforeach
        </div>

        @if ($categories->isEmpty())
            <div class="text-center py-12">
                <i class="fas fa-folder-open text-4xl text-gray-300 mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-700 mb-2">No Categories Available</h3>
                <p class="text-gray-500">Check back later for new categories</p>
            </div>
        @endif
    </div>
</section>

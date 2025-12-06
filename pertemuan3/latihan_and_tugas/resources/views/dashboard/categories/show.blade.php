<x-dashboard-layout>
    <x-slot:title>
        {{ $category->name }} - Dashboard
    </x-slot:title>

    <article class="max-w-4xl mx-auto">

        <section class="prose prose-lg max-w-none text-gray-700">
            <h2 class="text-2xl font-semibold mb-4">Category Details</h2>
            <p><strong>Name:</strong> {{ $category->name }}</p>
            <p><strong>Created At:</strong> {{ $category->created_at->format('d M Y') }}</p>
            <p><strong>Updated At:</strong> {{ $category->updated_at->format('d M Y') }}</p>
        </section>

        <footer class="mt-8 pt-8 border-t border-gray-200">
            <div class="flex justify-between items-center">

                <a href="{{ route('categories.index') }}"
                    class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                    ← Back to Dashboard
                </a>

            </div>
        </footer>

    </article>
</x-dashboard-layout>

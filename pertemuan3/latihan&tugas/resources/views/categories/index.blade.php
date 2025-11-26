<x-layout>
    <x-slot:title>
        Category
    </x-slot:title>

    <h1 class="text-4xl font-bold mb-10 text-white">
        Category
    </h1>

    <div class="space-y-6">

        @foreach ($categories as $category)
            <article
                class="bg-white/5 border border-white/10 rounded-lg p-6 hover:bg-white/10 transition">

                <h2 class="text-2xl font-semibold">
                    <a
                        href="/categories/{{ $category->slug }}"
                        class="text-[#007bff] hover:underline">
                        {{ $category->name }}
                    </a>
                </h2>

            </article>
        @endforeach

    </div>

</x-layout>

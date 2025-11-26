<x-layout>
    <x-slot:title>
        Posts
    </x-slot:title>

    <h1 class="text-4xl font-bold mb-10 text-white">
        Posts
    </h1>

    <div class="space-y-6">

        @foreach ($posts as $post)
            <article
                class="bg-white/5 border border-white/10 rounded-lg p-6 hover:bg-white/10 transition">

                <h2 class="text-2xl font-semibold mb-2">
                    <a
                        href="/posts/{{ $post->slug }}"
                        class="text-[#007bff] hover:underline">
                        {{ $post->title }}
                    </a>
                </h2>

                <p class="text-gray-300">
                    {{ $post->excerpt }}
                </p>

            </article>
        @endforeach

    </div>
</x-layout>

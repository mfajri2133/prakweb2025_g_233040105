@props(['categories', 'post' => null])

<form action="{{ $post ? route('dashboard.update', $post->id) : route('dashboard.store') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @if ($post)
        @method('PUT')
    @endif

    <div class="grid gap-4 grid-cols-2">
        <div class="col-span-2">
            <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Title</label>

            <input type="text" name="title" id="title" value="{{ old('title', $post->title ?? '') }}"
                class="bg-neutral-secondary-medium border
                    @error('title') border-red-500 @else border-default-medium @enderror
                    text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                placeholder="Enter title" required>

            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-span-2">
            <label for="category_id" class="block mb-2.5 text-sm font-medium text-heading">Category</label>

            <select name="category_id" id="category_id"
                class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border
                    @error('category_id') border-red-500 @else border-default-medium @enderror
                    text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs"
                required>
                <option value="" disabled>Select category</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id ?? '') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-span-2">
            <label for="excerpt" class="block mb-2.5 text-sm font-medium text-heading">Excerpt</label>

            <textarea name="excerpt" id="excerpt" rows="3"
                class="block bg-neutral-secondary-medium border
                    @error('excerpt') border-red-500 @else border-default-medium @enderror
                    text-body rounded-base focus:ring-brand focus:border-brand w-full p-3.5 shadow-xs placeholder:text-body"
                required>{{ old('excerpt', $post->excerpt ?? '') }}</textarea>

            @error('excerpt')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-span-2">
            <label for="body" class="block mb-2.5 text-sm font-medium text-heading">Body</label>

            <textarea name="body" id="body" rows="8"
                class="block bg-neutral-secondary-medium border
                    @error('body') border-red-500 @else border-default-medium @enderror
                    text-heading rounded-base focus:ring-brand focus:border-brand w-full p-3.5 shadow-xs placeholder:text-body"
                required>{{ old('body', $post->body ?? '') }}</textarea>

            @error('body')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-span-2">
            <label for="image" class="block mb-2.5 text-sm font-medium text-heading">Upload Image</label>

            <input type="file" name="image" id="image" accept="image/png,image/jpeg,image/jpg"
                class="cursor-pointer bg-neutral-secondary-medium border
                    @error('image') border-red-500 @else border-default-medium @enderror
                    text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs">

            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror

            @if ($post && $post->image)
                <img src="{{ asset('storage/' . $post->image) }}"
                    class="mt-3 w-40 h-28 object-cover rounded-base border border-default">
            @endif
        </div>

    </div>

    <div class="flex items-center space-x-4 border-t border-default mt-4 pt-4 md:mt-5">

        <button type="submit"
            class="inline-flex items-center text-white bg-brand hover:bg-brand-strong focus:ring-2 focus:ring-brand-strong focus:outline-none font-medium rounded-base text-sm px-4 py-2.5 shadow-xs transition">
            {{ $post ? 'Update Post' : 'Save Post' }}
        </button>

        <a href="{{ route('dashboard.index') }}"
            class="text-body bg-neutral-secondary-medium hover:bg-neutral-tertiary-medium hover:text-heading border border-default-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2 transition focus:outline-none">
            Cancel
        </a>

    </div>

</form>

@props(['category' => null])

<form action="{{ $category ? route('categories.update', $category->id) : route('categories.store') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @if ($category)
        @method('PUT')
    @endif

    <div class="grid gap-4 grid-cols-2">
        <div class="col-span-2">
            <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}"
                class="bg-neutral-secondary-medium border
                    @error('name') border-red-500 @else border-default-medium @enderror
                    text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                placeholder="Enter name" required>

            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="flex items-center space-x-4 border-t border-default mt-4 pt-4 md:mt-5">

        <button type="submit"
            class="inline-flex items-center text-white bg-brand hover:bg-brand-strong focus:ring-2 focus:ring-brand-strong focus:outline-none font-medium rounded-base text-sm px-4 py-2.5 shadow-xs transition">
            {{ $category ? 'Update Category' : 'Save Category' }}
        </button>

        <a href="{{ route('categories.index') }}"
            class="text-body bg-neutral-secondary-medium hover:bg-neutral-tertiary-medium hover:text-heading border border-default-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2 transition focus:outline-none">
            Cancel
        </a>

    </div>

</form>

<div
    class="px-6 py-4 border-b border-gray-200 flex justify-between items-center gap-4 bg-gradient-to-r from-blue-50 to-indigo-50">

    <form method="GET" action="{{ route('categories.index') }}" class="flex-1 max-w-md">
        <label for="search" class="sr-only">Search</label>

        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-body/40" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                </svg>
            </div>

            <input type="search" name="search" id="search" value="{{ request('search') }}"
                class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                placeholder="Search categories..." />

            <button type="submit"
                class="absolute end-1.5 bottom-1.5 text-white bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-strong focus:ring-offset-2 rounded-base font-medium shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5">
                Search
            </button>
        </div>
    </form>

    <a href="{{ route('categories.create') }}"
        class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-colors duration-200 whitespace-nowrap">

        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>

        Add Category
    </a>
</div>


<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-b-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium w-[100px]">
                    No
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 font-medium w-[220px] text-center">
                    Actions
                </th>
            </tr>
        </thead>

        <tbody>
            @forelse ($categories as $category)
                <tr class="bg-neutral-primary border-b border-default">
                    <td class="px-6 py-4">
                        {{ $categories->firstItem() + $loop->index }}
                    </td>

                    <td class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        {{ $category->name }}
                    </td>

                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('categories.show', $category->id) }}"
                            class="inline-flex items-center px-3 py-1.5 bg-brand text-white rounded-sm hover:bg-brand-strong text-sm shadow-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>

                        </a>

                        <a href="{{ route('categories.edit', $category->id) }}"
                            class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white rounded-sm hover:bg-blue-700 text-sm shadow-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                        </a>

                        <button onclick="openDeleteModal('{{ $category->id }}', '{{ $category->name }}')"
                            class="inline-flex items-center px-3 py-1.5 bg-red-600 text-white rounded-sm hover:bg-red-700 text-sm shadow-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        No categories yet.
                        <a href="{{ route('categories.create') }}" class="text-blue-600 hover:underline">
                            Create one?
                        </a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if ($categories->hasPages())
    <div class="px-6 py-4 border-t border-gray-200">
        <nav aria-label="Page navigation">
            <ul class="flex space-x-2 text-sm">

                @if ($categories->onFirstPage())
                    <li>
                        <span
                            class="flex items-center justify-center text-gray-400 bg-gray-100 box-border border border-gray-300 cursor-not-allowed font-medium rounded-base text-sm px-3 h-10">
                            Previous
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $categories->previousPageUrl() }}"
                            class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-base text-sm px-3 h-10 focus:outline-none">
                            Previous
                        </a>
                    </li>
                @endif

                @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                    @if ($page == $categories->currentPage())
                        <li>
                            <a href="{{ $url }}" aria-current="page"
                                class="flex items-center justify-center text-fg-brand bg-neutral-tertiary-medium box-border border border-default-medium hover:text-fg-brand font-medium text-sm w-10 h-10 focus:outline-none">
                                {{ $page }}
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}"
                                class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-10 h-10 focus:outline-none">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach

                @if ($categories->hasMorePages())
                    <li>
                        <a href="{{ $categories->nextPageUrl() }}"
                            class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-base text-sm px-3 h-10 focus:outline-none">
                            Next
                        </a>
                    </li>
                @else
                    <li>
                        <span
                            class="flex items-center justify-center text-gray-400 bg-gray-100 box-border border border-gray-300 cursor-not-allowed font-medium rounded-base text-sm px-3 h-10">
                            Next
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif

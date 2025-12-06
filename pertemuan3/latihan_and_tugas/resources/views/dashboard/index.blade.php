<x-dashboard-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <h1 class="text-3xl font-bold mb-6">Welcome, {{ auth()->user()->name }}</h1>

    @if (session('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft border border-success-subtle"
            role="alert">
            <svg class="w-4 h-4 me-2 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 12.5 8 10.5 6 12.5m4-2 2 2m-2-2v5m10 0a9.97 9.97 0 1 1-20 0 9.97 9.97 0 0 1 20 0Z" />
            </svg>

            <p class="flex-1">
                <span class="font-medium me-1">Success!</span>
                {{ session('success') }}
            </p>

            <button type="button" onclick="this.parentElement.remove()"
                class="ms-auto -mx-1.5 -my-1.5 bg-success-soft text-fg-success-strong rounded-base focus:ring-2 focus:ring-success-strong p-1.5 hover:bg-success-subtle inline-flex items-center justify-center h-8 w-8">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1l12 12m0-12L1 13" />
                </svg>
            </button>
        </div>
    @endif

    @include('components.posts.table')

    <div id="deleteModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">

        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">
                Confirm Deletion
            </h2>

            <p class="text-gray-600 mb-6">
                Apakah anda yakin ingin menghapus postingan <span id="postTitle"></span>?
            </p>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 text-gray-800">
                        Cancel
                    </button>

                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-dashboard-layout>
<script>
    function openDeleteModal(postId, postTitle) {
        document.getElementById('postTitle').textContent = postTitle;
        const form = document.getElementById('deleteForm');
        form.action = '/dashboard/' + postId;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

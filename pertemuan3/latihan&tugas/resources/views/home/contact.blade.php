<x-layout>
    <x-slot:title>
        Contact
    </x-slot:title>

    <div class="flex gap-10">

        <div class="w-1/2">
            <h1 class="text-3xl font-bold mb-6 text-white">
                Contact
            </h1>

            <p class="text-gray-400 mb-10 max-w-xl">
                Jika kamu punya pertanyaan, saran, atau ingin bekerja sama, silakan kirim pesan melalui form di bawah ini. Kami akan membalas secepatnya.
            </p>
        </div>

        <div class="w-1/2 bg-white/5 border border-white/10 rounded-xl p-6">

            <form action="#" method="POST" class="space-y-5">

                <div>
                    <label class="block mb-1 text-gray-300">Nama</label>
                    <input
                        type="text"
                        name="name"
                        class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/20
                               text-white placeholder-gray-400 focus:ring-2 focus:ring-[#007bff] focus:outline-none"
                        placeholder="Nama lengkap"
                        required>
                </div>

                <div>
                    <label class="block mb-1 text-gray-300">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/20
                               text-white placeholder-gray-400 focus:ring-2 focus:ring-[#007bff] focus:outline-none"
                        placeholder="Alamat email"
                        required>
                </div>

                <div>
                    <label class="block mb-1 text-gray-300">Pesan</label>
                    <textarea
                        name="message"
                        rows="4"
                        class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/20
                               text-white placeholder-gray-400 focus:ring-2 focus:ring-[#007bff] focus:outline-none"
                        placeholder="Tulis pesanmu..."
                        required></textarea>
                </div>

                <button
                    type="submit"
                    class="w-full py-2.5 rounded-lg bg-[#007bff] text-white font-medium hover:bg-[#006ee6] transition">
                    Kirim Pesan
                </button>

            </form>
        </div>

    </div>

</x-layout>

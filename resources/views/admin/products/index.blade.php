<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between w-full">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Products') }}
            </h2>
            <a href="{{ route('admin.products.create') }}"
                class="px-5 py-3 font-bold text-white bg-indigo-700 rounded-full">Add
                product</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg gap-y-5">

                @forelse ($products as $product)
                    <div class="flex flex-row items-center justify-between item-card">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($product->photo) }}" alt="" class="w-[50px] h-[50px]">
                            <div>
                                <h3 class="text-xl font-bold text-indigo-950">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-base text-slate-500">
                                    Rp {{ $product->price }}
                                </p>
                            </div>
                        </div>
                        <p class="text-base text-slate-500">
                            {{ $product->category->name }}
                        </p>
                        <div class="flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="px-5 py-3 font-bold text-white bg-indigo-700 rounded-full">Edit</a>
                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                                @csrf
                                @method('DELETE')
                                <button class="px-5 py-3 font-bold text-white bg-red-700 rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>
                        Belum ada produk yang ditambahkan.
                    </p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between w-full">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Manage Categories') }}
            </h2>
            <a href="{{ route('admin.categories.create') }}"
                class="px-5 py-3 font-bold text-white bg-indigo-700 rounded-full">Add
                Category</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg gap-y-5">

                @forelse ($categories as $category)
                    <div class="flex flex-row items-center justify-between item-card">
                        <img src="{{ Storage::url($category->icon) }}" alt="" class="w-[50px] h-[50px]">
                        <h3 class="text-xl font-bold text-indigo-950">
                            {{ $category->name }}
                        </h3>
                        <div class="flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.categories.edit', $category) }}"
                                class="px-5 py-3 font-bold text-white bg-indigo-700 rounded-full">Edit</a>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
                                @csrf
                                @method('DELETE')
                                <button class="px-5 py-3 font-bold text-white bg-red-700 rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>

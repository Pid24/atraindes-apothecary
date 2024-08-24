<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between w-full">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ Auth::user()->hasRole('owner') ? __('Apothecary Orders') : __('My Transactions') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg gap-y-5">

                @forelse ($product_transactions as $transaction)
                    <div class="flex flex-row items-center justify-between item-card">
                        <a href="{{ route('product_transactions.show', $transaction) }}">
                            <div class="flex flex-row items-center gap-x-3">
                                <div>
                                    <p class="text-base text-slate-500">
                                        Total Transaksi
                                    </p>
                                    <h3 class="text-xl font-bold text-indigo-950">
                                        Rp {{ $transaction->total_amount }}
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <div class="flex-col hidden md:flex">
                            <p class="text-base text-slate-500">
                                Date
                            </p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $transaction->created_at }}
                            </h3>
                        </div>
                        @if ($transaction->is_paid)
                            <span class="px-3 py-1 bg-green-500 rounded-full">
                                <p class="text-sm font-bold text-white">
                                    Success
                                </p>
                            </span>
                        @else
                            <span class="px-3 py-1 bg-orange-500 rounded-full">
                                <p class="text-sm font-bold text-white">
                                    Pending
                                </p>
                            </span>
                        @endif
                        <div class="flex-row items-center hidden md:flex gap-x-3">
                            <a href="{{ route('product_transactions.show', $transaction) }}"
                                class="px-5 py-3 font-bold text-white bg-indigo-700 rounded-full">View
                                Details</a>
                        </div>
                    </div>

                    <hr class="my-3">
                @empty
                    <p>
                        Belum tersedia transaksi.
                    </p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>

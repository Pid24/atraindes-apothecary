<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between w-full">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col p-10 overflow-hidden bg-white shadow-sm sm:rounded-lg gap-y-5">

                <div class="flex flex-row items-center justify-between item-card">
                    <div class="flex flex-row items-center gap-x-3">
                        <div>
                            <p class="text-base text-slate-500">
                                Total Transaksi
                            </p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                Rp {{ $productTransaction->total_amount }}
                            </h3>
                        </div>
                    </div>
                    <div>
                        <p class="text-base text-slate-500">
                            Date
                        </p>
                        <h3 class="text-xl font-bold text-indigo-950">
                            {{ $productTransaction->created_at }}
                        </h3>
                    </div>
                    @if ($productTransaction->is_paid)
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
                </div>
                <hr class="my-3">

                <h3 class="text-xl font-bold text-indigo-950">
                    List of Items
                </h3>

                <div class="grid grid-cols-4 gap-x-10">
                    <div class="flex flex-col col-span-2 gap-y-5">

                        @forelse ($productTransaction->transactionDetails as $detail)
                            <div class="flex flex-row items-center justify-between item-card">
                                <div class="flex flex-row items-center gap-x-3">
                                    <img src="{{ Storage::url($detail->product->photo) }}" alt=""
                                        class="w-[50px] h-[50px]">
                                    <div>
                                        <h3 class="text-xl font-bold text-indigo-950">
                                            {{ $detail->product->name }}
                                        </h3>
                                        <p class="text-base text-slate-500">
                                            Rp {{ $detail->product->price }}
                                        </p>
                                    </div>
                                </div>
                                <p class="text-base text-slate-500">
                                    {{ $detail->product->category->name }}
                                </p>
                            </div>
                        @empty
                        @endforelse

                        <h3 class="text-xl font-bold text-indigo-950">
                            Details of Delivery
                        </h3>
                        <div class="flex flex-row items-center justify-between item-card">
                            <p class="text-base text-slate-500">
                                Address
                            </p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $productTransaction->address }}
                            </h3>
                        </div>
                        <div class="flex flex-row items-center justify-between item-card">
                            <p class="text-base text-slate-500">
                                City
                            </p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $productTransaction->city }}
                            </h3>
                        </div>
                        <div class="flex flex-row items-center justify-between item-card">
                            <p class="text-base text-slate-500">
                                Post Code
                            </p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $productTransaction->post_code }}
                            </h3>
                        </div>
                        <div class="flex flex-row items-center justify-between item-card">
                            <p class="text-base text-slate-500">
                                Phone Number
                            </p>
                            <h3 class="text-xl font-bold text-indigo-950">
                                {{ $productTransaction->phone_number }}
                            </h3>
                        </div>
                        <div class="flex flex-col items-start item-card">
                            <p class="text-base text-slate-500">
                                Notes
                            </p>
                            <h3 class="text-lg font-bold text-indigo-950">
                                {{ $productTransaction->notes }}
                            </h3>
                        </div>
                    </div>
                    <div class="flex flex-col items-end col-span-2 gap-y-5">
                        <h3 class="text-xl font-bold text-indigo-950">
                            Proof of Payment
                        </h3>
                        <img src="{{ Storage::url($productTransaction->proof) }}"
                            alt="{{ Storage::url($productTransaction->proof) }}" class="w-[300px] h-[400px]">
                    </div>
                </div>
                <hr class="my-3">

                @role('owner')
                    @if ($productTransaction->is_paid)
                        <a href="#" class="px-5 py-3 font-bold text-white bg-indigo-700 rounded-full w-fit">
                            WhatsApp Customer
                        </a>
                    @else
                        <form method="POST" action="{{ route('product_transactions.update', $productTransaction) }}">
                            @csrf
                            @method('PUT')
                            <button class="px-5 py-3 font-bold text-white bg-indigo-700 rounded-full">
                                Approve Order
                            </button>
                        </form>
                    @endif
                @endrole

                @role('buyer')
                    <a href="#" class="px-5 py-3 font-bold text-white bg-indigo-700 rounded-full w-fit">
                        Contact Admin
                    </a>
                @endrole

            </div>
        </div>
    </div>
    </div>
</x-app-layout>

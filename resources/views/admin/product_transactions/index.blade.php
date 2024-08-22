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
                                Rp 190.000
                            </h3>
                        </div>
                    </div>
                    <div>
                        <p class="text-base text-slate-500">
                            Date
                        </p>
                        <h3 class="text-xl font-bold text-indigo-950">
                            24 Juni 2024
                        </h3>
                    </div>
                    <span class="px-3 py-1 bg-orange-500 rounded-full">
                        <p class="text-sm font-bold text-white">
                            Pending
                        </p>
                    </span>
                </div>
                <hr class="my-3">

                <h3 class="text-xl font-bold text-indigo-950">
                    List of Items
                </h3>

                <div class="grid grid-cols-4 gap-x-10">
                    <div class="flex flex-col col-span-2 gap-y-5">
                        <div class="flex flex-row items-center justify-between item-card">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="#" alt="" class="w-[50px] h-[50px]">
                                <div>
                                    <h3 class="text-xl font-bold text-indigo-950">
                                        Panadol
                                    </h3>
                                    <p class="text-base text-slate-500">
                                        Rp 900.000
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500">
                                Vitamin
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-between item-card">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="#" alt="" class="w-[50px] h-[50px]">
                                <div>
                                    <h3 class="text-xl font-bold text-indigo-950">
                                        Panadol
                                    </h3>
                                    <p class="text-base text-slate-500">
                                        Rp 900.000
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500">
                                Vitamin
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-between item-card">
                            <div class="flex flex-row items-center gap-x-3">
                                <img src="#" alt="" class="w-[50px] h-[50px]">
                                <div>
                                    <h3 class="text-xl font-bold text-indigo-950">
                                        Panadol
                                    </h3>
                                    <p class="text-base text-slate-500">
                                        Rp 900.000
                                    </p>
                                </div>
                            </div>
                            <p class="text-base text-slate-500">
                                Vitamin
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col col-span-2 gap-y-5">
                        <img src="" alt="" class="w-[300px] bg-red-300 h-[400px]">
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>

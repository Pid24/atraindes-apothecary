<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atraindes Apothecary</title>
    <link rel="shortcut icon" href="{{ asset('assets/svgs/logo-mark.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Topbar -->
    <section class="relative flex items-center justify-between gap-5 wrapper">
        <a href="{{ route('front.index') }}" class="p-2 bg-white rounded-full">
            <img src="{{ asset('assets/svgs/ic-arrow-left.svg') }}" class="size-5" alt="Arrow Left">
        </a>
        <p class="absolute text-base font-semibold translate-x-1/2 -translate-y-1/2 top-1/2 right-1/2">
            {{ $category->name }} Products
        </p>
        <button type="button" class="p-2 bg-white rounded-full">
            <img src="{{ asset('assets/svgs/ic-triple-dots.svg') }}" class="size-5" alt="More Options">
        </button>
    </section>

    <!-- Search Results -->
    <section class="wrapper flex flex-col gap-2.5">
        <p class="text-base font-bold">
            Results
        </p>
        <div class="flex flex-col gap-4">

            @forelse ($products as $product)
                <div class="py-3.5 pl-4 pr-5 bg-white rounded-2xl flex gap-1 items-center relative">
                    <img src="{{ Storage::url($product->photo) }}"
                        class="w-full max-w-[70px] max-h-[70px] object-contain" alt="{{ $product->name }}">
                    <div class="flex flex-wrap items-center justify-between w-full gap-1">
                        <div class="flex flex-col gap-1">
                            <a href="{{ route('front.product.details', $product->slug) }}"
                                class="text-base font-semibold stretched-link whitespace-nowrap w-[150px] truncate">
                                {{ $product->name }}
                            </a>
                            <p class="text-sm text-grey">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="flex">
                            @for ($i = 0; $i < 5; $i++)
                                <img src="{{ asset('assets/svgs/star.svg') }}" class="w-[18px]" alt="Star">
                            @endfor
                        </div>
                    </div>
                </div>
            @empty
                <p>
                    Product tidak tersedia
                </p>
            @endforelse

        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>

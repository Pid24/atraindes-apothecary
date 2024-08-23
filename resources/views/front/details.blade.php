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
            <img src="{{ asset('assets/svgs/ic-arrow-left.svg') }}" class="size-5" alt="">
        </a>
        <p class="absolute text-base font-semibold translate-x-1/2 -translate-y-1/2 top-1/2 right-1/2">
            Details
        </p>
        <button type="button" class="p-2 bg-white rounded-full">
            <img src="{{ asset('assets/svgs/ic-triple-dots.svg') }}" class="size-5" alt="">
        </button>
    </section>

    <img src="{{ Storage::url($product->photo) }}" class="h-[220px] w-auto mx-auto relative z-10" alt="">
    <section class="bg-white rounded-t-[60px] pt-[60px] px-6 pb-5 -mt-9 flex flex-col gap-5 max-w-[425px] mx-auto">
        <div>
            <div class="flex items-center justify-between">
                <div class="flex flex-col gap-1">
                    <p class="font-bold text-[22px]">
                        {{ $product->name }}
                    </p>
                    <div class="flex items-center gap-1.5">
                        <img src="{{ Storage::url($product->category->icon) }}" class="size-[30px]" alt="">
                        <p class="font-semibold text-balance">
                            {{ $product->category->name }}
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-1">
                    <img src="{{ asset('assets/svgs/star.svg') }}" class="size-6" alt="">
                    <p class="font-semibold text-balance">
                        4.5/5
                    </p>
                </div>
            </div>
            <p class="mt-3.5 text-base leading-7">
                {{ $product->about }}
            </p>
        </div>

        <div id="featureSlider" class="-mx-6">
            <!-- Popular -->
            <div
                class="w-[98px] border border-[#f1f1fa] rounded-2xl p-3.5 flex flex-col gap-2.5 items-center justify-center mr-4">
                <img src="{{ asset('assets/svgs/ic-cup-filled.svg') }}" class="size-10" alt="">
                <p class="text-sm font-semibold">
                    Popular
                </p>
            </div>
            <!-- Grade A -->
            <div
                class="w-[98px] border border-[#f1f1fa] rounded-2xl p-3.5 flex flex-col gap-2.5 items-center justify-center mr-4">
                <img src="{{ asset('assets/svgs/ic-thumb-shape-filled.svg') }}" class="size-10" alt="">
                <p class="text-sm font-semibold">
                    Grade A
                </p>
            </div>
            <!-- Healthy -->
            <div
                class="w-[98px] border border-[#f1f1fa] rounded-2xl p-3.5 flex flex-col gap-2.5 items-center justify-center mr-4">
                <img src="{{ asset('assets/svgs/ic-clipboard-tick-filled.svg') }}" class="size-10" alt="">
                <p class="text-sm font-semibold">
                    Healthy
                </p>
            </div>
            <!-- Official -->
            <div
                class="w-[98px] border border-[#f1f1fa] rounded-2xl p-3.5 flex flex-col gap-2.5 items-center justify-center mr-4">
                <img src="{{ asset('assets/svgs/ic-shiled-tick-filled.svg') }}" class="size-10" alt="">
                <p class="text-sm font-semibold">
                    Official
                </p>
            </div>
        </div>

        <!-- user Reviews -->
        <div class="flex flex-col gap-2">
            <p class="text-base leading-7">
                My kid was happier whenever he is playing
                without artificial toys, full energy yeah!
            </p>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-1.5">
                    <img src="{{ asset('assets/images/photo.png') }}" class="size-9" alt="">
                    <p class="text-base font-semibold">
                        Safira
                    </p>
                </div>
                <div class="flex">
                    <img src="{{ asset('assets/svgs/star.svg') }}" class="size-[18px]" alt="">
                    <img src="{{ asset('assets/svgs/star.svg') }}" class="size-[18px]" alt="">
                    <img src="{{ asset('assets/svgs/star.svg') }}" class="size-[18px]" alt="">
                    <img src="{{ asset('assets/svgs/star.svg') }}" class="size-[18px]" alt="">
                    <img src="{{ asset('assets/svgs/star.svg') }}" class="size-[18px]" alt="">
                </div>
            </div>
        </div>

        <!-- Price and Add to cart -->
        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-0.5">
                <p class="text-lg min-[350px]:text-2xl font-bold">
                    Rp {{ $product->price }}
                </p>
                <p class="text-sm text-grey">
                    /quantity
                </p>
            </div>
            <form action="{{ route('carts.store', $product->id) }}" method="POST">
                @csrf
                <button type="submit"
                    class="inline-flex w-max text-white font-bold text-base bg-primary rounded-full px-[30px] py-3 justify-center items-center whitespace-nowrap">
                    Add to Cart
                </button>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script src="{{ asset('scripts/sliderConfig.js') }}" type="module"></script>
</body>

</html>

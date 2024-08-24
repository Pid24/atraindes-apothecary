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
    <section class="flex items-center justify-between gap-5 wrapper">
        <div class="flex items-center gap-3">
            <div class="bg-white rounded-full p-[5px] flex justify-center items-center">
                <img src="{{ asset('assets/svgs/avatar.svg') }}" class="size-[50px] rounded-full" alt="">
            </div>
            <div class="">
                <p class="text-base font-semibold capitalize text-primary">
                    @auth
                        {{ Auth::user()->name }}
                    @endauth
                    @guest
                        Anonim
                    @endguest
                </p>
                <p class="text-sm">
                    Customer
                </p>
            </div>
        </div>
        <div class="flex items-center gap-[10px]">
            <button type="button" class="p-2 bg-white rounded-full">
                <span class="relative">
                    <!-- notification -->
                    <img src="{{ asset('assets/svgs/ic-notification.svg') }}" class="size-5" alt="">
                    <!-- notification dot -->
                    <span class="block rounded-full size-1.5 bg-primary absolute top-0 right-0 -translate-x-1/2"></span>
                </span>
            </button>
            <button type="button" class="p-2 bg-white rounded-full">
                <img src="{{ asset('assets/svgs/ic-shopping-bag.svg') }}" class="size-5" alt="">
            </button>
        </div>
    </section>

    <!-- Floating navigation -->
    <nav class="fixed z-50 bottom-[30px] bg-black rounded-[50px] pt-[18px] px-10 left-1/2 -translate-x-1/2 w-80">
        <div class="flex items-center justify-center gap-5 flex-nowrap">
            <a href="#" class="flex flex-col items-center justify-center gap-1 px-1 group is-active">
                <img src="{{ asset('assets/svgs/ic-grid.svg') }}"
                    class="filter-to-grey group-[.is-active]:filter-to-primary" alt="">
                <p
                    class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                    Home
                </p>
            </a>
            <a href="#" class="flex flex-col items-center justify-center gap-1 px-1 group">
                <img src="{{ asset('assets/svgs/ic-location.svg') }}"
                    class="filter-to-grey group-[.is-active]:filter-to-primary" alt="">
                <p
                    class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                    Stores
                </p>
            </a>
            <a href="#" class="flex flex-col items-center justify-center gap-1 px-1 group">
                <img src="{{ asset('assets/svgs/ic-note.svg') }}"
                    class="filter-to-grey group-[.is-active]:filter-to-primary" alt="">
                <p
                    class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                    Orders
                </p>
            </a>
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center gap-1 px-1 group">
                <img src="{{ asset('assets/svgs/ic-profile.svg') }}"
                    class="filter-to-grey group-[.is-active]:filter-to-primary" alt="">
                <p
                    class="border-b-4 border-transparent group-[.is-active]:border-primary pb-3 text-xs text-center font-semibold text-grey group-[.is-active]:text-primary">
                    Profile
                </p>
            </a>
        </div>
    </nav>

    <!-- Header -->
    <section class="wrapper flex flex-col gap-2.5 items-center justify-center">
        <p class="text-4xl font-extrabold text-center">
            We Provide <br>
            Best Medicines
        </p>
        <form action="" method="POST" id="searchForm" class="w-full">
            <input style="background-image: url('{{ asset('assets/svgs/ic-search.svg') }}')" type="text"
                name="search" id="searchProduct"
                class="block w-full py-3.5 pl-4 pr-10 rounded-[50px] font-semibold placeholder:text-grey placeholder:font-normal text-black text-base bg-no-repeat bg-[calc(100%-16px)] focus:ring-2 focus:ring-primary focus:outline-none focus:border-none transition-all"
                placeholder="Search by product name">
        </form>
    </section>

    <!-- Your last order -->
    <section class="wrapper">
        <div style="background-image: url('{{ asset('assets/svgs/pipeline.svg') }}')"
            class="flex justify-between gap-5 items-center bg-lilac py-3.5 px-4 rounded-2xl relative bg-left bg-no-repeat bg-cover">
            <p class="text-base font-bold">
                Your last order has <br>
                been proceed
            </p>
            <img src="{{ asset('assets/svgs/nekodicine.svg') }}" class="w-[90px] h-[70px]" alt="">
        </div>
    </section>

    <!-- Categories -->
    <section class="wrapper !px-0 flex flex-col gap-2.5">
        <p class="px-4 text-base font-bold">
            Categories
        </p>
        <div id="categoriesSlider" class="relative">
            @forelse ($categories as $category)
                <div class="inline-flex gap-2.5 items-center py-3 px-3.5 relative bg-white rounded-xl mr-4">
                    <img src="{{ Storage::url($category->icon) }}" class="size-10" alt="">
                    <a href="#" class="text-base font-semibold truncate stretched-link">
                        {{ $category->name }}
                    </a>
                </div>
            @empty
            @endforelse

        </div>
    </section>

    <!-- Latest Products -->
    <section class="wrapper !px-0 flex flex-col gap-2.5">
        <p class="px-4 text-base font-bold">
            Latest Products
        </p>
        <div id="proudctsSlider" class="relative">
            <!-- Panadomal -->
            @forelse ($products as $product)
                <div
                    class="rounded-2xl bg-white py-3.5 pl-4 pr-[22px] inline-flex flex-col gap-4 items-start mr-4 relative w-[158px]">
                    <img src="{{ Storage::url($product->photo) }}" class="h-[100px] w-full object-contain"
                        alt="">
                    <div>
                        <a href="{{ route('front.product.details', $product->slug) }}"
                            class="text-base font-semibold w-[120px] truncate stretched-link block">
                            {{ $product->name }}
                        </a>
                        <p class="text-sm truncate text-grey">
                            Rp {{ $product->price }}
                        </p>
                    </div>
                </div>
            @empty
                <p>
                    Tak tersedia.
                </p>
            @endforelse
        </div>
    </section>

    <!-- Explore -->
    <section class="wrapper">
        <div style="background-image: url('{{ asset('assets/svgs/doctor-help.svg') }}')"
            class="bg-lilac py-3.5 px-5 rounded-2xl relative bg-right-bottom bg-no-repeat bg-auto">
            <img src="{{ asset('assets/svgs/cloud.svg') }}" class="-ml-1.5 mb-1.5" alt="">
            <div class="flex flex-col gap-4 mb-[23px]">
                <p class="text-base font-bold">
                    Explore great doctors <br>
                    for your better life
                </p>
                <a href="#"
                    class="rounded-full bg-white text-primary flex w-max gap-2.5 px-6 py-2 justify-center items-center text-base font-bold">
                    Explore
                </a>
            </div>
        </div>
    </section>

    <!-- Most Purchased -->
    <section class="wrapper flex flex-col gap-2.5 pb-40">
        <p class="text-base font-bold">
            Most Purchased
        </p>
        <div class="flex flex-col gap-4">
            <!-- Softovac Rami -->
            <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
                <img src="{{ asset('assets/images/product-2.webp') }}"
                    class="w-full max-w-[70px] max-h-[70px] object-contain" alt="">
                <div class="flex flex-wrap items-center justify-between w-full gap-1">
                    <div class="flex flex-col gap-1">
                        <a href="details.html"
                            class="text-base font-semibold stretched-link whitespace-nowrap w-[150px] truncate">
                            Softovac Rami
                        </a>
                        <p class="text-sm text-grey">
                            Rp 290.000
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
            <!-- Enoki Pro -->
            <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
                <img src="{{ asset('assets/images/product-1.webp') }}"
                    class="w-full max-w-[70px] max-h-[70px] object-contain" alt="">
                <div class="flex flex-wrap items-center justify-between w-full gap-1">
                    <div class="flex flex-col gap-1">
                        <a href="details.html"
                            class="text-base font-semibold stretched-link whitespace-nowrap w-[150px] truncate">
                            Enoki Softovac
                        </a>
                        <p class="text-sm text-grey">
                            Rp 34.500.000
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
            <!-- Veetax Bora -->
            <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
                <img src="{{ asset('assets/images/product-4.webp') }}"
                    class="w-full max-w-[70px] max-h-[70px] object-contain" alt="">
                <div class="flex flex-wrap items-center justify-between w-full gap-1">
                    <div class="flex flex-col gap-1">
                        <a href="details.html"
                            class="text-base font-semibold stretched-link whitespace-nowrap w-[150px] truncate">
                            Veetax Bora
                        </a>
                        <p class="text-sm text-grey">
                            Rp 899.000
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
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script src="scripts/sliderConfig.js" type="module"></script>
    <script src="scripts/searchProductListener.js" type="module"></script>
</body>

</html>

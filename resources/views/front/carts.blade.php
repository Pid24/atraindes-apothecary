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
    <section class="relative flex items-center justify-between w-full gap-5 wrapper">
        <a href="{{ route('front.index') }}" class="p-2 bg-white rounded-full">
            <img src="{{ asset('assets/svgs/ic-arrow-left.svg') }}" class="size-5" alt="">
        </a>
        <p class="absolute text-base font-semibold translate-x-1/2 -translate-y-1/2 top-1/2 right-1/2">
            Shopping Carts
        </p>
    </section>

    <!-- Items -->
    <section class="wrapper flex flex-col gap-2.5">
        <div class="flex items-center justify-between">
            <p class="text-base font-bold">
                Items
            </p>
            <button type="button" class="p-2 bg-white rounded-full" data-expand="itemsList">
                <img src="{{ asset('assets/svgs/ic-chevron.svg') }}"
                    class="transition-all duration-300 -rotate-180 size-5" alt="">
            </button>
        </div>
        <div class="flex flex-col gap-4" id="itemsList">
            <!-- Softovac Rami -->
            @forelse ($my_carts as $cart)
                <div class="py-3.5 pl-4 pr-[22px] bg-white rounded-2xl flex gap-1 items-center relative">
                    <img src="{{ Storage::url($cart->product->photo) }}"
                        class="w-full max-w-[70px] max-h-[70px] object-contain" alt="">
                    <div class="flex flex-wrap items-center justify-between w-full gap-1">
                        <div class="flex flex-col gap-1">
                            <h3 class="text-base font-semibold whitespace-nowrap w-[150px] truncate">
                                {{ $cart->product->name }}
                            </h3>
                            <p class="text-sm text-grey product-price" data-price="{{ $cart->product->price }}">
                                RP {{ $cart->product->price }}
                            </p>
                        </div>
                        <form action="{{ route('carts.destroy', $cart) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <img src="{{ asset('assets/svgs/ic-trash-can-filled.svg') }}" class="size-[30px]"
                                    alt="">
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p>
                    Belum ada transaksi tersedia.
                </p>
            @endforelse

        </div>
    </section>

    <!-- Details Payment -->
    <section class="wrapper flex flex-col gap-2.5">
        <div class="flex items-center justify-between">
            <p class="text-base font-bold">
                Details Payment
            </p>
            <button type="button" class="p-2 bg-white rounded-full" data-expand="__detailsPayment">
                <img src="{{ asset('assets/svgs/ic-chevron.svg') }}" class="transition-all duration-300 size-5"
                    alt="">
            </button>
        </div>
        <div class="p-6 bg-white rounded-3xl" id="__detailsPayment" style="display: none;">
            <ul class="flex flex-col gap-5">
                <li class="flex items-center justify-between">
                    <p class="text-base font-semibold first:font-normal">
                        Sub Total
                    </p>
                    <p class="text-base font-semibold first:font-normal" id="checkout-sub-total">

                    </p>
                </li>
                <li class="flex items-center justify-between">
                    <p class="text-base font-semibold first:font-normal">
                        PPN 11%
                    </p>
                    <p class="text-base font-semibold first:font-normal" id="checkout-ppn">

                    </p>
                </li>
                <li class="flex items-center justify-between">
                    <p class="text-base font-semibold first:font-normal">
                        Insurance 23%
                    </p>
                    <p class="text-base font-semibold first:font-normal" id="checkout-insurance">

                    </p>
                </li>
                <li class="flex items-center justify-between">
                    <p class="text-base font-semibold first:font-normal">
                        Delivery (Promo)
                    </p>
                    <p class="text-base font-semibold first:font-normal" id="checkout-delivery-fee">

                    </p>
                </li>
                <li class="flex items-center justify-between">
                    <p class="text-base font-bold first:font-normal">
                        Grand Total
                    </p>
                    <p class="text-base font-bold first:font-normal text-primary" id="checkout-grand-total">

                    </p>
                </li>
            </ul>
        </div>
    </section>

    <!-- Payment Method -->
    <section class="wrapper flex flex-col gap-2.5">
        <div class="flex items-center justify-between">
            <p class="text-base font-bold">
                Payment Method
            </p>
        </div>
        <div class="grid items-center grid-cols-2 gap-4">
            <label
                class="relative rounded-2xl bg-white flex gap-2.5 px-3.5 py-3 items-center justify-start has-[:checked]:ring-2 has-[:checked]:ring-primary transition-all">
                <input type="radio" name="payment_method" id="manualMethod" class="absolute opacity-0">
                <img src="{{ asset('assets/svgs/ic-receipt-text-filled.svg') }}" alt="">
                <p class="text-base font-semibold">
                    Manual
                </p>
            </label>
            <label
                class="relative rounded-2xl bg-white flex gap-2.5 px-3.5 py-3 items-center justify-start has-[:checked]:ring-2 has-[:checked]:ring-primary transition-all">
                <input type="radio" name="payment_method" id="creditMethod" class="absolute opacity-0">
                <img src="{{ asset('assets/svgs/ic-card-filled.svg') }}" alt="">
                <p class="text-base font-semibold">
                    Credits
                </p>
            </label>
        </div>
        <div class="p-4 mt-0.5 bg-white rounded-3xl hidden" id="manualPaymentDetail">
            <div class="flex flex-col gap-5">
                <p class="text-base font-bold">
                    Send Payment to
                </p>
                <div class="inline-flex items-center gap-2.5">
                    <img src="{{ asset('assets/svgs/ic-bank.svg') }}" class="size-5" alt="">
                    <p class="text-base font-semibold">
                        Bank BNI
                    </p>
                </div>
                <div class="inline-flex items-center gap-2.5">
                    <img src="{{ asset('assets/svgs/ic-security-card.svg') }}" class="size-5" alt="">
                    <p class="text-base font-semibold">
                        889595858498
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Delivery to -->
    <section class="wrapper flex flex-col gap-2.5 pb-40">
        <div class="flex items-center justify-between">
            <p class="text-base font-bold">
                Delivery to
            </p>
            <button type="button" class="p-2 bg-white rounded-full" data-expand="deliveryForm">
                <img src="{{ asset('assets/svgs/ic-chevron.svg') }}"
                    class="transition-all duration-300 -rotate-180 size-5" alt="">
            </button>
        </div>
        <form action="{{ route('product_transactions.store') }}" method="POST" class="p-6 bg-white rounded-3xl"
            id="deliveryForm" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-5">
                <!-- Address -->
                <div class="flex flex-col gap-2.5">
                    <label for="address" class="text-base font-semibold">Address</label>
                    <input style="background-image: url('{{ asset('assets/svgs/ic-location.svg') }}')" type="text"
                        name="address" id="address__" class="form-input" value="Tedjamudita 3">
                </div>
                <!-- City -->
                <div class="flex flex-col gap-2.5">
                    <label for="city" class="text-base font-semibold">City</label>
                    <input style="background-image: url('{{ asset('assets/svgs/ic-map.svg') }}')" type="text"
                        name="city" id="city__" class="form-input" value="Bolavia">
                </div>
                <!-- Post Code -->
                <div class="flex flex-col gap-2.5">
                    <label for="postcode" class="text-base font-semibold">Post Code</label>
                    <input style="background-image: url('{{ asset('assets/svgs/ic-house.svg') }}')" type="number"
                        name="post_code" id="postcode__" class="form-input" value="22081882">
                </div>
                <!-- Phone Number -->
                <div class="flex flex-col gap-2.5">
                    <label for="phonenumber" class="text-base font-semibold">Phone Number</label>
                    <input style="background-image: url('{{ asset('assets/svgs/ic-phone.svg') }}')" type="number"
                        name="phone_number" id="phonenumber__" class="form-input" value="602192301923">
                </div>
                <!-- Add. Notes -->
                <div class="flex flex-col gap-2.5">
                    <label for="notes" class="text-base font-semibold">Add. Notes</label>
                    <span class="relative">
                        <img src="{{ asset('assets/svgs/ic-edit.svg') }}" class="absolute size-5 top-4 left-4"
                            alt="">
                        <textarea name="notes" id="notes__" class="form-input !rounded-2xl w-full min-h-[150px]">nearby with local shops that close with the big river next to aftermarket place.</textarea>
                    </span>
                </div>
                <!-- Proof of Payment -->
                <div class="flex flex-col gap-2.5">
                    <label for="proof_of_payment" class="text-base font-semibold">Proof of Payment</label>
                    <input style="background-image: url('{{ asset('assets/svgs/ic-folder-add.svg') }}')"
                        type="file" name="proof" id="proof_of_payment__" class="form-input">
                </div>
            </div>
    </section>
    <div
        class="fixed z-50 bottom-[30px] bg-black rounded-3xl p-5 left-1/2 -translate-x-1/2 w-[calc(100dvw-32px)] max-w-[425px]">
        <section class="flex items-center justify-between gap-5">
            <div>
                <p class="text-sm text-grey mb-0.5">
                    Grand Total
                </p>
                <p class="text-lg min-[350px]:text-2xl font-bold text-white" id="checkout-grand-total-price">

                </p>
            </div>
            <button type="submit"
                class="inline-flex items-center justify-center px-5 py-3 text-base font-bold text-white rounded-full w-max bg-primary whitespace-nowrap">
                Confirm
            </button>
        </section>
    </div>

    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('scripts/global.js') }}"></script>
    <script>
        function calculatePrice() {
            let subTotal = 0;
            let deliveryFee = 10000;

            document.querySelectorAll('.product-price').forEach(item => {
                subTotal += parseFloat(item.getAttribute('data-price'));
            });

            document.getElementById('checkout-delivery-fee').textContent = 'Rp ' + deliveryFee.toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            document.getElementById('checkout-sub-total').textContent = 'Rp ' + subTotal.toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            const tax = 11 * subTotal / 100;
            document.getElementById('checkout-ppn').textContent = 'Rp ' + tax.toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            const insurance = 23 * subTotal / 100;
            document.getElementById('checkout-insurance').textContent = 'Rp ' + insurance.toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            const grandTotalPrice = subTotal + tax + insurance + deliveryFee;
            document.getElementById('checkout-grand-total').textContent = 'Rp ' + grandTotalPrice.toLocaleString('id', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            document.getElementById('checkout-grand-total-price').textContent = 'Rp ' + grandTotalPrice.toLocaleString(
                'id', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 2
                });

        }

        document.addEventListener('DOMContentLoaded', function() {
            calculatePrice();
        });
    </script>
</body>

</html>

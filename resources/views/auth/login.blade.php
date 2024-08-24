<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atraindes Apothecary</title>
    <link rel="shortcut icon" href="{{ asset('assets/svgs/logo-mark.svg') }}') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="flex flex-col items-center px-6 py-10 min-h-dvh">
        <img src="{{ asset('assets/svgs/logos.svg') }}" class="mb-[53px]" alt="">
        <form action="{{ route('login') }}" method="POST"
            class="mx-auto max-w-[345px] w-full p-6 bg-white rounded-3xl mt-auto" id="deliveryForm">
            @csrf
            <div class="flex flex-col gap-5">
                <p class="text-[22px] font-bold">
                    Sign In
                </p>
                <!-- Email Address -->
                <div class="flex flex-col gap-2.5">
                    <label for="email" class="text-base font-semibold">Email Address</label>
                    <input style="background-image: url('{{ asset('assets/svgs/ic-email.svg') }}')" type="email"
                        name="email" id="email__" class="form-input" placeholder="Your email address">
                </div>
                <!-- Password -->
                <div class="flex flex-col gap-2.5">
                    <label for="password" class="text-base font-semibold">Password</label>
                    <input style="background-image: url('{{ asset('assets/svgs/ic-lock.svg') }}')" type="password"
                        name="password" id="password__" class="form-input" placeholder="Protect your password">
                </div>
                <button type="submit"
                    class="inline-flex text-white font-bold text-base bg-primary rounded-full whitespace-nowrap px-[30px] py-3 justify-center items-center">
                    Sign In
                </button>
            </div>
        </form>
        <a href="{{ route('register') }}" class="font-semibold text-base mt-[30px] underline">
            Create New Account
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>

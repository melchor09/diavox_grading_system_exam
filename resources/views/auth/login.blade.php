<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                width="100%" height="auto" viewBox="0 0 1200.000000 630.000000"
                preserveAspectRatio="xMidYMid meet">

                <g transform="translate(0.000000,630.000000) scale(0.100000,-0.100000)"
                fill="#000000" stroke="none">
                <path d="M160 3145 l0 -2355 5410 0 c2976 0 5410 2 5410 4 0 3 -190 339 -421
                748 -232 409 -469 826 -526 928 -58 102 -106 186 -107 187 -1 1 -105 -182
                -231 -407 l-230 -409 -254 -1 c-219 0 -252 2 -247 15 3 8 161 294 351 635 190
                341 345 624 345 629 0 4 -151 274 -335 600 -184 325 -335 596 -335 601 0 6 98
                10 258 10 l259 0 203 -370 c112 -203 206 -370 210 -370 3 0 94 159 202 353
                l196 352 265 3 265 2 -77 -137 c-42 -76 -193 -344 -335 -596 l-258 -458 638
                -1159 638 -1160 193 0 193 0 0 2355 0 2355 -5840 0 -5840 0 0 -2355z m6940
                1851 c0 -4 -198 -380 -631 -1201 -88 -165 -268 -508 -401 -762 -134 -254 -246
                -458 -250 -455 -11 11 -1261 2385 -1266 2404 -4 17 46 18 1272 18 702 0 1276
                -2 1276 -4z m930 -614 c439 -144 752 -631 777 -1212 18 -428 -119 -825 -379
                -1096 -188 -196 -400 -294 -638 -296 -115 -1 -189 11 -295 49 -347 124 -624
                493 -716 951 -25 129 -35 368 -20 502 61 534 361 967 762 1099 106 35 147 40
                284 37 113 -3 142 -7 225 -34z m-5865 -70 c96 -46 165 -101 229 -185 183 -241
                276 -587 276 -1032 0 -289 -31 -483 -115 -725 -44 -124 -52 -142 -117 -240
                -97 -145 -212 -242 -336 -280 -61 -19 -94 -20 -648 -20 l-584 0 0 1260 0 1261
                613 -3 612 -3 70 -33z m1275 -1242 l0 -1260 -230 0 -230 0 0 1263 0 1262 230
                -3 230 -3 0 -1259z m1385 450 c48 -91 260 -493 472 -895 212 -401 409 -775
                438 -830 185 -349 235 -445 254 -482 l21 -43 -1276 0 -1276 0 60 113 c111 209
                359 680 499 947 31 58 73 137 93 175 36 66 209 395 427 810 142 270 198 374
                200 372 0 -1 40 -76 88 -167z"/>
                <path d="M7675 3889 c-258 -89 -435 -415 -435 -802 0 -151 19 -264 65 -394
                155 -435 533 -570 810 -289 259 263 321 773 141 1151 -132 277 -362 409 -581
                334z"/>
                <path d="M1332 3094 l3 -799 185 1 c207 1 294 15 397 64 152 71 231 201 269
                444 24 149 15 548 -15 666 -46 179 -124 291 -246 350 -106 52 -162 62 -388 67
                l-207 5 2 -798z"/>
                </g>
            </svg>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

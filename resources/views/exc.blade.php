@guest
    <x-guest-layout>

        <div class="flex justify-center flex-col">
            @if($type == 1)
                <h1 class="mx-auto text-3xl font-medium mt-5">К сожалению время действия этой ссылки истекло</h1>
            @elseif($type == 2)
                <h1 class="mx-auto text-3xl font-medium mt-5">К сожалению количество переходов по этой ссылке превышено</h1>
            @elseif($type == 3)
                <h1 class="mx-auto text-3xl font-medium mt-5">Эта ссылка забаненена администратором</h1>
            @elseif($type == 4)
                <h1 class="mx-auto text-3xl font-medium mt-5">Вы не админинстратор</h1>
            @endif
        </div>
    </x-guest-layout>
@endguest

@auth
    <x-app-layout>
        <div class="flex justify-center flex-col">
            @if($type == 1)
                <h1 class="mx-auto text-3xl font-medium mt-5">К сожалению время действия этой ссылки истекло</h1>
            @elseif($type == 2)
                <h1 class="mx-auto text-3xl font-medium mt-5">К сожалению количество переходов по этой ссылке превышено</h1>
            @elseif($type == 3)
                <h1 class="mx-auto text-3xl font-medium mt-5">Эта ссылка забаненена администратором</h1>
            @elseif($type == 4)
                <h1 class="mx-auto text-3xl font-medium mt-5">Вы не админинстратор</h1>
            @endif
        </div>
    </x-app-layout>
@endauth

@guest
    <x-guest-layout>
        <div class="flex justify-center flex-col">
            <h1 class="mx-auto text-3xl font-medium mt-5">Вот сокращенная ссылка:</h1>
            <a class="mx-auto text-2xl text-blue-900 font-medium mt-5" href="{{ 'http://127.0.0.1:8000/u/' . $url }}">{{ 'http://127.0.0.1:8000/u/' . $url }}</a>
        </div>
    </x-guest-layout>
@endguest

@auth
    <x-app-layout>
        <div class="flex justify-center flex-col">
            <h1 class="mx-auto text-3xl font-medium mt-5">Вот сокращенная ссылка</h1>
            <a class="mx-auto text-2xl text-blue-900 font-medium mt-5" href="{{ 'http://127.0.0.1:8000/u/' . $url }}">{{ 'http://127.0.0.1:8000/u/' . $url }}</a>
        </div>
    </x-app-layout>
@endauth

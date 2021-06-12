@guest
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <x-guest-layout>
        <div class="flex justify-center flex-col">
            <form action="{{ route('create') }}" method="POST" class="flex justify-center flex-col">
                @csrf
                <h1 class="mx-auto text-3xl font-medium mt-5">Хочешь сократить ссылку? Напиши ее в поле ниже:</h1>
                <input required type="text" name="url" placeholder="Ссылку сюда" class="yh-9 w-1/3 mt-3 mx-auto appearance-none border border-transparent bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base hover:border-gra-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-transparent">
                <label class="mx-auto text-gray-500 mt-2">Для получения дополнительного функционала зарегестрируйтесь на сайте</label>
                <p class="mx-auto text-gray-500 mt-4">Ссылки созданные незарегестрированным пользователем будут работать 1 месяц</p>
                <button class="w-48 h-10 appearance-none flex items-center justify-center rounded-md bg-green-500 text-white mt-3 mx-auto mt-3 focus:outline-none" type="submit">Получить ссылку!</button>
            </form>
        </div>
    </x-guest-layout>
@endguest

@auth
    <x-app-layout>
        @if(session('success'))
            <div class="max-w-4xl mx-auto mt-4">
                <div class="rounded-md bg-green-100 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" x-description="Heroicon name: solid/check-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">
                                {{ session('success') }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="flex justify-center flex-col">
            <form action="{{ route('create') }}" method="POST" class="flex justify-center flex-col">
                @csrf
                <h1 class="mx-auto text-3xl font-medium mt-5">Хочешь сократить ссылку? Напиши ее в поле ниже:</h1>
                <input required type="text" name="url" placeholder="Ссылку сюда" class="yh-9 w-1/3 mt-3 mx-auto appearance-none border border-transparent bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base hover:border-gra-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-transparent">
                <input type="datetime-local" name="time" id="time" class="h-9 w-1/3 mt-3 mx-auto appearance-none border border-transparent bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base hover:border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-transparent">
                <input type="number" name="numberClicks" id="time" class="yh-9 w-1/12 mt-3 mx-auto appearance-none border border-transparent bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base hover:border-gra-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-transparent">
                <label class="mx-auto text-gray-500">Вы можете указать время или количество переходов через которое ссылка перестанет работать<br><span style="margin-left: 18rem;">Время московское</span>
                </label>
                <button class="w-48 h-10 appearance-none flex items-center justify-center rounded-md bg-green-500 text-white mt-3 mx-auto mt-3 focus:outline-none" type="submit">Получить ссылку!</button>
            </form>
        </div>
    </x-app-layout>
@endauth

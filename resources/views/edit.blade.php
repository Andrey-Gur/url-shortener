<x-app-layout>
    <x-card style="margin-top: 1rem;">
        <h3 class="text-2xl">Изменение ссылки</h3>
        <form action="{{ route('update', ['id' => $link->id]) }}" method="POST" class="flex justify-center flex-col">
            @csrf
            <input required type="text" id="link" name="url" placeholder="Ссылку сюда" class="yh-9 w-1/3 mt-3  appearance-none border border-gray-300 bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base hover:border-gra-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-transparent" value="{{ $link->originalLink }}">
            <label for="link" class="ml-4 text-gray-500">Ваша ссылка</label>
            <input type="datetime-local" name="time" id="time" class="h-9 w-1/3 mt-3 appearance-none border border-gray-300 bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base hover:border-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-transparent border" value=" {{ $link->timeOfDeath != null ? \Carbon\Carbon::parse($link->timeOfDeath)->format('Y-m-d\TH:i') : ''}}" >
            <label for="time" class="ml-4 text-gray-500">Время когда ссылка перестанет рабоать (По мск)</label>
            <input type="number" name="numberClicks" id="number" class="yh-9 w-1/12 mt-3 appearance-none border border-gray-300 bg-white text-gray-700 placeholder-gray-400 shadow-md rounded-lg text-base hover:border-gra-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:border-transparent border" value="{{ $link->maxClicks }}">
            <label for="number" class="ml-4 text-gray-500">Количество нажатей по ссылке</label>
            <button class="w-48 h-10 appearance-none flex items-center justify-center rounded-md bg-green-500 text-white mt-3 mt-3 focus:outline-none" type="submit">Изменить ссылку</button>
{{--            <p class="ml-4 text-gray-500 my-4">После этих изменений короткая ссылка изменится</p>--}}
        </form>
    </x-card>
</x-app-layout>

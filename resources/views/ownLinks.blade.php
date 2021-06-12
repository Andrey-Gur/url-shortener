<x-app-layout>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col mt-3" >
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 max-w-full">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Оригинальная ссылка
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Сокращенная сслыка
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Время создания
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Время отключения
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Максимальное количество кликов
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Количество кликов
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Кнопочки
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($links as $link)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ $link->originalLink }}">{{ $link->originalLink }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ 'http://127.0.0.1:8000/u/' . $link->shortLink }}">{{ 'http://127.0.0.1:8000/u/' . $link->shortLink }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
{{--                                    {{$link->created_at->format('d-m-Y h:i')}}--}} {{ $link->created_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if( $link->timeOfDeath  )
                                        @if($link->timeOfDeath < now())
                                            @php
                                                $time = new Carbon\Carbon($time = $link->timeOfDeath);
                                                $time = $time->format('d-m-Y h:i')
                                            @endphp
                                            <span class="text-red-600">{{ $time ?? '-' }}</span>
                                        @else
                                            @php
                                                $time = new Carbon\Carbon($time = $link->timeOfDeath);
                                                $time = $time->format('d-m-Y h:i')
                                            @endphp
                                            <span class="text-green-600">{{ $time ?? '-' }}</span>
                                        @endif
                                    @else
                                        {{ '-' }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($link->maxClicks != 0)
                                        @if($link->maxClicks - 1  > $link->numberOfClicks)
                                            <span class="text-green-600">{{ $link->maxClicks }}</span>
                                        @else
                                            <span class="text-red-600">{{ $link->maxClicks }}</span>
                                        @endif
                                    @else
                                        {{ '-' }}
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $link->numberOfClicks }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{ route('edit', ['id' => $link->id]) }}">Изменить</a>
                                    <a href="{{ route('delete', ['id' => $link->id]) }}" onclick="if(confirm('Точно удалить пост')) {return true} else {return false}">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

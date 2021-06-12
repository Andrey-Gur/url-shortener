<x-app-layout>
    <div class="flex justify-between mt-4">
        <x-card style="width: 100%">
            @if($links->currentPage() == 1)
                <header>
                    <h3 class="text-xl">Привет, <span>{{ Auth::user()->name }}</span></h3>
                </header>
            @endif
            <main>
                @if($links->currentPage() == 1)
                    <div class="day ml-2">За день создано: {{ $day }} {{ Lang::choice('{0} ссылок|[1] ссылка|[2,4] ссылки|[5, 1000000] ссылок', $day) }}</div>
                    <div class="of-all-time ml-2">Всего ссылок: {{ count($links) }} {{ Lang::choice('{0} ссылок|[1] ссылка|[2,4] ссылки|[5, 1000000] ссылок',  count($links)) }}</div>
                    <h3 class="text-xl">Все ссылки</h3>
                @endif
                <div class="all-links max-w-full w-full">
                    <table class="min-w-full divide-y divide-gray-200 mt-4 border" style="">
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
                                Макс. кол-во кликов
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Кол-во кликов
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Создатель
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Кнопочки
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($links as $link)
                            <tr class="@if($link->status == 1) bg-red-100 @endif">
                                <td class="px-6 py-4 whitespace-nowrap break-words">
                                    <a href="{{ $link->originalLink }}">{{ $link->originalLink }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ 'http://127.0.0.1:8000/u/' . $link->shortLink }}">{{ 'http://127.0.0.1:8000/u/' . $link->shortLink }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{$link->created_at->format('d-m-Y h:i')}}
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 break-words">
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
                                    {{ $link->User->name ?? '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @if($link->status == 0)
                                        <a href="{{ route('ban', ['id' => $link->id]) }}">Забанить</a>
                                    @elseif($link->status == 1)
                                        <a href="{{ route('unban', ['id' => $link->id]) }}">Разбанить</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="m-4">{{ $links->links() }}</div>
            </main>
        </x-card>
    </div>
</x-app-layout>

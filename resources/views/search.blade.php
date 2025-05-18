<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('search') }}" method="get">
                        <x-text-input id="query" class="block mt-1 w-full" type="text" name="query"
                            value="{{ request('query') }}" placeholder="Search..." />

                        <x-primary-button class="mt-3">Search</x-primary-button>
                    </form>

                    @if (isset($results))
                        <div class="mt-4">
                            @if (count($results) > 0)
                                @foreach ($results as $result)
                                    <div class="mt-3 bg-gray-100 p-2">
                                        <h4 class="text-indigo-700">{{ $result->title }}</h4>
                                        <p class="text-gray-600">{{ $result->body }}</p>
                                    </div>
                                @endforeach

                                <div class="mt-4">
                                    {{ $results->appends(request()->query())->links() }}
                                </div>
                            @else
                                No results found
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

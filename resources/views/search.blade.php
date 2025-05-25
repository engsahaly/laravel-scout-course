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

                        {{-- Replicas in Algolia --}}
                        {{-- <select name="replica" class="block mt-3 w-full">
                            <option value="">--</option>
                            <option value="posts_views_desc" @selected(request('replica') == 'posts_views_desc')>Views (highest first)</option>
                            <option value="posts_views_asc" @selected(request('replica') == 'posts_views_asc')>Views (lowest first)</option>
                        </select> --}}

                        {{-- Facets in Algolia --}}
                        {{-- <select name="facet" class="block mt-3 w-full">
                            <option value="">--</option>
                            <option value="Laravel" @selected(request('facet') == 'Laravel')>Laravel</option>
                            <option value="JavaScript" @selected(request('facet') == 'JavaScript')>JavaScript</option>
                            <option value="DevOps" @selected(request('facet') == 'DevOps')>DevOps</option>
                        </select> --}}

                        <x-primary-button class="mt-3">Search</x-primary-button>
                    </form>

                    @if (isset($results))
                        <div class="mt-4">
                            @if (count($results) > 0)
                                @foreach ($results as $result)
                                    <div class="mt-3 bg-gray-100 p-2">
                                        <h4 class="text-indigo-700">
                                            {{ $result->title }}
                                            <em class="text-red-600">({{ $result->views }}) |
                                                ({{ $result->category?->name }})
                                            </em>
                                        </h4>
                                        <p class="text-gray-600">{{ $result['body'] }}</p>
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

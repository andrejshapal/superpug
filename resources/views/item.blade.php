@extends('layouts.app')
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Configuration for {{ $activity->name }}</h2>
            <form method="POST" action="{{ request()->url() }}">
                @csrf
                @method('PUT')
                @foreach ($items as $item)
                <div class="grid gap-6 mb-6 md:grid-cols-4">
                    <div>
                       {{$item->name}}
                    </div>
                    <div>
                        <input type="number" min="0" id="from_{{ $activity->id }}_{{ $item->id }}" name="fields[{{ $item->id }}][from]"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="From" value="@if(isset($item->item[0])){{$item->item[0]->from}}@endif"/>
                        @error("fields.$item->id.from")
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="number" min="0" id="to_{{ $activity->id }}_{{ $item->id }}" name="fields[{{ $item->id }}][to]"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                               placeholder="To" value="@if(isset($item->item[0])){{$item->item[0]->to}}@endif"/>
                        @error("fields.$item->id.to")
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                    @endforeach
                    <div>
                        <button type="submit"
                                class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Update Items
                        </button>
                </div>
            </form>
        </div>
    </section>
@endsection

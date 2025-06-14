@extends('layouts.app')
@section('content')
    <section class="bg-white dark:bg-gray-900">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ __('start.title') }}</h2>
            <form action="{{route('start')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">{{ __('start.available_title') }}</h3>
                    <p id="helper-text-explanation" class="mt-2 mb-2 text-sm text-gray-500 dark:text-gray-400">
                        {{ __('start.available_description') }}
                    </p>
                    <ul id="available"
                        class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @foreach($activities as $activity)
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="checkbox-list-available-{{$activity->id}}" data-id="{{$activity->id}}"
                                           name="fields[available][]" type="checkbox" value="{{$activity->id}}"
                                           class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="checkbox-list-available-{{$activity->id}}"
                                           class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $activity->name  }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @error("fields.available")
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">{{ __('start.main_title') }}</h3>
                    <p id="helper-text-explanation" class="mt-2 mb-2 text-sm text-gray-500 dark:text-gray-400">
                        {{ __('start.main_description') }}
                    </p>
                    <ul id="main"
                        class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @foreach($activities as $activity)
                            <li data-id="{{$activity->id}}"
                                class="hidden w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="checkbox-list-main-{{$activity->id}}"
                                           name="fields[main][]" type="checkbox" value="{{$activity->id}}"
                                           class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="checkbox-list-main-{{$activity->id}}"
                                           class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $activity->name  }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @error("fields.main")
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">{{ __('start.level_title') }}</h3>
                <p id="helper-text-explanation" class="mt-2 mb-2 text-sm text-gray-500 dark:text-gray-400">
                    {{ __('start.level_description') }}
                </p>
                <select id="level" name="level"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected>{{ __('start.choose_level') }}</option>
                    @foreach($difficulties as $difficulty)
                        <option value="{{ $difficulty->id }}">{{ $difficulty->name }}</option>
                    @endforeach
                </select>
                @error("level")
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
                <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    {{ __('start.submit') }}
                </button>
            </form>
        </div>
    </section>
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            const selected = document.querySelectorAll('#available input:checked');

            selected.forEach(i => {
                const item = document.querySelector(`#main li[data-id="${i.dataset.id}"]`);
                if (item) {
                    const box = item.querySelector('input')
                    box.checked = false;
                    item.classList.remove('hidden');
                }
            });
        });


        document.getElementById('available').addEventListener('change', function (event) {
            if (event.target.type === 'checkbox') {
                const id = event.target.dataset.id;
                const item = document.querySelector(`#main li[data-id="${id}"]`);
                if (item) {
                    if (event.target.checked) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                        const box = item.querySelector('input')
                        box.checked = false;
                    }
                }
            }
        });

        document.getElementById('main').addEventListener('change', function (event) {
            const checkedCount = document.querySelectorAll('#main input:checked').length;
            if (checkedCount > 3) {
                event.target.checked = false;
            }
        });
    </script>
@endsection

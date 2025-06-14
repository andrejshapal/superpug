@extends('layouts.app')
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Leaderboard</h2>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Place
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Current Streak
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Experience
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $index=>$user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$index+1}}
                    </th>
                    <td class="px-6 py-4">
                        {{$user->user->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$user->streak_days}}
                    </td>
                    <td class="px-6 py-4">
                        {{$user->experience}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </section>
@endsection

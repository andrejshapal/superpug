@extends('layouts.app')
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Inventory</h2>
            <div class="grid mb-8 border border-gray-200 rounded-lg shadow-xs dark:border-gray-700 md:mb-12 md:grid-cols-2 bg-white dark:bg-gray-800">
                <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-ss-lg md:border-e dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Gold</h3>
                        <p class="my-4">Can be spent purchasing backpacks or energy bars.</p>
                    </blockquote>
                    <figcaption class="flex items-center justify-center ">
                        <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{$profile->gold}}</h3>
                        </div>
                    </figcaption>
                </figure>
                <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 md:rounded-se-lg dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Energy Bar</h3>
                        <p class="my-4">Recover energy by missing training day without loosing streak!</p>
                    </blockquote>
                    <figcaption class="flex items-center justify-center ">
                        <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{$profile->rest_days}}</h3>
                        </div>
                    </figcaption>
                </figure>
                <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 md:rounded-es-lg md:border-b-0 md:border-e dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Experience</h3>
                        <p class="my-4">Every 100 experience points brings new backpack! Earn experience by completing daily tasks.</p>
                    </blockquote>
                    <figcaption class="flex items-center justify-center ">
                        <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{$profile->experience}}</h3>
                        </div>
                    </figcaption>
                </figure>
                <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-gray-200 rounded-b-lg md:rounded-se-lg dark:bg-gray-800 dark:border-gray-700">
                    <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Backpacks</h3>
                        <p class="my-4">Open backpack where gold, experience or energy bar can be found!</p>
                    </blockquote>
                    <figcaption class="flex items-center justify-center ">
                        <div class="space-y-0.5 font-medium dark:text-white text-left rtl:text-right ms-3">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{$profile->backpacks}}</h3>
                        </div>
                    </figcaption>
                </figure>
            </div>

        </div>
    </section>
@endsection

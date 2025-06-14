@extends('layouts.app')
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <div
                class="w-full max-w-2xl p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">{{$pending[0]->plan->difficulty->name}}</h5>

                </div>
                <div class="flow-root">
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-3 sm:py-4 ">
                            <div class="flex items-center">
                                <div class="shrink-0">
                                    <svg class="w-[29px] h-[29px] text-yellow-500 dark:text-white " aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                         viewBox="0 0 24 24">
                                        <path
                                            d="M8.597 3.2A1 1 0 0 0 7.04 4.289a3.49 3.49 0 0 1 .057 1.795 3.448 3.448 0 0 1-.84 1.575.999.999 0 0 0-.077.094c-.596.817-3.96 5.6-.941 10.762l.03.049a7.73 7.73 0 0 0 2.917 2.602 7.617 7.617 0 0 0 3.772.829 8.06 8.06 0 0 0 3.986-.975 8.185 8.185 0 0 0 3.04-2.864c1.301-2.2 1.184-4.556.588-6.441-.583-1.848-1.68-3.414-2.607-4.102a1 1 0 0 0-1.594.757c-.067 1.431-.363 2.551-.794 3.431-.222-2.407-1.127-4.196-2.224-5.524-1.147-1.39-2.564-2.3-3.323-2.788a8.487 8.487 0 0 1-.432-.287Z"/>
                                    </svg>

                                </div>
                                <div class="flex-1 min-w-0 ms-4 gap-3">
                                    @foreach($pending[0]->challenge as $challenge)
                                        @if($challenge->status === 2)
                                            <button disabled type="button"
                                                    class="relative  text-gray-900  border border-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 ">
                                                {{$challenge->activity->name}}

                                                <span
                                                    class="absolute inline-flex items-center justify-center w-8 h-8 text-xs font-bold text-gray-900 bg-green-600 border-2 border-white rounded-full -top-4 -end-4 dark:border-gray-900">
                                                    <svg
                                                        class="w-4 h-4 text-white dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                  <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 11.917 9.724 16.5 19 7.5"/>
                                                </svg>
</span>
                                            </button>
                                        @elseif($challenge->status === 1)
                                            <button data-modal-target="popup-{{$challenge->activity->id}}"
                                                    data-modal-toggle="popup-{{$challenge->activity->id}}"
                                                    type="button"
                                                    class="relative text-black border border-blue-800 hover:text-white bg-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-3.5 text-center me-3 mb-4 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900 ">
                                                {{$challenge->activity->name}}

                                                <span
                                                    class="absolute inline-flex items-center justify-center w-8 h-8 text-xs font-bold text-white bg-blue-600 border-2 border-white rounded-full -top-4 -end-4 dark:border-gray-900">
                                                <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
</svg>

                                            </span>
                                            </button>
                                            <x-modal id="popup-{{$challenge->activity->id}}" :plan="$pending[0]->plan"
                                                     :challenge="$challenge" :day="$pending[0]->number"/>
                                        @else
                                            <button data-modal-target="popup-{{$challenge->activity->id}}"
                                                    data-modal-toggle="popup-{{$challenge->activity->id}}"
                                                    type="button"
                                                    class="relative text-black border border-purple-800 hover:text-white bg-white hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-3.5 text-center me-3 mb-4 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 ">
                                                {{$challenge->activity->name}}

                                                <span
                                                    class="absolute inline-flex items-center justify-center w-8 h-8 text-xs font-bold text-white bg-red-600 border-2 border-white rounded-full -top-4 -end-4 dark:border-gray-900">+{{$challenge->experience}}</span>
                                            </button>
                                            <x-modal id="popup-{{$challenge->activity->id}}" :plan="$pending[0]->plan"
                                                     :challenge="$challenge" :day="$pending[0]->number"/>
                                        @endif
                                    @endforeach
                                </div>
                                <div
                                    class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    <h6 class="text-sm font-bold leading-none text-gray-900 dark:text-white">
                                        Day {{$pending[0]->number}}</h6>
                                </div>
                            </div>
                        </li>
                        @foreach($completed as $item)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center">
                                    <div class="shrink-0">
                                        <svg class="w-[29px] h-[29px] text-green-600 dark:text-white" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                  d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        @foreach($item->challenge as $challenge)
                                            @if($challenge->status === 2)
                                                <button disabled type="button"
                                                        class="relative  text-gray-900  border border-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 ">
                                                    {{$challenge->activity->name}}

                                                    <span
                                                        class="absolute inline-flex items-center justify-center w-8 h-8 text-xs font-bold text-gray-900 bg-gray-200 border-2 border-white rounded-full -top-4 -end-4 dark:border-gray-900">+{{$challenge->experience}}</span>
                                                </button>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <h6 class="text-sm font-bold leading-none text-gray-900 dark:text-white">
                                            Day {{$item->number}}</h6>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

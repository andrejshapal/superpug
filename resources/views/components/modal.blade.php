
<div id="{{ $id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto text-gray-400 w-16 h-16 dark:text-gray-200" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="655.359" height="655.359" style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd" viewBox="0 0 6.827 6.827"><defs><style>.fil0{fill:#212121;fill-rule:nonzero}</style></defs><g><g ><path class="fil0" d="M2.177 3.467c-.055 0-.1-.048-.1-.107s.045-.107.1-.107H4.65c.055 0 .1.048.1.107s-.045.107-.1.107H2.177z"/><path class="fil0" d="M5.67 3.467a.107.107 0 1 1 0-.214h.194a.107.107 0 1 1 0 .214H5.67z"/><path class="fil0" d="M.958 3.467a.107.107 0 1 1 0-.214h.198a.107.107 0 1 1 0 .214H.958z"/><path class="fil0" d="M1.771 2.24h.186c.076 0 .146.03.197.078.052.05.084.118.084.194v1.696a.267.267 0 0 1-.084.194.285.285 0 0 1-.197.078h-.186a.285.285 0 0 1-.196-.078.267.267 0 0 1-.085-.194V2.512c0-.076.033-.144.085-.194a.285.285 0 0 1 .196-.078zm.186.213h-.186a.072.072 0 0 0-.05.02.055.055 0 0 0-.017.039v1.696c0 .015.007.03.018.04.012.011.03.019.05.019h.185c.02 0 .037-.008.05-.02a.055.055 0 0 0 .018-.039V2.512a.055.055 0 0 0-.018-.04.072.072 0 0 0-.05-.019z"/><path class="fil0" d="M1.458 2.773h-.149a.05.05 0 0 0-.031.01V2.78h-.001v1.158l.001-.001a.05.05 0 0 0 .031.009h.149a.05.05 0 0 0 .031-.01v.002h.001V2.781v.001a.05.05 0 0 0-.032-.009zm-.149-.213h.149c.063 0 .122.022.166.057.05.04.08.098.08.163v1.16c0 .065-.03.122-.08.163a.264.264 0 0 1-.166.057h-.149a.264.264 0 0 1-.165-.057.209.209 0 0 1-.08-.163V2.78c0-.065.03-.122.08-.163a.264.264 0 0 1 .165-.057zm-.032.221V2.78v.001zm0 1.158v.001-.001zm.213 0v.001-.001zm0-1.158V2.78v.001z"/><path class="fil0" d="M5.055 2.453H4.87a.072.072 0 0 0-.05.02.055.055 0 0 0-.017.039v1.696c0 .015.007.03.018.04.012.011.03.019.05.019h.185c.02 0 .038-.008.05-.02a.055.055 0 0 0 .018-.039V2.512a.055.055 0 0 0-.018-.04.072.072 0 0 0-.05-.019zM4.87 2.24h.186c.076 0 .146.03.197.078.052.05.084.118.084.194v1.696a.267.267 0 0 1-.084.194.285.285 0 0 1-.197.078H4.87a.285.285 0 0 1-.196-.078.267.267 0 0 1-.085-.194V2.512c0-.076.033-.144.085-.194a.285.285 0 0 1 .196-.078z"/><path class="fil0" d="M5.369 2.56h.148c.064 0 .122.022.166.057.05.04.08.098.08.163v1.16c0 .065-.03.122-.08.163a.264.264 0 0 1-.166.057H5.37a.264.264 0 0 1-.166-.057.209.209 0 0 1-.08-.163V2.78c0-.065.03-.122.08-.163a.264.264 0 0 1 .166-.057zm.148.213H5.37a.05.05 0 0 0-.031.01l-.001-.002v1.158-.001a.05.05 0 0 0 .032.009h.148a.05.05 0 0 0 .032-.01v.002-1.158.001a.05.05 0 0 0-.032-.009zm.033.007v.001-.001zm0 1.16v-.001.001zm-.214 0V3.94v.001zm0-1.16v.001-.001z"/></g><path style="fill:none" d="M0 0h6.827v6.827H0z"/></g></svg>
                <h3 class="mb-1 text-lg font-normal text-gray-500 dark:text-gray-400">
                    {{$challenge->activity->name}}
                </h3>
                <h4 class="mb-5 text-sm font-normal text-gray-500 dark:text-gray-400">
                    {{$reps}} {{$challenge->activity->unit}}
                </h4>
                @if($challenge->status === 0)
                <a href="{{route('challenge',[$challenge->id,1])}}" data-modal-hide="popup-modal" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Accept Challenge!
                </a>
                @else($challenge->status === 1)
                    <a href="{{route('challenge',[$challenge->id,2])}}" class="text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        I Have Done It!
                    </a>
                @endif

            </div>
        </div>
    </div>
</div>

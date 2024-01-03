<div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
    @for ($i = 0; $i < 12; $i++)
        <div class="flex items-center gap-x-4 shadow-sm p-4">
            <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
            <div class="w-full flex justify-between gap-x-2">
                <div class="text-sm leading-6">
                    <p class="font-semibold text-gray-900">
                        Michael Foster
                    </p>
                    <p class="text-xs text-gray-600">Lorem ipsum dolor sit amet!</p>
                </div>
                <div class="flex items-center">
                    <button type="button" class="rounded-full bg-white px-4 py-2.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-900 hover:text-white hover:ring-gray-900">Follow</button>
                </div>
            </div>
        </div>
    @endfor
</div>

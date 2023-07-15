<div class="grid grid-cols-1 md:grid-cols-3">
    <div class="bg-gray-300">
        filters
    </div>
    <div class="md:col-span-2 bg-gray-200 p-2">
        <h2>results</h2>
        <div>
            @forelse($hosts as $host)
                <div class="bg-gray-400 p-4 mt-2">
                    <h3 class="text-lg font-bold">{{ $host->user->full_name }}</h3>
                    <p>
                        <i class="fa-regular fa-location-dot"></i>
                        <span>{{ $host->city->name }}</span>
                    </p>
                </div>
            @empty
                <div class="bg-gray-200 text-gray-700">No results.</div>
            @endforelse
        </div>
        <div class="p-6">
            {{ $hosts->links() }}
        </div>
    </div>
</div>

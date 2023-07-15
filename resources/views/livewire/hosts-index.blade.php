<div class="grid grid-cols-1 md:grid-cols-3">
    <div class="bg-gray-300">
        filters
    </div>
    <div class="md:col-span-2 bg-gray-200 p-2">
        <h2>results</h2>
        <div>
            @forelse($members as $member)
                <div class="bg-gray-400 p-4 mt-2">
                    {{ $member->full_name }}
                </div>
            @empty
                <div class="bg-gray-200 text-gray-700">No results.</div>
            @endforelse
        </div>
        <div class="p-6">
            {{ $members->links() }}
        </div>
    </div>
</div>

<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @forelse($members as $member)
            <div class="bg-gray-200 p-4">
                <h3>{{ $member->full_name }}</h3>
                <span>{{ $member->dob ? $member->dob->age : '' }}</span>
            </div>
        @empty
            <div class="bg-gray-200 text-gray-700">No results.</div>
        @endforelse
    </div>
    <div class="p-6">
        {{ $members->links() }}
    </div>
</div>

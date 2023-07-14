<div>
    <!-- Filters -->
    <div class="bg-blue-100 px-2 py-4 flex justify-between">
        <div>
            <label class="text-base font-semibold text-gray-900">Gender</label>
            <fieldset>
                <div>
                    <div>
                        <input wire:model.lazy="sex" value="m" id="male" type="radio">
                        <label for="male">Male</label>
                    </div>
                    <div>
                        <input wire:model.lazy="sex" value="f" id="female" type="radio">
                        <label for="female">Female</label>
                    </div>
                    <div>
                        <input wire:model.lazy="sex" value="" id="both" type="radio">
                        <label for="both">Both</label>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

    <!-- Results -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @forelse($members as $member)
            <div class="bg-gray-200 p-4">
                <h3>{{ $member->full_name }}</h3>
                <p>{{ $member->sex }}</p>
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

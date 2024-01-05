<div class="sm:mx-auto sm:w-full sm:max-w-xl shadow-2xl p-5">
    <div class="bg-test-1 min-h-[350]">
    @if ($step === 1)
        @include('livewire.profile.traveler.step1')
    @elseif ($step === 2)
        @include('livewire.profile.traveler.step2')
    @elseif ($step === 3)
        @include('livewire.profile.traveler.step3')
    @endif
    </div>

    <div class="flex justify-between">
        @if ($step > 1)
            <button wire:click="previousStep" class="btn btn-muted">Previous</button>
        @else
            <div>
                <!-- Empty div for justify-between to work properly. -->
            </div>
        @endif
        @if ($step === 3)
            <a class="btn btn-primary" href="{{ route('travelers.show', $traveler->user->username ) }}">Preview Profile</a>
        @else
            <button wire:click="step{{ $step }}" class="btn btn-primary">Next</button>
        @endif
    </div>
</div>

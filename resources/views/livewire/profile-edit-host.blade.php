<div class="sm:mx-auto sm:w-full sm:max-w-xl shadow-2xl p-5">
    <div class="bg-test-1 min-h-[350]">
    @if ($step === 1)
        @include('livewire.host-profile.step1')
    @elseif ($step === 2)
        @include('livewire.host-profile.step2')
    @elseif ($step === 3)
        @include('livewire.host-profile.step3')
    @elseif ($step === 4)
        @include('livewire.host-profile.step4')
    @elseif ($step === 5)
        @include('livewire.host-profile.step5')
    @elseif ($step === 6)
        @include('livewire.host-profile.step6')
    @elseif ($step === 7)
        @include('livewire.host-profile.step7')
    @elseif ($step === 8)
        @include('livewire.host-profile.step8')
    @endif
    </div>

    <div class="flex justify-between">
        @if ($step > 1)
            <button wire:click="previousStep" class="btn btn-primary-outline">Previous</button>
        @else
            <div>
                <!-- Empty div for justify-between to work properly. -->
            </div>
        @endif
        @if ($step === 8)
            <a class="btn btn-primary" href="{{ route('hosts.show', $host->user->username ) }}">Preview Profile</a>
        @else
            <button wire:click="step{{ $step }}" class="btn btn-primary">Next</button>
        @endif
    </div>
</div>
<div class="form sm:mx-auto sm:w-full sm:max-w-xl">
    <div class="bg-test-1 min-h-[350]">
    @if ($step === 1)
        @include('livewire.profile.host.step1')
    @elseif ($step === 2)
        @include('livewire.profile.host.step2')
    @elseif ($step === 3)
        @include('livewire.profile.host.step3')
    @elseif ($step === 4)
        @include('livewire.profile.host.step4')
    @elseif ($step === 5)
        @include('livewire.profile.host.step5')
    @elseif ($step === 6)
        @include('livewire.profile.host.step6')
    @elseif ($step === 7)
        @include('livewire.profile.host.step7')
    @elseif ($step === 8)
        @include('livewire.profile.host.step8')
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
        @if ($step === 8)
            <a class="btn btn-primary" href="{{ route('hosts.show', $host->user->username ) }}">Preview Profile</a>
        @else
            <button wire:click="step{{ $step }}" class="btn btn-primary">Next</button>
        @endif
    </div>
</div>
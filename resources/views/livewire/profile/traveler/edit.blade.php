<div class="mx-auto w-full md:w-[600px] px-4 py-4 sm:px-6 lg:px-8 bg-gray-100">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form
        wire:submit.prevent="submitForm()"
        class="flex flex-col gap-y-8"
    >

        @if ($currentStep === 1)
            <h1>Step 1</h1>
            <div>
                <label class="block">Foo</label>
                <textarea rows="6" class="block w-full" wire:model="foo"></textarea>
                @error('foo') <p class="input-error-msg">{{ $message }}</p> @enderror
            </div>

        @elseif ($currentStep === 2)
            <h1>Step 2</h1>
            <div>
                <label class="block">Goo</label>
                <textarea rows="6" class="block w-full" wire:model="goo"></textarea>
                @error('goo') <p class="input-error-msg">{{ $message }}</p> @enderror
            </div>

        @elseif ($currentStep === 3)
            <h1>Step 3</h1>
            <div>
                <label class="block">Zoo</label>
                <textarea rows="6" class="block w-full" wire:model="zoo"></textarea>
                @error('zoo') <p class="input-error-msg">{{ $message }}</p> @enderror
            </div>
        @endif

        <div>
            @if ($currentStep === 3)
                <button class="btn btn-primary" type="submit">Save</button>
            @else
                <button class="btn btn-primary-outline" type="submit">Next</button>
            @endif
        </div>
    </form>
</div>

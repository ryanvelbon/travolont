<div>
    <label class="block">Website</label>
    <input wire:model.lazy="host.website" type="text">
    @error('host.website') <p class="input-error-msg">{{ $message }}</p> @enderror
</div>

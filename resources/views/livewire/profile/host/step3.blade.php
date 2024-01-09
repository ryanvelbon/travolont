<div>
    <h2>Are you a registered business?</h2>
    <input wire:model="isRegisteredBiz" type="checkbox">
    @error('isRegisteredBiz')
        <p class="input-error-msg">{{ $message }}</p>
    @endError
</div>
<div class="mt-8 p-2">
    <h3 class="text-lg font-bold text-gray-800 text-center">Business Details</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-2">
        <div class="sm:col-span-2">
            <label class="form-label">Name</label>
            <input wire:model="bizName" type="text" class="w-full">
            @error('bizName')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
        <div>
            <label class="form-label">Type</label>
            <select wire:model="bizType" class="w-full">
                <option value="">-- select --</option>
                @foreach(App\Models\Host::BIZ_TYPE_SELECT as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
            @error('bizType')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
        <div>
            <label class="form-label">Registration Number</label>
            <input wire:model="bizRegNo" type="text" class="w-full">
            @error('bizRegNo')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
        <div class="sm:col-span-2">
            <label class="form-label">Address</label>
            <input wire:model="bizAddress" type="text" class="w-full">
            @error('bizAddress')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
        <div>
            <label class="form-label">Email</label>
            <input wire:model="bizEmail" type="email" class="w-full">
            @error('bizEmail')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
        <div>
            <label class="form-label">Phone</label>
            <input wire:model="bizPhone" type="text" class="w-full">
            @error('bizPhone')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
        <div>
            <label class="form-label">Website</label>
            <input wire:model="bizWebsite" type="text" class="w-full">
            @error('bizWebsite')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
    </div>
</div>

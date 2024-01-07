<div class="flex items-center gap-x-4">
    <label class="text-2xl">Are you a registered business?</label>
    <input wire:model="host.is_registered_biz" type="checkbox">
    @error('host.is_registered_biz')
        <p class="input-error-msg">{{ $message }}</p>
    @endError
</div>
<div class="mt-8 p-2">
    <h3 class="text-lg font-bold text-gray-800 text-center">Business Details</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-2">
        <div class="sm:col-span-2">
            <label class="block">Name</label>
            <input wire:model="host.biz_name" type="text" class="w-full">
            @error('host.biz_name')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
        <div>
            <label class="block">Type</label>
            <select wire:model="host.biz_type" class="w-full">
                <option value="">-- select --</option>
                @foreach(App\Models\Host::BIZ_TYPE_SELECT as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
            @error('host.biz_type')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
        <div>
            <label class="block">Registration Number</label>
            <input wire:model="host.biz_reg_no" type="text" class="w-full">
            @error('host.biz_reg_no')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
        <div class="sm:col-span-2">
            <label class="block">Address</label>
            <input wire:model="host.biz_address" type="text" class="w-full">
            @error('host.biz_address')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
        <div>
            <label class="block">Email</label>
            <input wire:model="host.biz_email" type="email" class="w-full">
            @error('host.biz_email')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
        <div>
            <label class="block">Phone</label>
            <input wire:model="host.biz_phone" type="text" class="w-full">
            @error('host.biz_phone')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
        <div>
            <label class="block">Website</label>
            <input wire:model="host.biz_website" type="text" class="w-full">
            @error('host.biz_website')
                <p class="input-error-msg">{{ $message }}</p>
            @endError
        </div>
    </div>
</div>

<h2>What commitment do you expect from your guests?</h2>
<div class="flex flex-col gap-y-8">
    <div>
        <div class="flex items-center justify-between gap-x-4">
            <label class="text-gray-800 text-base sm:text-lg">
                How many days per week?
            </label>
            <select wire:model.live="host.n_days_per_week">
                @for($i=1; $i<=7; $i++)
                    <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'day' : 'days' }}</option>
                @endfor
            </select>
        </div>
        @error('host.n_days_per_week')
            <div class="input-error-msg">{{ $message }}</div>
        @endError
    </div>

    <div>
        <div class="flex items-center justify-between gap-x-4">
            <label class="text-gray-800 text-base sm:text-lg">
                Maximum hours expected to work in a day?
            </label>
            <select wire:model.live="host.max_hours_per_day">
                @for($i=1; $i<=12; $i++)
                    <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'hour' : 'hours' }}</option>
                @endfor
            </select>
        </div>
        @error('host.max_hours_per_day')
            <div class="input-error-msg">{{ $message }}</div>
        @endError
    </div>

    <div>
        <div class="flex items-center justify-between gap-x-4">
            <label class="text-gray-800 text-base sm:text-lg">
                What is the minimum duration of stay?
            </label>
            <select wire:model.live="host.min_stay_days">
                @for($i=1; $i<=6; $i++)
                    <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'day' : 'days' }}</option>
                @endfor
                @for($i=1; $i<=4; $i++)
                    <option value="{{ $i * 7 }}">{{ $i }} {{ $i == 1 ? 'week' : 'weeks' }}</option>
                @endfor
                @for($i=1; $i<=6; $i++)
                    <option value="{{ $i * 30 }}">{{ $i }} {{ $i == 1 ? 'month' : 'months' }}</option>
                @endfor
            </select>
        </div>
        @error('host.min_stay_days')
            <div class="input-error-msg">{{ $message }}</div>
        @endError
    </div>

    <div>
        <div class="flex items-center justify-between gap-x-4">
            <label class="text-gray-800 text-base sm:text-lg">
                What is the maximum duration of stay?
            </label>
            <select wire:model.live="host.max_stay_days">
                @for($i=1; $i<=6; $i++)
                    <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'day' : 'days' }}</option>
                @endfor
                @for($i=1; $i<=4; $i++)
                    <option value="{{ $i * 7 }}">{{ $i }} {{ $i == 1 ? 'week' : 'weeks' }}</option>
                @endfor
                @for($i=1; $i<=6; $i++)
                    <option value="{{ $i * 30 }}">{{ $i }} {{ $i == 1 ? 'month' : 'months' }}</option>
                @endfor
            </select>
        </div>
        @error('host.max_stay_days')
            <div class="input-error-msg">{{ $message }}</div>
        @endError
    </div>
</div>
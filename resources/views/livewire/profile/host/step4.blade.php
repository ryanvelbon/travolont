<h2>What commitment do you expect from your guests?</h2>
<div class="flex flex-col gap-y-8">
    <div>
        <div class="flex items-center justify-between gap-x-4">
            <label class="text-gray-800 text-base sm:text-lg">
                How many days per week?
            </label>
            <select wire:model.live="nDaysPerWeek">
                @for($i=1; $i<=7; $i++)
                    <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'day' : 'days' }}</option>
                @endfor
            </select>
        </div>
        @error('nDaysPerWeek')
            <div class="input-error-msg">{{ $message }}</div>
        @endError
    </div>

    <div>
        <div class="flex items-center justify-between gap-x-4">
            <label class="text-gray-800 text-base sm:text-lg">
                Maximum hours expected to work in a day?
            </label>
            <select wire:model.live="maxHoursPerDay">
                @for($i=1; $i<=12; $i++)
                    <option value="{{ $i }}">{{ $i }} {{ $i == 1 ? 'hour' : 'hours' }}</option>
                @endfor
            </select>
        </div>
        @error('maxHoursPerDay')
            <div class="input-error-msg">{{ $message }}</div>
        @endError
    </div>

    <div>
        <div class="flex items-center justify-between gap-x-4">
            <label class="text-gray-800 text-base sm:text-lg">
                What is the minimum duration of stay?
            </label>
            <select wire:model.live="minStayDays">
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
        @error('minStayDays')
            <div class="input-error-msg">{{ $message }}</div>
        @endError
    </div>

    <div>
        <div class="flex items-center justify-between gap-x-4">
            <label class="text-gray-800 text-base sm:text-lg">
                What is the maximum duration of stay?
            </label>
            <select wire:model.live="maxStayDays">
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
        @error('maxStayDays')
            <div class="input-error-msg">{{ $message }}</div>
        @endError
    </div>
</div>
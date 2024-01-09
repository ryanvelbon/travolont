<h2>How will volunteers be compensated for their work?</h2>
<div class="space-y-8">
    <div>
        <p>Accommodation</p>
        <div class="flex gap-4">
            @foreach(App\Models\Host::ACCOMMODATION_SELECT as $key => $label)
                <label>
                    <input wire:model="accommodation" type="radio" value="{{ $key }}" />
                    <span>{{ $label }}</span>
                </label>
            @endforeach
        </div>
        @error('accommodation')
            <p class="input-error-msg">{{ $message }}</p>
        @endError
    </div>
    <div>
        <div class="flex justify-between">
           <p>How many free meals per day?</p> 
           <input wire:model="nMealsPerDay" type="number" min=0 max=5 />
        </div>
        @error('nMealsPerDay')
            <p class="input-error-msg">{{ $message }}</p>
        @endError
    </div>
    <div>
        <p>What is the hourly pay?</p>
        <p>State the rate in {{ $country['currency_name'] }}</p>
        <div>
            <label class="form-label" for="price">Price</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="text-gray-500 sm:text-sm">{{ $country['currency_symbol'] }}</span>
                </div>
                <input wire:model="wage" type="text" id="price" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-12 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="0.00" aria-describedby="price-currency" />
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                    <span class="text-gray-500 sm:text-sm" id="price-currency">{{ $country['currency'] }}</span>
                </div>
            </div>
        </div>
        @error('wage')
            <p class="input-error-msg">{{ $message }}</p>
        @endError
    </div>
</div>
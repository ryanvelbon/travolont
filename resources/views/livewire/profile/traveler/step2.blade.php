<h2>Which city are you based in?</h2>
<p>Select the nearest city to your location</p>
@error('traveler.current_city_id')
    <p class="input-error-msg">{{ $message }}</p>
@endError
<div class="mt-6 flex justify-center">
    @livewire('city-combobox', ['search' => optional($traveler->currentCity)->name ?? ''])
</div>
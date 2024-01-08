<h2>Which city are you based in?</h2>
<p>Select the nearest city to your location</p>
<div class="mt-6 flex justify-center">
    @livewire('city-combobox', ['search' => optional($host->city)->name ?? ''])
</div>
@error('host.city_id')
    <p class="input-error-msg">{{ $message }}</p>
@endError
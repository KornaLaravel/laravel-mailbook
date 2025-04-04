@props(['mailable', 'current', 'display', 'currentLocale'])

@if($mailable->hasVariants())
    <div class="px-3 py-[3px] text-sm flex gap-1 items-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="w-4 h-4 text-green-500 shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M7.875 14.25l1.214 1.942a2.25 2.25 0 001.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 011.872 1.002l.164.246a2.25 2.25 0 001.872 1.002h2.092a2.25 2.25 0 001.872-1.002l.164-.246A2.25 2.25 0 0116.954 9h4.636M2.41 9a2.25 2.25 0 00-.16.832V12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 01.382-.632l3.285-3.832a2.25 2.25 0 011.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0021.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 002.25 2.25z"/>
        </svg>
        {{ $mailable->getLabel() }}
    </div>
    @foreach($mailable->getVariants() as $variant)
        <x-mailbook::item
            :url="route('mailbook.dashboard', ['selected' => $mailable->class(), 'variant' => $variant->slug, 'display' => $display, 'locale' => $currentLocale])"
            :selected="$mailable->is($current) && $variant->slug === $current->currentVariant()?->slug"
            :label="$variant->label"
            :indent="true"
        />
    @endforeach
@else
    <x-mailbook::item
        :url=" route('mailbook.dashboard', ['selected' => $mailable->class(), 'display' => $display, 'locale' => $currentLocale]) "
        :selected="$mailable->is($current)"
        :label="$mailable->getLabel()"
    />
@endif

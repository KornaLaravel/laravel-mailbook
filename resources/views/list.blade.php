@php
    /**
     * @bladestan-signature
     * @var Illuminate\Support\Collection<int, Xammie\Mailbook\Data\MailableGroup|Xammie\Mailbook\Data\MailableItem> $items
     * @var Xammie\Mailbook\Data\MailableItem $current
     * @var array|string|null $display
     * @var mixed $currentLocale
     */
@endphp
@php use Xammie\Mailbook\Data\MailableGroup; @endphp
<div id="mailbook-sidebar" class="hidden md:flex flex-col w-[300px] max-w-full overflow-x-hidden overflow-y-auto">
    <div class="flex-col gap-[2px] pb-4">
        @foreach($items as $item)
            @if($item instanceof MailableGroup)
                <div class="mt-4 first:mt-0" data-mailbook-group="{{ $item->label }}">
                    <button type="button" data-group-toggle
                            class="w-full px-3 py-[3px] text-sm text-gray-200 hover:text-white font-bold uppercase tracking-wide flex gap-1 items-center justify-between cursor-pointer transition-colors duration-100">
                        {{ $item->label }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                             stroke="currentColor" class="w-3 h-3 shrink-0 transition-transform duration-100"
                             data-group-chevron>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </button>

                    <div data-group-items>
                        @foreach($item->items as $subItem)
                            <x-mailbook::items
                                :mailable="$subItem"
                                :current="$current"
                                :display="$display"
                                :currentLocale="$currentLocale"
                            />
                        @endforeach
                        <div class="mb-4"></div>
                    </div>
                </div>
            @else
                <x-mailbook::items
                    :mailable="$item"
                    :current="$current"
                    :display="$display"
                    :currentLocale="$currentLocale"
                />
            @endif
        @endforeach
    </div>
</div>

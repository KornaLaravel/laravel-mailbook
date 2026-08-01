@php
    /**
     * @bladestan-signature
     *
     * @var Illuminate\Support\Collection<int, Xammie\Mailbook\Data\MailableGroup|Xammie\Mailbook\Data\MailableItem> $items
     * @var Xammie\Mailbook\Data\MailableItem $current
     * @var mixed $currentLocale
     */
@endphp
@php use Xammie\Mailbook\Data\MailableGroup; @endphp
<div id="mailbook-sidebar" class="hidden w-[300px] max-w-full flex-col overflow-x-hidden overflow-y-auto md:flex">
    <div class="flex-col gap-[2px] pb-4">
        @foreach ($items as $item)
            @if ($item instanceof MailableGroup)
                <div class="mt-4 first:mt-0" data-mailbook-group="{{ $item->label }}">
                    <button
                        type="button"
                        data-group-toggle
                        class="flex w-full cursor-pointer items-center justify-between gap-1 px-3 py-[3px] text-sm font-bold tracking-wide text-gray-200 uppercase transition-colors duration-100 hover:text-white"
                    >
                        {{ $item->label }}
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="h-3 w-3 shrink-0 transition-transform duration-100"
                            data-group-chevron
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    <div data-group-items>
                        @foreach ($item->items as $subItem)
                            <x-mailbook::items
                                :mailable="$subItem"
                                :current="$current"
                                :currentLocale="$currentLocale"
                            />
                        @endforeach
                        <div class="mb-4"></div>
                    </div>
                </div>
            @else
                <x-mailbook::items :mailable="$item" :current="$current" :currentLocale="$currentLocale" />
            @endif
        @endforeach
    </div>
</div>

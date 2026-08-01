@php
    /**
     * @bladestan-signature
     *
     * @var string $preview
     */
@endphp
<div class="flex flex-1 flex-col bg-gray-900">
    <div class="relative flex flex-1 justify-center bg-[#090816] text-black">
        <iframe
            @if (config('mailbook.display_preview'))
                data-display-switcher="true"
            @endif
            class="h-full w-full bg-white"
            sandbox="allow-scripts allow-same-origin allow-popups"
            fetchpriority="high"
            loading="eager"
            src="{{ $preview }}"
        ></iframe>
        @include('mailbook::breakpoints')
    </div>
</div>

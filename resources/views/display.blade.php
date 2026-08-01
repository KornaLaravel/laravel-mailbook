@php
    /**
     * @bladestan-signature
     *
     * @var array|string|null $display
     * @var string $preview
     */
@endphp
<div class="flex flex-1 flex-col bg-gray-900">
    <div class="relative flex flex-1 justify-center bg-[#090816] text-black">
        <iframe
            @class([
                'w-full h-full bg-white',
                'max-w-md' => $display === 'phone',
                'max-w-3xl' => $display === 'tablet',
            ])
            sandbox="allow-scripts allow-same-origin allow-popups"
            fetchpriority="high"
            loading="eager"
            src="{{ $preview }}"
        ></iframe>
        @include('mailbook::breakpoints')
    </div>
</div>

@php
    /**
     * @bladestan-signature
     *
     * @var string $label
     * @var string $type
     */
@endphp
@props(['label', 'type'])

<button
    type="button"
    data-display-type="{{ $type }}"
    class="flex items-center justify-center rounded-md p-1 text-white transition-colors duration-100 data-[selected=false]:bg-[#677180] data-[selected=false]:hover:bg-[#829BBF] data-[selected=true]:bg-[#829BBF]"
    data-selected="false"
    aria-selected="false"
    aria-label="{{ $label }}"
    title="{{ $label }}"
>
    {{ $slot }}
</button>

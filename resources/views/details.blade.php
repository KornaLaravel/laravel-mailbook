@php
    /**
     * @bladestan-signature
     *
     * @var array<string, array|string> $meta
     * @var string $size
     */
@endphp
<div class="hidden w-[300px] flex-col justify-between gap-2 overflow-x-hidden overflow-y-auto xl:flex">
    <div class="flex flex-col divide-y divide-gray-600 p-4">
        @foreach ($meta as $label => $values)
            <div class="flex flex-col py-2">
                <div class="text-xs font-bold tracking-wide uppercase">{{ $label }}</div>
                @if (is_array($values))
                    @foreach ($values as $mail)
                        <div class="truncate text-sm" title="{{ $mail }}">{{ $mail }}</div>
                    @endforeach
                @else
                    <div class="text-sm">{{ $values }}</div>
                @endif
            </div>
        @endforeach
        @if (! empty($attachments))
            <div class="flex flex-col gap-2 py-2">
                <div class="text-xs font-bold tracking-wide uppercase">Attachments</div>
                <div class="flex flex-row flex-wrap items-start gap-2">
                    @foreach ($attachments as $attachment)
                        <div class="focus:ring-ring text-primary-foreground hover:bg-primary/80 inline-flex items-center rounded-full border border-transparent bg-blue-500/50 px-2.5 py-0.5 text-xs font-semibold transition-colors focus:ring-2 focus:ring-offset-2 focus:outline-hidden">
                            {{ $attachment }}
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @if ($size)
            <div class="flex flex-col py-2">
                <div class="text-xs font-bold tracking-wide uppercase">Size</div>
                <div class="text-sm">{{ $size }}</div>
            </div>
        @endif
    </div>
    @if (config('mailbook.show_credits'))
        <div class="p-2 text-center text-xs text-gray-200">
            Created with
            <a href="https://github.com/Xammie/mailbook" target="_blank" class="text-bold text-white underline"
                >mailbook</a>
        </div>
    @endif
</div>

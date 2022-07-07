<div class="flex flex-col gap-2 border-r border-gray-500 border-solid w-[300px]">
    <div class="flex flex-col">
        @foreach($mailables as $mailable)
            @if($mailable->is($current))
                <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                <a href="{{ route('mailbook.dashboard', ['selected' => $mailable->class()]) }}"
                   class="bg-gray-600 text-white group flex items-center px-3 py-2 text-base font-medium">
                    {{ $mailable->name() }}
                </a>
            @else
                <a href="{{ route('mailbook.dashboard', ['selected' => $mailable->class()]) }}"
                   class="text-white hover:bg-gray-700 group flex items-center px-3 py-2 text-base font-medium transition-colors duration-100">
                    {{ $mailable->name() }}
                </a>
            @endif
        @endforeach
    </div>
</div>

@php
    /**
     * @bladestan-signature
     *
     * @var string $content
     */
@endphp
{!! $content !!}
<script defer>
    document.querySelectorAll('a').forEach((a) => {
        a.target = '_blank';
    });
</script>

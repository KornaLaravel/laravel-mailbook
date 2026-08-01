@php
    /**
     * @bladestan-signature
     * @var Xammie\Mailbook\Data\MailableItem $current
     * @var string|null $subject
     * @var array $attachments
     * @var string $size
     * @var Illuminate\Support\Collection<int, Xammie\Mailbook\Data\MailableGroup|Xammie\Mailbook\Data\MailableItem> $items
     * @var (array|string|null) $display
     * @var array $locales
     * @var mixed $currentLocale
     * @var array<string, array|string> $meta
     * @var string $preview
     * @var mixed $send
     * @var string|null $send_to
     * @var Illuminate\Support\HtmlString $style
     */
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $subject }} - Mailbook</title>
    <style>{{ $style }}</style>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>✉️</text></svg>">
</head>
<body class="bg-gray-900 text-white h-screen w-screen flex flex-col">
@include('mailbook::navigation')
<div class="flex grow shrink items-stretch overflow-hidden">
    @include('mailbook::list')
    @include('mailbook::display')
    @include('mailbook::details')
</div>
<script>
    const STORAGE_KEY = 'mailbook-collapsed-groups';

    const readCollapsedGroups = () => {
        try {
            const value = JSON.parse(localStorage.getItem(STORAGE_KEY));

            return Array.isArray(value) ? value : [];
        } catch {
            return [];
        }
    };

    const collapsedGroups = new Set(readCollapsedGroups());

    document.querySelectorAll('[data-mailbook-group]').forEach((group) => {
        const name = group.dataset.mailbookGroup;
        const toggle = group.querySelector('[data-group-toggle]');
        const items = group.querySelector('[data-group-items]');
        const chevron = group.querySelector('[data-group-chevron]');

        // Never hide the group that contains the selected mail
        if (group.querySelector('[data-selected]')) {
            collapsedGroups.delete(name);
        }

        const render = () => {
            const collapsed = collapsedGroups.has(name);
            items.classList.toggle('hidden', collapsed);
            chevron.classList.toggle('-rotate-90', collapsed);
        };

        render();

        toggle.addEventListener('click', () => {
            if (collapsedGroups.has(name)) {
                collapsedGroups.delete(name);
            } else {
                collapsedGroups.add(name);
            }

            localStorage.setItem(STORAGE_KEY, JSON.stringify([...collapsedGroups]));
            render();
        });
    });

    const sidebar = document.getElementById('mailbook-sidebar');
    const selectedItem = sidebar?.querySelector('[data-selected]');

    if (sidebar && selectedItem) {
        const itemTop = selectedItem.getBoundingClientRect().top - sidebar.getBoundingClientRect().top + sidebar.scrollTop;
        const itemBottom = itemTop + selectedItem.offsetHeight;

        if (itemTop < sidebar.scrollTop || itemBottom > sidebar.scrollTop + sidebar.clientHeight) {
            sidebar.scrollTop = itemTop - sidebar.clientHeight / 2 + selectedItem.offsetHeight / 2;
        }
    }

    const select = document.getElementById('locale');
    select.addEventListener('change', (event) => {
        const queryVariables = new URLSearchParams(window.location.search);
        queryVariables.set('locale', event.target.value);
        window.location.search = queryVariables.toString();
    });
</script>
</body>
</html>


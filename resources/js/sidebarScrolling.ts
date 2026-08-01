export function sidebarScrolling(): void {
    const sidebar = document.getElementById('mailbook-sidebar');

    if (!sidebar) {
        return
    }

    const selectedItem = sidebar.querySelector<HTMLElement>('[data-selected]');

    if (!selectedItem) {
        return
    }

    const itemTop = selectedItem.getBoundingClientRect().top - sidebar.getBoundingClientRect().top + sidebar.scrollTop;
    const itemBottom = itemTop + selectedItem.offsetHeight;

    if (itemTop < sidebar.scrollTop || itemBottom > sidebar.scrollTop + sidebar.clientHeight) {
        sidebar.scrollTop = itemTop - sidebar.clientHeight / 2 + selectedItem.offsetHeight / 2;
    }
}

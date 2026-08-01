export function sidebarScrolling() {
    const sidebar = document.getElementById('mailbook-sidebar');
    const selectedItem = sidebar?.querySelector('[data-selected]');

    if (sidebar && selectedItem) {
        const itemTop = selectedItem.getBoundingClientRect().top - sidebar.getBoundingClientRect().top + sidebar.scrollTop;
        const itemBottom = itemTop + selectedItem.offsetHeight;

        if (itemTop < sidebar.scrollTop || itemBottom > sidebar.scrollTop + sidebar.clientHeight) {
            sidebar.scrollTop = itemTop - sidebar.clientHeight / 2 + selectedItem.offsetHeight / 2;
        }
    }
}

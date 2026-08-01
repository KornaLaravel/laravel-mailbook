export function collapsableGroups() {
    const STORAGE_KEY = 'mailbook-collapsed-groups';

    function readCollapsedGroups() {
        try {
            const value = JSON.parse(localStorage.getItem(STORAGE_KEY));

            return Array.isArray(value) ? value : [];
        } catch {
            return [];
        }
    }

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
}

function forCollapsableGroup(group) {

}

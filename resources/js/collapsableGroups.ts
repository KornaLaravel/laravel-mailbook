const STORAGE_KEY = 'mailbook-collapsed-groups';

export function collapsableGroups(): void {
    const collapsedGroups = new Set<string>(readCollapsedGroups());

    document.querySelectorAll<HTMLElement>('[data-mailbook-group]').forEach((group) => {
        const name = group.dataset.mailbookGroup!;
        const toggle = group.querySelector('[data-group-toggle]')!;
        const items = group.querySelector('[data-group-items]')!;
        const chevron = group.querySelector('[data-group-chevron]')!;

        if (group.querySelector('[data-selected]')) {
            collapsedGroups.delete(name);
        }

        const render = (): void => {
            const collapsed = collapsedGroups.has(name);
            items.classList.toggle('hidden', collapsed);
            chevron.classList.toggle('-rotate-90', collapsed);
        };

        render();

        toggle.addEventListener('click', (): void => {
            if (collapsedGroups.has(name)) {
                collapsedGroups.delete(name);
            } else {
                collapsedGroups.add(name);
            }

            writeCollapsedGroups([...collapsedGroups]);
            render();
        });
    });
}

function readCollapsedGroups(): string[] {
    try {
        const value = JSON.parse(localStorage.getItem(STORAGE_KEY) ?? 'null');
        return Array.isArray(value) ? value : [];
    } catch {
        return [];
    }
}

function writeCollapsedGroups(groups: string[]) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(groups))
}

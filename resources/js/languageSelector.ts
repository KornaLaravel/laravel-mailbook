export function languageSelector(): void {
    const select = document.getElementById('locale') as HTMLSelectElement | null;

    select?.addEventListener('change', (event: Event) => {
        const queryVariables = new URLSearchParams(window.location.search);
        queryVariables.set('locale', (event.target as HTMLSelectElement).value);
        window.location.search = queryVariables.toString();
    });
}

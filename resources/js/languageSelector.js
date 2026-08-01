export function languageSelector() {
    const select = document.getElementById('locale');

    select.addEventListener('change', (event) => {
        const queryVariables = new URLSearchParams(window.location.search);
        queryVariables.set('locale', event.target.value);
        window.location.search = queryVariables.toString();
    });
}

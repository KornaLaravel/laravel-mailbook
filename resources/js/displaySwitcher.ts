import { storageGet, storageSet } from './storage.ts';

type DisplaySize = 'phone' | 'tablet' | 'desktop';

const STORAGE_KEY = 'mailbook-display-size';
const WIDTH_CLASSES: Record<DisplaySize, string> = {
    phone: 'max-w-md',
    tablet: 'max-w-3xl',
    desktop: '',
};

export function displaySwitcher(): void {
    const iframe = document.querySelector<HTMLIFrameElement>('iframe[data-display-switcher]');

    if (!iframe) {
        return;
    }

    const buttons = document.querySelectorAll<HTMLButtonElement>('[data-display-type]');

    const applyDisplay = (type: DisplaySize): void => {
        if (WIDTH_CLASSES[type]) {
            iframe.classList.add(WIDTH_CLASSES[type]);
        }

        buttons.forEach((button) => {
            const buttonType = (button.dataset.displayType || 'desktop') as DisplaySize;
            const isActive = buttonType === type;

            button.setAttribute('data-selected', String(isActive));
            button.setAttribute('aria-selected', String(isActive));
        });
    };

    const currentDisplay = storageGet<DisplaySize>(STORAGE_KEY, 'desktop');
    applyDisplay(currentDisplay);

    buttons.forEach((button) => {
        button.addEventListener('click', (): void => {
            const type = (button.dataset.displayType || 'desktop') as DisplaySize;
            const previousType = storageGet<DisplaySize>(STORAGE_KEY, 'desktop')

            if (type === previousType) {
                return;
            }

            if (WIDTH_CLASSES[previousType]) {
                iframe.classList.remove(WIDTH_CLASSES[previousType]);
            }

            storageSet(STORAGE_KEY, type);
            applyDisplay(type);
        });
    });
}

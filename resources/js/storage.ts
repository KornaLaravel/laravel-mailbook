export function storageGet<T>(key: string, fallback: T): T {
    try {
        const value = localStorage.getItem(key);

        if (value === null) {
            return fallback;
        }

        return JSON.parse(value) as T;
    } catch {
        return fallback;
    }
}

export function storageSet<T>(key: string, value: T): void {
    localStorage.setItem(key, JSON.stringify(value));
}

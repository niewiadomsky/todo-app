export const baseUrl = (path: string) => {
    let baseURL = import.meta.env.VITE_BASE_URL ?? '/';

    if (!baseURL.endsWith('/')) {
        baseURL += '/'; 
    }

    if (path.startsWith('/')) {
        path = path.substring(1);
    }

    return `${baseURL}${path}`;
}
export async function addUser(request: object) {
    const response = await fetch(`${document.API}/create`, {
        method: 'POST',
        body: JSON.stringify(request),
        headers: {
            'content-type': 'application/json'
        }

    });
    return await response.json();
}
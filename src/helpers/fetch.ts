interface IApplication {
    API: string;
    Token: string;
}

const Application: IApplication = {
    API: document.getElementById('usergenerator').getAttribute('data-api'),
    Token: document.getElementById('usergenerator').getAttribute('data-token')
};


// Get UI texts for Application
export async function startApp() {
    const response = await fetch(`${Application.API}/start`, {
        method: 'GET',
        headers: {
            'content-type': 'application/json',
            'x-api-key': Application.Token ? Application.Token : ''
        }

    });
    return await response.json();
}


// Create user
export async function addUser(request: object) {
    const response = await fetch(`${Application.API}/create`, {
        method: 'POST',
        body: JSON.stringify(request),
        headers: {
            'content-type': 'application/json',
            'x-api-key': Application.Token ? Application.Token : ''
        }

    });
    return await response.json();
}
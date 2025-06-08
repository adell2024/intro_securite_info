async function sendRequest() {
    const responseDiv = document.getElementById('response');
    try {
        const response = await fetch('http://api.exemple.local/api.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ message: 'Bonjour de a.exemple.local!' }),
            credentials: 'include' // Inclut le cookie dans la requête
        });
        if (!response.ok) {
            throw new Error(`Erreur HTTP: ${response.status}`);
        }
        const data = await response.json();
        responseDiv.textContent = `Réponse de l'API: ${JSON.stringify(data)}`;
    } catch (error) {
        responseDiv.textContent = `Erreur: ${error.message}`;
    }
}

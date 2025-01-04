document.addEventListener('DOMContentLoaded', () => {
    async function playGame(choice) {
        try {
            const response = await fetch('index.php?controller=game&action=play', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ choice })
            });

            if (!response.ok) {
                throw new Error(`Server error: ${response.status}`);
            }

            const result = await response.json();

            if (result.error) {
                document.getElementById('result').innerText = `Error: ${result.error}`;
                return;
            }

            let message = `You chose ${result.player}, computer chose ${result.computer}. Result: ${result.result}`;

            document.getElementById('result').innerText = message;
        } catch (error) {
            document.getElementById('result').innerText = `An error occurred: ${error.message}`;
        }
    }

    window.playGame = playGame;
});

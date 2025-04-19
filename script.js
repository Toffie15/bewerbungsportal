document.addEventListener('DOMContentLoaded', () => {
    fetch('/api/status')
        .then(response => response.json())
        .then(data => {
            const statusElement = document.getElementById('status');
            const playersCountElement = document.getElementById('playersCount');
            statusElement.innerText = data.status;
            playersCountElement.innerText = data.players;

            const startStopButton = document.getElementById('startStopButton');
            startStopButton.innerText = data.status === 'Online' ? 'Stoppen' : 'Starten';

            startStopButton.addEventListener('click', () => {
                fetch('/api/toggleServer', { method: 'POST' })
                    .then(response => response.json())
                    .then(updatedData => {
                        statusElement.innerText = updatedData.status;
                        playersCountElement.innerText = updatedData.players;
                        startStopButton.innerText = updatedData.status === 'Online' ? 'Stoppen' : 'Starten';
                    });
            });
        });
});

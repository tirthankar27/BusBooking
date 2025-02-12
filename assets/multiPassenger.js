function generatePassengerInputs() {
    let numPassengers = document.getElementById('numPassengers').value;
    let container = document.getElementById('passengerInputs');
    container.innerHTML = '';
    for (let i = 0; i < numPassengers; i++) {
        let input = document.createElement('input');
        input.type = 'text';
        input.name = 'passenger[]';
        input.placeholder = `Passenger ${i + 1} Name`;
        input.required = true;
        input.className = 'h-10 w-full rounded-lg p-2 border-2 border-green-700 focus:outline-none focus:ring-2 focus:ring-green-500';
        container.appendChild(input);
    }
}

let selectedSeats = [];
function toggleSeat(seatNumber) {
    let seatDiv = document.getElementById(`seat-${seatNumber}`);
    if (selectedSeats.includes(seatNumber)) {
        selectedSeats = selectedSeats.filter(s => s !== seatNumber);
        seatDiv.classList.remove('bg-blue-500');
        seatDiv.classList.add('bg-green-500', 'hover:bg-green-600');
    } else {
        selectedSeats.push(seatNumber);
        seatDiv.classList.remove('bg-green-500', 'hover:bg-green-600');
        seatDiv.classList.add('bg-blue-500');
    }
    document.getElementById('seatInput').value = selectedSeats.join(',');
}
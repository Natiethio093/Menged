// Array to store selected seat numbers
const selectedSeats = [];

    // Get all seat cells
    const seatCells = document.querySelectorAll('.seat');

    // Add click event listener to each seat cell
    seatCells.forEach((seatCell) => {
        seatCell.addEventListener('click', () => {
            // Toggle the selected seat
            seatCell.classList.toggle('selected-seat');

            // Update the selectedSeats array
            const seatNumber = seatCell.dataset.name;
            if (seatCell.classList.contains('selected-seat')) {
                selectedSeats.push(seatNumber);
            } else {
                const index = selectedSeats.indexOf(seatNumber);
                if (index !== -1) {
                    selectedSeats.splice(index, 1);
                }
            }

            // Update the input field with the selected seat numbers
            document.getElementById('seatInput').value = selectedSeats.join(',');
        });
    });

    // Submit button click event listener
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.addEventListener('click', () => {
        // Create a form and add the selected seat data
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = "{{url('seatselects')}}/{{$schedule->id}}/{{$date}}"; // Use the same URL as the form

        // Create an input field for the selected seat data
        const seatInput = document.createElement('input');
        seatInput.type = 'hidden';
        seatInput.name = 'selectedSeats';
        seatInput.value = selectedSeats.join(',');

        // Append the input field to the form and submit the form
        form.appendChild(seatInput);
        document.body.appendChild(form);
        form.submit();
    });


// Get the array of booked seats from the data attribute
const bookedSeatsData = document.getElementById('bookedSeatsData');
const bookedSeats = JSON.parse(bookedSeatsData.dataset.bookedSeats);

// Loop through each seat and disable it if it's booked
bookedSeats.forEach(function (seat) {
    const seatElement = document.getElementById('seat-' + seat);
    seatElement.disabled = true; // Disable the seat
    seatElement.style.backgroundColor = 'gray'; // Change the color of the seat
});
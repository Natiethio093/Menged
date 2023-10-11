window.addEventListener('DOMContentLoaded', (event) => {
    // Get the booked seats input field
    var bookedSeatsInput = document.getElementById('bookedSeatsInput');

    var reservedSeatsInput= document.getElementById('reservedSeatsInput');
  
    var seatElements = document.querySelectorAll('.seat');

    // Read the selected seats from the input field value
    var selectedSeats = bookedSeatsInput.value.split(',');

    var reservedSeats = reservedSeatsInput.value.split(',');

    // Loop through each seat element
    seatElements.forEach(function(seatElement) {
        var seatNumber = seatElement.getAttribute('data-name');

        // Check if the seat is selected
        if (selectedSeats.includes(seatNumber)) {
            seatElement.classList.add('booked-seat'); // Add the class to the seat
            seatElement.disabled = true; // Disable the seat
      
            const bookedElement = seatElement.querySelector('.booked-images');
            const seatImageElement = seatElement.querySelector('.seat-image');
      
            seatImageElement.style.display = 'none'; // Hide the default image
            bookedElement.style.display = 'block'; // Show the booked image
          }

          if (reservedSeats.includes(seatNumber)) {
            seatElement.classList.add('reserved-seat'); // Add the class to the seat
            seatElement.disabled = true; // Disable the seat
      
            const reservedElement = seatElement.querySelector('.reserved-images');
            const seatImageElement = seatElement.querySelector('.seat-image');
      
            seatImageElement.style.display = 'none'; // Hide the default image
            reservedElement.style.display = 'block'; // Show the reserved image
          }
        });

        
      });

// Array to store selected seat numbers
const selectedSeats = [];

// Get all seat cells
const seatCells = document.querySelectorAll('.seat');

seatCells.forEach((seatCell) => {
    seatCell.addEventListener('click', () => {
        // Toggle the selected seat
        if (seatCell.classList.contains('booked-seat')) {
            alert('Sorry this seat is already booked!!.'); 
            return; // Skip adding the seat to selectedSeats
        }
        if (seatCell.classList.contains('reserved-seat')) {
            alert('Sorry this seat is reserved!!.'); 
            return; // Skip adding the seat to selectedSeats
        }
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
        
        // Change the image based on seat selection
        const seatImageElement = seatCell.querySelector('.seat-image');
        const selectedImageElement = seatCell.querySelector('.selected-image');
       
        
        if (seatCell.classList.contains('selected-seat')) {
            seatImageElement.style.display = 'none'; // Hide the default image
            selectedImageElement.style.display = 'block'; // Show the selected image
        }
        else {
            seatImageElement.style.display = 'block'; // Show the default image
            selectedImageElement.style.display = 'none'; // Hide the selected image
        }
    });
});

// Submit button click event listener
const submitBtn = document.getElementById('submitBtn');
submitBtn.addEventListener('click', () => {
    // Create a form and add the selected seat data
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = "{{url('seatselects')}}"; //  same as URL of the form

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
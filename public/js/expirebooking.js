
const expirationTime = document.getElementById('countdown').dataset.expiration;
let remainingTime = expirationTime;
function updateCountdown() {
    const countdownElement = document.getElementById('countdown');

    
    const hours = Math.floor(remainingTime / 3600);
    const minutes = Math.floor((remainingTime % 3600) / 60);
    const seconds = remainingTime % 60;

    countdownElement.textContent = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

   
    remainingTime--;

   
    if (remainingTime <= 0) {
       
        window.location.href = redirectURL;
      
        clearInterval(countdownInterval);
    }
}

const redirectURL = "{{ route('timeout', ['bookedId' => $bookedId, 'seatsel' => $seatsel, 'seatId' => $seatId]) }}";


const countdownInterval = setInterval(updateCountdown, 1000);




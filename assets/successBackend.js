let countdownTimer=5;
let countdownElement=document.getElementById('countdown');
function updateCountdown(){
    countdownTimer--;
    countdownElement.textContent = countdownTimer;
    if(countdownTimer==0){
        window.location.href="bookingsFrontend.php";
    }
}
setInterval(updateCountdown,1000);
document.addEventListener("DOMContentLoaded", function() {

    var reservationModal = document.getElementById("reservation-modalA");
    var btn = document.getElementById("inner-button");
    var span = document.getElementsByClassName("close-btnA")[0]; 

    btn.onclick = function() {
        reservationModal.style.display = "block";
    }

    span.onclick = function() {
        reservationModal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == reservationModal) {
            reservationModal.style.display = "none";
        }
    }
});
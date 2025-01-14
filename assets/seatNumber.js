window.onload = function () {
    modalOpener();
};

function modalOpener() {
    const modal = document.getElementById("myModal");
    const openModalButton = document.getElementById("openModal");
    const closeModalButton = document.getElementById("closeModal");

    openModalButton.addEventListener("click", (event) => {
        event.preventDefault();
        modal.classList.remove("hidden");
        modal.classList.add("flex");
    });

    closeModalButton.addEventListener("click", () => {
        modal.classList.remove("flex");
        modal.classList.add("hidden");
    });
}

function selectSeat(seatNumber) {
    const previouslySelected = document.querySelector(".bg-yellow-400");
    if (previouslySelected) {
        previouslySelected.classList.remove("bg-yellow-400", "text-black");
    }

    const selectedSeat = document.getElementById("seat-" + seatNumber);
    selectedSeat.classList.add("bg-yellow-400", "text-black");
    document.getElementById("seatInput").value = seatNumber;
}
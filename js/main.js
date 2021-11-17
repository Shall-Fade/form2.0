let modal = document.getElementById("modal");
let close = document.getElementsByClassName("close")[0];

// При нажатии на кнопку, модальное окно закрывается

close.onclick = function() {
    modal.style.display = "none";
}

// При нажатии на пустое пространство, модальное окно закрывается

window.onclick = function(event) {
 if (event.target === modal) {
     modal.style.display = "none";
 }
}
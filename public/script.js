const hamburgerBtn = document.getElementById("hamburger");
const menu = document.getElementById("menu");

hamburgerBtn.addEventListener("click", function () {
    menu.classList.toggle("hidden");
});

function showModal() {
    const modal = document.getElementById("loginModal");
    modal.classList.remove("hidden");
    modal.classList.add("modal-transition-enter");
    setTimeout(() => {
        modal.classList.add("modal-transition-enter-active");
    }, 10);
}


document.getElementById("loginButton").addEventListener("click", function () {
    showModal();
});
document.getElementById("loginMobile").addEventListener("click", function () {
    showModal();
});

document.getElementById("closeModal").addEventListener("click", function () {
    const modal = document.getElementById("loginModal");
    modal.classList.remove("modal-transition-enter-active");
    modal.classList.add("modal-transition-leave");
    setTimeout(() => {
        modal.classList.add("hidden");
        modal.classList.remove("modal-transition-leave");
    }, 300);
});


document
    .getElementById("mainForm")
    .addEventListener("submit", function (event) {
        event.preventDefault();
        showModal();
    });



$(document).ready(function () {
    $("#checkbox1").change(function () {
        if (this.checked) {
            $("#form1").removeClass("hidden");
            $("#form2").addClass("hidden");
            $("#checkbox2").prop("checked", false);
        } else {
            $("#form1").addClass("hidden");
        }
    });

    $("#checkbox2").change(function () {
        if (this.checked) {
            $("#form2").removeClass("hidden");
            $("#form1").addClass("hidden");
            $("#checkbox1").prop("checked", false);
        } else {
            $("#form2").addClass("hidden");
        }
    });
});

new DataTable("#table");

feather.replace();

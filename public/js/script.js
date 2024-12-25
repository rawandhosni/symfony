document.addEventListener("DOMContentLoaded", function () {
    const bookButton = document.getElementById("bookButton");
    const bookingForm = document.getElementById("bookingForm");

    if (bookButton && bookingForm) {
        bookButton.addEventListener("click", function (event) {
            event.preventDefault(); // Empêche la soumission classique

            // Récupère les données du formulaire
            const formData = new FormData(bookingForm);

            // Envoie une requête AJAX
            fetch(bookingForm.action, {
                method: "POST",
                body: formData,
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
                .then(response => response.json())
                .then(data => {
                    // Affiche un message pop-up
                    if (data.message) {
                        alert(data.message);
                    } else {
                        alert("Une erreur est survenue.");
                    }
                })
                .catch(error => {
                    console.error("Erreur :", error);
                });
        });
    }
});

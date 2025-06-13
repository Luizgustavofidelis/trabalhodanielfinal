// js/confirmacao.js
document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll("a[href^='excluir.php']");

    links.forEach(function (link) {
        link.addEventListener("click", function (event) {
            const confirmacao = confirm("Tem certeza que deseja excluir as informações?");
            if (!confirmacao) {
                event.preventDefault(); 
            }
        });
    });
});

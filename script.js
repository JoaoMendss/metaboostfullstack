  document.addEventListener("DOMContentLoaded", function() {
    const toggle = document.getElementById("menu-toggle");
    const navbar = document.querySelector(".navbar");

    if (!toggle || !navbar) return;

    // abre / fecha com clique
    toggle.addEventListener("click", () => {
      navbar.classList.toggle("active");
      toggle.classList.toggle("open");
    });

    // acessibilidade: abre com Enter ou Space quando o toggle tem foco
    toggle.addEventListener("keydown", (e) => {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        navbar.classList.toggle("active");
        toggle.classList.toggle("open");
      }
    });

    // opcional: fecha o menu se clicar fora (melhora UX)
    document.addEventListener("click", (e) => {
      const isClickInside = navbar.contains(e.target) || toggle.contains(e.target);
      if (!isClickInside && navbar.classList.contains("active")) {
        navbar.classList.remove("active");
        toggle.classList.remove("open");
      }
    });
  });
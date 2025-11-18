document.addEventListener("DOMContentLoaded", function () {
  const botoes = document.querySelectorAll(".btn-adicionar");
  const contador = document.getElementById("contador-carrinho");

  botoes.forEach(btn => {
    btn.addEventListener("click", () => {
      const nome = btn.dataset.nome;
      const preco = btn.dataset.preco;
      const quantidade = btn.parentElement.querySelector("input").value;

      fetch("adicionar_carrinho.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `nome=${encodeURIComponent(nome)}&preco=${preco}&quantidade=${quantidade}`
      })
      .then(res => res.json())
      .then(data => {
        if (data.sucesso) {
          contador.textContent = data.total;
        } else {
          alert("Erro ao adicionar ao carrinho");
        }
      })
      .catch(() => alert("Erro ao conectar com o servidor"));
    });
  });
});
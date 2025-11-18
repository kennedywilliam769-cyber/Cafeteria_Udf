document.addEventListener('DOMContentLoaded', () => {
  const botoes = document.querySelectorAll('.btn-adicionar');
  
  botoes.forEach(btn => {
    btn.addEventListener('click', () => {
      const nome = btn.dataset.nome;
      const preco = parseFloat(btn.dataset.preco);
      const quantidadeInput = btn.parentElement.querySelector('input');
      const quantidade = quantidadeInput ? parseInt(quantidadeInput.value) : 1;

      // Pega o carrinho do localStorage
      let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

      // Verifica se o produto já existe no carrinho
      const existente = carrinho.find(item => item.nome === nome);
      if (existente) {
        existente.qtd += quantidade;
      } else {
        carrinho.push({ nome, preco, qtd: quantidade });
      }

      // Salva de volta
      localStorage.setItem('carrinho', JSON.stringify(carrinho));

      // Atualiza contador
      const contador = document.getElementById('contador-carrinho');
      if (contador) {
        const totalItens = carrinho.reduce((acc, item) => acc + item.qtd, 0);
        contador.innerText = totalItens;
      }

      alert(`${quantidade}x ${nome} foi adicionado ao carrinho!`);
    });
  });
});
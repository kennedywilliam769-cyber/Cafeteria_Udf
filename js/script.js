const slide = document.querySelector('.carrossel-slide');
const imagens = document.querySelectorAll('.carrossel-slide img');
const btnEsquerda = document.querySelector('.seta-esquerda');
const btnDireita = document.querySelector('.seta-direita');

let contador = 0;

// Função para atualizar o carrossel
function atualizarSlide() {
  slide.style.transform = `translateX(${-contador * 100}%)`;
}

// Botão para avançar
btnDireita.addEventListener('click', () => {
  contador++;
  if (contador >= imagens.length) contador = 0;
  atualizarSlide();
});

// Botão para voltar
btnEsquerda.addEventListener('click', () => {
  contador--;
  if (contador < 0) contador = imagens.length - 1;
  atualizarSlide();
});

const carrossel = document.querySelector('.carrossel-produtos');
const esquerda = document.querySelector('.carrossel-btn.esquerda');
const direita = document.querySelector('.carrossel-btn.direita');

const passo = 300; // distância do scroll por clique

direita.addEventListener('click', () => {
    carrossel.scrollBy({ left: passo, behavior: 'smooth' });
});

esquerda.addEventListener('click', () => {
    carrossel.scrollBy({ left: -passo, behavior: 'smooth' });
});



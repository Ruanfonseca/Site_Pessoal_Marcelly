/*
Esse código é um script jQuery que é executado quando o documento HTML está completamente carregado e
 pronto para ser manipulado pelo JavaScript.

Ele faz várias coisas, incluindo adicionar uma classe .sticky à barra de navegação (.navbar) quando o usuário rola a
 página mais de 20 pixels para baixo, e remover essa classe quando o usuário rola para cima novamente. Também adiciona ou
  remove uma classe .show do botão de rolagem para cima (.scroll-up-btn) dependendo de se o usuário rola a página mais
   de 500 pixels para baixo.

Além disso, ele usa a biblioteca Typed.js para criar uma animação de digitação em duas seções de texto com as classes

.typing e .typing-2, que mostram a frase "Designer de Mídias Sociais".

Ele também adiciona um evento de clique ao botão de menu (.menu-btn) que adiciona ou remove a classe .active da 
lista de menu (.navbar .menu) e do ícone do botão de menu.

Finalmente, ele usa o plugin OwlCarousel para criar um carrossel que exibe um número variável de itens dependendo do
 tamanho da tela do usuário.


*/

$(document).ready(function () {
    $(window).scroll(function () {
        if (this.scrollY > 20) {
            $('.navbar').addClass("sticky");
        } else {
            $('.navbar').removeClass("sticky");
        }
        if (this.scrollY > 500) {
            $('.scroll-up-btn').addClass("show");
        } else {
            $('.scroll-up-btn').removeClass("show");
        }
    });
    $('.scroll-up-btn').click(function () {
        $('html').animate({ scrollTop: 0 });
    });

    var typed = new Typed(".typing", {
        strings: ["Designer de Mídias Sociais"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });
    var typed = new Typed(".typing-2", {
        strings: ["Designer de Mídias Sociais"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });

    $('.menu-btn').click(function () {
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });
    $('.carousel').owlCarousel({
        margin: 20,
        loop: true,
        autoplayTimeOut: 2000,
        autoplayHoverPauser: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false
            }
        }
    });
});
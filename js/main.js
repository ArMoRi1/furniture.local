// ----------- Бургер -----------
let header__burger = document.querySelector('.header__burger');
let header__menu = document.querySelector('.header__menu');
let body = document.querySelector('body');
let header__list = document.querySelector('.header__list');

header__burger.onclick = function()
{
    header__burger.classList.toggle('active');
    header__menu.classList.toggle('active');
    body.classList.List.toggle('lock');
}
header__list.onclick = function()
{
    header__list.classList.remove('active');
    body.classList.toggle('lock');
}

// ----------- Header options -----------

document.addEventListener("DOMContentLoaded", function () {
    const menuButton = document.getElementById("header-button");
    const menuOptions = document.getElementById("header-options");
    let isMenuOpen = false;

    menuButton.addEventListener("click", function () {
        if (!isMenuOpen) {
            menuOptions.style.display = "block";
            menuOptions.style.height = "120px";
        } else {
            menuOptions.style.display = "none";
            menuOptions.style.height = "120px";
        }
        isMenuOpen = !isMenuOpen;
    });
});


// ----------- Меню зникає і з'являється -----------
let prevScrollPos = window.pageYOffset;

window.addEventListener('scroll', function() {
    const currentScrollPos = window.pageYOffset;

    if (prevScrollPos > currentScrollPos) {
        // Scrolling up
        document.querySelector('header').style.top = '0';
    } else {
        // Scrolling down
        document.querySelector('header').style.top = '-60px'; // Hide the navbar
    }

    prevScrollPos = currentScrollPos;
});


// ----------- Слайдер Свайпер -----------

let swiper;
swiper = new Swiper('#swiper1', {
    direction: 'horizontal',
    pagination: {
        el: '.swiper-pagination',
        clickable:true,
    },
    loop: true,
    watchOverFlow:true,
    grabCursor:true,
    keyboard:{
        enabled:true,
        onlyInViewport:true,
    },
    mousewheel:{
    },
    slidesPerView: '1',
    spaceBetween:30,
    autoplay:{
        delay:2500,
        stopOnLastSlide:false,
        disableOnInteraction:false,
    },
    speed:1000,
});

let swiper2;
swiper2 = new Swiper('#swiper-2', {
    direction: 'horizontal',
    navigation:{
        nextEl:'.swiper-button-next',
        prevEl:'.swiper-button-prev'
        },
    loop: true,
    watchOverFlow:true,
    grabCursor:true,
});
// ----------- Preloader -----------
// window.addEventListener('load', function () {
//     const loader = document.querySelector('.loader');
//     loader.classList.add('hidden');
// });

// ----------- Гоу ту топ -----------
var scrollToTopBtn = document.querySelector(".scroll-to-top");

window.addEventListener("scroll", function () {
    if (window.pageYOffset > 100) {
        scrollToTopBtn.classList.add("showw");
    } else {
        scrollToTopBtn.classList.remove("showw");
    }
});

scrollToTopBtn.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});

// Переключення табів 1
document.querySelectorAll('.tabs-triggers__item').forEach((item) =>
item.addEventListener('click',function(e){
    e.preventDefault();
    const id = e.target.getAttribute('href').replace('#','');

    document.querySelectorAll('.tabs-triggers__item').forEach(
        (child) => child.classList.remove('tabs-triggers__item--active'));
    document.querySelectorAll('.tabs-content__item').forEach(
        (child) => child.classList.remove('tabs-content__item--active'));


    item.classList.add('tabs-content__item--active');
    document.getElementById(id).classList.add('tabs-content__item--active')
}));
document.querySelector('.tabs-triggers__item').click();

і

function gearFunction() {
    // Перемикання класу show для меню
    document.getElementById("myDropdown").classList.toggle("show");

    // Перемикання між класами fa-gear-clicked та fa-gear-unclicked
    var gearIcon = document.getElementById("fa-gear");
    if (gearIcon.classList.contains("fa-gear-unclicked")) {
        gearIcon.classList.remove("fa-gear-unclicked");
        gearIcon.classList.add("fa-gear-clicked");
    } else {
        gearIcon.classList.remove("fa-gear-clicked");
        gearIcon.classList.add("fa-gear-unclicked");
    }
}

window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');

                // При закритті меню видалити клас fa-gear-clicked
                var gearIcon = document.getElementById("fa-gear");
                gearIcon.classList.remove("fa-gear-clicked");
                gearIcon.classList.add("fa-gear-unclicked");
            }
        }
    }
}






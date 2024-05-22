// ----------- Бургер -----------
function initializeMenuToggle() {
    let headerBurger = document.querySelector('.header__burger');
    let headerMenu = document.querySelector('.header__menu');
    let body = document.querySelector('body');
    let headerList = document.querySelector('.header__list');

    headerBurger.onclick = function() {
        headerBurger.classList.toggle('active');
        headerMenu.classList.toggle('active');
        body.classList.toggle('lock');
    }

    headerList.onclick = function() {
        headerList.classList.remove('active');
        body.classList.toggle('lock');
    }
}


// Виклик функції після завантаження DOM
document.addEventListener("DOMContentLoaded", initializeMenuToggle);


// ----------- Header options -----------

// document.addEventListener("DOMContentLoaded", function () {
//     const menuButton = document.getElementById("header-button");
//     const menuOptions = document.getElementById("header-options");
//     let isMenuOpen = false;
//
//     menuButton.addEventListener("click", function () {
//         if (!isMenuOpen) {
//             menuOptions.style.display = "block";
//             menuOptions.style.height = "120px";
//         } else {
//             menuOptions.style.display = "none";
//             menuOptions.style.height = "120px";
//         }
//         isMenuOpen = !isMenuOpen;
//     });
// });
function categoryListToggle() {
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
}
// Виклик функції після завантаження DOM
document.addEventListener("DOMContentLoaded", categoryListToggle);


// ----------- Меню зникає і з'являється -----------
function setupScrollHeader() {
    let prevScrollPos = window.pageYOffset;

    window.addEventListener('scroll', function() {
        const currentScrollPos = window.pageYOffset;

        if (prevScrollPos > currentScrollPos) {
            // Скрол вверх
            document.querySelector('header').style.top = '0';
        } else {
            // Скрол вниз
            document.querySelector('header').style.top = '-60px'; // Приховуємо navbar
        }

        prevScrollPos = currentScrollPos;
    });
}
// Виклик функції після завантаження DOM
document.addEventListener("DOMContentLoaded", setupScrollHeader);



// ----------- Слайдер Свайпер -----------
function setupSwiper1() {
    let swiper1 = new Swiper('#swiper1', {
        direction: 'horizontal',
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        loop: true,
        watchOverflow: true,
        grabCursor: true,
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },
        mousewheel: {},
        slidesPerView: '1',
        spaceBetween: 30,
        autoplay: {
            delay: 2500,
            stopOnLastSlide: false,
            disableOnInteraction: false,
        },
        speed: 1000,
    });
}

function setupSwiper2() {
    let swiper2 = new Swiper('#swiper-2', {
        direction: 'horizontal',
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        loop: true,
        watchOverflow: true,
        grabCursor: true,
    });
}

// Виклик функцій після завантаження DOM
document.addEventListener("DOMContentLoaded", function() {
    setupSwiper1();
    setupSwiper2();
});



// ----------- Гоу ту топ -----------
function setupScrollToTopButton() {
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
}
// Виклик функції після завантаження DOM
document.addEventListener("DOMContentLoaded", setupScrollToTopButton);


// Переключення табів 1
function setupTabs() {
    document.querySelectorAll('.tabs-triggers__item').forEach((item) =>
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const id = e.target.getAttribute('href').replace('#', '');

            document.querySelectorAll('.tabs-triggers__item').forEach(
                (child) => child.classList.remove('tabs-triggers__item--active'));
            document.querySelectorAll('.tabs-content__item').forEach(
                (child) => child.classList.remove('tabs-content__item--active'));

            item.classList.add('tabs-content__item--active');
            document.getElementById(id).classList.add('tabs-content__item--active');
        })
    );
    document.querySelector('.tabs-triggers__item').click();
}
document.addEventListener("DOMContentLoaded", setupTabs);


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

// window.onclick = function(event) {
//     if (!event.target.matches('.dropbtn')) {
//         var dropdowns = document.getElementsByClassName("dropdown-content");
//         var i;
//         for (i = 0; i < dropdowns.length; i++) {
//             var openDropdown = dropdowns[i];
//             if (openDropdown.classList.contains('show')) {
//                 openDropdown.classList.remove('show');
//
//                 // При закритті меню видалити клас fa-gear-clicked
//                 var gearIcon = document.getElementById("fa-gear");
//                 gearIcon.classList.remove("fa-gear-clicked");
//                 gearIcon.classList.add("fa-gear-unclicked");
//             }
//         }
//     }
// }
// document.addEventListener("DOMContentLoaded", function() {
//     const dropbtn = document.querySelector(".dropbtn");
//     dropbtn.addEventListener("click", gearFunction);
// });







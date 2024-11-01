const hamburgerButton = document.querySelector('.hamburger-button');
const hamburgerMenu = document.querySelector('.hamburgerMenu');
const closeButton = document.querySelector('.close-btn');
let scrollPosition = 0;

function openMenu() {
    scrollPosition = window.pageYOffset;
    document.body.style.top = `-${scrollPosition}px`;
    document.body.classList.add('menu-open');
    hamburgerMenu.classList.add('active');
}

function closeMenu() {
    document.body.classList.remove('menu-open');
    hamburgerMenu.classList.remove('active');
    window.scrollTo(0, scrollPosition);
    document.body.style.top = '';
}

if (hamburgerButton) hamburgerButton.addEventListener('click', openMenu);
closeButton.addEventListener('click', closeMenu);

const navItems = document.querySelectorAll('.navItem a');

function setActiveNavItem() {
    const currentLocation = location.pathname;

    navItems.forEach(item => {
        if (item.getAttribute('href') === currentLocation) {
            item.classList.add('active');
        }
    });

    mobileNavItems.forEach(item => {
        const href = item.getAttribute('onclick').match(/'([^']+)'/)[1];
        if (currentLocation === href) {
            item.classList.add('active');
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const navItems = document.querySelectorAll('.navItem a');

    navItems.forEach(item => {
        item.addEventListener('click', function (e) {
            navItems.forEach(link => link.classList.remove('active'));
            e.target.classList.add('active');
        });
    });
});

const origineleTitel = document.title;

window.addEventListener("blur", () => {
    document.title = "Je bent nog niet ingeschreven!";
});

window.addEventListener("focus", () => {
    document.title = origineleTitel;
});

document.addEventListener('DOMContentLoaded', setActiveNavItem);

document.addEventListener('DOMContentLoaded', function () {
    const copyrightSpan = document.getElementById('copyright');
    const currentYear = new Date().getFullYear();
    copyrightSpan.textContent = `© ${currentYear} Rijschool Paraat `;
});

document.addEventListener('DOMContentLoaded', function () {
    let scrollToTopBtn = document.getElementById("scrollToTopBtn");

    window.addEventListener('scroll', function () {
        if (window.pageYOffset > 200) {
            scrollToTopBtn.classList.add('visible');
        } else {
            scrollToTopBtn.classList.remove('visible');
        }
    });
});

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

const pakketCards = document.querySelectorAll('.pakketCard');

pakketCards.forEach(card => {
    card.addEventListener('click', function () {
        console.log('Package card clicked:', this.querySelector('.pakketCardText').textContent);
    });
});

const socialButtons = document.querySelectorAll('.linkedinBtn');

socialButtons.forEach(button => {
    button.addEventListener('click', function () {
        const url = this.getAttribute('onclick').match(/'([^']+)'/)[1];
        window.open(url, '_blank');
    });
});
function delayedRedirect() {
    setTimeout(function () {
        window.location.href = 'tarieven.html';
    }, 1000);
}

function getQueryParam(param) {
    let urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

let selectedPakket = getQueryParam('pakket');

if (selectedPakket) {
    Array.from(document.querySelector('#pakket').children).forEach(function (option) {
        if (option.value === selectedPakket) {
            option.selected = true;
        } else {
            option.selected = false;
        }
    });
}

document.getElementById('inschrijfformulier').addEventListener('submit', function (e) {
    e.preventDefault();

    var naam = document.getElementById('voornaam').value;
    var email = document.getElementById('email').value;
    var telefoon = document.getElementById('telefoon').value;
    var geboortedatum = document.getElementById('geboortedatum').value;

    if (naam === '' || email === '' || telefoon === '' || geboortedatum === '') {
        document.getElementById('foutmelding').style.display = 'block';
    } else {
        document.getElementById('foutmelding').style.display = 'none';
        alert('Formulier is succesvol verzonden!');
        this.submit();
    }
});
function checkTheme() {
    const currentHour = new Date().getHours();

    const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)").matches;

    if (prefersDarkScheme || (currentHour >= 20 || currentHour < 6)) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    checkTheme();

    setInterval(checkTheme, 60 * 60 * 1000);
});
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const loadingOverlay = document.getElementById('loading');

    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            loadingOverlay.style.display = 'flex';
            setTimeout(function () {
                form.submit();
            }, 3000);
        });
    }
});

const marquee = document.querySelector('.marquee h3');

marquee.addEventListener('mouseover', () => {
    marquee.style.animationPlayState = 'paused';
});

marquee.addEventListener('mouseout', () => {
    marquee.style.animationPlayState = 'running';
});
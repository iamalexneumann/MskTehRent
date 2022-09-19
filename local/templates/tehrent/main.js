document.addEventListener('DOMContentLoaded', function () {
    const navbarToggler = document.querySelector('.navbar-toggler');

    navbarToggler.addEventListener('click', function () {
        const navbarTogglerIcon = navbarToggler.querySelector('.navbar-toggler__icon .fa-solid');

        if (navbarTogglerIcon.classList.contains('fa-bars')) {
            navbarTogglerIcon.classList.remove('fa-bars');
            navbarTogglerIcon.classList.add('fa-xmark');
        } else {
            navbarTogglerIcon.classList.remove('fa-xmark');
            navbarTogglerIcon.classList.add('fa-bars');
        }
    })
});
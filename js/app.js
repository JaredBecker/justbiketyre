// Side menu functionality
function toggleSideMenu() {
    let body = document.querySelector('.body');
    let sideMenu = document.querySelector('.side_menu');
    let shadowLayer = document.querySelector('.shadow_layer');

    if (sideMenu.classList.contains('opened')) {
        sideMenu.classList.remove('opened');
        sideMenu.classList.add('closed');
        sideMenu.setAttribute('aria-expanded', false);
        shadowLayer.classList.remove('show');
        body.classList.remove('overflow');
    } else if (sideMenu.classList.contains('closed')) {
        sideMenu.classList.remove('closed');
        sideMenu.classList.add('opened');
        shadowLayer.classList.add('show');
        sideMenu.setAttribute('aria-expanded', true);
        body.classList.add('overflow');
    }
}

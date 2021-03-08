addEventListener('DOMContentLoaded', () => {
    const btn__menu = document.querySelector('.btn__menu')
    if (btn__menu) {
        btn__menu.addEventListener('click', () => {
            const menu__items = document.querySelector('.menu__items')
            menu__items.classList.toggle('show')
        })
    }
})
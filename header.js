const navBtn = document.querySelector('.header__logo__nav__icon')
const btnTitleNavs = document.querySelectorAll('.nav__container__header__item')
const btnContentNavs = document.querySelectorAll('.nav__container__content__body')
const closeNav = document.querySelector('.nav__bgr')
const inputSearch = document.querySelector('.header__search__input input')
const btnCloseSearch = document.querySelector('.header__search__overlay')
const userBtn = document.querySelector('.header__users__acc')

inputSearch.onfocus = function() {
    document.querySelector('.header__search').style.backgroundColor = "white"
    btnCloseSearch.classList.add('active')
}

btnCloseSearch.onclick = function() {
    document.querySelector('.header__search').style.backgroundColor = "#f6f6f6"
    btnCloseSearch.classList.remove('active')
}

userBtn.onclick = function() {
    
    document.querySelector('.header__users__list').classList.toggle('isOpen')
    userBtn.preventDefault()
}

navBtn.onclick = function() {
    navBtn.classList.toggle('isOpen')
    document.querySelector('.nav').classList.toggle('isOpen')
}

closeNav.onclick = function() {
    document.querySelector('.nav').classList.remove('isOpen')
    navBtn.classList.remove('isOpen')
}

btnTitleNavs.forEach((btn,index) =>{
    const btnContentNav = btnContentNavs[index]
    btn.onclick = function() {
        document.querySelector('.nav__container__header__item.active').classList.remove('active')
        document.querySelector('.nav__container__content__body.active').classList.remove('active')

        this.classList.add('active')
        btnContentNav.classList.add('active')
    }
}) 
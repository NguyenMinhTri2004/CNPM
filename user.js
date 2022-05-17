const tagUsers = document.querySelectorAll('.user__content__left__link')
const contentUsers = document.querySelectorAll('.user__right__content')



tagUsers.forEach((tag,index) => {
    const contentUser = contentUsers[index]
    tag.onclick = function() {
        document.querySelector('.user__content__left__link.active').classList.remove('active')
        document.querySelector('.user__right__content.active').classList.remove('active')
        this.classList.add('active')
        contentUser.classList.add('active')
    }
})
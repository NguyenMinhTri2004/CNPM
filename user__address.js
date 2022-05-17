const openEditBtns = document.querySelectorAll(".user__address__edit")
const closeEditBtn = document.querySelector("#user__address__edit__btn")
const closeSecondEditBtn = document.querySelector('#user__address__edit__bgr')

const openAddBtn = document.querySelector('.user__right__address__add')
const closeAddBtn = document.querySelector("#user__address__add__btn")
const closeSecondAddBtn = document.querySelector('#user__address__add__bgr')

const defaultBtns = document.querySelectorAll('.user__address__default')


 
// event form sửa user__address
openEditBtns.forEach((btn, index) => {
    btn.onclick = function() {
        document.querySelector('#user__address__edit__form').classList.add('isOpen')
    }
});

closeEditBtn.onclick = function() {
    document.querySelector('#user__address__edit__form').classList.remove('isOpen')
}

closeSecondEditBtn.onclick = function() {
    document.querySelector('#user__address__edit__form').classList.remove('isOpen')
}


// event form thêm user__address
openAddBtn.onclick = function() {
    document.querySelector('#user__address__add__form').classList.add('isOpen')
}

closeAddBtn.onclick = function() {
    document.querySelector('#user__address__add__form').classList.remove('isOpen')
}

closeSecondAddBtn.onclick = function() {
    document.querySelector('#user__address__add__form').classList.remove('isOpen')
}

//event đặt làm địa chỉ mặc định
document.querySelector('.user__address__default.active').innerText = 'Địa chỉ mặc định'
defaultBtns.forEach((btn,index) => {
    const addressDeafaults = document.querySelectorAll('.user__right__address__card')
    const addressDeafault = addressDeafaults[index]
    btn.onclick = function() {
        document.querySelector('.user__address__default.active').innerText = 'Chọn làm địa chỉ mặc định'
        document.querySelector('.user__right__address__card.active').classList.remove('active')
        document.querySelector('.user__address__default.active').classList.remove('active')
        addressDeafault.classList.add('active')
        btn.classList.add('active')
        btn.innerText = 'Địa chỉ mặc định'
        
    }
})

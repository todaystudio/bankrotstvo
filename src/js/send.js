const forms = document.querySelectorAll('.callback-form')
forms.forEach(i => i.addEventListener('submit', e => {
    e.preventDefault()
    const name = e.target.querySelector('[name="name"]')
    const phone = e.target.querySelector('[name="phone"]')
    const btn = e.target.querySelector('button')
    btn.innerHTML = "Отправляем..."
    sendForm(name, phone, btn)
}))

const sendForm = async (name, phone, btn) => {
    const title = document.querySelectorAll('.form-title-h5')
    try {
        let data = new FormData()
        data.append('name', name.value)
        data.append('phone', phone.value)
        const res = await fetch('../../send.php', {
            method: 'POST',
            body: data
        })

        if (res.status === 200) {
            name.value = ''
            phone.value = ''
            name.classList.add('display-none')
            phone.classList.add('display-none')
            title.forEach(i => i.innerHTML = "Спасибо! Мы свяжемся с Вами в ближайшее время")
            btn.innerHTML = 'Отправлено!'
            btn.classList.add('done-gradient')
        }
    } catch (e) {
        console.log(e)
        btn.innerHTML = 'Что-то пошло не так...'
    }
}
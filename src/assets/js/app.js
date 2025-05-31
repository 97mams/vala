const btnNotification  = document.getElementById('btn-notification')
const cardNotification = document.getElementById('notification')

btnNotification.addEventListener('click', (e) => {
  cardNotification.classList.toggle('hidden')

})
const clicker = document.querySelector('#clicker');
const menu = document.querySelector('#menu');

clicker.addEventListener('click', () => {
    if(menu.classList.contains('hidden')){
        menu.classList.remove('hidden')
    } else{
        menu.classList.add('hidden')
    }
})

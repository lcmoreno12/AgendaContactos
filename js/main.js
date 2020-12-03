const contactos = document.getElementsByClassName('contactos');

const btn_show_datos = document.getElementsByClassName('show-datos');

for(let i = 0; i < btn_show_datos.length; i++) {
    btn_show_datos[i].addEventListener('click', e => {
        e.preventDefault();
        let datos = contactos[i];

        for(let j = 0; j < contactos.length; j++) {
            if(contactos[j].innerHTML != datos.innerHTML) {
                contactos[j].classList.add('hide');
            }
        }

        datos.classList.toggle('hide');
    });
}
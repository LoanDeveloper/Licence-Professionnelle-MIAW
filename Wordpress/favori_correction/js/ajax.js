// js pure en utilisant fetch

const fav = document.querySelector('#fav');
if (fav) {
    const livreId = fav.getAttribute('data-livre')
    // fetch nécessite de formatter les données avant de les envoyer
    const form = new FormData()
    form.append('action', 'toggle_favori')
    form.append('livreId', livreId)
    const params = new URLSearchParams(form)

    fav.addEventListener("click", (e) => {
        const requestOptions = {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Cache-Control': 'no-cache',
            },
            body: params
        }
        fetch(ajaxurl, requestOptions)
            .then(response => response.json())
            .then(() => {
                fav.classList.toggle('favori-on')
                fav.classList.toggle('favori-off')
            })
    })
}
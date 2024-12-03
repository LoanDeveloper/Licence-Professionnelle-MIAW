let M = {
    section: undefined,
    sectionState: 0,

    events: undefined,
    eventsState: 0,

    totalWidthSlider: 0,
    sliderDuration: 20,
    avis: [],
    avisState: 0,

    avisCenter: undefined,
    avisLeft: undefined,
    avisRight: undefined,


}

let V = {
    sliderSection: document.querySelector('.section'),
    init: function() {

        const sectionArrows = document.querySelectorAll('#sliderArrow')
        sectionArrows.forEach(element => {

            element.addEventListener('click', C.clickSectionArrow)
        });

        window.addEventListener('resize', C.test)

    },

}


let C = {
    index: undefined,
    avisContainer: document.querySelector('.livre__container'),
    avis: document.querySelectorAll('.livre__item'),


    init: function() {
        C.test()
        V.init()
        C.slider()

        const elements = document.querySelectorAll('.slider__item')
        M.section = elements.length

        const events = document.querySelectorAll('.recolte')
        M.events = events.length

        C.getGoldenBook()

    },

    test: function() {
        if (window.matchMedia("(min-width: 768px)").matches) {
            M.avisLeft = '2.5vw'
            M.avisRight = '-55.5vw'
            M.avisCenter = '-26.5vw'
            C.avisContainer.style.left = M.avisCenter

            console.log('ui')

        } else {
            M.avisLeft = '-44.5vw'
            M.avisRight = '-152.5vw'
            M.avisCenter = '-98.5vw'
            C.avisContainer.style.left = M.avisCenter

        }
    },

    getGoldenBook: function() {
        M.avis = []

        C.avisContainer.style.transition = '0s'

        C.avisContainer.style.left = M.avisCenter


        this.avis.forEach(element => {
            element.classList.remove('livre__item--active')
            M.avis.push(element)
        });
        this.avisContainer.innerHTML = ""

        if (M.avisState >= 2 && M.avisState < M.avis.length) {
            C.dropGoldenAvis(M.avisState - 2)
        } else {
            C.dropGoldenAvis(M.avis.length - 2 + M.avisState)
        }

        if (M.avisState >= 1 && M.avisState < M.avis.length) {

            C.dropGoldenAvis(M.avisState - 1)
        } else {
            C.dropGoldenAvis(M.avis.length - 1 + M.avisState)
        }


        for (let i = M.avisState; i < 3 + M.avisState; i++) {
            C.dropGoldenAvis(i % M.avis.length)
        }


        const livreItem = document.querySelectorAll('.livre__item')

        livreItem[2].classList.add('livre__item--active')
        livreItem[3].dataset.direction = "right"
        livreItem[1].dataset.direction = "left"


        livreItem.forEach(element => {
            element.addEventListener('click', C.clickGoldenBook)
        });

    },

    clickGoldenBook: function(ev) {
        C.avisContainer.style.transition = '0.5s'

        selectedAvis = document.querySelector('.livre__item--active')
        selectedAvis.classList.remove('livre__item--active')
        ev.currentTarget.classList.add('livre__item--active')

        // Vreification de la direction 
        if (ev.currentTarget.dataset.direction == 'left') {
            if (M.avisState == 0) {
                M.avisState = M.avis.length - 1
            } else {

                M.avisState = M.avisState - 1
            }
            // C.avisContainer.classList.remove('.livre__container--center')

            C.avisContainer.style.left = M.avisLeft
        } else if (ev.currentTarget.dataset.direction == 'right') {
            // C.avisContainer.classList.remove('.livre__container--center')

            C.avisContainer.style.left = M.avisRight
            if (M.avisState == M.avis.length - 1) {
                M.avisState = 0

            } else {

                M.avisState = M.avisState + 1
            }
        }

        // else {
        //     // M.avisCurrentState = 0
        // }
        setTimeout(() => {
            C.getGoldenBook()
        }, 500);
    },

    dropGoldenAvis: function(id) {
        // M.avis[id].dataset.id = id
        // if (id == M.avisState) {
        //     M.avis[id].classList.add('livre__item--active')
        //     M.avis[id].dataset.direction = "none"
        // } else if (id == M.avisState + 1) {
        //     M.avis[id].dataset.direction = "right"
        // } else {
        //     M.avis[id].dataset.direction = "left"
        // }
        this.avisContainer.appendChild(M.avis[id])
    },
    clickSectionArrow: function(ev) {

        // Definition des variables
        var direction = ev.currentTarget.dataset.direction
        var sliderName = ev.currentTarget.dataset.slider
        var slider = undefined


        // Si le slider des sections est sélectionné
        if (sliderName == "section") {
            slider = document.querySelector('.slider__container')
                // Verification de la direction du slider (ici gauche)
            if (direction == 'left') {

                // Verification de l'avancement du slider 
                if (M.sectionState != 0) {
                    M.sectionState = M.sectionState - 1
                    slider.style.left = -100 * M.sectionState + 'vw'
                } else {
                    M.sectionState = M.section - 1
                    slider.style.left = -100 * M.sectionState + 'vw'
                }

            } else {

                if (M.sectionState != M.section - 1) {
                    M.sectionState = M.sectionState + 1
                    slider.style.left = -100 * M.sectionState + 'vw'
                } else {
                    M.sectionState = 0
                    slider.style.left = -100 * M.sectionState + 'vw'

                }
            }
        } else if (sliderName == "events") {
            slider = document.querySelector('.recoltes__items')

            // Verification de la direction du slider (ici gauche)

            if (direction == 'left') {
                // Verification de l'avancement du slider 
                if (M.eventsState != 0) {
                    M.eventsState = M.eventsState - 1
                    slider.style.left = -100 * M.eventsState + 'vw'
                } else {
                    M.eventsState = M.events - 1
                    slider.style.left = -100 * M.eventsState + 'vw'
                }

            } else {
                if (M.eventsState != M.events - 1) {
                    M.eventsState = M.eventsState + 1
                    slider.style.left = -100 * M.eventsState + 'vw'
                } else {
                    M.eventsState = 0
                    slider.style.left = -100 * M.eventsState + 'vw'

                }
            }
        }


    },

    slider: function() {
        M.totalWidthSlider = 0
        sliderImg = document.querySelectorAll('.confiance__slider img')
        slider = document.querySelector('.confiance__slider')
        slider.style.transition = M.sliderDuration + 's linear'
        sliderImg.forEach(element => {
            img = window.getComputedStyle(element)
            M.totalWidthSlider = M.totalWidthSlider
            width = img.getPropertyValue('width')
            width = width.slice(0, -2);
            width = parseInt(width)
            M.totalWidthSlider = M.totalWidthSlider + width + 42

        });

        slider.style.left = -M.totalWidthSlider / 2 + 'px'

        setTimeout(() => {
            slider.style.transition = "0s"
            slider.style.left = '0px'
            setTimeout(() => {
                this.slider()

            }, 40);


        }, M.sliderDuration * 1000);
    },
}



C.init();
let M = {

        petaleInit: [{ "top": 50, "left": 5 }, { "top": 5, "left": 75 }, { "top": 85, "left": 75 }],
        petales: undefined,

        start: new Date(2023, 10 - 1, 25, 12, 0).getTime(),
        active: "",
        release: new Date(2023, 12 - 1, 22, 0, 0).getTime(),
        size: undefined,

    }
    // console.log(petale1)
    // petale1.style.top = 50 + 'vh'
    // petale1.style.left = 5 + 'vw'
    // console.log(petale1.style.left)

// petale2 = document.querySelector('#petale2')
// petale2.style.top = 5 + 'vh'
// petale2.style.left = 75 + 'vw'

// petale3 = document.querySelector('#petale3')
// petale3.style.top = 85 + 'vh'
// petale3.style.left = 75 + 'vw'

let C = {
    init: function() {
        V.init()
        this.test()

    },

    getCoord: function() {

    },

    petals: function(ev) {
        // Sélection de toutes les pétales 
        M.petales = document.querySelectorAll('.petale')

        // Detection de la position du curseur
        cursorLeft = ev.clientX
        cursorTop = ev.clientY

        // Récupération de la taille du canvas
        compStyles = window.getComputedStyle(V.canvas);
        winWidth = parseInt(compStyles.getPropertyValue('width').slice(0, -2))
        winHeight = parseInt(compStyles.getPropertyValue('height').slice(0, -2))

        // Création d'une unité responsive
        vh = winHeight / 100
        vw = winWidth / 100

        amp = 2

        // Vérification du placement de la souris par rapport à l'image et placement
        for (let i = 0; i < M.petaleInit.length; i++) {

            // Calcul la proportionnalité du déplacement
            addLeft = (cursorLeft - M.petaleInit[i].left) / winWidth
            addTop = (cursorTop - M.petaleInit[i].top) / winHeight

            // petale1 = document.querySelector('#petale1')

            // Vérification si la souris est en haut en bas à droite ou à gauche de chaque image
            if (cursorLeft - M.petaleInit[i].left > 0) {
                M.petales[i].style.left = M.petaleInit[i].left * vw + addLeft * amp * vw + 'px'
            } {
                M.petales[i].style.left = M.petaleInit[i].left * vw - addLeft * amp * vw + 'px'
            }

            if (cursorTop - M.petaleInit[i].top > 0) {
                M.petales[i].style.top = M.petaleInit[i].top * vh + addTop * amp * vw + 'px'
            } else {
                M.petales[i].style.top = M.petaleInit[i].top * vh - addTop * amp * vw + 'px'
            }
        }
    },
    test: function() {
        if (window.matchMedia("(min-width: 768px)").matches) {
            M.size = "large"
        } else {
            M.size = "small"
        }

        this.time()
    },

    time: function() {

        if (M.size == "large") {
            progressWidth = 40
            objectWidth = 3.5
        } else {
            progressWidth = 70
            objectWidth = 8
        }


        M.active = Date.now()

        let total = M.release - M.start
        let diff = M.active - M.start

        percent = (diff / total) * 100
        size = (percent / 100) * progressWidth

        let progressBar = document.querySelector('.progressBar__in')
        progressBar.style.width = 0 + "vw"
        progressBar.style.transition = "2s";

        progressBar.style.width = size + "vw"

        let lotus = document.querySelector('.progressBar__lotus')
        lotus.style.left = 0 + "vw"
        lotus.style.transition = "2s ";
        lotus.style.left = (size - objectWidth) + "vw"


        let percentContainer = document.querySelector('.progressBar__percentContainer')
        percentContainer.style.left = 0 + "vw"
        percentContainer.style.transition = "2s ";
        percentContainer.style.left = (size - objectWidth) + "vw"

        this.getPercent(percent)

    },
    // oui
    getPercent: function(percent) {
        percentTime = 2000 / percent
        let currentPercent = 1
        var time = setInterval(() => {
            currentPercent++
            if (currentPercent > percent - 1) {
                clearInterval(time);
            }
            this.formatTemplate(currentPercent)
        }, percentTime)

    },

    formatTemplate: function(percent) {

        let container = document.querySelector('.progressBar__percentContainer')

        let html = document.querySelector('.progress__template').innerHTML
        html = html.replace('{{percent}}', Math.trunc(percent) + " %");
        container.innerHTML = html

    }


}


let V = {

    ctx: null,
    canvas: null,

    init: function() {
        // Initialisation du canvas
        V.canvas = document.querySelector("canvas");
        V.ctx = canvas.getContext('2d');
        V.ctx.height = canvas.height;
        V.ctx.width = canvas.whidth;

        // Ajout d'un évènement permettant d'activer la fonction 'C.petals' lors du passage de la couris sur le canvas
        this.canvas.addEventListener('mousemove', C.petals)
            // console.log(Window)
        window.addEventListener('resize', this.resize)


    },

    resize: function() {
        // console.log('ui')

        // petale1 = document.querySelector('#petale1')
        // console.log(petale1)
        // petale1.style.top = 50 + 'vh'
        // petale1.style.left = 5 + 'vw'
        // console.log(petale1.style.left)

        // petale2 = document.querySelector('#petale2')
        // petale2.style.top = 5 + 'vh'
        // petale2.style.left = 75 + 'vw'

        // petale3 = document.querySelector('#petale3')
        // petale3.style.top = 85 + 'vh'
        // petale3.style.left = 75 + 'vw'

        C.test()

    },


}

C.init();
/*=============== SHOW MENU ===============*/
const   navMenu = document.getElementById('nav-menu'),
        navToggle = document.getElementById('nav-toggle'),
        navClose = document.getElementById('nav-close')

    navToggle.addEventListener('click' , () =>{
        navMenu.classList.add('show-menu')
    })

    navClose.addEventListener('click' , () =>{
        navMenu.classList.remove('show-menu')
    })

/*=============== REMOVE MENU MOBILE ===============*/
const link = document.querySelectorAll('.nav__link') 

const Active = () =>{
    navMenu.classList.remove('show-menu')
}
link.forEach(n => n.addEventListener('click' , Active))

/*=============== ADD BLUR TO HEADER ===============*/
const BlurHeader = () =>{
    const headers = document.getElementById('header')

    this.scrollY >= 50 ?headers.classList.add('blur-header')
                       :headers.classList.remove('blur-header')
}
window.addEventListener('scroll' , BlurHeader)

/*=============== SHOW SCROLL UP ===============*/ 
const scrollUp = () =>{
    const scrollup = document.getElementById('scroll-up')
     
    this.scrollY >= 350 ?scrollup.classList.add('show-scroll')
                        :scrollup.classList.remove('show-scroll')
}
window.addEventListener('scroll' , scrollUp)

/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
const sections = document.querySelectorAll('section[id]')

const scrollActive = () =>{
    const scrollDown = window.scrollY

    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight,
        sectionsTop = current.offsetTop - 58,
        sectionsId = current.getAttribute('id'),   
        sectionsClass = document.querySelector('.nav__menu a[href*=' + sectionsId + ']')

        if(scrollDown > sectionsTop && scrollDown <= sectionsTop + sectionHeight){
            sectionsClass.classList.add('active-link')
        } else{
            sectionsClass.classList.remove('active-link')
        }
    })
}
window.addEventListener('scroll' , scrollActive);

/*=============== SCROLL REVEAL ANIMATION ===============*/
const sr = ScrollReveal({
    origin: 'top',
    distance: '60px',
    duration: 3000,
    delay: 400,
})
sr.reveal(`.home__data , .explore__data, .explore__user , .footer__container`)
sr.reveal(`.home__card` , {delay:600 , distance: '100px' , interval: 100})
sr.reveal(`.about__data , .join__image` , {origin:'right'})
sr.reveal(`.about__image , .join__data` , {origin:'left'})
sr.reveal(`.popular__card` , {interval: 200})
$(document).ready(() => {
    //Setting movie slider navigation buttons, using Owl Carousel Plugin
    let movieSlidernavigationButtons = ["<i class='bx bx-chevron-left'></i>", "<i class='bx bx-chevron-right'></i>"]
    

    //This will display specific number of movies based on the sreen size
    $('.movies-slide').owlCarousel({
        items: 2,
        navText: movieSlidernavigationButtons,
        nav:true,
        margin: 15,
        responsive: {
            500: {
                items: 3
            },
            1300: {
                items: 4
            },
            1550: {
                items: 6
            }
        }
    })

    //Mobile menu, when screen is resized to mobile screen sizes or viewed on mobile phones.
    $('#hamburger-menu').click(() => {
        $('#hamburger-menu').toggleClass('active')
        $('#nav-menu').toggleClass('active')
    })
})

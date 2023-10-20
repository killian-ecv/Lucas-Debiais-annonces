import Swiper from "swiper";
import {Navigation, Pagination} from "swiper/modules";

export default () => {
    const swipers = document.querySelectorAll('.swiper-imgs-ad')

    if(!swipers) return

    swipers.forEach(swiper => {
        new Swiper(swiper, {
            modules: [Navigation, Pagination],

            pagination: {
                el: '.swiper-pagination',
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        })
    })
}

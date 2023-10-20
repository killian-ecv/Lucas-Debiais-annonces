import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

import swiperImagesAd from './modules/swiperImagesAd'

import inputFilesModifications from './modules/inputFilesModifications'

window.onload = () => {
    swiperImagesAd()
    inputFilesModifications()
}

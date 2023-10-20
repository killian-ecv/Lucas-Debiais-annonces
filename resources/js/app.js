import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import inputFilesModifications from './modules/inputFilesModifications'

window.onload = () => {
    inputFilesModifications()
}

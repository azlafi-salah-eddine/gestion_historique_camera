// resources/js/app.js
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import './bootstrap';
import '../css/app.css';



// set the dropdown menu element
const $targetEl = document.getElementById('user-dropdown');


// set the element that trigger the dropdown menu on click
const $triggerEl = document.getElementById('user-menu-button');

// options with default values
const options = {
    placement: 'bottom',
    triggerType: 'click',
    offsetSkidding: 0,
    offsetDistance: 10,
    delay: 300,
    ignoreClickOutsideClass: false,
    onHide: () => {
        console.log('dropdown has been hidden');
    },
    onShow: () => {
        console.log('dropdown has been shown');
    },
    onToggle: () => {
        console.log('dropdown has been toggled');
    },
};

// instance options object
const instanceOptions = {
  id: 'dropdownMenu',
  override: true
};
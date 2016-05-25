
// https://github.com/t4t5/sweetalert/blob/master/dist/sweetalert-dev.js
var hasClass = function hasClass(elem, className) {
    return new RegExp(' ' + className + ' ').test(' ' + elem.className + ' ');
};

var removeClass = function removeClass(elem, className) {
    var newClass = ' ' + elem.className.replace(/[\t\r\n]/g, ' ') + ' ';
    if (hasClass(elem, className)) {
        while (newClass.indexOf(' ' + className + ' ') >= 0) {
            newClass = newClass.replace(' ' + className + ' ', ' ');
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, '');
    }
};

// Reset icon animations
var $successIcon = document.querySelector('.sa-icon.sa-success');
removeClass($successIcon, 'animate');
removeClass($successIcon.querySelector('.sa-tip'), 'animateSuccessTip');
removeClass($successIcon.querySelector('.sa-long'), 'animateSuccessLong');

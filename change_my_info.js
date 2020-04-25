(function() {
    const FOCUSABLE_SELECTORS = 'a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, *[tabindex], *[contenteditable]';
    let modal = document.getElementById('dialog_s');
    let dialog = document.querySelector('dialog');
    function open_modal_save() {
        modal.style.opacity='1';
        modal.style.visibility='visible';
        modal.querySelector(FOCUSABLE_SELECTORS).focus();
        document.getElementById('main_info').style.filter='blur(2px)';
        document.getElementsByClassName('sidebar')[0].style.filter='blur(2px)';
    }
    function close_modal_open() {
        modal.style.opacity='0';
        modal.style.visibility='hidden';
        document.getElementById('main_info').style.filter='none';
        document.getElementsByClassName('sidebar')[0].style.filter='none';
    }
    modal.classList.add('modal--visible');
    // Find all focusable children
    var focusableElementsString = 'a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex="0"], [contenteditable]';
    var focusableElements = modal.querySelectorAll(focusableElementsString);
    // Convert NodeList to Array
    focusableElements = Array.prototype.slice.call(focusableElements);

    // The first focusable element within the modal window
    var firstTabStop = focusableElements[0];
    // The last focusable element within the modal window
    var lastTabStop = focusableElements[focusableElements.length - 1];
    // Focus the window
    firstTabStop.focus();
    // Add keydown event
    modal.addEventListener('keydown', function(e) {
        // Listen for the Tab key
        if (e.keyCode === 9) {
            // If Shift + Tab
            if (e.shiftKey) {
                // If the current element in focus is the first focusable element within the modal window...
                if (document.activeElement === firstTabStop) {
                    e.preventDefault();
                    // ...jump to the last focusable element
                    lastTabStop.focus();
                }
                // if Tab
            } else {
                // If the current element in focus is the last focusable element within the modal window...
                if (document.activeElement === lastTabStop) {
                    e.preventDefault();
                    // ...jump to the first focusable element
                    firstTabStop.focus();
                }
            }
        }

        // Close the window by pressing the Esc-key
        if(e.keyCode === 27) {
            close_modal_open();
        }
    });
    var save_btn = document.getElementById('save_dialog');
    var close = document.querySelector('.round');
    let close1 = document.querySelector('.ex1');

    save_btn.addEventListener('click', open_modal_save);
    close.addEventListener('click',close_modal_open);
    close1.addEventListener('click', close_modal_open);
})();
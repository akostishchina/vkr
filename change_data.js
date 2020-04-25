(function () {
    'use strict';
    var btn = document.getElementById('up_login');
    var modal = document.getElementById('change_log_or_pass');
    var exit = document.getElementsByClassName('exit2')[0];
    btn.onclick = function () {
        modal.style.display = 'flex';
    }
    exit.onclick = function () {
        modal.style.display = 'none';
    }
})();
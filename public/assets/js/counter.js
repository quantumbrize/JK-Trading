/***************Counter***************/
var timeleft = 50;
var downloadTimer = setInterval(function () {
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if (timeleft <= 0) {
        clearInterval(downloadTimer);
    }
}, 1000);
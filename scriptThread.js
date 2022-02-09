var header = document.getElementById("header");
var content = document.getElementById("content");
var makeThread = document.getElementById("makeMessage");
var thread = document.getElementById("message");

content.style.top = window.pageYOffset + 200 + "px";
content.style.width = window.innerWidth / 1 + "px"
header.style.width = window.innerWidth / 1 + "px";
header.style.height = window.innerHeight / 6 + "px";
header.style.top = window.pageYOffset + 10 + "px";

var contentInterval;
window.onload = function contentAufklappen() {
    contentInterval = setInterval(loop, 30);

    contentHeight = 100;
    content.style.height = contentHeight + "px";

    var speed = 1;

    function loop() {
        if (contentHeight < window.innerHeight / 1) {
            speed++
            contentHeight += speed;
            content.style.height = contentHeight + "px";

        }
    }
}





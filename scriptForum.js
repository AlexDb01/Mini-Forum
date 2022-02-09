var content = document.getElementById("contentForum");
var header = document.getElementById("header");
var makeThread = document.getElementById("makeThread");
var thread = document.getElementById("thread");

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

    boolean = false;
    makeThreadOpacity = 0;
    makeThread.style.opacity = makeThreadOpacity + "%";

    threadOpacity = 0;
    thread.style.opacity = threadOpacity + "%";

    var speed = 1;

    function loop() {
            if (contentHeight < window.innerHeight / 1) {
                speed++
                contentHeight += speed;
                content.style.height = contentHeight + "px";
                boolean = true;
            }

            if(boolean == true){
                if(makeThreadOpacity < 100){
                    speed++
                    makeThreadOpacity += speed;
                    makeThread.style.opacity = makeThreadOpacity + "%" ;
                }

                if(threadOpacity < 100){
                    speed++
                    threadOpacity += speed;
                    thread.style.opacity = threadOpacity + "%" ;
                }
            }


        }



}
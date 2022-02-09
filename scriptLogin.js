var forms = document.getElementById("forms");
var title = document.getElementById("title");
var login = document.getElementById("loginArea");
var register = document.getElementById("registerArea");

forms.style.top = window.pageYOffset + 200 + "px";
title.style.width = window.innerWidth / 1 + "px";
title.style.height = window.innerHeight / 6 + "px";
title.style.top = window.pageYOffset + 10 + "px";

var formsInterval;
window.onload = function formsAufklappen() {
    formsInterval = setInterval(loop, 24);

    formsHeight = 0;
    forms.style.height = formsHeight + "px";

    formsWidth = 0;
    forms.style.width = formsWidth + "px";
    width = false;

    boolean = false;
    loginOpacity = 0;
    login.style.opacity = loginOpacity + "%";

    registerOpacity = 0;
    register.style.opacity = loginOpacity + "%";

    var speed = 1;

    function loop() {
        if (formsWidth < window.innerWidth / 1.2 - 50) {
            speed++
            formsWidth += speed;
            forms.style.width = formsWidth + "px";
        }

        if (formsWidth > window.innerWidth / 1.2 - 48 || formsWidth == window.innerWidth / 1.2 - 48) {
            width = true;
        }

        if (width == true) {
            if (formsHeight < window.innerHeight / 1.8) {
                speed++
                formsHeight += speed;
                forms.style.height = formsHeight + "px";
                boolean = true;
            }
        }

        if(boolean == true){
            if(registerOpacity < 100){
                speed++
                registerOpacity += speed;
                register.style.opacity = registerOpacity + "%" ;
            }

            if(loginOpacity < 100){
                speed++
                loginOpacity += speed;
                login.style.opacity = loginOpacity + "%" ;
            }
        }

    }
}

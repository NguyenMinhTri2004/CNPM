function arrowOfStc() {
    const hadArrow = document.querySelector('#menu-left ul li:last-child .arrow-icon');
    var arrowNode = document.createElement("i");
    arrowNode.classList.add('bx', 'bxs-chevron-left', 'menu-left-icon', 'arrow-icon');
    if(hadArrow == null) {
        document.querySelector('#menu-left ul li:last-child').appendChild(arrowNode);
    }
    else {
        document.querySelector('#menu-left ul li:last-child').removeChild(document.querySelector('#menu-left ul li:last-child').lastElementChild);
    }
}

var menuWidth = document.getElementById("menu-left").offsetWidth;
document.getElementById("menu-icon").onclick = function() {
    if(document.getElementById("mini-menu").style.display == 'flex') {
        document.getElementById("mini-menu").style.display = 'none';
    }
    let iconOpts = document.querySelectorAll("#menu-left");
    iconOpts.forEach(element => {
        element.classList.toggle('active');
    });
    document.getElementById("logo").classList.toggle('active')
    document.getElementById('header-img').classList.toggle('active')
    let leftIconMenu = document.querySelectorAll("#menu-left .menu-left-icon");
    leftIconMenu.forEach(element => {
        if(element.style.paddingRight !== "16px")
            element.style.paddingRight = "16px";
        else
            element.style.paddingRight = "0"
    });
    arrowOfStc();
}

document.querySelector('#menu-left ul li:last-child').onclick = function() {
    if(document.querySelector("#menu-left ul li:last-child .arrow-icon").classList.contains("bxs-chevron-left")) {
        document.querySelector("#menu-left ul li:last-child .arrow-icon").classList.remove("bxs-chevron-left");
        document.querySelector("#menu-left ul li:last-child .arrow-icon").classList.add("bxs-chevron-down");
    }
    else {
        document.querySelector("#menu-left ul li:last-child .arrow-icon").classList.remove("bxs-chevron-down");
        document.querySelector("#menu-left ul li:last-child .arrow-icon").classList.add("bxs-chevron-left");
    }
    if(document.getElementById("mini-menu").style.display == 'flex') {
        document.getElementById("mini-menu").style.display = 'none';
    }
    else {
        document.getElementById("mini-menu").style.display = 'flex';
    }
}



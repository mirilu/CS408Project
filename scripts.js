function changetoPop() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('mainpage').setAttribute('class', 'is-blurred')
    login('show');

}

function showInput() {
    if(document.getElementById("user_input").value == ""){
        document.getElementById('display').innerHTML =
            "guest" + Math.floor((Math.random() * 10000) + 1);
    }
    else{   
    document.getElementById('display').innerHTML =
            document.getElementById("user_input").value;
}
    login('hide');

}

function giveUsername() {
    document.getElementById('display').innerHTML =
            "guest" + Math.floor((Math.random() * 10000) + 1);
    login('hide');
}

function login(showhide) {
    if (showhide === "show") {
        document.getElementById('popup').style.visibility = "visible";
    } else if (showhide === "hide") {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('mainpage').setAttribute('class', 'null')
        document.getElementById('popup').style.visibility = "hidden";

    }
}
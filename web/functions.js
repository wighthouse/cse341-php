//functions

function clickMe() {
    alert("Clicked!");
}

//change div color

function changeBoxColor() {
    var textbox_id = "colorChange";
    var textbox = document.getElementById(textbox_id);

    var div_id = "div1";
    var div = document.getElementById(div_id);

    var color = textbox.value;
    div.style.backgroundColor = color;
}
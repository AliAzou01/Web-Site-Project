var compteurimages = 1;
var totalimages = 7;

function slider(x) {
    
    var image=document.getElementById('img');
    compteurimages=compteurimages + x;
    image.src="image/slider"+compteurimages+".jpg";

    if (compteurimages>=totalimages) {
        compteurimages=1;
    }
    if (compteurimages<1) {
        compteurimages=totalimages;
    }
    
}

function sliderauto() {
    
    var image=document.getElementById('img');
    compteurimages=compteurimages + 1;
    image.src="image/slider"+compteurimages+".jpg";

    if (compteurimages>=totalimages) {
        compteurimages=1;
    }
    if (compteurimages<1) {
        compteurimages=totalimages;
    }
    
}
window.setInterval(sliderauto,3000);
/*Quantity incrementer */
var counter = 0;

function incrementer() {
    counter++;
    localStorage.setItem("counter", counter);
    document.getElementById("quantityInc").innerHTML = localStorage.getItem("counter");
}

function decrementer() {
    counter > 0 ? counter-- : counter;
    localStorage.setItem("counter", counter);
    document.getElementById("quantityInc").innerHTML = localStorage.getItem("counter");
}

/*product deitals img slider */
$(".slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    asNavFor: ".slider-nav",
});
$(".slider-nav").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".slider-for",
    dots: true,
    focusOnSelect: true,
});


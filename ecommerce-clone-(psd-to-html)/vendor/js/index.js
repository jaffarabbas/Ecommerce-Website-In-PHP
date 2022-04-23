/*Quantity incrementer */
var counter = 0;

function inputValue() {
    document.getElementById("quantityInc").value = counter;
}

function incrementer() {
    counter++;
    inputValue();
}

function decrementer() {
    counter > 0 ? counter-- : counter;
    inputValue();
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
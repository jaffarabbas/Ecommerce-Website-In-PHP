/*Quantity incrementer */
var counter = 1;

function inputValue() {
    document.getElementById("quantityInc").value = counter;
}

//set counter value through out the website
function checkCounter() {
    var val = document.getElementById("quantityInc").value;
    val > 0 ? counter = val : counter = 0;
}

function incrementer() {
    checkCounter();
    counter++;
    inputValue();
    //update total price
    subTotal();
}

function decrementer() {
    checkCounter();
    counter > 0 ? counter-- : counter;
    inputValue();
    //update total price
    subTotal();
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
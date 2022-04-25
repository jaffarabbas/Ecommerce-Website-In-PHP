/*Quantity incrementer */
var counter = 1;

function formSubmit(id) {
    document.getElementById(id).submit();
}

function inputValue(id) {
    console.log(id);
    document.getElementById("quantityInc_" + id).value = counter;
}

//set counter value through out the website
function checkCounter(id) {
    var val = document.getElementById("quantityInc_" + id).value;
    val > 0 ? counter = val : counter = 0;
}

function incrementer(id) {
    checkCounter(id);
    counter++;
    inputValue(id);
    //update total price
    subTotal();
    formSubmit("quantityForm");
    formSubmit("quantityFormCheckout");
}

function decrementer(id) {
    checkCounter(id);
    counter > 0 ? counter-- : counter;
    inputValue(id);
    subTotal();
    //update total price
    formSubmit("quantityForm");
    formSubmit("quantityFormCheckout");
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
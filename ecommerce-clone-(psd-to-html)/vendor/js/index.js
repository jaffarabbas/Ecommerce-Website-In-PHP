/*Quantity incrementer */
var counter = 1;

function formSubmit(id) {
    // console.log("formSubmit" + id);
    document.getElementById(id).submit();
}

function inputValue(id) {
    // console.log("inputValue" + id);
    // console.log(id);
    document.getElementById("quantityInc_" + id).value = counter;
}

//set counter value through out the website
function checkCounter(id) {
    // console.log("checkCounter" + id);
    var val = document.getElementById("quantityInc_" + id).value;
    val > 0 ? counter = val : counter = 0;
    // console.log(counter);
}

function incrementer(id) {
    // console.log("sadasd" + id);
    checkCounter(id);
    counter++;
    inputValue(id);
    //update total price
    subTotal();
    formSubmit("quantityForm");
}

function decrementer(id) {
    checkCounter(id);
    counter > 0 ? counter-- : counter;
    inputValue(id);
    //update total price
    subTotal();
    formSubmit("quantityForm");
}

/*product deitals img slider */
// function silder() {
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
// }

// silder();
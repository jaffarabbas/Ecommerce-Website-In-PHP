var iprice = document.getElementsByClassName('iprice');
var iquantity = document.getElementsByClassName('iquantity');
var itotal = document.getElementsByClassName('totalPriceCart');
var grandTotal = document.getElementById('grandTotal');

function subTotal() {
    var grandTotalValue = 0;
    for (i = 0; i < iprice.length; i++) {
        itotal[i].innerText = (iprice[i].value * iquantity[i].value);
        grandTotalValue += parseInt(itotal[i].innerText);
    }
    grandTotal.innerText = grandTotalValue + " Rs";
}

subTotal();

function getPriceValues() {
    var price = document.getElementById('ctprice');
    var total = document.getElementById('grandTotal');
    var totalPiceWithTax = document.getElementById("totalPriceWithTax");
    var tprice = document.getElementById("tprice");
    var gtotal = document.getElementById("gtprice");
    var totalPriceWithTaxPicker = document.getElementById("totalPriceWithTaxPicker");

    totalPiceWithTax.innerHTML = parseFloat(totalPriceWithTaxPicker.value) + parseFloat(total.innerHTML) + " Rs";
    tprice.value = price.innerHTML;
    gtotal.value = total.innerHTML;
}

getPriceValues();
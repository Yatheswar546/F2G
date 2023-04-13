var Ver4 = parseInt(navigator.appVersion) == 4
var Ver4Up = parseInt(navigator.appVersion) >= 4
var Nav4 = ((navigator.appName == "Netscape") && Ver4)
var modifiable
// calculate and display a row's total
function showTotal(qtyList) {
    var qty = qtyList.options[qtyList.selectedIndex].value
    var prodID = qtyList.name
    var total = "RS." +
        (qty * parseFloat(qtyList.form.elements[prodID + "Price"].value))
    var newCellHTML = "<SPAN CLASS='total'>" + total + "</SPAN>"

    if (Nav4) {
        document.layers[prodID + "TotalWrapper"].document.layers[prodID +
            "Total"].document.write(newCellHTML)
        document.layers[prodID + "TotalWrapper"].document.layers[prodID +
            "Total"].document.close()
    } else if (modifiable) {
        if (document.all) {
            document.all(prodID + "Total").innerHTML = newCellHTML
        } else {
            document.getElementById(prodID + "Total").innerHTML = newCellHTML
        }
    }
}
// initialize global flag for browsers capable of modifiable content
function init() {
    modifiable = (Ver4Up && document.body && document.body.innerHTML)
}
// display content for all products (e.g., in case of Back navigation)
function showAllTotals(form) {
    for (var i = 0; i < form.elements.length; i++) {
        if (form.elements[i].type == "select-one") {
            showTotal(form.elements[i])
        }
    }
}


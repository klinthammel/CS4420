function action(action, product) {
    var xmlHttp = new XMLHttpRequest();
    var quant = 0;
    if (action == "add") {
        var addToId = product.replace('/[^a-z0-9\.]+/i', "_").replace(" ","_").toLowerCase();
        var e = document.getElementById("quantity_" + addToId);
        quant = e.options[e.selectedIndex].value;
    }
    xmlHttp.open( "GET", "api.php?action=" + action + "&item=" + product + "&quantity=" + quant, false ); // false for synchronous request
    xmlHttp.send( null );
    var result = xmlHttp.responseText.search("done");
    if (result) {
        alert("Complete!");
        location.reload();
    }
    else {
        alert("There was an error try again!");
    }
}
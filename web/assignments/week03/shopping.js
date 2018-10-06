// javascript function to add additional menu to shopping pages
$(document).ready(function () {
    $("#totals").empty();
    $("#totals").append("<div class='col'><h3>Your Shopping Cart is currently Empty!</h3><br/><h4>Try navigating to the "
    + "<a href='browse.php'>Catalog</a> to select something to buy.</h4></div>");
});
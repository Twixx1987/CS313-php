// javascript function to add additional menu to shopping pages
$(document).ready(
    function () {
        // establish the string for the additional item
        var addedItem = "<li class=\"nav-item flex-sm-fill text-sm-center\">";
        addedItem = addedItem + "<a class=\"nav-link menu-items flex-sm-fill text-sm-center btn btn-secondary\"";
        addedItem = addedItem + " role=\"button\" href=\"/cart.php\">Cart</a></li>";
        // append the item
        $("#navigation").append(addedItem);
        // establish the string for the next item
        addedItem = "<li class=\"nav-item dropdown flex-sm-fill text-sm-center\">";
        addedItem = addedItem + "<a class=\"nav-link menu-items flex-sm-fill text-sm-center dropdown-toggle btn btn-secondary\"";
        addedItem = addedItem + "role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">";
        addedItem = addedItem + "Teach Assignments</a><div class=\"dropdown-menu\"><a class=\"dropdown-item menu btn btn-secondary\"";
        addedItem = addedItem + " role=\"button\" href=\"/assignments/assignments.php\">Assignments Home</a>";
        addedItem = addedItem + "<a class=\"dropdown-item menu btn btn-secondary\" role=\"button\" href=\"/assignments/week02/teach02.php\">";
        addedItem = addedItem + "Teach 02 - Web Refresher</a><a class=\"dropdown-item menu btn btn-secondary\" role=\"button\"";
        addedItem = addedItem + " href=\"/assignments/week03/teach03.php\">Teach 03 - PHP Forms</a></div></li>";
        // append the second item
        $("#navigation").append(addedItem);
    });
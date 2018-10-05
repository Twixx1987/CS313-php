// javascript function to add additional menu to shopping pages
$(document).ready(
    function () {
        // remove the contents of the navigation list
        $("#navigation").empty();

        // add a link back to the Hobby page and links to the shopping pages
        // establish the string for the additional items
        var addedItem = "<li class=\"nav-item flex-sm-fill text-sm-center\">";
        addedItem = addedItem + "<a class=\"nav-link menu-items flex-sm-fill text-sm-center btn btn-secondary\"";
        addedItem = addedItem + " role=\"button\" href=\"/homepage.php\">Hobby</a></li>";
        addedItem = addedItem + "<li class=\"nav-item dropdown flex-sm-fill text-sm-center\">";
        addedItem = addedItem + "<a class=\"nav-link menu-items flex-sm-fill text-sm-center dropdown-toggle btn btn-secondary\"";
        addedItem = addedItem + "role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">";
        addedItem = addedItem + "Catalog</a><div class=\"dropdown-menu\"><a class=\"dropdown-item menu btn btn-secondary\"";
        addedItem = addedItem + " role=\"button\" href=\"/assignments/week03/coffins.php\">Coffins</a>";
        addedItem = addedItem + "<a class=\"dropdown-item menu btn btn-secondary\" role=\"button\" href=\"/assignments/week03/computers.php\">";
        addedItem = addedItem + "Computers</a><a class=\"dropdown-item menu btn btn-secondary\" role=\"button\"";
        addedItem = addedItem + " href=\"/assignments/week03/tools.php\">Tools</a></div></li>";
        addedItem = addedItem + "<li class=\"nav-item flex-sm-fill text-sm-center\">";
        addedItem = addedItem + "<a class=\"nav-link menu-items flex-sm-fill text-sm-center btn btn-secondary\"";
        addedItem = addedItem + " role=\"button\" href=\"/assignments/week03/cart.php\">Cart</a></li>";
        // append the new menu items
        $("#navigation").append(addedItem);
    });
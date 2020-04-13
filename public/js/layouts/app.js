$('.hamburger').click(function() {
    $(".dropdown-mobile").toggle();
});

$('.hamburger').click(function() {
    $(".hamburger span:eq(0)").toggleClass("first");
});

$('.hamburger').click(function() {
    $(".hamburger span:eq(1)").toggleClass("second");
});

$('.hamburger').click(function() {
    $(".hamburger span:eq(2)").toggleClass("third");
});

function openMenu(evt, item) {
    // Declare all variables
    var i, tabcontent, tablink;

    //Get all elements with class="tabcontent" and show them
    // tabcontent = document.getElementsByClassName("tabcontent");
    // for (i =0; i < tabcontent.length; i++) {
    //     tabcontent[i].style.display = "none";
    // }
    console.log("Current Nav Item CLicked");
    //Get all elements with class="tablink" and remove the class active
    tablink = document.getElementsByClassName("current");
    for (i =0; i < tablink.length; i++) {
        tablink[i].className = tablink[i].className.replace("active", "");
    }

    // Show the surrent tab, and add an :active" class to the button tehat opened the tab
    // document.getElementById(item).style.display ="block";
    evt.currentTarget.className += " active";
}
// document.getElementById("default").click();

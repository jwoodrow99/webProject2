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

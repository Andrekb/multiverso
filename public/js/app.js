window.onload = function(){ 
    var userBtn = document.getElementById("user-btn");
    var dropdown = document.getElementById("dropdown");


    userBtn.addEventListener("mouseenter", function( event ) {
        dropdown.classList.add("dropdown--active");
    });

    dropdown.addEventListener("mouseleave", function( event ) {
        dropdown.classList.remove("dropdown--active");
    });
}
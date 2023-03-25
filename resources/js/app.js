var userBtn = document.getElementById("user-btn");
var dropdown = document.getElementById("dropdown");


userBtn.addEventListener("mouseenter", function( event ) {
    dropdown.classList.add("dropdown--active");
});// // reset the color after a short delay
// setTimeout(function() {
//     event.target.style.color = "";
// }, 500);
// }, false);


// this handler will be executed every time the cursor is moved over a different list item
dropdown.addEventListener("mouseleave", function( event ) {
    dropdown.classList.remove("dropdown--active");
});
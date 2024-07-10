
var pages = [
    "filmler1.html",
    "filmler2.html",
    "filmler3.html",
    "filmler4.html",
    "filmler5.html",
    "filmler6.html",
    "filmler7.html",
    "filmler8.html",
    "filmler9.html",
    "filmler10.html",
    "filmler11.html",
    "filmler12.html",
    "filmler13.html",
    "filmler14.html",
    "filmler15.html",
    "filmler1.html",
    "filmler2.html",
    "filmler3.html",
    "filmler4.html",
    "filmler5.html",
    "filmler6.html",
    "filmler7.html",
    "filmler8.html",
    "filmler9.html",
    "filmler10.html",
    "filmler11.html",
    "filmler12.html",
    "filmler13.html",
    "filmler14.html",
    "filmler15.html",
    
    
    
];


function openRandomPage() {
    
    var randomIndex = Math.floor(Math.random() * pages.length);
    var randomPage = pages[randomIndex];
    
   
    window.location.href = randomPage;
}


document.getElementById("randomButton").addEventListener("click", openRandomPage);

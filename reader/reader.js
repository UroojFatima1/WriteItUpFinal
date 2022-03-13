
var search_icon = document.querySelector(".search-r");
var search_box = document.querySelector(".search-box");
var logo = document.querySelector(".logonav");
var list_items = document.querySelector(".nav");
search_icon.addEventListener("click", toggle);
var dropdown=document.querySelector(".dp");
var menu=document.querySelector(".menu");
dropdown.addEventListener("click",show_menu);
function show_menu(){
if(menu.style.display=="none"){
    menu.style.display="block";
}
else{
    menu.style.display="none";
}
}
function toggle() {
    search_box.style.display = "flex";
    search_box.style.margin = "auto";
    search_icon.style.display = "none";
    logo.style.display = "none";
    list_items.style.display = "none";
}
/*var poster=document.getElementsByClassName("poster");
for (const book of poster) {
    book.addEventListener('click',function(){
        window.location.href = 'writeup_details.php';
    });
}
function loadStory() {
    //let cover="<?php echo $result["coverPage"];?>";
    //console.log(cover);
    window.location.href='writeup_details.php';
}*/
$(document).ready(function() {
    $("#search").keyup(function() {
        var name = $('#search').val();
        if (name == "") { 
            $("#result").html("");}
        else {
            $.ajax({
                type: "POST",
                url: "search.php",
                data: {search: name},
                success: function(html) {
                    //Assigning result to "display" div in "search.php" file.
                    $("#result").html(html).show();
                }
            });
        }
    });
 }); 
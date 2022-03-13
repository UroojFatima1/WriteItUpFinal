
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
image.addEventListener("change",(event) =>{var img = document.getElementById('output');
img.src = URL.createObjectURL(event.target.files[0]);
img.style.display="block";
p.style.display="none";
btn.style.display="flex";
})
btn.addEventListener("click",clear)
function clear(){var img = document.getElementById('output');
btn.disabled = true;
img.src="";
img.style.display="none";
p.style.display="block";
btn.style.display="none";}

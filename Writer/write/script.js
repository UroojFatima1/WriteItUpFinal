$(document).ready(function(){
    function autosave(){
        var chap=$('#chap').val();
        var story=$('#story').val();
        var id=$('#id').val();
        if (chap!='' && story!=''){
            $.ajax({
                url:"writeback.php",
                method:"POST",
                data:{chapterNumber:chap,text:story,id:id},
                dataType:"text",
                success:function(data){
                    if (data!=''){$('#id').val(data);}
                    $('#autosave').text("Saved as draft");
                    setInterval(function(){
                        $('#autosave').text('');
                    },2000);
                }
            });
        }
    }
    setInterval(function(){
        autosave();
    },2000);
});
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
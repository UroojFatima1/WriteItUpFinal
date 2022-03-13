
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

const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");
console.log(sendBtn);
form.onsubmit = (e)=>{
    e.preventDefault();
}
inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}


sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
             inputField.value="";
             scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter=()=>{
  chatBox.classList.add("active");
}
chatBox.onmouseleave=()=>{
  chatBxc.classList.remove("active");
}
setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
              scrollToBottom();
            }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
  }, 500); //runs frequently after 500ns
  
  

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}



function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }


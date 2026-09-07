document.getElementById("clear").addEventListener("click", function(event) {
    event.preventDefault();
    var c = confirm("Are you sure you want to clear this?");
    const form = document.getElementById("addpostform");
    if (c == true) {
        form.reset();
    }
});

document.getElementById("addpostform").addEventListener("submit" , function(event){
    title = document.getElementById("title");
    content = document.getElementById("content");
    titleerror = document.getElementById("titleerror")
    contenterror = document.getElementById("contenterror")
    if(title.value.trim() == "" || title.value == null){
        title.style.border = "2px solid red";
        titleerror.innerHTML = "<font color='red'>Title is Required</font>";
        event.preventDefault()
    }
    if(content.value.trim() == "" || content.value == null){
        content.style.border = "2px solid red";
        contenterror.innerHTML = "<font color='red'>Content is Required</font>";
        event.preventDefault()  
    }
})


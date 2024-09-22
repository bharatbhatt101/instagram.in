window.addEventListener("load",function(){
    var loader= document.getElementById("pre");
    
        if(loader)
        {
            loader.style.transition="opacity 0.5s ease";
            loader.style.opacity="0";
            window.location.href="reg.php";
            setTimeout(function(){
                loader.style.display="none";
            });
        }
    
    });
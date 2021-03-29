   function showMe(x){
        document.getElementById('modal_img').src = x;
    }
    function stateChange(){
        var btn = document.getElementById('bg_change');
        if(btn.style.display == "block"){
            btn.style.display = "none";
        }else{
            btn.style.display = "block";
        }
    }
    
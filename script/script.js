function home_load(role){
    if(role == "admin"){
        document.getElementById("profile").style.display = "none";
        document.getElementById("add-hrd").style.display = "block";
        document.getElementById("list-calon").style.display = "none";
        document.getElementById("data-calon-input").style.display = "none";
    }else if(role == "calon"){
        document.getElementById("profile").style.display = "block";
        document.getElementById("add-hrd").style.display = "none";
        document.getElementById("list-calon").style.display = "none";
        document.getElementById("data-calon-input").style.display = "block";
    }else if(role == "hrd"){
        document.getElementById("profile").style.display = "block";
        document.getElementById("add-hrd").style.display = "none";
        document.getElementById("list-calon").style.display = "block";
        document.getElementById("data-calon-input").style.display = "none";
    }
}

function load_list_pegawai(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("list-calon-pegawai").innerHTML = this.responseText;
        };
    };

    xmlhttp.open("GET", "../script/get-list-pegawai.php", true);
    xmlhttp.send();
}

function load_posisi_available(status){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("posisi").innerHTML = this.responseText;
        };
    };

    xmlhttp.open("GET", "../script/get-posisi.php?status=" + status, true);
    xmlhttp.send();
}
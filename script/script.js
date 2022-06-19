function home_load(role){
    if(role == "admin"){
        document.getElementById("profile").style.display = "none";
        document.getElementById("add-hrd").style.display = "block";
        document.getElementById("list-calon").style.display = "none";
        document.getElementById("data-calon-input").style.display = "none";
        document.getElementById("agenda").style.display = "none";
    }else if(role == "calon"){
        document.getElementById("profile").style.display = "block";
        document.getElementById("add-hrd").style.display = "none";
        document.getElementById("list-calon").style.display = "none";
        document.getElementById("data-calon-input").style.display = "block";
        document.getElementById("lihat-agenda").style.display = "block";
        document.getElementById("tambah-agenda").style.display = "none";
    }else if(role == "hrd"){
        document.getElementById("profile").style.display = "block";
        document.getElementById("add-hrd").style.display = "none";
        document.getElementById("list-calon").style.display = "block";
        document.getElementById("data-calon-input").style.display = "none";
        document.getElementById("lihat-agenda").style.display = "block";
        document.getElementById("tambah-agenda").style.display = "block";
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

function load_list_agenda(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            document.getElementById("list-agenda").innerHTML = this.responseText;
        };
    };

    xmlhttp.open("GET", "../script/get-agenda.php", true);
    xmlhttp.send();
}

function agenda_check(role){
    $(document).ready(function() {
        if(role == "hrd"){
            $(".modifier-button").show();
        }else if(role == "calon"){
            $(".modifier-button").hide();
        }
    });
}

function edit_agenda(key){
    location.href="./change-agenda.php?key=" + key;
}

function hapus_agenda(key){
    var isDelete = confirm("Delete Data?");

    if(isDelete){
        location.href="../script/delete-agenda.php?key=" + key;
    }else{
        location.href="../page/list-agenda.php";
    }
}
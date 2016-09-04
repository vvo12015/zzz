function myFunction() {
    currentDate();
    document.getElementById("namePreview").innerHTML = document.getElementById("name").value;
    document.getElementById("emailPreview").innerHTML = document.getElementById("email").value;
    document.getElementById("messagePreview").innerHTML = document.getElementById("message").value;
    document.getElementById("datePreview").innerHTML = document.getElementById("input_date").value;;
    document.getElementById("preview").style.display = "block";
}

function currentDate(){
    d = new Date(Date());
    document.getElementBuId("input_date").value=d.toGMTString();
}

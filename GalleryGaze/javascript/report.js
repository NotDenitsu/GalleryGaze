function closeReport(reportBoxId){
    var reportBox = document.getElementById("id"+reportBoxId);
    reportBox.style.display="none";
}

function openReport(reportBoxId){
    var reportBox = document.getElementById("id"+reportBoxId);
    alert(reportBox + " id"+reportBoxId);
    reportBox.style.display="block";
    
}
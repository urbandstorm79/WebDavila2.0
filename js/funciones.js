function getId(id) {
    var valor=document.getElementById("numRow");
    valor.write("<p><?php $id="+id+"?></p>");
    alert(id);
}
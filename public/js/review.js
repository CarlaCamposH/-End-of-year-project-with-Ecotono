
document.getElementById("send_button").onclick = function ()
{
    var txt;
    txt = document.getElementById('comentario').value;
    var text = txt.split(".");
    var str = text.join('.</br>');
    document.write(str);  
}


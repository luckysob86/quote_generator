<?php ?>
<!DOCTYPE html>
<!-- Created by: Patrick Richardson-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Quote Generator</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <script src="js/script.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="bannerDiv">
            <h2>Quote Generator</h2>
        </div>
        <div id="paraDiv">
            <p>Click the button to view quotes from this crotchety bastard</p>
        </div>
        <div id="containerDiv">
            <div id="photoContainerDiv">
                <img id="mowens" src="./images/IMG_0063.JPG" alt="mowens"/>
            </div>
            <div id="responseFieldDiv">
                <p id="textField"></p>
            </div>
            <button onclick="getQuotes()" type="button">Click Me</button>
        </div>
    </body>
</html>
<script>

var getQuotes = function(){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var response = xmlhttp.responseText;
            var json = JSON.parse(response);
            var elementCount = json["quotes"].length - 1;
            var num = randomIntFromInterval(0, elementCount);
            document.getElementById('textField').innerHTML=json["quotes"][num]["value"];
        }
    }
    
    xmlhttp.open("GET", "./js/quotes.json", true);
    xmlhttp.send();
}


</script>

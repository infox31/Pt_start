var count = 0;
document.getElementById("button").onclick = function() {
    count++;
    if (count % 2 == 0) { 
        document.getElementById("text").style.color = "red";
        document.getElementById("button").textContent = "йоу";
    } else {
        document.getElementById("text").style.color = "black";
        document.getElementById("button").textContent = "(-_-)";
    }
}
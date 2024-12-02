document.addEventListener("DOMContentLoaded", loadDOM)
function loadDOM(){ 
    displaySearch()
}
function displaySearch(){
    document.getElementById('lookup').addEventListener ("click",()=> {
        var userinput = document.getElementById("country").value;
        let query = Sanitize(userinput);
        let reqst = new Request("world.php?country="+query+"&lookup=country");
        fetch(reqst)
            .then(response => response.text())
            .then(data => {
                console.log(data)
                document.getElementById("result").innerHTML = data;
            });
    }
    )

    document.getElementById('lookupcity').addEventListener ("click",()=> {
        var userinput = document.getElementById("country").value;
        let query = Sanitize(userinput);
            let reqst = new Request("world.php?country="+query+"&lookup=cities");

            fetch(reqst)
            .then(response => response.text())
            .then(data => {
                console.log(data)
                document.getElementById("result").innerHTML = data;
            });


})
}

function Sanitize(str) {
    str = str.replace(/[^a-z0-9áéíóúñü \.,_-]/gim, " ");
    return str.trim();
}

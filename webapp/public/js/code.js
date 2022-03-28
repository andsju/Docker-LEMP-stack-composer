let hello = "Hello World - says JavaScript";
console.log(hello);
document.body.append(hello);


// Auhtenticate Azure
// Use html elements to keep serverside session credentials 
const azureContent = document.getElementById("azureContent");
const btnAzureUserEvents = document.getElementById("btnAzureUserEvents");

if (btnAzureUserEvents !== null) {
    btnAzureUserEvents.addEventListener("click", handleAzureUserEvents);
}

// handle authentication - use fetch API
function handleAzureUserEvents() {

    let azureAccessToken = document.getElementById("azureAccessToken");

    // https://developer.microsoft.com/en-us/graph/graph-explorer
    fetch("https://graph.microsoft.com/v1.0/me/events", {
        headers: {
            'Authorization': 'Bearer ' + azureAccessToken.value
        }
    }).then((data) =>  {

        return data.json();
    }).then((result) => {
        console.log("a", result);

        if (result.hasOwnProperty("error")) {
            console.log(result.error.code);
            document.getElementById("authenticationToken").innerText = "Access token expired - please sign again";
            document.getElementById("authenticationToken").classList.toggle("hidden");
        }

        azureContent.innerText = "";

        // iterate
        if (result.hasOwnProperty("value")) {
            result.value.forEach(element => {
                azureContent.innerHTML += "<div>" + element.subject + "</div>";
            });
        }
    });

}
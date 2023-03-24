function FanOnClick(){
    let url = "httpRequestHandler.php?url=charge/getChargeStateData"
    consoleLogAjaxResponse("GET", url)
}


function consoleLogAjaxResponse(method, url){
    let ajaxCall = new XMLHttpRequest();
    ajaxCall.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText)
        }
    };
    ajaxCall.open(method, url, true);
    ajaxCall.send();
}

function sendRequest(url){
    const req = new XMLHttpRequest()
    req.open("GET", url)
    req.setRequestHeader("Accept", "application/json")
    req.setRequestHeader("Content-Type", "application/json")

    req.onreadystatechange = () => {
        if(req.readyState === 4) {
            //console.log(req.responseText)
            const res = JSON.parse(req.responseText)
            if(res?.result){
                //window.alert(`Action : ${req.responseURL} réalisé avec succes ${res?.result}`)
                switch (true) {
                    case req.responseURL.includes("Openings/postActuateTrunk/rear"):
                        if(res?.result) {
                            document.querySelector("#openRearLabel").innerText === "OUVRIR" ? document.querySelector("#openRearLabel").innerText = "FERMER" : document.querySelector("#openRearLabel").innerText = "OUVRIR"
                        }
                        break
                    case req.responseURL.includes("Openings/postActuateTrunk/front"):
                        if(res?.result) {
                            document.querySelector("#openFrontLabel").innerText === "OUVRIR" ? document.querySelector("#openFrontLabel").innerText = "FERMER" : document.querySelector("#openFrontLabel").innerText = "OUVRIR"
                        }
                        break
                }
                return
            }
            return window.alert(`Erreur mdr`)
        }
    }

    req.send()

}
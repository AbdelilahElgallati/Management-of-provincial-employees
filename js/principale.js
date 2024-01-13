let rech = document.querySelector(".recherche");

let req = new XMLHttpRequest()

function sendAjax(requestType, datas = "") {
    return new Promise(function(resolve) {
        req.open("POST", "./tools.php", false)
        req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")
        req.onreadystatechange = () => {
            if (req.readyState == 4 && req.status == 200) {
                resolve(JSON.parse(req.responseText));
            }
        }
        req.send(`requestType=${requestType}&requestData=${datas}`)
    })
}

rech.addEventListener("click", (e) => {
    let type = document.querySelector(".type").value;
    let val = document.querySelector(".valeur").value;
    if (type == "CIN") type = "cin";
    else if (type == "date de naissance") type = "date_nais";
    else if (type == "date d'affectation") type = "date_aff";
    else if (type == "PPR") type = "ppr";
    else if (type == "division") type = "aff_div";
    else if (type == "AAL") type = "aff_aal";
    let data = {};
    data["type"] = type;
    data["val"] = val;
    sendAjax("getspecific", JSON.stringify(data)).then((res) => {
        let em = "";
        if (res.length == 0) {

            em = `
                <tr>
                    <td colspan="13"> l'information recherché n'existe pas </td>
                </tr>
            `
        } else {
            for (var i in res) {
                if (res[i]["aff_div"] == null)
                    res[i]["aff_div"] = "";
                if (res[i]["aff_aal"] == null)
                    res[i]["aff_aal"] = "";
                if (res[i]["ppr"] == null)
                    res[i]["ppr"] = "";
                em += `
                <tr>
                    <td>${res[i]["nom"]}</td>
                    <td>${res[i]["prenom"]}</td>
                    <td>${res[i]["cin"]}</td>
                    <td>${res[i]["date_nais"]}</td>
                    <td>${res[i]["date_aff"]}</td>
                    <td>${res[i]["budget"]}</td>
                    <td>${res[i]["ppr"]}</td>
                    <td>${res[i]["grade"]}</td>
                    <td>${res[i]["echelle"]}</td>
                    <td>${res[i]["aff_div"]}</td>
                    <td>${res[i]["aff_aal"]}</td>
                    <td>
                        <form action="detail.php" method="POST">
                            <input type="hidden" name="id" value='${res[i]["id"]}' />
                            <input type="submit" value="Détail" />
                        </form>
                        <form action="modifier.php" method="POST">
                            <input type="hidden" name="id" value='${res[i]["id"]}' />
                            <input type="submit" value="Modifier" />
                        </form>
                    </td>
                    <td>
                        <form action="./supprimer.php" method="POST">
                            <input type="hidden" name="id" value='${res[i]["id"]}' />
                            <input type="submit" name="suprimer" value="Supprimer" />
                        </form>
                        <form action="./imprimer.php" method="POST">
                            <input type="hidden" name="id" value='${res[i]["id"]}' />
                            <input type="submit" name="imprimer" value="Imprimer" />
                        </form>
                    </td>
                </tr>
            `
            }
        }
        document.querySelector("tbody").innerHTML = em;
    });
})
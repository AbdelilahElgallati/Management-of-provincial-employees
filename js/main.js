let nom = document.querySelector("#nom");
let prenom = document.querySelector("#prenom");
let cin = document.querySelector("#cin");
let date_nais = document.querySelector("#date_nais");
let date_aff = document.querySelector("#date_aff");
let budget = document.querySelector("#budget");
let ppr = document.querySelector("#ppr");
let grade = document.querySelector("#grade");
let echelle = document.querySelector("#echelle");
let aff_div = document.querySelector("#aff_div");
let aff_aal = document.querySelector("#aff_aal");
let affectation_div = document.querySelector("#div");
let affectation_aal = document.querySelector("#aal");
let radio = document.querySelectorAll(".radio");

nom.addEventListener("input", (e) => {
    if (nom.value != "") {
        prenom.disabled = false
    } else {
        prenom.value = null;
        prenom.disabled = true
        cin.value = null;
        cin.disabled = true
        date_nais.value = null;
        date_nais.disabled = true
        date_aff.value = null;
        date_aff.disabled = true
        budget.value = null;
        budget.disabled = true
        ppr.value = null;
        ppr.disabled = true
        grade.value = null;
        grade.disabled = true
        echelle.value = null;
        echelle.disabled = true
        affectation_aal.checked = false;
        affectation_aal.disabled = true
        affectation_div.checked = false;
        affectation_div.disabled = true
        aff_div.value = null;
        aff_div.disabled = true
        aff_aal.value = null;
        aff_aal.disabled = true
    }
})
prenom.addEventListener("input", (e) => {
    if (prenom.value != "") {
        cin.disabled = false
    } else {
        cin.value = null;
        cin.disabled = true
        date_nais.value = null;
        date_nais.disabled = true
        date_aff.value = null;
        date_aff.disabled = true
        budget.value = null;
        budget.disabled = true
        ppr.value = null;
        ppr.disabled = true
        grade.value = null;
        grade.disabled = true
        echelle.value = null;
        echelle.disabled = true
        affectation_aal.checked = false;
        affectation_aal.disabled = true
        affectation_div.checked = false;
        affectation_div.disabled = true
        aff_div.value = null;
        aff_div.disabled = true
        aff_aal.value = null;
        aff_aal.disabled = true
    }
})
cin.addEventListener("input", (e) => {
    if (cin.value != "") {
        date_nais.disabled = false
    } else {
        date_nais.value = null;
        date_nais.disabled = true
        date_aff.value = null;
        date_aff.disabled = true
        budget.value = null;
        budget.disabled = true
        ppr.value = null;
        ppr.disabled = true
        grade.value = null;
        grade.disabled = true
        echelle.value = null;
        echelle.disabled = true
        affectation_aal.checked = false;
        affectation_aal.disabled = true
        affectation_div.checked = false;
        affectation_div.disabled = true
        aff_div.value = null;
        aff_div.disabled = true
        aff_aal.value = null;
        aff_aal.disabled = true
    }
})
date_nais.addEventListener("input", (e) => {
    if (date_nais.value != "") {
        date_aff.disabled = false
    } else {
        date_aff.value = null;
        date_aff.disabled = true
        budget.value = null;
        budget.disabled = true
        ppr.value = null;
        ppr.disabled = true
        grade.value = null;
        grade.disabled = true
        echelle.value = null;
        echelle.disabled = true
        affectation_aal.checked = false;
        affectation_aal.disabled = true
        affectation_div.checked = false;
        affectation_div.disabled = true
        aff_div.value = null;
        aff_div.disabled = true
        aff_aal.value = null;
        aff_aal.disabled = true
    }
})
date_aff.addEventListener("input", (e) => {
    if (date_aff.value != "") {
        budget.disabled = false
    } else {
        budget.value = null;
        budget.disabled = true
        ppr.value = null;
        ppr.disabled = true
        grade.value = null;
        grade.disabled = true
        echelle.value = null;
        echelle.disabled = true
        affectation_aal.checked = false;
        affectation_aal.disabled = true
        affectation_div.checked = false;
        affectation_div.disabled = true
        aff_div.value = null;
        aff_div.disabled = true
        aff_aal.value = null;
        aff_aal.disabled = true
    }
})
budget.addEventListener("change", (e) => {
    if (budget.value != "") {
        grade.disabled = false
        if (budget.value == "BG") {
            ppr.disabled = false
        } else {
            ppr.value = null
            ppr.disabled = true
        }
    } else {
        ppr.value = null;
        ppr.disabled = true
        grade.value = null;
        grade.disabled = true
        echelle.value = null;
        echelle.disabled = true
        affectation_aal.checked = false;
        affectation_aal.disabled = true
        affectation_div.checked = false;
        affectation_div.disabled = true
        aff_div.value = null;
        aff_div.disabled = true
        aff_aal.value = null;
        aff_aal.disabled = true
    }
})
grade.addEventListener("change", (e) => {
    if (grade.value != "") {
        echelle.disabled = false
    } else {
        echelle.value = null;
        echelle.disabled = true
        affectation_aal.checked = false;
        affectation_aal.disabled = true
        affectation_div.checked = false;
        affectation_div.disabled = true
        aff_div.value = null;
        aff_div.disabled = true
        aff_aal.value = null;
        aff_aal.disabled = true
    }
})
echelle.addEventListener("change", (e) => {
    if (echelle.value != "") {
        affectation_aal.disabled = false
        affectation_div.disabled = false
    } else {
        affectation_aal.checked = false;
        affectation_aal.disabled = true
        affectation_div.checked = false;
        affectation_div.disabled = true
        aff_div.value = null;
        aff_div.disabled = true
        aff_aal.value = null;
        aff_aal.disabled = true
    }
})
for (const rad of radio) {
    rad.onclick = (e) => {
        if (e.target.value == "division") {
            aff_div.disabled = false
            aff_aal.value = null;
            aff_aal.disabled = true
        } else {
            aff_div.value = null;
            aff_div.disabled = true
            aff_aal.disabled = false;
        }
    }
}
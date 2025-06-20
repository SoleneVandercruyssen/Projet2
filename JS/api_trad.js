"use strict";

// const res = await fetch("https://fr.libretranslate.com/translate", {
// 	method: "POST",
// 	body: JSON.stringify({
// 		q: "",
// 		source: "auto",
// 		target: "fr",
// 		format: "text",
// 		alternatives: 3,
// 		api_key: ""
// 	}),
// 	headers: { "Content-Type": "application/json" }
// });

// console.log(await res.json());


async function traduireTexte(texte, langueCible) {
    if (!texte || !langueCible) {
        return "Erreur : texte ou langue manquant";
    }
    const res = await fetch("https://fr.libretranslate.com/translate", {
        method: "POST",
        body: JSON.stringify({
            q: texte,
            source: "auto",
            target: langueCible,
            format: "text",
            api_key: ""
        }),
        headers: { "Content-Type": "application/json" }
    });
    const data = await res.json();
    console.log(data);
    return data.translatedText || data.error || "Erreur de traduction";
}

 //Exemple : traduire le contenu d'un élément avec id="contenu"
async function traduirePage(langue) {
    const elements = document.querySelectorAll("[data-trad]");
    for (const el of elements) {
        const texte = el.innerText;
        const traduction = await traduireTexte(texte, langue);
        el.innerText = traduction;
    }
}

// Utilisation : traduire en anglais, chinois ou russe
// anglais : "en", chinois : "zh", russe : "ru"
document.getElementById("btn-en").onclick = () => traduirePage("en");
document.getElementById("btn-zh").onclick = () => traduirePage("zh");
document.getElementById("btn-ru").onclick = () => traduirePage("ru");
document.getElementById("btn-ja").onclick = () => traduirePage("ja");
document.getElementById("btn-hi").onclick = () => traduirePage("hi");
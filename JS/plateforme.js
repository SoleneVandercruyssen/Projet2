"use strict";

import { isWeekend } from "./date.js";

const calendar = document.querySelector("#app-calendar");

 // ! bien mettre "+=" SINON À chaque itération, on remplaces tout le contenu précédent par le nouveau jour. Et À la fin de la boucle, seul le dernier jour (30) reste affiché.
for (let day = 1; day <= 31; day++){

  const weekend = isWeekend(day);


  /* 
  * @param fonction nommée getNameDay avec en paramètre "day"
  * déclaration d'une constante "days" qui regroupe les jours de la semaine
  * Demande de retourner les jours de la semaine 
  */
function getNameDay(day) {
    const days = ["Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"];
    return days[(day - 1) % 7];
}



// // Affiche la ligne des jours de la semaine
// const days = ["Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"];
// for (let i = 0; i < days.length; i++) {
//     calendar.innerHTML += `<div class="name">${days[i]}</div>`;
// }



// Variable "name" vide
  let name = "";

if (day <= 7) { 
  const dayName = getNameDay(day); 
  name = `<div class="name">${dayName}</div>`;
}

  calendar.innerHTML += `<div class ="day ${weekend  ? "weekend"  : ""}"> ${name} ${day} </div>`;

  document.querySelectorAll("#app-calendar .day").forEach(
    day=>{
      day.addEventListener("click", event =>{
        event.currentTarget.classList.toggle('selected');
      })

    }
  );
  }
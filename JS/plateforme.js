"use strict";


const calendar = document.querySelector("#app-calendar");

const isWeekend = day => {
  return true;
}

for (let day = 1; day <= 31; day++){

  // ! bien mettre "+=" SINON À chaque itération, on remplaces tout le contenu précédent par le nouveau jour. Et À la fin de la boucle, seul le dernier jour (30) reste affiché.

  const weekend = isWeekend(day);
    calendar.innerHTML += `<div class ="day weekend"> ${day} </div>`;
}
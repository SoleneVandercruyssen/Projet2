"use strict";

// import { isWeekend } from "./date.js";

// const calendar = document.querySelector("#app-calendar");
// let currentDate = new Date();
//  // ! bien mettre "+=" SINON À chaque itération, on remplaces tout le contenu précédent par le nouveau jour. Et À la fin de la boucle, seul le dernier jour (30) reste affiché.
// function renderCalendar(date) {
//     calendar.innerHTML = "";
//     let html = `<h3>${date.toLocaleString('fr-FR', { month: 'long', year: 'numeric' })}</h3>`;
//     for (let day = 1; day <= 31; day++){

//   const weekend = isWeekend(day);

//   let name = "";
// if (day <= 7) { 
//   const dayName = getNameDay(day); 
//   name = `<div class="name">${dayName}</div>`;
// }
//     const year = date.getFullYear();
//     const month = date.getMonth();
//     let firstDay = new Date(year, month, 1).getDay();
// firstDay = (firstDay === 0) ? 6 : firstDay - 1; // Pour commencer la semaine le lundi
//     // Jours vides avant le 1er du mois
//     for (let i = 0; i < firstDay ;i++) html += '<td></td>';

//   calendar.innerHTML += `<div class ="day ${weekend  ? "weekend"  : ""}"> ${name} ${day} </div>`;
// }
//   document.querySelectorAll("#app-calendar .day").forEach(
//     day=>{
//       day.addEventListener("click", event =>{
//         event.currentTarget.classList.toggle('selected');
//       })
//     }
//   );

// function getNameDay(day) {
//     const days = ["Lun", "Mar", "Mer", "Jeu", "Ven", "Sam", "Dim"];
//     return days[(day - 1) % 7];
// }

// // renderCalendar(currentDate); est appelée au chargement de la page :
// document.addEventListener('DOMContentLoaded', function() {
//     renderCalendar(currentDate);
// });

// // Bouton "onclick", précédent"
// document.getElementById('prevMonth').addEventListener('click', function() {
//     currentDate.setMonth(currentDate.getMonth() - 1);
//     renderCalendar(currentDate);
//     console.log('Mois précédent cliqué, mois:', currentDate.getMonth() + 1);
    
// });

// // Bouton "onclick", "suivant"
// document.getElementById('nextMonth').addEventListener('click', function() {
//     currentDate.setMonth(currentDate.getMonth() + 1);
//     renderCalendar(currentDate);
//     console.log('Mois suivant cliqué, mois:', currentDate.getMonth() - 1);
// });

// }

// // Initialisation
// renderCalendar(currentDate)

// /* 
//   * @param fonction nommée getNameDay avec en paramètre "day"
//   * déclaration d'une constante "days" qui regroupe les jours de la semaine
//   * Demande de retourner les jours de la semaine 
//   */


// document.addEventListener('DOMContentLoaded', function() {
//   var calendarEl = document.getElementById('calendar');
//   var calendar = new FullCalendar.Calendar(calendarEl, {
//     initialView: 'dayGridMonth',
//     locale: 'fr',
//     events: [
//       // événements initiaux si besoin
//     ]
//   });
//   calendar.render();

//   
// });


document.addEventListener('DOMContentLoaded', function() {
  const calendarEl = document.getElementById('calendar');
  if (!calendarEl) return; // Stoppe tout si pas de calendrier 
  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'fr',
    events: []
  });
  document.getElementById('addEventBtn').addEventListener('click', function() {

    calendar.addEvent({
      title: 'Nouvel événement',
      start: new Date().toISOString().slice(0, 10), // aujourd'hui
      color: '#2DBBD4'
    });
  });
 


  // Gestion de la modale
  const modal = document.getElementById('eventModal');
  const openBtn = document.getElementById('addEventBtn');
  const closeBtn = document.getElementById('closeModal');
  const form = document.getElementById('eventForm');

  openBtn.addEventListener('click', function() {
    modal.style.display = 'flex';
  });

  closeBtn.addEventListener('click', function() {
    modal.style.display = 'none';
    form.reset();
  });

  // Ajout de l'événement au calendrier
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    const title = document.getElementById('eventTitle').value;
    const date = document.getElementById('eventDate').value;
    const color = document.getElementById('eventColor').value;

    if (title && date) {
      calendar.addEvent({
        title: title,
        start: date,
        color: color
      });
      modal.style.display = 'none';
      form.reset();
    }
  });

  // Fermer la modale si on clique en dehors du formulaire
  modal.addEventListener('click', function(e) {
    if (e.target === modal) {
      modal.style.display = 'none';
      form.reset();
    }
  });
   calendar.render();
});
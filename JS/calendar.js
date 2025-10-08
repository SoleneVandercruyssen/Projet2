"use strict";

document.addEventListener('DOMContentLoaded', function() {
  const calendarEl = document.getElementById('calendar');
  if (!calendarEl) return; // Stoppe tout si pas de calendrier 

  // initialisation d'une constante savedEvents 
  const savedEvents = JSON.parse(localStorage.getItem('calendarEvents')) || [];

  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'fr',
    events: savedEvents
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
    const date = document.getElementById('eventDate').value  + "T00:00:00";
    const color = document.getElementById('eventColor').value;

    if (title && date) {
      calendar.addEvent({
        title: title,
        start: date,
        color: color
      });

    // Sauvegarder dans localStorage
    let savedEvents = JSON.parse(localStorage.getItem('calendarEvents')) || [];
    savedEvents.push({ title, start: date, color });
    localStorage.setItem('calendarEvents', JSON.stringify(savedEvents));


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
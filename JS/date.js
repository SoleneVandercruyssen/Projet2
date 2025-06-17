"use strict";

const isWeekend = day => {
  // 6  =  Samedi ; 0 = Dimanche
  return day % 7 === 6 || day % 7 === 0;
}

export {isWeekend};
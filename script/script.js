// let searchbarPar = document.getElementById('slp');
// new simpleParallax(searchbarPar, {
// 	orientation: 'right'
// });

// let typed = new Typed('#typed',{
//   stringsElement: '#typed-strings',
//   typeSpeed: 10,
//   backSpeed: 40,
//   loop: true
// });

let lp = document.getElementById("lp");
let lpheaderpar = document.querySelector(".lpheaderpar");
let lpsearch = document.querySelector(".ais-SearchBox-input");
let lpheader = document.getElementById("lpheader");
let lpmain = document.getElementById("lpmain");
let hitid = document.getElementById("hitid");
let lpclose = document.querySelector("ais-SearchBox-reset");
let allforms = document.querySelectorAll("form");

lpsearch.addEventListener("focus", () => {
  lpmain.classList.remove("hidden");
});
lp.addEventListener("click", () => {
  lpmain.classList.add("hidden");
});

let umb = document.getElementById("user-menu-button");
let um = document.getElementById("user-menu");
let um2 = document.getElementById("user-menu2");
umb.addEventListener("click", () => {
  if (um.classList.contains("hidden")) {
    um.classList.remove("hidden");
  } else {
    um.classList.add("hidden");
  }
});
lp.addEventListener("click", () => {
  if (!um.classList.contains("hidden")) {
    um.classList.add("hidden");
  }
  // if (!(um2.classList.contains('hidden'))) {
  //     um2.classList.add("hidden");
  // }
});

let nt = document.querySelector("#navtog");
let mainnavbar = document.querySelector("#mainnavbar");
let navtogbool;

let navtog = () => {
  navtogbool = nt.ariaExpanded === "true";

  if (navtogbool) {
    um2.classList.remove("hidden");
    umb.classList.add("hidden");
  } else {
    um2.classList.add("hidden");
    umb.classList.remove("hidden");
  }
  // if (screen.width > 990) {
  //   um2.classList.add("hidden");
  //   umb.classList.remove("hidden");
  // }
};

setInterval(navtog, 500);


const daysSpan = document.getElementById("days");
const hoursSpan = document.getElementById("hours");
const minutesSpan = document.getElementById("minutes");
const secondsSpan = document.getElementById("seconds");

const countdownDate = new Date("2023-04-03T03:45:00.000Z"); // Monday, April 3rd 2023, 9:15 AM IST

function updateCountdown() {
  const currentDate = new Date();
  const difference = countdownDate - currentDate;

  const days = Math.floor(difference / 1000 / 60 / 60 / 24);
  const hours = Math.floor(difference / 1000 / 60 / 60) % 24;
  const minutes = Math.floor(difference / 1000 / 60) % 60;
  const seconds = Math.floor(difference / 1000) % 60;

  daysSpan.innerHTML = days.toString().padStart(2, "0");
  hoursSpan.innerHTML = hours.toString().padStart(2, "0");
  minutesSpan.innerHTML = minutes.toString().padStart(2, "0");
  secondsSpan.innerHTML = seconds.toString().padStart(2, "0");

  if (difference < 0) {
    clearInterval(countdownTimer);
    daysSpan.innerHTML = "00";
    hoursSpan.innerHTML = "00";
    minutesSpan.innerHTML = "00";
    secondsSpan.innerHTML = "00";
  }
}

updateCountdown();

const countdownTimer = setInterval(updateCountdown, 1000);

let mcAlert = document.querySelector('.mc-alert');
let mcAlertBtn = document.querySelector('.mc-alert > button');
mcAlertBtn.addEventListener('click',()=>{
  mcAlert.style.display = 'none';
});
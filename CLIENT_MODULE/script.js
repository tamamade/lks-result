const name = document.getElementById("name");
const enemy = document.getElementById("enemy");
const button = document.querySelector(".play-button");
const player2 = document.querySelector(".player-2-name");
const difficult = document.getElementById("difficulty");
const welcomeScreen = document.querySelector(".welcome-screen");
const hexScore = document.querySelector(".hex-score");
const score = document.querySelector(".score");
const playerName1 = document.querySelector(".player-1-nama");
const playerName2 = document.querySelector(".player-2-nama");

player2.style.display = "none";

let color = "#ec1153";
let hoveredColor = "";

let currentPlaying = {
  player1: "User",
  player2: "Bot",
  difficult: "easy",
  currTurn: "player1",
};

playerName1.innerHTML = currentPlaying.player1;
playerName2.innerHTML = currentPlaying.player2;

let currNum = null;

function randomNum() {
  currNum = Math.floor(Math.random() * 20) + 1;
  score.innerHTML = currNum;
  if (currentPlaying.currTurn == "player1") {
    hexScore.style.backgroundColor = "#ec1153";
  } else {
    hexScore.style.backgroundColor = "#3e8db1";
  }
}

randomNum();
name.addEventListener("input", () => {
  if (name.value) {
    button.disabled = false;
  } else {
    button.disabled = true;
  }
});

enemy.addEventListener("change", () => {
  if (enemy.value != "bot") {
    player2.style.display = "none";
  } else {
    player2.style.display = "block";
    if (name.value) {
      button.disabled = false;
    }
  }
});

button.addEventListener("click", () => {
  currentPlaying.player1 = name.value;
  currentPlaying.difficult = difficult.value;
  if (player2.style.display == "none") {
    currentPlaying.player2 = "bot";
  } else {
    const namePlayer2 = player2.querySelector("#player-2-input");
    currentPlaying.player2 = namePlayer2.value;
  }
  playerName1.innerHTML = currentPlaying.player1;
  playerName2.innerHTML = currentPlaying.player2;
  welcomeScreen.remove();
});

document.addEventListener("mouseover", (e) => {
  if (currentPlaying.currTurn == "player1") {
    hoveredColor = "#ec1153b4";
  } else {
    hoveredColor = "#3e8db1c0";
  }
  if (e.target.classList.contains("tile") && !e.target.classList.contains("clicked")) {
    document.documentElement.style.setProperty("--number", `"${currNum}"'`);
    e.target.style.setProperty("--hovered", hoveredColor); // tambahkan if untuk berganti pemain
  } else {
    document.documentElement.style.setProperty("--number", `""'`);
    e.target.style.setProperty("--hovered", hoveredColor);
  }
});

document.addEventListener("click", (e) => {
  if (currentPlaying.currTurn == "player1") {
    color = "#ec1153";
    currentPlaying.currTurn = "player2";
  } else {
    color = "#3e8db1";
    currentPlaying.currTurn = "player1";
  }
  if (e.target.classList.contains("tile") && !e.target.classList.contains("clicked")) {
    e.target.classList.add("clicked");
    e.target.style.backgroundColor = color;
    e.target.innerHTML = `<span class="number-tile">${currNum}</span>`;
    randomNum();
  }
});

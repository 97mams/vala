const btnNotification = document.getElementById("btn-notification");
const btnBreed = document.getElementById("btn-breed");
const btnTrait = document.getElementById("btn-trait");
const cardNotification = document.getElementById("notification");
const input = document.getElementsByTagName("input");

btnNotification.addEventListener("click", (e) => {
  cardNotification.classList.toggle("hidden");
});

// btnTrait.addEventListener("click", (e) => {
//   for (let i = 0; i < input.length; i++) {
//     if (input[i].value === "") {
//       e.preventDefault();
//       input[i].classList.add("border-red-500");
//     } else {
//       input[i].classList.remove("border-red-500");
//     }
//   }
// });

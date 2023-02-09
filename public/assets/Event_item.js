const pIcons = document.querySelector(".toggleButton");
const packageItem = document.querySelector(".addNewPackage");

pIcons.addEventListener("click", () => {
    console.log("balla");
    packageItem.classList.toggle("active");
})

document.querySelectorAll(".user_menu_button").forEach(n => {
    n.addEventListener("click", () => user_menu.classList.remove("active"));
});

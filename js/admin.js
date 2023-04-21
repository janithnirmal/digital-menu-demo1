function contentChanger(navigation) {
  let container = document.getElementById("adminContentContainer");

  fetch("templates/" + navigation + ".php")
    .then((res) => res.text())
    .then((data) => {
      container.innerHTML = data;
    })
    .then((err) => console.log(err));
}

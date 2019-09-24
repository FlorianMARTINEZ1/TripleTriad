function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  var img = ev.target.appendChild(document.getElementById(data));
  ev.target.removeAttribute("ondrop");
  img.setAttribute("pointer-events", "none");
  img.removeAttribute("draggable");
  img.removeAttribute("ondragstart");
}
// Update current time
function updateTime() {
    const now = new Date();
    document.getElementById('current-time').textContent = now.toLocaleTimeString();
}
updateTime();
setInterval(updateTime, 1000);

$(document).on("click", "#buttonAman", function () {

  $("#kondisiKeadaanData").text(1);
});

$(document).on("click", "#buttonSiaga", function () {

  $("#kondisiKeadaanData").text(8);
});

$(document).on("click", "#buttonDarurat", function () {

  $("#kondisiKeadaanData").text(19);
});
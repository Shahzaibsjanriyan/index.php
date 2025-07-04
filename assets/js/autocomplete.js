// assets/js/autocomplete.js

const airports = [
  "LHE - Lahore, Pakistan",
  "ISB - Islamabad, Pakistan",
  "KHI - Karachi, Pakistan",
  "JFK - New York (JFK), USA",
  "LAX - Los Angeles (LAX), USA",
  "LHR - London Heathrow, UK",
  "MAN - Manchester, UK",
  "SYD - Sydney, Australia",
  "MEL - Melbourne, Australia",
  "YYZ - Toronto, Canada",
  "YVR - Vancouver, Canada",
  "FRA - Frankfurt, Germany",
  "MUC - Munich, Germany"
];

function setupAutocomplete(inputId, suggestionBoxId) {
  const input = document.getElementById(inputId);
  const suggestionsBox = document.getElementById(suggestionBoxId);

  input.addEventListener("input", function () {
    const query = input.value.toLowerCase();
    suggestionsBox.innerHTML = "";

    if (query.length < 1) return;

    const matches = airports.filter(a => a.toLowerCase().includes(query)).slice(0, 5);

    matches.forEach(match => {
      const div = document.createElement("div");
      div.textContent = match;
      div.classList.add("autocomplete-option");

      div.addEventListener("click", function () {
        input.value = match;
        suggestionsBox.innerHTML = "";
      });

      suggestionsBox.appendChild(div);
    });
  });

  document.addEventListener("click", function (e) {
    if (e.target !== input) {
      suggestionsBox.innerHTML = "";
    }
  });
}

setupAutocomplete("from", "suggestions-from");
setupAutocomplete("to", "suggestions-to");


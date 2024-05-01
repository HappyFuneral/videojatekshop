import './bootstrap';
import '../../node_modules/intl-tel-input/build/js/utils.js'

const input = document.querySelector("#phone");
window.intlTelInput(input, {
  initialCountry: "auto",
  geoIpLookup: callback => {
      fetch("https://ipapi.co/json")
      .then(res => res.json())
      .then(data => callback(data.country_code))
      .catch(() => callback("us"));
  },
  utilsScript: "../../node_modules/intl-tel-input/build/js/utils.js",
});
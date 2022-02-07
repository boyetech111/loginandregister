const body = document.querySelector("body"),
      sidebar = document.querySelector("sidebar"),
      toggle = document.querySelector("toggle"),
      searchBtn = document.querySelector(".search-box"),
      modeSwitch = document.querySelector(".toggle-switch"),
      modetext = document.querySelector(".toggle-switch");

      modeSwitch.addEventListener("click", () =>{
          body.classList.add("darkMode");
          console.log(body.classList);
      });
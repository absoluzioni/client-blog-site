// Constant and Variables
const searchIcon = document.querySelector("#search-icon");
const searchOverlay = document.querySelector("#search-overlay");
const searchInput = document.querySelector("#s");
const closeBtn = document.querySelector("#close-btn");
const loadingIcon = document.querySelector("#loading-icon");
const defaultMessage = document.querySelector("#default-message");
const noResultsMessage = document.querySelector("#no-results-message");
const listOfPosts = document.querySelector("#list-of-posts");

let previousSearchValue = "";
let ourTimer = null;

// Event Listeners
searchIcon.addEventListener("click", openOverlay);
closeBtn.addEventListener("click", closeOverlay);

// Functions
function openOverlay() {
  document.querySelector(":root").classList.add("overflow-y-hidden");
  searchOverlay.classList.remove("invisible", "opacity-0", "scale-125");
  searchOverlay.classList.add("opacity-100", "scale-100");

  searchInput.focus();
}

function closeOverlay() {
  document.querySelector(":root").classList.remove("overflow-y-hidden");
  searchOverlay.classList.remove("opacity-1", "scale-100");
  searchOverlay.classList.add("opacity-0", "scale-125");
  setTimeout(() => {
    searchOverlay.classList.add("invisible");
  }, 301);
}

searchInput.addEventListener("keyup", handleInputChange);

function handleInputChange(e) {
  const actualValue = e.target.value.trim();
  // when to show spinner loader and hide default message
  if (actualValue != previousSearchValue) {
    if (actualValue != "") {
      defaultMessage.classList.add("hidden");
      noResultsMessage.classList.add("hidden");
      listOfPosts.classList.add("hidden");
      loadingIcon.classList.remove("hidden");
    } else {
      loadingIcon.classList.add("hidden");
      noResultsMessage.classList.add("hidden");
      listOfPosts.classList.add("hidden");
      defaultMessage.classList.remove("hidden");

      clearTimeout(ourTimer);
      return;
    }

    clearTimeout(ourTimer);

    ourTimer = setTimeout(() => {
      actuallyFetchData(actualValue);
    }, 750);

    previousSearchValue = actualValue;
  }
  // when to hide spinner and show default message again

  // wait a bit and the actually trigger the real search event
}

async function actuallyFetchData(term) {
  // 1. actually fetch data
  const results = await getResultsData(term);

  // 2. update the ui on screen
  if (!results.length) {
    loadingIcon.classList.add("hidden");
    noResultsMessage.classList.remove("hidden");
    listOfPosts.classList.add("hidden");
  } else {
    loadingIcon.classList.add("hidden");
    noResultsMessage.classList.add("hidden");

    console.log(results);

    // old method
    // listOfPosts.innerHTML = `
    // ${results
    //   .map(
    //     post => `
    //       <li>
    //         <a href="${post.url}" class="flex items-center gap-3 text-sm text-teal-700 hover:text-teal-500">
    //           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="inline-block" viewBox="0 0 16 16">
    //             <path d="M4 3.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5z" />
    //             <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1" />
    //           </svg>
    //           <span>${post.title}</span
    //         </a>
    //       </li>`
    //   )
    //   .join("")}`;

    // new method
    const liTemplate = document.querySelector("#li-template").content;
    let wrapper = document.createDocumentFragment();
    results.forEach(post => {
      let li = liTemplate.cloneNode(true);
      li.querySelector("a").href = post.url;
      li.querySelector("span").textContent = post.title;
      wrapper.appendChild(li);
    });
    listOfPosts.innerHTML = "";
    listOfPosts.appendChild(wrapper);
    listOfPosts.classList.remove("hidden");
  }
}

async function getResultsData(term) {
  const resultPromise = await fetch(
    ourData.root_url + `/wp-json/wp/v2/search?search=${term}`
  );
  const results = await resultPromise.json();
  return results;
}

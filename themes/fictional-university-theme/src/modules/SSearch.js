class Search {
    // 1. describe and create/initiate our object
    // 1.1 openButton is selecting the second instance of the search trigger for the search icon in the header
    // 1.2 closeButton is selecting the close button for the search overlay
    // 1.3 searchOverlay is selecting the search overlay so we can add and remove the active class
    constructor() {
        this.openButton = document.querySelectorAll(".js-search-trigger")[1];
        this.closeButton = document.querySelector(".search-overlay__close");
        this.searchOverlay = document.querySelector(".search-overlay");
        this.events();
    }
 
    // 2. events
    // 2.1 openButton is listening for a click event and when it happens, it will call the openOverlay method
    // 2.2 closeButton is listening for a click event and when it happens, it will call the closeOverlay method
    events() {
        this.openButton.addEventListener("click", this.openOverlay);
        this.closeButton.addEventListener("click", this.closeOverlay);
    }
 
    //3. methods (function, action...)
    //3.1 openOverlay will add the active class to the search overlay
    //3.2 closeOverlay will remove the active class from the search overlay
    
    openOverlay = () => {
        this.searchOverlay.classList.add("search-overlay--active");
        
    }
 
    closeOverlay = () => {
        this.searchOverlay.classList.remove("search-overlay--active");
    }
}
 
// 4. export the class
const search = new Search();

export default Search;
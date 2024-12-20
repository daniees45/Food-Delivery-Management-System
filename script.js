function searchFood() {
    const query = document.getElementById("searchBar").value;
    if (query) {
        alert("Searching for: " + query);
        // Add functionality here to actually perform the search
    } else {
        alert("Please enter a search term.");
    }
}

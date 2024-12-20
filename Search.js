const searchInput = document.getElementById('searchInput');
const resultsContainer = document.getElementById('results');

// Add debounce to reduce unnecessary API calls
function debounce(func, delay) {
    let timeoutId;
    return function() {
        const context = this;
        const args = arguments;
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            func.apply(context, args);
        }, delay);
    };
}

const performSearch = debounce(() => {
    const term = searchInput.value.trim();

    if (term.length < 2) {
        resultsContainer.innerHTML = ""; // Clear results for short inputs
        return;
    }

    fetch(`Search.php?term=${encodeURIComponent(term)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            resultsContainer.innerHTML = ""; // Clear previous results

            if (data.success && data.data.length > 0) {
                const fragment = document.createDocumentFragment();
                data.data.forEach(food => {
                    const li = document.createElement('li');
                    li.classList.add('search-result-item');
                    
                    // Create a more informative list item
                    li.innerHTML = `
                        <div class="result-title">${food.PostTitle}</div>
                        <div class="result-category">${food.category}</div>
                        <div class="result-price"> ₵${food.price}</div><br>
                       
                    `;

                    li.addEventListener('click', () => {
                        // Redirect to a detail page with the post ID
                        window.location.href = `mainpost.php?id=${food.Postid}`;
                    });

                    fragment.appendChild(li);
                });
                resultsContainer.appendChild(fragment);
            } else {
                const noResultsLi = document.createElement('li');
                noResultsLi.classList.add('no-results');
                noResultsLi.textContent = data.error || 'No results found';
                resultsContainer.appendChild(noResultsLi);
            }
        })
        .catch(error => {
            console.error('Error fetching search results:', error);
            resultsContainer.innerHTML = `<li class="error">Unable to fetch results. Please try again.</li>`;
        });
}, 300); // 300ms debounce delay

searchInput.addEventListener('input', performSearch);



      // Fetch restaurant data
   function display() {
    fetch('display.php')
    .then((response) => response.json())
    .then((data) => {
        const container = document.getElementById('restaurants');
        container.innerHTML = ""; // Clear loading message

        if (data.success) {
            data.data.forEach((restaurants) => {
                const div = document.createElement('div');
                div.className = 'oyibi-scroll';
                div.innerHTML = `
                      <div class = "oyibi-restaurant">
                      <img src="images/PAJ.webp" alt="${restaurants.name}">
                      <p>${restaurants.name}</p>
                    
                    <p>${restaurants.email}</p>
                    </div>
                `;
                container.appendChild(div);
            });
        } else {
            container.innerHTML = `<p>${data.message}</p>`;
        }
    })
    .catch((error) => {
        console.error("Error fetching restaurants:", error);
        document.getElementById('restaurantContainer').innerHTML = "<p>An error occurred while loading restaurants.</p>";
    });
   }


<p><span>Location:</span> ${restaurants.ADDRESS}</p>
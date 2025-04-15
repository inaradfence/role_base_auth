<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>
</head>
<body>

    <h2>Search for a Product</h2>
    
    <form id="searchForm">
        <label>Item:</label>
        <input type="text" id="item" name="item" value="DRX-2.4" required>
        <br>

        <label>Brand:</label>
        <input type="text" id="brand" value="INTEGRA-HARB" name="brand">
        <br>

        <label>Category:</label>
        <input type="text" id="category" value="Electronics" name="category">
        <br>

        <button type="submit">Search</button>
    </form>

    <h3>Results:</h3>
    <div id="results"></div>

    <script>
        document.getElementById("searchForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            let item = document.getElementById("item").value;
            let brand = document.getElementById("brand").value;
            let category = document.getElementById("category").value;
            
            fetch("{{ route('search.process') }}", {
                method: "POST",
                headers: { 
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ item, brand, category })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    document.getElementById("results").innerHTML = `
                        <p><strong>Title:</strong> ${data.title}</p>
                        <p><strong>Price:</strong> ${data.price}</p>
                        <p><strong>Store:</strong> ${data.store}</p>
                        <p><strong>Ratings:</strong> ${data.ratings}</p>
                        <p><strong>Reviews:</strong> ${data.reviews}</p>
                         <p><strong>Description:</strong> ${data.description}</p>
                        <p><strong>Height:</strong> ${data.height}</p>
                        <p><strong>Width:</strong> ${data.width}</p>
                        <p><strong>Size:</strong> ${data.size}</p>
                      
                        <img src="${data.images[0]}" alt="Product Image">
                    `;
                } else {
                    document.getElementById("results").innerHTML = "<p>No results found.</p>";
                }
            })
            .catch(error => console.error("Error:", error));
        });
    </script>

    

</body>
</html>

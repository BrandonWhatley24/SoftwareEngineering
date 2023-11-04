<!DOCTYPE html>
<html>
<head>
    <title>JavaScript and PHP Example with Async Function</title>
</head>
<body>
    <div id="output"></div>
    <!-- testing the api endpoint -->
    <script>
        // Create an async function to fetch data from the API
        async function getDataFromAPI() {
            try {
                const response = await fetch('api.php?action=getAllItems');
                if (response.ok) {
                    const data = await response.json();
                    // Display the data in the 'output' div
                    document.getElementById('output').textContent = JSON.stringify(data, null, 2);
                } else {
                    console.error('Failed to fetch data from the API.');
                }
            } catch (error) {
                console.error('An error occurred:', error);
            }
        }

        // Call the async function to get data from the API
        getDataFromAPI();
    </script>
</body>
</html>

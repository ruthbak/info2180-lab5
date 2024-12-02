document.getElementById('lookup').addEventListener('click', function() {
    const country = document.getElementById('country').value.trim();

    if (country) {
        const url = 'world.php?country=' + encodeURIComponent(country);

        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById('result').innerHTML=xhr.responseText;
            } else {
                document.getElementById('result').innerHTML='Error fetching data. Please try again.';
            }
        };

        xhr.send();
    }else{
        document.getElementById('result').innerHTML='Please enter a country.'
    }
});

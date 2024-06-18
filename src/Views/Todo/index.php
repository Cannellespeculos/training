<?php
ob_start();

?>

<section id="dashboard">

<a href="/creation">créer un post</a>
</section>

<button popovertarget="alert">alert</button>

<div id="alert" popover>
    <h2>COUCOU !</h2>
</div>!

<div id="test"></div>

<script>

    // make a fetch so i can receive data from the bdd
    fetch('/api')
        .then(response => response.json())
        .then(data => {
            console.log(data)

            // get the section
            const dashboard = document.getElementById("dashboard")

            // create every post got from the bd
            for (let i = 0; i < data.length; i++) {
                const element = data[i];

                // create the element
                const article = document.createElement("article")
                const title = document.createElement("h2")
                const date = document.createElement("p")

                // add content in it
                title.textContent = element.name
                date.textContent = element.date

                // add a parent to the elements
                dashboard.append(article)
                article.append(title)
                article.append(date)


            }


            // sorting algorithm
            function bubbleSort(array) {
                let length = array.length;
                for (let i = 0; i < length - 1; i++) {
                    for (let j = 0; j < length - i - 1; j++) {
                        if (array[j] > array[j + 1]) {
                            [array[j], array[j + 1]] = [array[j + 1], array[j]]; // Swap
                        }
                    }
                }
                return array;
            }

            console.log("Tri à Bulles:", bubbleSort([[23, 86, 97], [23, 42, 51], [21, 74]]));
        })
        .catch(error => console.error('Error:', error));
</script>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';

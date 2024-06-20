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


        })
        .catch(error => console.error('Error:', error));
</script>
<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';

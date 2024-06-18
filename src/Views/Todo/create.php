<?php
ob_start();
?>

<section class="create">
    <h1><i class="fas fa-list-alt"></i> Création Todolist :</h1>

    <div>
        <div class="list">
            <div class="top">
                <form action="/create" method="post" id="newPost">
                    <input type="text" name="name" value="<?php echo old("name"); ?>" placeholder="Name post" id="name">
                    <button type="submit" name="button"><i class="fas fa-plus"></i></button>
                </form>
                <span class="error"><?php echo error("name"); ?></span>
            </div>

            <div class="separateur"></div>

            <div class="bottom">
            </div>
        </div>


    </div>

</section>

<script>
    const newPost = document.getElementById('newPost')

    // create a new post
    newPost.addEventListener("submit", (e) => {
        // prevent form submition
        e.preventDefault()

        // fetch to the POST method, data from the form
        fetch('/create', {

            method: 'POST',
            body: new FormData(e.target)
        })
            .then(response => response.json())
            .then(data => {
                // sent user to homepage
                location.replace("/");

            })
            // get error and show them in the console
            .catch(error => console.error('Error:', error));
    })


</script>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';

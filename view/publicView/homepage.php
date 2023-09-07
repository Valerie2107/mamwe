<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Accueil";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>
<figure class="circle1"></figure>


<!-- description de la madame : -->
<div><img class="picturehome" src="<?= $allHome -> getPicture() ?>" alt=""></div>

<div class="textehome">
<?= $allHome -> getMwContentHomepage() ?></div>


<div class="section-home">
<?php  foreach($allSection as $section ): ?>
    <div class="article-home">
        <h2 class="h2"><?=$section -> getMwTitleSect();?></h2>
        <div class="article-pic">
       <?php $picture = $section -> getPicture();
        $pic = explode("|||", $picture);
            
        ?>
       
         <img src="<?= $pic[1]  ?>" alt="2" width="300px"><br>
         
        </div>
       
    </div>
    
    <p class="textehome1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt voluptas delectus in iure obcaecati provident libero numquam reiciendis officia perferendis fugiat cumque omnis corporis quidem eum maxime repudiandae commodi natus assumenda, molestias, facere rem consequatur! Delectus ipsum adipisci laborum soluta, quas vel consequatur corrupti ab ducimus eos dignissimos voluptate iure vero repellat dicta blanditiis impedit! Omnis temporibus fugit necessitatibus consequuntur vero dolorum, dolore sapiente architecto odit consectetur deleniti officia, reprehenderit eius culpa delectus soluta? Praesentium veniam itaque quasi voluptates aliquam ad! Unde eum tenetur impedit consequuntur assumenda eligendi, labore pariatur voluptas nesciunt ex delectus magnam quae aperiam minus fugiat! Eligendi cumque, quia ea deserunt vero quos illo vitae possimus iure totam ratione dolorem sapiente sint architecto magni eius blanditiis commodi soluta laborum repudiandae odio officia odit. Sapiente quia adipisci nam sed alias ad maxime atque eligendi similique? Eaque harum at neque? Atque neque quam nisi dolorum, voluptatibus alias animi tempore illum sapiente! Harum id praesentium omnis sequi quae distinctio laborum tempore </p>
<?php endforeach ?> 

</div>

</main>
<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";

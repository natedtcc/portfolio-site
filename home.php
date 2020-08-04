<?php

$page_title = 'Welcome | natenasteff.com |';
$current_page = 0;

include('includes/header.html');


echo '
    <br><br><br><br>

    <!--Fading Intro Messages-->

    <blockquote class="blockquote">
      <h4 class="display-5" style="animation: fade normal 10s 1 6s ease-in;">
        My name is Nate Nasteff.
      </h4>
      <h4 class="display-5" style="animation: fade normal 10s 1 10s ease-in; font-size: 21px;">
        I\'m a freelance web / software developer.
      </h4>
      <h4 class="display-5" style="animation: fade normal 12s 1 14s ease-in;">
        Check out some of my
          projects.
      </h4><br>
      <h4 class="display-5" style="animation: fade normal 10s 1 20s ease-in;">
        Thanks for checking out my page!</h4>
    </blockquote>
  

    <!--Flashing welcome text-->


    <div class="blink-welcome" style="bottom: 50px;">
      <h1 class="display-3" style="color: white; background-color: transparent;" align="center">
        <b>Welcome.</b></div>
        <div class="flipping">
        <img class="flip-image" src="media/logo.svg" style="width: 250px; height: 250px; "></div>
      </h1>
    </div>
    
    
</div>
</div>';


include('includes/footer.html');

?>
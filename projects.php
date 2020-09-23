<?php

$page_title = 'Projects | natenasteff.com |';
$current_page = 2;

include('includes/header.html');


echo '
    <div class="text-center">
      <div class="text-fade">
        <div class="project-heading">
          <h1 class="display-4">Coding Projects</h1>
          <p class="lead"><br><br>Just a few things I\'ve been working on lately.</p>
        </div>

      </div>

      <div class="container">
        <h5 class="lead">Delaware Tech Lab Management</h5>
        <img src="media/lab_mgmt.png" width="180" height="300">
        <p class="lead">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;During my internship at Delaware Tech, I was given the
          assignment of
          creating a website that allowed the
          professors in the IT department keep better track of their inventory, namely their hard drives. These drives
          are lent out to students throughout the semester for coursework, and were previously kept track of with a
          paper log. I designed a website that required students to create an account and register their hard
          drive.
          <br><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ince the students are using these hard drives with some of Del Tech\'s
          servers for coursework, I also
          implemented a feature on the site that allows a student to lease a server. To summarize, this page keeps track
          of which students have which hard drives, and what server they are using, or have used.
          <br><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Utilizing what I\'d learned at school, I designed the system from the
          ground up, using PHP and Bootstrap. I
          implemented my system using a LAMP stack running on Ubuntu 18. The site has many admin features that not only
          log drive and server leases to a logfile, but also a web interface that allows for complete modification of
          any relavant data found within the database.
          <br><br></p>
        <p class="lead text-light text-center">
          To see a live version
          of the page,
          click <a href="https://www.natenasteff.com/lab_management/home.php">here</a>.
          <br>
        </p>
      </div>

      <div class=" container">
        <h5 class=" lead">Arduino MIDI ChordStomper</h5>
        <img src="media/chordstomp.jpg" width="350" height="250">
        <p class="lead text-light text-center">
          <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aside from computers, one of my biggest hobbies is playing music. I\'m
          a
          bass player in a local band that plays roughly 80 gigs a year, alongside a drummer and a guitar player. Since
          we\'re just a three piece, there\'s always songs we want to learn but just can\'t because they sound empty
          without another instrument. One day, I had a thought that maybe I could buy something that would allow me to
          play some keyboard chords with my feet, like Geddy Lee from Rush (I wish). Lo and behold, such a thing (to my
          knowledge) does not exist. Enter:
          The ChordStomper.
          <br><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The idea behind this device is to allow myself to play pre-programmed
          piano chords via MIDI using an array of foot switches as triggers for the chords. Once the device is plugged
          into the MIDI-in port of a keyboard, simply step on a button to play a chord, or hold it down to hold the
          chord out longer. I wanted to design this device around the idea of having presets, so I coded a bunch of
          presets that I could use for specific songs during my gigs.
          <br><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I quickly started to expand on this idea by adding a function that lets
          you assign chords on the fly (with a MIDI-out keyboard) by pressing and holding a footswitch and playing a
          chord on the piano while in \'latch\' mode. This is something found on many KORG synthesizers that I programmed
          for the purpose of musical flexibility. I also included the ability to save and load patches from a MicroSD
          card. Once my prototype is finished, I\'ll probably write some software for the easy creation of presets.
          <br><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The device is very much so still a breadboard prototype. The prototype
          features a MIDI in-out circuit, a 16x2 LCD display, MicroSD support, and an array of buttons for LCD menu
          selections and footpedal simulation. This all runs off of a Teensy 3.0 microcontroller, with the codebase
          written in (mostly) C.
          <br><br>
        <p class="lead text-light text-center">
          To see the code, click <a href="https://github.com/natedtcc/ChordStomper">here</a>.
          <br>
        </p>
      </div>


      <div class="container">
        <h5 class="lead">Raspberry Pi Webserver</h5>
        <img src="media/raspi.svg" width="250" height="300" />
        <br><small class="text-light">The Raspberry Pi logo is a registered trademark of The Raspberry Pi Foundation.
          </small<br><br>
          <br>
          <p class="lead">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Raspberry Pi\'s are pretty amazing devices! It seems like the amount of
            projects available for them are limitless. From something as simple as streaming your favorite media to your
            living room via Kodi, to the more difficult tasks such as robotics and IoT, there\'s something for everyone.
            <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Once I completed my internship at school, I was looking for a way to
            implement my school project at home so that I could use it for my coding portfolio. Luckily, during my
            project, I created a Debian-based installation script that would (mostly) take care of all the heavy lifting
            required to
            have my web server and website up and running. With very little modification, I was able to replicate my
            school project perfectly using a Raspberry Pi 4.
            <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;After purchasing a domain name, only a few more steps
            were needed to create DNS entries (I use a DDNS script) and have my website hosted right out of my home.
            Once
            the site was fully operational, I implemented the HTTPS protocol by using LetsEncrypt and Certbot (which was
            a
            breeze!).
            <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This was an excellent low-cost solution for not only replicating and
            hosting my school coding project, but also as a means of hosting the very site you are currently viewing.
            <br>
            <br>
          </p>
          <p class="lead text-light" style="text-align: center;">If anyone reading is interested in this project, check
            out this link:<br><br><a href="https://www.raspberrypi.org/forums/viewtopic.php?t=218354">How to set up a
              LAMP stack on a Raspberry
              Pi</a><br></p>
          <br>

      </div>
    </div>

  </body> ';

  include('includes/footer.html');

  ?>
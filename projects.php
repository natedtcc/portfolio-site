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
        <p class="lead">During my internship at Delaware Tech, I was given the
          assignment of
          creating a website that allowed the
          professors in the IT department keep better track of their inventory, namely their hard drives. These drives
          are lent out to students throughout the semester for coursework, and were previously kept track of with a
          paper log. I designed a website that required students to create an account and register their hard
          drive.
          <br><br> </p>
          <p class="lead">Since the students are using these hard drives with some of Del Tech\'s
          servers for coursework, I also
          implemented a feature on the site that allows a student to lease a server. To summarize, this page keeps track
          of which students have which hard drives, and what server they are using, or have used.
          <br><br></p>
          <p class="lead">Utilizing what I\'d learned at school, I designed the system from the
          ground up, using PHP and Bootstrap. I
          implemented my system using a LAMP stack running on Ubuntu 18. The site has many admin features that not only
          log drive and server leases to a logfile, but also a web interface that allows for complete modification of
          any relavant data found within the database.
          <br><br></p>
        <p class="lead text-light text-center" style="text-indent: 0px;">
          To see a live version
          of the page,
          click <a href="https://natenasteff.com/lab_management/home.php">here</a>.
          <br>
        </p>
      </div>

      <div class="container">
      <h5 class="lead">PSO Bot for Twitch</h5>
      <img src="media/pso-bot.png" width="300" height="300">
      <p class="lead">Phantasy Star Online is an MMORPG (one of the first of it\'s kind)
      which originally debuted on the Sega Dreamcast way back in the year 2000. While the online
      service was short lived, the community surrounding the game has managed to keep the game alive
      and running since Sega shut down the main servers in 2003(ish?). Sega\'s server code was reverse
      engineered and reconstructed, with the PSO hacking community releasing server software for Linux
      and Windows.
        <br><br> </p>
        <p class="lead">
        Flash forward to the year 2020, and people are still online enjoying PSO. In the past, I\'d 
        given some thought to potentially creating a Twitch channel devoted to Phantasy Star Online.
        My main plan was to just have a character sitting idle in the in-game lobby 24/7, just so viewers
        could enjoy the scenary and background music that helped define the franchise. After setting
        an instance of this up, I was pretty shocked to see how many people actually watched it.
        <br><br></p>
        <p class="lead">I decided that just simpling idling in game was not enough, so I decided to start
        writing a bot that would pass commands to the game. To do this, I needed to do a bit of game hacking,
        which involved me finding specific addresses in the game\'s memory that would modify certain in-game
        features in real time.
        <br><br></p>
        
        <p class="lead">
        The project utilizes Java to do all the heavy lifting. Currently, the in-game character automatically
        sends chats every minute or so, and will warp to a different area of the game after about five minutes.
        I utilized that Java Robots library to send custom chat messages that are read from a textfile, and the
        memory editing functions are accomplished by using a simplified version of the Java JNA library, called WGTools. This project
        will probably always be a work in progress. In the future, I plan on implementing functions that will control
        the character (movement, attacking, healing etc) and some functionality to interact with users in the Twitch
        chat.
        <br><br> </p>
      <p class="lead text-light text-center" style="text-indent: 0px;">
        To see the code,
        click <a href="https://github.com/natedtcc/pso-bot/">here</a>. <br>
        The Twitch channel can be found <a href="https://twitch.tv/retrogradex">here</a>.
        <br>
      </p>
    </div>

      <div class="container">
        <h5 class=" lead">Arduino MIDI ChordStomper</h5>
        <img src="media/chordstomp.jpg" width="350" height="250">
        <br>
        <p class="lead">
          Aside from computers, one of my biggest hobbies is playing music. I\'m
          a
          bass player in a local band that plays roughly 80 gigs a year, alongside a drummer and a guitar player. Since
          we\'re just a three piece, there\'s always songs we want to learn but just can\'t because they sound empty
          without another instrument. One day, I had a thought that maybe I could buy something that would allow me to
          play some keyboard chords with my feet, like Geddy Lee from Rush (I wish). Lo and behold, such a thing (to my
          knowledge) does not exist. Enter:
          The ChordStomper.</p>
          <br><br>
          <p class="lead">The idea behind this device is to allow myself to play pre-programmed
          piano chords via MIDI using an array of foot switches as triggers for the chords. Once the device is plugged
          into the MIDI-in port of a keyboard, simply step on a button to play a chord, or hold it down to hold the
          chord out longer. I wanted to design this device around the idea of having presets, so I coded a bunch of
          presets that I could use for specific songs during my gigs.
          <br><br></p>
          <p class="lead">I quickly started to expand on this idea by adding a function that lets
          you assign chords on the fly (with a MIDI-out keyboard) by pressing and holding a footswitch and playing a
          chord on the piano while in \'latch\' mode. This is something found on many KORG synthesizers that I programmed
          for the purpose of musical flexibility. I also included the ability to save and load patches from a MicroSD
          card. Once my prototype is finished, I\'ll probably write some software for the easy creation of presets.
          <br><br></p>
          <p class="lead">The device is very much so still a breadboard prototype. The prototype
          features a MIDI in-out circuit, a 16x2 LCD display, MicroSD support, and an array of buttons for LCD menu
          selections and footpedal simulation. This all runs off of a Teensy 3.0 microcontroller, with the codebase
          written in (mostly) C.
          <br><br></p>
          <p class="lead text-light text-center" style="text-indent: 0px;">
          To see the code, click <a href="https://github.com/natedtcc/ChordStomper">here</a>.
          <br>
        </p>
      </div>


      <div class="container">
        <h5 class="lead">Raspberry Pi Webserver</h5>
        <img src="media/raspi.svg" width="250" height="300" />
        <h5 class="lead" style="font-size: 10px;">The Raspberry Pi logo is a registered trademark of The Raspberry Pi Foundation.
          </h5><br>
          <p class="lead">
            Raspberry Pi\'s are pretty amazing devices! It seems like the amount of
            projects available for them are limitless. From something as simple as streaming your favorite media to your
            living room via Kodi, to the more difficult tasks such as robotics and IoT, there\'s something for everyone.
            <br><br></p>
            <p class="lead">Once I completed my internship at school, I was looking for a way to
            implement my school project at home so that I could use it for my coding portfolio. Luckily, during my
            project, I created a Debian-based installation script that would (mostly) take care of all the heavy lifting
            required to
            have my web server and website up and running. With very little modification, I was able to replicate my
            school project perfectly using a Raspberry Pi 4.
            <br><br></p>
            <p class="lead">After purchasing a domain name, only a few more steps
            were needed to create DNS entries (I use a DDNS script) and have my website hosted right out of my home.
            Once
            the site was fully operational, I implemented the HTTPS protocol by using LetsEncrypt and Certbot (which was
            a
            breeze!).
            <br><br> </p>
            <p class="lead">This was an excellent low-cost solution for not only replicating and
            hosting my school coding project, but also as a means of hosting the very site you are currently viewing.
            <br>
            <br>
          </p>
          <p class="lead text-light text-center" style="text-indent: 0px;">If you are interested in this project, check
            out this link:<br><br><a href="https://www.raspberrypi.org/forums/viewtopic.php?t=218354">How to set up a
              LAMP stack on a Raspberry
              Pi</a><br></p>
          <br>

      </div>
    </div>

  </body> ';

include('includes/footer.html');
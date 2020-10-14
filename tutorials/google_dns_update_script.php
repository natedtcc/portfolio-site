<?php

$page_title = 'Tutorials | natenasteff.com |';
$current_page = 4;

include(dirname(__FILE__).'/../includes/header.html');

echo '<div class="text-center">
<div class="text-fade">
  <div class="project-heading">
    <h1 class="display-4">Google Domains IP Update Script</h1>
    <p class="lead"><br><br>Use bash scripting and crontab to automatically update your home webserver in case of IP address change.</p>
  </div>

</div>
      
      <div class="container">  
      <p class="lead">
      In this tutorial, I will show you how to create a script in bash that will update your
      Google Domains IP in case your IP is changed by your ISP. Why would I need this, you
      might be asking? Well, if you\'re like me, and you have a Raspberry Pi acting as a
      web server in your home, AND you have a domain purchased from Google, you are in the
      right place.<br><br>
      Since you are hosting your website on a non-static IP, your Google Domain listing will
      need to be updated any time your IP address is renewed and changed. To automate this process,
      I wrote a bash script that will check if any changes have occured with your IP address. If
      changes are detected, it uses Google Domain\'s API to update your current IP address. This, 
      in combination with a simple crontab entry and an environmental variable defined in your .bashrc,
      means that you can make sure your site isn\'t offline for very long if your IP address is changed.
      <br><br>
      Since I\'ve written this script to run on the Raspberry Pi 4, these instructions will be
      mostly focused on Raspbian, however this script and its methods should work on other distros with little to
      no modification (although some processes may be different).
      </p><br>

      <h5 class="lead">Requirements:</h5>
      <p class="lead"><br>
      - A Raspberry Pi (tested on models 3 and 4)<br>
      - A Google Domain purchased through Google<br>
      - Apache2 server (for logging only)<br><br><br>
      </p><br>

      <h5 class="lead">Setting up Dynamic DNS on Google Domains</h5>
      <p class="lead"><br>
      This script requires that you set up Dynamic DNS for your domain on the Google Domains
      page. This feature is what makes it possible for you to route traffic to your web server\'s
      IP address. To set this up, follow the directions on this page 
      <a href="https://support.google.com/domains/answer/6147083?hl=en&ref_topic=9018335" target="_blank">
      here</a>. Once you have Dynamic DNS set up and you\'ve generated your credentials, it\'s time to
      implement a new environmental variable in Raspbian.
      </p><br>
      <h5 class="lead">Set IP environmental variable</h5>
      <p class="lead"><br>
      For this script\'s magic to work at it\'s full potential, you\'ll need to define a new
      environmental variable within your Raspbian system. To do this, simply navigate to your
      home folder (~/) and type "<code style="color:white;">nano .bashrc</code>". This will load up your bash config file.
      Somewhere near the top or near the end, you will need to add this line:</p><br> <br>
      <pre>
      <code>

      # Define IP address env var
      export IP=0.0.0.0

      </code>
      </pre><br><br>
      <p class="lead">
      Once you have modified and saved your .bashrc file, don\'t forget to run the command "<code style="color:white;">source .bashrc</code>"
       to update your changes. With this variable set, we can move on to the script. </p>
       
       <h5 class="lead">The Script</h5><br>
       <p class="lead">Create a new file called dns_update (or whatever)
       and open it up in nano. Then, copy and paste the below code into the file:</p><br><br>
      

      <pre>
      <code>
      #!/bin/bash

      # Set account info variables
      USERNAME="google-domain-username"
      PASSWORD="google-domain-password"
      HOSTNAME="your-hostname.com"
      
      # Get Date & Time for logging / Current IP
      DATE_WITH_TIME=$(date "+%Y-%m-%d %H:%M:%S")
      POTENTIAL_IP=$( dig +short myip.opendns.com @resolver1.opendns.com )
      
      # Check environmental var $IP against the $POTENTIAL_IP
      if [[ "$IP" != "$POTENTIAL_IP" ]]
      then
        # Use the API to update your DNS with the newest IP
        # Also logs to a logfile created in /var/log/apache2/
        export IP=$POTENTIAL_IP
        URL="https://${USERNAME}:${PASSWORD}@domains.google.com/nic/update?$
        curl -s $URL
        echo "[${DATE_WITH_TIME}] Google Domain IP Address updated successf$
      
      else
        echo "[${DATE_WITH_TIME}] No update neccessary." >> /var/log/apache$
      
      fi
      </code>
      </pre>
      <p class="lead"><br>Once the file is saved and you have closed nano, make sure
      to give your script the executable flag by typing "<code style="color:white;">sudo chmod +x dns_update</code>".
 Note the "+x" in the command. This ensures our script can be run as a command from the CLI. You can now test this
 by typing "<code style="color:white;">(path_to_script)/dns_update</code>". On first run (and on reboots) it will force
 an update of your current IP address to the Google API </div>
';
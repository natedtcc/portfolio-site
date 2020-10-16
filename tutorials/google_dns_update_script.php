<?php

$page_title = 'Tutorials | natenasteff.com |';
$current_page = 4;

include(dirname(__FILE__) . '/../includes/header.html');

echo '<div class="text-center">
<div class="text-fade">
  <div class="project-heading">
    <h1 class="display-4">Google Domains IP Update Script</h1>
    <p class="lead"><br><br>
      Use bash scripting and crontab to automatically update your home 
      webserver in case of IP address change.
    </p>
  </div>
</div>

<div class="container"><br>
<p class="lead">

  In this tutorial, I will show you how to create a script in bash that will
  update your Google Domains IP in case your IP is changed by your ISP. Why 
  would I need this, you might be asking? Well, if you\'re like me, and you 
  have a Raspberry Pi acting as a web server in your home, AND you have a 
  domain purchased from Google, you are in the right place.
  <br><br>

  Since you are hosting your website on a non-static IP, your Google Domain 
  listing will need to be updated any time your IP address is renewed and 
  changed. To automate this process, I wrote a bash script that will check 
  if any changes have occured with your IP address. If changes are detected, 
  it uses Google Domain\'s API to update your current IP address. This, in 
  combination with a simple crontab entry and an environmental variable 
  defined in your .bashrc, means that you can make sure your site isn\'t 
  offline for very long if your IP address is changed.
  <br><br>

  Since I\'ve written this script to run on the Raspberry Pi 4, these 
  instructions will be mostly focused on Raspbian, however this script and 
  its methods should work on other distros with little to no modification 
  (although some processes may be different).
  </p><br>

<h5 class="lead">Requirements:</h5>
<p class="lead"><br>

  - A Raspberry Pi (tested on models 3 and 4)<br>
  - A Google Domain purchased through Google<br>
  - Apache2 / NGNIX or other server software (tested with Apache2)<br>
  - Sudo privileges (for chmod, creating log files in /var/log/apache2/)
  </p><br>

<h5 class="lead">Setting up Dynamic DNS on Google Domains</h5>
<p class="lead"><br>

  This script requires that you set up Dynamic DNS for your domain on the 
  Google Domains page. This feature is what makes it possible for you to 
  route traffic to your web server\'s IP address. To set this up, follow 
  the directions on this page 
  <a href="https://support.google.com/domains/answer/6147083?hl=en&ref_topic=9018335" target="_blank">
  here</a>. Once you have Dynamic DNS set up and you\'ve generated your 
  credentials, it\'s time to implement a new environmental variable in 
  Raspbian.
  </p><br>
  
<h5 class="lead">Set IP environmental variable</h5>
<p class="lead"><br>
  
  For this script\'s magic to work at it\'s full potential, you\'ll need 
  to define a new environmental variable within your Raspbian system. To 
  do this, simply navigate to your home folder (~/) and type 
  "<code style="color:white;">nano .bashrc</code>". This will load up your
  bash config file. Somewhere in this file (I prefer the top), you will need 
  to add this line:
  </p><br><br>
  
<pre>
  <code>

    # Define IP address env var
    export IP=0.0.0.0

  </code>
</pre><br
>
<p class="lead"><br>
  Once you have modified and saved your .bashrc file, don\'t forget to run 
  the command "<code style="color:white;">source .bashrc</code>" to update 
  your changes. With this variable set, we can move on to the script.
</p>
  
<h5 class="lead">The Script</h5><br>
<p class="lead"><br>
  Create a new file in your home directory (or wherever you may store your 
  user scripts) called dns_update (or whatever you choose) and open it up 
  in nano. Then, copy and paste the below code into the file:
</p><br><br>
      

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
URL="https://${USERNAME}:${PASSWORD}@domains.google.com/nic/update?hostname=${HOSTNAME}&myip=${IP}"
  curl -s $URL
  # Output to logger - REMOVE BOTH ECHO LINES BELOW (AND THE ELSE) NOT USING LOGGING!
  echo "[${DATE_WITH_TIME}] Google Domain IP Address updated successfully." >> /var/log/apache2/dns_update.log
else
  echo "[${DATE_WITH_TIME}] No update neccessary." >> /var/log/apache2/dns_update.log
fi
  </code>
</pre>

<p class="lead"><br>
  Once the above code is copied and pasted, make sure you assign your 
  username, password and hostname variables at the top of the script. Once 
  this is done and you have closed nano, make sure to give your script the 
  executable flag by by using the chmod command, like so: 
  
  "<code style="color:white;">sudo chmod +x dns_update</code>".
  
  Note the "+x" in the command. <br><br>This ensures our script can be run 
  straight from the CLI. You can now test this by using 
  "<code style="color:white;">(path_to_script)/dns_update</code>" in your 
  terminal. On first run (and on reboots) it will force an update of your 
  current IP address to the Google API. Congratulations, you now have a nice 
  script that can automatically update your IP address! NOTE: You may see 
  an error if you decided to include the logging function - more on that 
  next. We\'re not quite finished! To make this script even better, you 
  should have crontab run it every so often to ensure your Dynamic DNS is 
  updated. But before that, let\'s make a log file in /etc/apache2/ so we 
  can keep track of when the IP is changed (or not)<
  /p><br>

<h5 class="lead">Creating a logfile</h5><br>
<p class="lead"><br>
  I decided that logging any IP changes would be a good idea, just in case 
  I need to reference any downtimes, or calculate how long an IP will stay 
  the same. You can easily skip this step, but you will need to remove the 
  logging part of the script (see comments in the script).<br><br> To create 
  a logfile in your /var/log/apache2/ dir, you\'ll need sudo privileges, as 
  /var/ is owned by root. To make the logfile accessable to cron, you must 
  also modify the owner of the logfile once it\'s been created. The 
  following code will do just that:
  </p>
 
<pre>
  <code>

    sudo touch /var/log/apache2/dns_update.log
    sudo chown username:username /var/log/apache2/dns_update.log

  </code>
</pre>

<p class="lead"><br>
  Once you\'re done creating and changing ownership of your logfile, we can 
  move on to the final step: adding the script to cron so that it runs 
  whenever we specify.
</p><br>

<h5 class="lead">Adding the script to crontab</h5><br>
<p class="lead"><br>
  Crontab is a powerful Linux scheduling utility that will run scripts in the 
  background every so often, depending on the time interval specified. You 
  can use crontab the script you just created to have the script check for IP 
  address changes, say, every 15 minutes. To accomplish this, enter the command 
  "<code style="color:white;">crontab -e</code>"
  which will open your crontab settings file in your default text editor. To 
  have the script run every 15 minutes, your crontab file should look a little 
  something like this:
</p><br><br>

<pre>
 <code>
 # Notice that tasks will be started based on the cron\'s system
 # daemon\'s notion of time and timezones.
 # 
 # Output of the crontab jobs (including errors) is sent through
 # email to the user the crontab file belongs to (unless redirected).
 # 
 # For example, you can run a backup of all your user accounts
 # at 5 a.m every week with:
 # 0 5 * * 1 tar -zcf /var/backups/home.tgz /home/
 # 
 # For more information see the manual pages of crontab(5) and cron(8)
 # 
 # m h  dom mon dow   command
 
 # Update Google Domain to reflect current IP address (for web server)
 # Runs every 20 minutes
 
 */20 * * * * ~/dns_update

  </code>
</pre>
<br><p class="lead"><br>
  Save and quit, and you\'re finished! Cron will automatically update with 
  your new configuration, so you dont have to restart any services or reboot. 
  Congratulations! Now, any time your IP address changes, your domain will be 
  automatically updated to reflect those changes, with a maximum of 15 minutes 
  of downtime at any point in time. I hope this tutorial was helpful! If you 
  have questions or comments, dont hesitate to contact me.
 </p><br>
 </div>
';